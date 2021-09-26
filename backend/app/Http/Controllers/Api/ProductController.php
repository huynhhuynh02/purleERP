<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $id = Auth::id();
        $product = Product::where('created_by', '=' , $id)->paginate();
        return ProductResource::collection($product);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|max:10|unique:products',
            'serial' => 'required|numeric',
            'name' => 'required|max:200',
            'slug' => Str::slug($request->name),
            'cost_price' => 'required|numeric',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'area' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors() 
            ], 400);
        }

        $product = Product::create([
            'id' => $request->id,
            'serial' => $request->serial,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'cost_price' => $request->cost_price,
            'price' => $request->price,
            'weight' => $request->weight,
            'area' => $request->area,
            'stock' => $request->stock,
            'created_by' => Auth::id(),
        ]);
        return response()->json([
            'status' => 200,
            'data' => $product
        ], 200);
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
        $product = Product::find($id);
        if($product) {
            return response()->json([
                'status' => 200,
                'data' => $product
            ], 200);   
        }

        return response()->json([
            'status' => 404,
            'message' => "Product not found !"
        ], 404);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $validator = Validator::make($request->all(), [
            'serial' => 'required|max:10',
            'name' => 'required|max:200',
            'stock' => 'required|integer',
            'cost_price' => 'required|integer',
            'price' => 'required|integer',
            'weight' => 'required|numeric',
            'area' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors() 
            ], 400);
        }
        $user_id = Auth::id();
        $product = Product::find($id);
        $product->id = $request->id;
        $product->serial = $request->serial;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cost_price = $request->cost_price;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->created_by = $user_id;
        $product->save();

        return response()->json([
            'status' => 200,
            'data' => $product
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
