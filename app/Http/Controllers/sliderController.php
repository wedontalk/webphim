<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\phim;
use Validator;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = slider::orderBy('thu_tu', 'asc')->get();
        $showphim = phim::orderBy('id', 'desc')->get();
        return view('admin.slider.index', compact('data','showphim'));
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
        $remove = slider::find($id);
        $remove->delete();
        return redirect()->route('slider.index')->with('success', 'xóa slider thành công');
    }
    public function sortslider(Request $request){
        $data = $request->all();
        foreach ($data['array_id'] as $key => $val) {
            $updateslider = slider::find($val);
            $updateslider->thu_tu = $key;
            $updateslider->save();
            echo 'sapxepthanhcong';
        }
    }
    public function themslider(Request $request){
        $validator = Validator::make($request->all(), [
            'id_phim' => 'required|unique:slide_phim',
        ],
        [
            'id_phim.required' => 'truyện không được để trống',
            'id_phim.unique' => 'truyện này đã có trong slider rồi',
        ]
        );      
            if ($validator->passes()) {
                if(slider::count() > 11){
                // $data = $request->all();
                // $createchapter = new slider();
                // $createchapter->id_product = $data['id_product'];
                // $createchapter->save();
                return response()->json(['success'=>'Thêm phim thất bại']);
                }
                else{
                    $data = $request->all();
                    $createchapter = new slider();
                    $createchapter->id_phim = $data['id_phim'];
                    $createchapter->save();
                    return response()->json(['success'=>'Thêm phim thành công']);
                }
            }else{
                return response()->json(['error'=>$validator->errors()->all()]);
            }
    }
}
