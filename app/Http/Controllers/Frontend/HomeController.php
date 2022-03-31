<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $details = json_decode(file_get_contents("http://ipinfo.io/"));
        // print_r($details); // city 
        // die;

        $list=Category::with(['category_based_product'])
        ->limit(4)
        ->get();

        $category_list=Category::with(['category_based_product'])
        ->get();

        $popular_produts=Category::with(['category_based_product'])
        ->limit(1)
        ->get();

        $special_produts=Category::with(['category_based_product'])
        ->limit(1)
        ->get();

        $latest_produts=Category::with(['category_based_product'])
        ->limit(4)
        ->get();

        $feature_produts=Category::with(['category_based_product'])
        ->limit(4)
        ->get();
        // dd($list);die;
        return view('frontend/home',['data'=>$list,'popular_list'=>$popular_produts,'special_list'=>$special_produts,'latest_list'=>$latest_produts,'feature_list'=>$feature_produts,'category_list'=>$category_list]);
    }
    /**
     * Display about resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('frontend/about');
    }
    /**
     * Display contactUs resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUs()
    {
        return view('frontend/contactus');
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

    public function blog()
    {
        return view('frontend/blog');
    }
    public function blogDetails()
    {
        return view('frontend/blog-details');
    }
    
}
