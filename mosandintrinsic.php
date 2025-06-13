<?php

// Function to calculate Intrinsic Value using DCF
function calculateIntrinsicValue($freeCashFlow, $discountRate) {
    return $freeCashFlow / (1 + $discountRate);
}

// Function to calculate Margin of Safety
function calculateMarginOfSafety($currentPrice, $intrinsicValue) {
    return (($intrinsicValue - $currentPrice) / $intrinsicValue) * 100;
}

// Example values (replace these with your own data)
$freeCashFlow = 8714; // Replace with your free cash flow value
$discountRate = 0.1;   // Replace with your discount rate
$currentPrice = 2480;    // Replace with the current stock price

// Calculate Intrinsic Value
$intrinsicValue = calculateIntrinsicValue($freeCashFlow, $discountRate);

// Calculate Margin of Safety
$marginOfSafety = calculateMarginOfSafety($currentPrice, $intrinsicValue);

// Display results
echo "Intrinsic Value: Rp." . number_format($intrinsicValue, 2) . PHP_EOL;
echo "Margin of Safety: " . number_format($marginOfSafety, 2) . "%";

?>
