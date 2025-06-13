<?php

// Data alternatif dan kriteria
$data = array(
  array(
    "nama" => "Laptop A",
    "kriteria" => array(
      "harga" => 10000000,
      "performa" => 8,
      "baterai" => 5,
      "desain" => 8,
    ),
  ),
  array(
    "nama" => "Laptop B",
    "kriteria" => array(
      "harga" => 12000000,
      "performa" => 9,
      "baterai" => 6,
      "desain" => 7,
    ),
  ),
  array(
    "nama" => "Laptop C",
    "kriteria" => array(
      "harga" => 15000000,
      "performa" => 10,
      "baterai" => 7,
      "desain" => 9,
    ),
  ),
);

// Bobot kriteria
$bobot = array(
  "harga" => 0.4,
  "performa" => 0.3,
  "baterai" => 0.2,
  "desain" => 0.1,
);

// Menghitung matriks normalisasi
$normalized_data = normalize_matrix($data, $bobot);

// Menghitung solusi ideal positif dan negatif
$ideal_positive = max_of_array($normalized_data);
$ideal_negative = min_of_array($normalized_data);

// Menghitung jarak alternatif dari solusi ideal
$d_positive = calculate_separation($normalized_data, $ideal_positive, $bobot);
$d_negative = calculate_separation($normalized_data, $ideal_negative, $bobot);

// Menghitung nilai TOPSIS
$topsis_scores = calculate_topsis_scores($d_negative, $d_positive);

// Meranking alternatif berdasarkan nilai TOPSIS
$ranking = array_keys($topsis_scores);
usort($ranking, 'compare_topsis_scores');

// Menampilkan hasil
echo "Hasil Perhitungan TOPSIS:" . PHP_EOL;
echo "-------------------------" . PHP_EOL;
foreach ($ranking as $i => $rank) {
  echo "Rank " . ($i + 1) . ": " . $data[$rank]["nama"] . " (Nilai TOPSIS: " . $topsis_scores[$rank] . ")" . PHP_EOL;
}

// Fungsi-fungsi helper
function normalize_matrix($data, $bobot) {
  $n = count($data);
  $norm_data = array();
  for ($i = 0; $i < $n; $i++) {
    $sum_squares = 0;
    foreach ($data[$i]["kriteria"] as $k => $v) {
      $sum_squares += pow($v * $bobot[$k], 2);
    }
    $norm = sqrt($sum_squares);
    foreach ($data[$i]["kriteria"] as $k => $v) {
      $norm_data[$i]["kriteria"][$k] = $v * $bobot[$k] / $norm;
    }
  }
  return $norm_data;
}

function max_of_array($data) {
    $n = count($data);
    $max = array_fill(0, count($data[0]["kriteria"]), -INF); // Ensure proper size
    for ($i = 0; $i < $n; $i++) {
      foreach ($data[$i]["kriteria"] as $j => $v) {
        if ($v > $max[$j]) {
          $max[$j] = $v;
        }
      }
    }
    return $max;
  }

function min_of_array($data) {
  $min = array_fill(0, count($data[0]["kriteria"]), INF);
  foreach ($data as $i => $alternative) {
    foreach ($alternative["kriteria"] as $j => $v) {
      if ($v < $min[$j]) {
        $min[$j] = $v;
      }
    }
  }
  return $min;
}

function calculate_separation($data, $ideal, $bobot) {
  $n = count($data);
  $d_squared = array();
  for ($i = 0; $i < $n; $i++) {
    $sum_squares = 0;
    for ($j = 0; $j < count($data[0]); $j++) {
      $diff = $data[$i][$j] - $ideal[$j];
      $sum_squares += $weights[$j] * pow($diff, 2);
    }
    $d_squared[] = sqrt($sum_squares);
  }
  return $d_squared;
}

function calculate_topsis_scores($d_negative, $d_positive) {
  $n = count($d_negative);
  $topsis_scores = array();
  for ($i = 0; $i < $n; $i++) {
    $topsis_scores[$i] = $d_negative[$i] / ($d_negative[$i] + $d_positive[$i]);
  }
  return $topsis_scores;
}
// Define a separate comparison function
function compare_topsis_scores($a, $b, &$topsis_scores) {
    if (is_nan($topsis_scores[$b]) || is_nan($topsis_scores[$a])) {
      // Handle NAN values (e.g., assign a specific value, skip comparison)
      return 0; // Example: consider equal if both are NAN
    } else {
      // Perform normal comparison logic
      if ($topsis_scores[$b] > $topsis_scores[$a]) {
        return -1;
      } else if ($topsis_scores[$b] < $topsis_scores[$a]) {
        return 1;
      } else {
        return 0;
      }
    }
  }
?>