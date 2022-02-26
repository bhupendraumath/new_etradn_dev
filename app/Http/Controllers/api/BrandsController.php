<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        if ($lang == 'en') {
            $brands = Brand::select('id', 'brandName', 'description', 'image', 'isActive')->where('isActive', 'y')->get();
        } else {
            $brands = Brand::select('id', 'brandName_5', 'description_5', 'image', 'isActive')->where('isActive', 'y')->get();

            $brands = $brands->transform(function ($brand) {
                return[
                     'id' => $brand->id,
                     'brandName' => $brand->brandName_5,
                     'description' => $brand->description_5,
                     'image' => $brand->image,
                     'isActive' => $brand->isActive
                 ];
            });
        }

        if ($brands) {
            return response()->json([
                'status' => 200,
                'message' => 'Brands list are',
                'data' => $brands
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong',
                'data' => []
            ]);
        }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::where('id', $id)->with('products')->get();
        if ($brand) {
            return response()->json([
                'status' => 200,
                'message' => 'Brand product are',
                'data' => $brand
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrong',
                'data' => []
            ]);
        }
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
        //
    }
}
