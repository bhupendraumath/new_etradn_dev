<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ImageUpload;
use App\Models\ProductQuantity;
use App\Models\ProductReview;
use App\Models\ProductCondition;
use App\Services\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Redirect;
use DB;

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

                $productlist = Product::where(['user_id' => Auth::user()->id, 'is_delete' => 'n'])
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
    public function uploadedEdit($id)
    {
        // return $id;


        $category = Category::where('isActive', 'y')->get();
        $brand = Brand::where('isActive', 'y')->get();
        $product = Product::where('id', $id)->first();
        $productId = $id;
        return view(
            'frontend/product/add',
            compact(
                'category',
                'brand',
                'product',
                'productId'
            )
        );
    }


    public function uploadedDelete($id)
    {


        try {

            $user_id = Auth::guard('web')->user()->id;
            $delete = Product::whereId($id)->update([
                'is_delete' => 'y'
            ]);

            if ($delete) {
                return response()->json(
                    ['success' => true, 'message' => "Delete Successfully"]
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




    //category based list
    public function detailedlist(Request $request)
    {

        //print_r($request->all());die;
        if ($request->ajax()) {
            try {
                $order = $request->order;
                $brand = $request->brand;
                $category = $request->category;
                $sub_cat = $request->sub_category;
                $price_range = $request->priceRange;
                $conditionArr = $request->conditionArr;
                $page_limit = $request->page_limit != null ? $request->page_limit : 6;
                $sequence = "asc";

                $dataArr=['is_delete'=>"n"];

                if($category!='noav'){

                $dataArr['cat_id']=$category;

                }
                $function_price_range = function () {
                };

                if ($sub_cat != null && $sub_cat != "noav") {
                    $dataArr['sub_cat_id'] = $sub_cat;
                }

                if ($order != null) {
                    if ($order == "higher") {
                        $sequence = 'desc';
                    } elseif ($order == "lower") {
                        $sequence = 'ASC';
                    }
                } else {
                    $sequence = 'desc';
                }

                $product =  DB::table('tbl_product')
                ->select('tbl_product.*','tbl_product_attribute_quantity.quantity','tbl_product_attribute_quantity.price','tbl_product_attribute_quantity.id as q_id','tbl_product_attribute_quantity.discount','tbl_product_attribute_quantity.quantity','tbl_product_brand.brandName','tbl_product_brand.id as brand_id','tbl_product_sub_cat.subCategoryName','tbl_product_sub_cat.id as s_c_id','tbl_product_cat.categoryName','tbl_product_cat.id as c_id')
                ->join('tbl_product_attribute_quantity','tbl_product_attribute_quantity.product_id','=','tbl_product.id')
                ->join('tbl_product_image','tbl_product_image.product_id','=','tbl_product.id')
                ->join('tbl_product_cat','tbl_product_cat.id','=','tbl_product.cat_id')
                ->join('tbl_product_sub_cat','tbl_product_sub_cat.id','=','tbl_product.sub_cat_id')
                ->join('tbl_product_brand','tbl_product_brand.id','=','tbl_product.brand_id');
                
                $details_product = $product->where($dataArr);
                

                if ($brand != null && $brand[0]!="noav") {
                    $arr = [1, 2];
                    $details_product->whereIn('brand_id', $brand);
                }

                if ($price_range != null || $conditionArr != null) {

                    if ($conditionArr == null) {
                            $details_product->whereBetween('price', [0, $price_range])
                                ->orderBy('tbl_product_attribute_quantity.price', 'ASC');
                    } else {
                            $details_product->whereBetween('price', [0, $price_range])
                                ->whereIn('condition_id', $conditionArr)
                                ->orderBy('tbl_product_attribute_quantity.price', 'ASC');
                    }
                }

                $productlist = $details_product
                    //->with(['quantity' => $function_price_range])
                    ->orderBy('tbl_product.id', $sequence)
                    ->paginate($page_limit);

                    // print_r($productlist);die;


                /* $productlist = Product::where($dataArr)
                    ->with(['quantity' => function ($q) use ($sequence) {
                        $q->orderBy('tbl_product_attribute_quantity.price', 'ASC');
                    }])
                    ->orderBy('id', $sequence)
                    ->paginate($page_limit);*/

                   /* $ListOfProduct = DB::table('tbl_product')
                    ->select('tbl_product.*','tbl_product_attribute_quantity.quantity','tbl_product_attribute_quantity.price','tbl_product_attribute_quantity.discount','tbl_product_attribute_quantity.quantity')
                    ->join('tbl_product_attribute_quantity','tbl_product_attribute_quantity.product_id','=','tbl_product.id')
                    ->join('tbl_product_image','tbl_product_image.product_id','=','tbl_product.id')
                    ->join('tbl_product_cat','tbl_product_cat.id','=','tbl_product.cat_id')
                    ->join('tbl_product_sub_cat','tbl_product_sub_cat.id','=','tbl_product.sub_cat_id')
                    ->join('tbl_product_brand','tbl_product_brand.id','=','tbl_product.brand_id')
                    ->orderBy('id', $sequence)
                    ->get();*/


                $brand_list = Brand::all();
                $category_list = Category::all();
                $condition_list = ProductCondition::where('isActive', 'y')
                    ->get();

                $result = [
                    'list' => $productlist,
                    'brand_list' => $brand_list,
                    'category_list' => $category_list,
                    'condition_list' => $condition_list
                ];

                $completeSessionView = view(
                    'frontend/product/cat-product-list',
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


/*
    //New function 
    public function detailedlist(Request $request)
    {

        if ($request->ajax()) {
            try {
                $order = $request->order;
                $brand = $request->brand;
                $category = $request->category;
                $sub_cat = $request->sub_category;
                $price_range = $request->priceRange;
                $conditionArr = $request->conditionArr;
                $page_limit = $request->page_limit != null ? $request->page_limit : 6;
                $sequence = "asc";

                $dataArr=['is_delete'=>"n"];

                if($category!='noav'){

                $dataArr['cat_id']=$category;

                }
                $function_price_range = function () {
                };

                if ($sub_cat != null && $sub_cat != "noav") {
                    $dataArr['sub_cat_id'] = $sub_cat;
                }

                if ($order != null) {
                    if ($order == "higher") {
                        $sequence = 'desc';
                    } elseif ($order == "lower") {
                        $sequence = 'ASC';
                    }
                } else {
                    $sequence = 'desc';
                }

                $product = new Product;
                // if(!empty($dataArr)){
                $details_product = $product->where($dataArr);
                // }
           


                if ($brand != null && $brand[0]!="noav") {
                    $details_product->whereIn('brand_id', $brand);
                }

                if ($price_range != null || $conditionArr != null) {

                    if ($conditionArr == null) {
                        $function_price_range = function ($q) use ($sequence, $price_range) {
                            $q->whereBetween('price', [0, $price_range])
                                ->orderBy('tbl_product_attribute_quantity.price', 'ASC');
                        };
                    } else {
                        $function_price_range = function ($q) use ($sequence, $price_range, $conditionArr) {
                            $q->whereBetween('price', [0, $price_range])
                                ->whereIn('condition_id', $conditionArr)
                                ->orderBy('tbl_product_attribute_quantity.price', 'ASC');
                        };
                    }
                }

                $ListOfProduct = DB::table('tbl_product')
                ->select('tbl_product.*','tbl_product_attribute_quantity.quantity','tbl_product_attribute_quantity.price','tbl_product_attribute_quantity.discount','tbl_product_attribute_quantity.quantity')
                ->join('tbl_product_attribute_quantity','tbl_product_attribute_quantity.product_id','=','tbl_product.id')
                ->join('tbl_product_image','tbl_product_image.product_id','=','tbl_product.id')
                ->join('tbl_product_cat','tbl_product_cat.id','=','tbl_product.cat_id')
                ->join('tbl_product_sub_cat','tbl_product_sub_cat.id','=','tbl_product.sub_cat_id')
                ->join('tbl_product_brand','tbl_product_brand.id','=','tbl_product.brand_id')
                ->where('tbl_orders.shipping_address', 'like', '%' . $details->city . '%')
                ->orderBy('id', $sequence)
                ->get();

                $productlist = $details_product
                    ->with(['quantity' => $function_price_range])
                    ->orderBy('id', $sequence)
                    ->paginate($page_limit);

                    // print_r($productlist);die;


                $brand_list = Brand::all();
                $category_list = Category::all();
                $condition_list = ProductCondition::where('isActive', 'y')
                    ->get();

                $result = [
                    'list' => $productlist,
                    'brand_list' => $brand_list,
                    'category_list' => $category_list,
                    'condition_list' => $condition_list
                ];

                $completeSessionView = view(
                    'frontend/product/cat-product-list',
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


    */
    // public function detailedlist_2(Request $request)
    // {
    //     $order = $request->order;
    //     $brand = $request->brand;
    //     $category = $request->category;
    //     $page_limit = $request->page_limit != null ? $request->page_limit : 6;
    //     $sequence = "asc";
    //     $dataArr = ['cat_id' => $category];
    //     if ($brand != null) {
    //         $dataArr['brand_id'] = $brand;
    //     }

    //     if ($order != null) {
    //         if ($order == "higher") {
    //             $sequence = 'desc';
    //         } elseif ($order == "lower") {
    //             $sequence = 'ASC';
    //         }
    //     }

    //     $list = Product::where($dataArr)
    //         ->orderBy('id', $sequence)
    //         ->paginate($page_limit);

    //     $brand_list = Brand::all();
    //     $category_list = Category::all();

    //     $result = ['list' => $list, 'brand_list' => $brand_list, 'category_list' => $category_list];

    //     return response()->json([
    //         'error' => false,
    //         'data' => $result,
    //         'message' =>  "sucess",
    //     ], 200);
    // }

    public function refund_request()
    {
        return view('frontend/product/refund-request');
    }

    public function list($id,$subid,$brandid)
    {
        $list = Product::whereCatId($id)
            ->paginate(6);

        $brand_list = Brand::where('isActive', 'y')->get();
        $category_list = Category::all();

        $product = Product::where('cat_id', $id)
            ->paginate(1);

        $condition_list = ProductCondition::where('isActive', 'y')
            ->get();

        $result = [
            'list' => $list,
            'brand_list' => $brand_list,
            'category_list' => $category_list,
            'product' => $product,
            'condition_list' => $condition_list
        ];
        return view('frontend/product/cat-product', $result);
    }

    /*public function list($id)
    {
        $list = Product::whereCatId($id)
            ->paginate(6);

        $brand_list = Brand::where('isActive', 'y')->get();
        $category_list = Category::all();

        $product = Product::where('cat_id', $id)
            ->paginate(1);

        $condition_list = ProductCondition::where('isActive', 'y')
            ->get();

        $result = [
            'list' => $list,
            'brand_list' => $brand_list,
            'category_list' => $category_list,
            'product' => $product,
            'condition_list' => $condition_list
        ];
        return view('frontend/product/cat-product', $result);
    }*/

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
    public function addProduct(ProductRequest $request)
    {
        try {
            $product = new Product;
            if (!empty($request->id)) {
                $Product = $product->updateProduct($request, $request->id);
                foreach ($request->image_name as $imagefile) {
                    $fileService = new FileService();
                    $image =  $fileService->uploadBaseCodeImage(
                        'assets/images/product-images/',
                        $imagefile
                    );

                    //Save image
                    $upload = new ImageUpload;
                    $upload->saveImageProduct(
                        $request->id,
                        $image
                    );
                }

                foreach ($request->price as $key => $dataprice) {
                    $data = array(
                        'product_id' => $request->id,
                        'condition_id' => 1,
                        'quantity' => $request->quantity[$key],
                        'price' => $request->price[$key],
                        'discount' => $request->discount[$key],
                        'createdDate' => date('d/m/y H:i:s')
                    );
                    ProductQuantity::create($data);
                }
                $msg = trans('admin.update_product');
            } else {
                $Product =  $product->storeProduct($request);
                foreach ($request->image_name as $imagefile) {
                    $fileService = new FileService();
                    $image =  $fileService->uploadBaseCodeImage(
                        'assets/images/product-images/',
                        $imagefile
                    );

                    //Save image
                    $upload = new ImageUpload;
                    $upload->saveImageProduct(
                        $Product->id,
                        $image
                    );
                }
                foreach ($request->price as $key => $dataprice) {
                    $data = array(
                        'product_id' => $Product->id,
                        'condition_id' => 1,
                        'quantity' => $request->quantity[$key],
                        'price' => $request->price[$key],
                        'discount' => $request->discount[$key],
                        'createdDate' => date('d/m/y H:i:s')
                    );
                    ProductQuantity::create($data);
                }
                $msg = trans('admin.add_product');
            }
            if (!empty($Product)) {
                return response()->json(
                    ['success' => true, 'message' => $msg]
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
