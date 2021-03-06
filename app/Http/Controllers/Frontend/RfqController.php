<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UserRequest;
use App\Http\Requests\Frontend\UserUpdateRequest;
use App\Models\BusinessCategory;
use App\Models\BusinessType;
use App\Models\RfqList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Services\FileService;
use App\Models\Category;
use Redirect;


class RfqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rfq_list ()
    {
        // $list=RfqList::orderBy('rfq_id','asc')->get();

        return view('frontend/seller/rfq-list');


    }

    public function request ()
    {
        $cat=Category::where('isActive','y')->get();
        return view('frontend/request')->with('category',$cat);


    }

    public function requestAcept($id){
        // RfqList

        $userid=Auth::user()->id;
        try {
            $request = RfqList::where('rfq_id',$id)
            ->update([
                'rfq_accerpt_userid' => $userid
             ]);


            if ($request) {

                return \Redirect::back();
            }
        } catch (\Exception $e) {

            return response()->json(
                ['success' => false, 'message' => $e->getMessage()]
            );
        }
    }
    
    public function request_action(Request $request)
    {

        try {


            return response()->json(
                [
                    'success' => true,
                    'data' => $request->all(),
                    'message' => trans('admin.update_profile')
                ]
            );

            // $user = User::updateSellerWeb($request, Auth::user()->id);
            // if (!empty($user)) {
            //     return response()->json(
            //         [
            //             'success' => true,
            //             'message' => trans('admin.update_profile')
            //         ]
            //     );
            // }
            // return response()->json(
            //     [
            //         'success' => false,
            //         'message' => trans('admin.something_went_wrong')
            //     ]
            // );
        } catch (\Exception $e) {

            return response()->json(
                ['success' => false, 'message' => $e->getMessage()]
            );
        }
    }

    /**
     * RfqListAction 
     */

    public function rfqListAction(Request $request)
    {
        try {
            $request = RfqList::create($request->all());
            if (!empty($request)) {
                return response()->json(
                    [
                        'success' => true,
                        'data' => $request->all(),
                        'message' => trans('admin.add_rfq')
                    ]
                );
            }
        } catch (\Exception $e) {

            return response()->json(
                ['success' => false, 'message' => $e->getMessage()]
            );
        }
    }
    public function rfq_list_post (Request $request)
    {
        // $list=RfqList::orderBy('rfq_id','asc')->get();
        // return view('frontend/seller/rfq-list')->with('list',$list);


        if ($request->ajax()) {
            try {

                $rfqlist = RfqList::orderBy('rfq_id','desc')
                    ->paginate($request->record);
                $completeSessionView = view(
                    'frontend/seller/table-list',
                    compact('rfqlist')
                )->render();



                if ($rfqlist->isNotEmpty()) {
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
                            'completeSessionView' =>$completeSessionView 
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
    public function registrationAction(UserRequest $request)
    {

    }
}
