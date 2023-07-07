<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\baoloi;

class baoloiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = baoloi::orderBy('id','desc')->paginate(10);
        if(isset($_GET['danhsach'])){
            $sort_by = $_GET['danhsach'];
            if($sort_by == 'tatca'){
                $data = baoloi::orderBy('id','desc')->paginate(10);
                $data->render();
            }elseif($sort_by == 'chuaxuly'){
                $data = baoloi::orderBy('id','desc')->where('cap_nhat', 1)->paginate(10);
                $data->render();
            }elseif($sort_by == 'daxuly'){
                $data = baoloi::orderBy('id','desc')->where('cap_nhat', 2)->paginate(10);
                $data->render();
            }
        }
        return view('admin.baoloi.index', compact('data'));
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
        $remove = baoloi::find($id);
        $remove->delete();
        return redirect()->back()->with('success', 'xóa thành công !!!');
    }
    public function updatetrangthai(Request $request){
        $data = $request->all();
        $updated = baoloi::find($data['id']);
        $updated->cap_nhat = $data['idtrangthai'];
        $updated->save();
        echo 'thành công';
    }
}
