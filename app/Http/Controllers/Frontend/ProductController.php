<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('isActive', 'y')->get();
        $brand = Brand::where('isActive', 'y')->get();
        return view(
            'frontend/product/add',
            compact(
                'category',
                'brand'
            )
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myUploadProduct(Request $request)
    {

        return View(
            'frontend/product/my-upload-product'
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myUploadProductPost(Request $request)
    {

        if ($request->ajax()) {
            try {

                $productlist = Product::where('user_id', Auth::user()->id)
                    ->paginate($request->record);
                $completeSessionView = view(
                    'frontend/product/my-upload-product-list',
                    compact('productlist')
                )->render();

                if ($productlist->isNotEmpty()) {
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


    public function detailedlistRender(Request $request)
    {

        if ($request->ajax()) {
            try {
                $category = $request->category;
                $productlist = Product::where('cat_id', $category)
                    ->paginate($request->record);
                $completeSessionView = view(
                    'frontend/product/my-upload-product-list',
                    compact('productlist')
                )->render();

                if ($productlist->isNotEmpty()) {
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bidsPlaced()
    {
        return view('frontend/bid-placed/index');
    }

    public function productDetails($productId)
    {
        $product_details = Product::find($productId);
        // dd($product_details);die;
        return view(
            'frontend/product/details',
            compact(
                'product_details',
            )
        );
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
        // $list=Category::with('category_based_product')->get();
        return view('frontend/product/cat-product');
    }

    public function detailedlist(Request $request)
    {
        if ($request->ajax()) {
            try {
                $order = $request->order;
                $brand = $request->brand;
                $category = $request->category;
                $page_limit = $request->page_limit != null ? $request->page_limit : 6;
                $sequence = "asc";
                $dataArr = ['cat_id' => $category];
                if ($brand != null) {
                    $dataArr['brand_id'] = $brand;
                }

                if ($order != null) {
                    if ($order == "higher") {
                        $sequence = 'desc';
                    } elseif ($order == "lower") {
                        $sequence = 'ASC';
                    }
                }

                $productlist = Product::where($dataArr)
                    ->orderBy('bid_amount', $sequence)
                    ->paginate($page_limit);



                $brand_list = Brand::all();
                $category_list = Category::all();

                $result = [
                    'list' => $productlist,
                    'brand_list' => $brand_list,
                    'category_list' => $category_list
                ];
                $completeSessionView = view(
                    'frontend/product/my-upload-product-list',
                    compact('productlist')
                )->render();

                if ($productlist->isNotEmpty()) {
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

    public function detailedlist_2(Request $request)
    {
        $order = $request->order;
        $brand = $request->brand;
        $category = $request->category;
        $page_limit = $request->page_limit != null ? $request->page_limit : 6;
        $sequence = "asc";
        $dataArr = ['cat_id' => $category];
        if ($brand != null) {
            $dataArr['brand_id'] = $brand;
        }

        if ($order != null) {
            if ($order == "higher") {
                $sequence = 'desc';
            } elseif ($order == "lower") {
                $sequence = 'ASC';
            }
        }

        $list = Product::where($dataArr)
            ->orderBy('bid_amount', $sequence)
            ->paginate($page_limit);

        $brand_list = Brand::all();
        $category_list = Category::all();

        $result = ['list' => $list, 'brand_list' => $brand_list, 'category_list' => $category_list];

        return response()->json([
            'error' => false,
            'data' => $result,
            'message' =>  "sucess",
        ], 200);
    }


    public function list($id)
    {
        $list = Product::whereCatId($id)
            ->paginate(6);

        $brand_list = Brand::all();
        $category_list = Category::all();

        $product = Product::where('cat_id', $id)
            ->paginate(1);
        $result = [
            'list' => $list,
            'brand_list' => $brand_list,
            'category_list' => $category_list,
            'product' => $product
        ];
        return view('frontend/product/cat-product', $result);
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
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    {
        try {
            $product= new Product;
            $Product =  $product->storeProduct($request);
            if (!empty($Product)) {
                return response()->json(
                    ['success' => true, 'message' => trans('admin.add_product')]
                );
            }
            return response()->json(
                [
                    'success' => false,
                    'message' => trans('admin.something_went_wrong')
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                ['success' => false, 'message' => $e->getMessage()]
            );
        }
    }
}
