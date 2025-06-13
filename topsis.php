<?php

// Definisi tabel
$alternatif = array(
    array("nama" => "Laptop A", "harga" => 10000000, "ram" => 4, "processor" => "Intel Core i5"),
    array("nama" => "Laptop B", "harga" => 8000000, "ram" => 8, "processor" => "Intel Core i7"),
    array("nama" => "Laptop C", "harga" => 12000000, "ram" => 16, "processor" => "AMD Ryzen 9"),
);

$kriteria = array(
    array("nama" => "Harga", "jenis" => "cost"),
    array("nama" => "RAM", "jenis" => "benefit"),
    array("nama" => "Processor", "jenis" => "benefit"),
);

$bobot = array(
    0.3,
    0.4,
    0.3,
);

// Normalisasi matriks
$matriks_normalisasi = normalisasi($alternatif, $kriteria);

// Matriks terbobot
$matriks_terbobot = bobot($matriks_normalisasi, $bobot);

// Solusi ideal positif dan negatif
$solusi_ideal = solusi_ideal($matriks_terbobot, $kriteria);

// Jarak dari solusi ideal
$jarak_ideal = jarak_ideal($matriks_terbobot, $solusi_ideal);

// Nilai preferensi
$nilai_preferensi = nilai_preferensi($jarak_ideal);

// Hasil
echo "Hasil Perhitungan TOPSIS:\n";
echo "========================\n";
echo "Alternatif | Nilai Preferensi\n";
echo "----------|-----------------\n";
foreach ($alternatif as $key => $value) {
    echo $value["nama"] . " | " . $nilai_preferensi[$key] . "\n";
}

// Fungsi normalisasi
function normalisasi($alternatif, $kriteria) {
    $matriks_normalisasi = array();
    foreach ($alternatif as $key => $value) {
        for ($i = 0; $i < count($kriteria); $i++) {
            if ($kriteria[$i]["jenis"] == "cost") {
                $matriks_normalisasi[$key][$i] = min($value[$kriteria[$i]["nama"]]) / $value[$kriteria[$i]["nama"]];
            } else {
                $matriks_normalisasi[$key][$i] = $value[$kriteria[$i]["nama"]] / max($value[$kriteria[$i]["nama"]]);
            }
        }
    }
    return $matriks_normalisasi;
}

// Fungsi bobot
function bobot($matriks_normalisasi, $bobot) {
    $matriks_terbobot = array();
    foreach ($matriks_normalisasi as $key => $value) {
        for ($i = 0; $i < count($value); $i++) {
            $matriks_terbobot[$key][$i] = $matriks_normalisasi[$key][$i] * $bobot[$i];
        }
    }
    return $matriks_terbobot;
}

// Fungsi solusi ideal
function solusi_ideal($matriks_terbobot, $kriteria) {
    $solusi_ideal = array();
    for ($i = 0; $i < count($kriteria); $i++) {
        if ($kriteria[$i]["jenis"] == "cost") {
            $solusi_ideal["positif"][$i] = min(array_column($matriks_terbobot, $i));
            $solusi_ideal["negatif"][$i] = max(array_column($matriks_terbobot, $i));
        } else {
            $solusi_ideal["positif"][$i] = max(array_column($matriks_terbobot, $i));
            $solusi_ideal["negatif"][$i] = min(array_column($matriks_terbobot, $i));
        }
    }
    return $solusi_ideal;
}

// Fungsi jarak ideal
function jarak_ideal($matriks_terbobot, $solusi_ideal) {
    $jarak_ideal = array();
    foreach ($matriks_terbobot as $key => $value) {
        $jarak_ideal_positif = 0;
        $jarak_ideal_negatif = 0;
        for ($i = 0; $i < count($value); $i++) {
            $jarak_ideal_positif += pow(($value[$i] - $solusi_ideal["positif"][$i]), 2);
            $jarak_ideal_negatif += pow(($value[$i] - $solusi_ideal["negatif"][$i]), 2);
        }
        $jarak_ideal[$key]["positif"] = sqrt($jarak_ideal_positif);
        $jarak_ideal[$key]["negatif"] = sqrt($jarak_ideal_negatif);
    }
    return $jarak_ideal;
}
