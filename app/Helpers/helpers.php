<?php

if (!function_exists('my_helper_generate_unique_category_code')) {
    function my_helper_generate_unique_category_code($categoryName, $existingCodes) {
        // Mengambil 3 huruf pertama dari nama kategori dan mengonversi ke huruf besar
        $baseCode = substr(strtoupper(preg_replace('/[^a-zA-Z]/', '', $categoryName)), 0, 3);
        $uniqueCode = $baseCode;

        $i = 1;
        while (in_array($uniqueCode, $existingCodes)) {
            $uniqueCode = $baseCode . $i;
            $i++;
        }

        return $uniqueCode;
    }
}
