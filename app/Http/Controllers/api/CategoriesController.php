<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        if ($lang == 'en') {
            $categories = Category::select('id', 'categoryName', 'isActive')->where('isActive', 'y')->get();
        } else {
            $categories = Category::select('id', 'categoryName_5', 'isActive')->where('isActive', 'y')->get();

            $categories = $categories->transform(function ($category) {
                return[
                     'id' => $category->id,
                     'categoryName' => $category->categoryName_5,
                     'isActive' => $category->isActive
                 ];
            });
        }

        if ($categories) {
            return response()->json([
                'status' => 200,
                'message' => 'Categories list are',
                'data' => $categories
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Something went wrog',
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
        //
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
