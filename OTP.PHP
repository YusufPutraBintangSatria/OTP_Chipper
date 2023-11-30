<?php
function konversiascii($input_string) {
    $ascii_values = [];
    for ($i = 0; $i < strlen($input_string); $i++) {
        $ascii_value = ord($input_string[$i]);
        array_push($ascii_values, $ascii_value);
    }
    return $ascii_values;
}

function konversibiner($ascii_values) {
    $binary_values = [];
    foreach ($ascii_values as $value) {
        $binary_value = decbin($value);
        array_push($binary_values, $binary_value);
    }
    return $binary_values;
}

function xor_biner($binary_values_string, $binary_values_key) {
    $result_biner = [];
    for ($i = 0; $i < min(count($binary_values_string), count($binary_values_key)); $i++) {
        $result = bindec($binary_values_string[$i]) ^ bindec($binary_values_key[$i]);
        array_push($result_biner, decbin($result));
    }
    return $result_biner;
}

function biner_ke_desimal($hasil_xor) {
    $desimal_values = [];
    foreach ($hasil_xor as $value) {
        $desimal_value = bindec($value);
        array_push($desimal_values, $desimal_value);
    }
    return $desimal_values;
}

function kodeascii($hasil_desimal) {
    $karakter_values = '';
    foreach ($hasil_desimal as $value) {
        $karakter_value = chr($value);
        $karakter_values .= $karakter_value;
    }
    return $karakter_values;
}

function enkripsi($input_string, $key) {
    $ascii_values_string = konversiascii($input_string);
    $ascii_values_key = konversiascii($key);

    $hasil_string = konversibiner($ascii_values_string);
    $hasil_key = konversibiner($ascii_values_key);

    $hasil_xor = xor_biner($hasil_string, $hasil_key);

    $hasil_desimal = biner_ke_desimal($hasil_xor);

    $hasil_karakter = kodeascii($hasil_desimal);

    return $hasil_karakter;
}

function dekripsi($input_string, $key) {
    return enkripsi($input_string, $key);
}

$input_string = readline("masukkan plainteks: ");
$key = readline("masukkan key: ");

$encrypted_string = enkripsi($input_string, $key);
echo "hasil dari enkripsi adalah: " . $encrypted_string . "\n";

$decrypted_string = dekripsi($encrypted_string, $key);
echo "hasil dari dekripsi adalah: " . $decrypted_string . "\n";
?>