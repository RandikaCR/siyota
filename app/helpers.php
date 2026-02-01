<?php

function priceWithCurrency($price){
    return defaultCurrency() . number_format($price, 2);
}

function defaultCurrency(){
    return 'Rs. ';
}

function dateTimeFormat($date){
    return date('d-F-Y h:i A', strtotime($date));
}

function dateFormat($date){
    return date('d-F-Y', strtotime($date));
}

function orderIdFormat($orderId){
    return str_pad($orderId, 6, '0', STR_PAD_LEFT);
}

function blogDateFormat($date){
    return date('F d, Y', strtotime($date));
}

function textTrancate($title, $length = 80){
    $title = strip_tags($title);
    $title = (strlen($title) > ($length + 3)) ? substr($title,0,$length).'...' : $title;
    return $title;
}

function generalStatus($status){
    $out = [
        'text' => 'Inactive',
        'class' => 'bg-warning',
    ];
    if ($status == 1){
        $out = [
            'text' => 'Active',
            'class' => 'bg-success',
        ];
    }

    return (Object)$out;
}

?>
