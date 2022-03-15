<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ImageUpload;
use App\Models\ProductReview;
use App\Services\FileService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Models\Bids;


class BidController extends Controller
{
   
    public function bidsPlaced()
    {
        
        return view('frontend/bid-placed/index');
    }


    public function view_details_bids($id){

        $bind = Bids::with(['product','user_details'])->where('id', $id)
        ->get();
        return view('frontend/bid-placed/view')->with('details',$bind);
    }


    public function BidPlacePost(Request $request)
    {

        if ($request->ajax()) {
            try {

                $bindlist = Bids::where('seller_id', Auth::user()->id)
                ->paginate($request->record);

                   
                    
                $completeSessionView = view(
                    'frontend/bid-placed/bid-list',
                    compact('bindlist')
                )->render();

                if ($bindlist->isNotEmpty()) {
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
}
