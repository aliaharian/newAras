<?php

namespace App\Http\Controllers\Api;

use App\Color;
use App\Product;
use App\product_to_color;
use App\product_to_size;
use App\size;
use App\templateSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //
    public function homepage()
    {
        $template = templateSetting::all();
        return response()->json($template);
    }

    public function loadCart(Request $request)
    {
        $cartData = array();
        foreach ($request->cart as $item) {
            $tmp = new \stdClass();
            $product = Product::find($item["productId"]);

            $tmp->id = $product->id;
            $tmp->name = $product->name;
            $tmp->image = $product->image;
            $tmp->count = $item["count"];
            $tmp->price = $product->price;

            if ($item["sizeId"]) {
                $size = size::find($item["sizeId"]);
                $size_price = product_to_size::where("product_id", $item["productId"])->where("size_id", $item["sizeId"])->first();
                $tmp->size = $size->name;
                $tmp->price = $size_price->price;
            }
            if ($item["colorId"]) {
                $color = Color::find($item["colorId"]);
                $color_price = product_to_color::where("product_id", $item["productId"])->where("color_id", $item["colorId"])->first();
                $tmp->color = $color->name;
                $tmp->color_code = $color->english_name;
            }
            $cartData[] = $tmp;
        }
        return response()->json($cartData);

    }
}
