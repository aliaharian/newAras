<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Off;
use App\Product;
use App\product_to_size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::whereHas('categories', function ($q) {
            $q->where('english_name', '<>', 'promotional-towel')->where('english_name', '<>', 'gift-towel');
        })->where('published', 1)->with(['categories' => function ($q) {
            $q->where('english_name', '<>', 'promotional-towel')->where('english_name', '<>', 'gift-towel');
        }])->where('published', 1)->orderBy('qty', 'desc')->get();

        return response()->json(["products" => $products]);
    }

    public function list(Request $request)
    {
        $page = $request->page ?? 1;
        $perPage = 100;
        // Calculate the offset to skip the previous pages
        $offset = ($page - 1) * $perPage;
        $total_count = Product::whereHas('categories', function ($q) {
            $q->where('english_name', '<>', 'promotional-towel')->where('english_name', '<>', 'gift-towel');
        })->where('published', 1)->with(['categories' => function ($q) {
            $q->where('english_name', '<>', 'promotional-towel')->where('english_name', '<>', 'gift-towel');
        }])->where('published', 1)->orderBy('qty', 'desc')->count();
        $products = Product::whereHas('categories', function ($q) {
            $q->where('english_name', '<>', 'promotional-towel')->where('english_name', '<>', 'gift-towel');
        })->where('published', 1)->with(['categories' => function ($q) {
            $q->where('english_name', '<>', 'promotional-towel')->where('english_name', '<>', 'gift-towel');
        }])->where('published', 1)->orderBy('qty', 'desc')->skip($offset)
            ->take($perPage)
            ->get();

        $list = array();
        foreach ($products as $product) {
            $price = $product->price;
            $old_price = null;
            if ($product->variable == 2) {
                //find min price from sizes
                $size = product_to_size::where("product_id", $product->id)->orderBy("price", "ASC")->first();
                $price = $size->price;
            }
            //check if product is in off!
            $off = Off::where("product_id", $product->id)->where("start", "<=", Carbon::now())->where("end", ">=", Carbon::now())->first();
            if ($off) {
                $old_price = $price;
                $price = $price * (1 - ($off->percent / 100));
            }
            $item = new \stdClass();
            $item->id = $product->id;
            $item->product_id = "ARASP" . $product->id;
            $item->page_url = 'https://arastowel.com/product/' . $product->id . '/' . str_replace(" ", "-", $product->name);
            $item->price = $price;
            $item->availability = $product->published == 1 && $product->qty > 0 ? true : false;
//            $item->published = $product->published;
//            $item->quantity = $product->qty;
            $item->old_price = $old_price;
            $list[] = $item;
        }

        return response()->json(["products" => $list,
            "page" => $page,
            "total_count" => $total_count,
            "per_page" => $perPage,
            "next_page_url" => null,
            "prev_page_url" => null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $product = Product::find($id);
        $product->galleries;
//        $product->size;
        $product->color;
        $product->categories;
        foreach ($product->size as $size) {
            $size->price = product_to_size::where("product_id", $id)->where("size_id", $size->id)->first()->price;
        }
        return response()->json(["product" => $product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
