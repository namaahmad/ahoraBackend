<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Request\CreateProduct;
use Exception;

class ProductsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return response()->json(["items" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $data = [
                'name' => $request->name, 'price' => $request->price, 'quantity' => $request->quantity, 'description' => $request->description
            ];
            $client = new Product($data);
            $client->save();
            return response()->json(['status' => true]);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $res = Product::where('id', $id)->delete();
            return response()->json(['status' => true]);
        } catch (Exception $ex) {
            return response()->json(['status' => false, 'error' => $ex->getMessage()], 500);
        }
    }
}
