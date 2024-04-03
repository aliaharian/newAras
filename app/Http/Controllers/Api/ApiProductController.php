<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use App\product_to_size;
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

    public function list()
    {
        
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
        foreach ($product->size as $size){
            $size->price = product_to_size::where("product_id",$id)->where("size_id",$size->id)->first()->price;
        }
        return response()->json(["product"=>$product]);

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
