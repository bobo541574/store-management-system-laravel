<?php

use App\Models\ProductAttribute;

function formatted_money($money)
{
    return number_format($money, 3) . " /MMK";
}

function current_date()
{
    $current_date = date_format(date_create(now()), "Y-m-d");
    return $current_date;
}

function extra_cost($attributes)
{
    if ($attributes) {
        return 1;
        // return $attributes->pluck('quantity')->sum() * $attributes->first()->extra;
    }
    // $arrtibute_id = count($id);
    // dd(count($id));
    // for ($i = 0; $i < $arrtibute_id; $i++) {
    //     $attributes = ProductAttribute::find($id[$i]);
    // }
    // return $attributes;
    // dd($product);
    // $extra_cost = $product->first()->productAttrs->first()->extra ?? "";
    // if ($extra_cost) {
    //     $quantity = $product->first()->productAttrs->pluck('quantity')->sum();
    //     $extra = $product->first()->productAttrs->first()->extra;
    //     $extra_cost = $quantity * $extra;
    // }
    return "null";
}

function extra_name()
{
}