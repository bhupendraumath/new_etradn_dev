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

        // $details = json_decode(file_get_contents("http://ipinfo.io/"));
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



    public function homeListing(Request $request){
        if ($request->ajax()) {
            try {
                // $details = json_decode(file_get_contents("http://ipinfo.io/"));
               
                $category_list_popular=Category::limit(4)->get();
                $category_list_featured=Category::limit(4)->get();

                $list=Category::with(['category_based_product'])
                ->limit(4)
                ->get();

                $popular_produts=Category::with(['category_based_product'])
                ->limit(1)
                ->get();


                $hot_products=Product::limit(5)->get();
                $special_products=Product::limit(5)->get();
                $featured_products=Product::limit(6)->orderBy('id','desc')->get();

                $completeSessionView = view(
                    'frontend/home-listing',['popular_list'=>$popular_produts,'data'=>$list,'category_list'=>$category_list_popular,'hot_products'=>$hot_products,'special_products'=>$special_products,'featured_products'=>$featured_products]
                )->render();

                if (!empty($popular_produts)) {
                    return response()->json(
                        [
                            'success' => true,
                            'data' =>
                            [
                                'completeSessionView' => $completeSessionView
                            ]
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 'data' =>
                        [
                            'completeSessionView' => $completeSessionView
                        ]
                    ]
                );
            } catch (\Exception $ex) {
                return response()->json(
                    [
                        'success' => false,
                        'data' => [],
                        'error' => ['message' => $ex->getMessage()]
                    ],
                    422
                );
            }
        }
    }


    public function homeProductListing(Request $request){
        if ($request->ajax()) {
            try {
                // $details = json_decode(file_get_contents("http://ipinfo.io/"));
               
                // $category_list_popular=Category::limit(4)->get();

                // $list=Category::with(['category_based_product'])
                // ->limit(4)
                // ->get();

                $popular_produts=new Product;
                if($request->id!='all'){
                    // $popular_produts->where('cat_id',$request->id);
                    $popular_produts_list= $popular_produts
                                            ->where('cat_id',$request->id)
                                            ->orderBy('id','DESC')
                                            ->limit(5)
                                            ->get();
                }else{

                    $popular_produts_list= $popular_produts
                                            // ->where('cat_id',$request->id)
                                            ->orderBy('id','DESC')
                                            ->limit(5)
                                            ->get();

                }

                // $popular_produts_list= $popular_produts
                // ->orderBy('id','DESC')
                // ->limit(5)
                // ->get();

                $completeSessionView = view(
                    'frontend/home-product-listing',['popular_list'=>$popular_produts_list]
                )->render();

                if (!empty($popular_produts)) {
                    return response()->json(
                        [
                            'success' => true,
                            'data' =>
                            [
                                'completeSessionView' => $completeSessionView
                            ]
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 'data' =>
                        [
                            'completeSessionView' => $completeSessionView
                        ]
                    ]
                );
            } catch (\Exception $ex) {
                return response()->json(
                    [
                        'success' => false,
                        'data' => [],
                        'error' => ['message' => $ex->getMessage()]
                    ],
                    422
                );
            }
        }
    }


    public function homeLatestProductListing(Request $request){
        if ($request->ajax()) {
            try {
                // $details = json_decode(file_get_contents("http://ipinfo.io/"));
               
                // $category_list_popular=Category::limit(4)->get();

                // $list=Category::with(['category_based_product'])
                // ->limit(4)
                // ->get();

                $popular_produts=new Product;
                if($request->id!='all'){
                    // $popular_produts->where('cat_id',$request->id);
                    $popular_produts_list= $popular_produts
                                            ->where('cat_id',$request->id)
                                            ->orderBy('id','DESC')
                                            ->limit(5)
                                            ->get();
                }else{

                    $popular_produts_list= $popular_produts
                                            // ->where('cat_id',$request->id)
                                            ->orderBy('id','DESC')
                                            ->limit(5)
                                            ->get();

                }

                $completeSessionView = view(
                    'frontend/home-special-product-listing',['popular_list'=>$popular_produts_list]
                )->render();

                if (!empty($popular_produts)) {
                    return response()->json(
                        [
                            'success' => true,
                            'data' =>
                            [
                                'completeSessionView' => $completeSessionView
                            ]
                        ]
                    );
                }
                return response()->json(
                    [
                        'success' => true, 'data' =>
                        [
                            'completeSessionView' => $completeSessionView
                        ]
                    ]
                );
            } catch (\Exception $ex) {
                return response()->json(
                    [
                        'success' => false,
                        'data' => [],
                        'error' => ['message' => $ex->getMessage()]
                    ],
                    422
                );
            }
        }
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
