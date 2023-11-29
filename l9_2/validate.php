<?php
function validate_number_field(string $value) {
    if (str_contains($value, ',')) $value = str_replace(',', '.', $value);
    if (strlen($value)==0) return "Pole nie może być puste";
    else if (!is_numeric($value)) return "Musi być wartość liczbowa";
}