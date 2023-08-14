<?php

if (!function_exists('formatCurrency')) {
    function formatCurrency($amount, $type = 'USD')
    {
        switch ($type) {
            case 'VND':
                return number_format($amount, 0, ',', '.') . '₫';
            case 'USD':
                return '$' . number_format($amount, 2, '.', ',');
            default:
                return '$' . number_format($amount, 2, '.', ',');
        }
    }
}
