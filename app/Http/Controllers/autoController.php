<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\autocrawl;
use App\Models\phim;
use Validator;

class autoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = autocrawl::orderBy('thu_tu', 'asc')->get();
        $showphim = phim::orderBy('id', 'desc')->get();
        return view('admin.auto.index', compact('data','showphim'));
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
        $remove = autocrawl::find($id);
        $remove->delete();
        return redirect()->route('auto.index')->with('success', 'xóa slider thành công');
    }
    public function sortauto(Request $request){
        $data = $request->all();
        foreach ($data['array_id'] as $key => $val) {
            $updateslider = autocrawl::find($val);
            $updateslider->thu_tu = $key;
            $updateslider->save();
        }
        echo 'sapxepthanhcong';
    }
    public function themauto(Request $request){
        $validator = Validator::make($request->all(), [
            'film_id' => 'required|unique:autocrawl',
        ],
        [
            'film_id.required' => 'anime không được để trống',
            'film_id.unique' => 'anime này đã có trong auto rồi',
        ]
        );      
        if ($validator->passes()) {
                $data = $request->all();
                $createchapter = new autocrawl();
                $createchapter->film_id = $data['film_id'];
                $createchapter->save();
                return response()->json(['success'=>'Thêm phim thành công']);
        }else{
            return response()->json(['error'=>$validator->errors()->all()]);
        }
    }
}
