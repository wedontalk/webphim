<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\metaall;
use App\Models\cauhinhview;
use App\Models\analytisc;
use App\Models\thongbao;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Storage;
use File;

class metaallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.caidat.metaseo');
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

    public function qlcauhinh(){
        $data_logo_header = cauhinhview::all();
        return view('admin.caidat.qlcauhinh', compact('data_logo_header'));
    }

    // update logo header
    public function update_logo_header(Request $request){
        $updated = cauhinhview::find(1);
        $data = $request->all();
        if($request->has('image') == null)
        {

        }elseif($request->has('image')){
                $path = public_path('uploads/logo').'/'.$updated->logo_header;
                if(file_exists($path)){
                    unlink($path);
                }
                $file= $request->image;
                $ext = $request->image->extension();
                $file_name = time().'-'.'logo.'.$ext;
                $file->move(public_path('uploads/logo'), $file_name);
                $updated->logo_header = $file_name;
        }
        $updated->save();
        return redirect()->route('caidat.qlcauhinh')->with('success', 'sửa thành công');
    }
    // update logo footer 
    public function update_logo_footer(Request $request){
        $updated = cauhinhview::find(1);
        $data = $request->all();
        if($request->has('image_footer') == null)
        {

        }elseif($request->has('image_footer')){
                $path = public_path('uploads/logo').'/'.$updated->logo_footer;
                if(file_exists($path)){
                    unlink($path);
                }
                $file= $request->image_footer;
                $ext = $request->image_footer->extension();
                $file_name = time().'-'.'logo.'.$ext;
                $file->move(public_path('uploads/logo'), $file_name);
                $updated->logo_footer = $file_name;
        }
        $updated->save();
        return redirect()->route('caidat.qlcauhinh')->with('success', 'sửa thành công');
    }
    public function update_thongtin_footer(Request $request){
        $updated = cauhinhview::find(1);
        $updated->thongtin = $request->thongtin_footer;
        $updated->save();
        return redirect()->route('caidat.qlcauhinh')->with('success', 'sửa thành công');
    }

    // meta seo
    public function metaseo(){
        $datameta = metaall::all();
        $dataanalytisc = analytisc::first();
        return view('admin.caidat.metaseo', compact('datameta','dataanalytisc'));
    }


    // put analytisc google
    public function putanalytisc(Request $request){
        $data = $request->all();
        $updated = analytisc::find(1);
        $updated->content = $data['text'];
        $updated->save();
        echo'thành công';
    }
    public function postseohome(Request $request){
        $create = metaall::find(1);
        $tags = implode(',',$request->tagshome);
        $create->tieu_de = $request->tieudehome;
        $create->meta_desc = $request->meta_desc_home;
        $create->meta_key = $tags;
        $create->thuoc_tinh = 1;
        $create->save();
        return redirect()->route('caidat.metaseo')->with('success', 'sửa thành công');
    }
    public function postseodanhmuc(Request $request){
        $create = metaall::find(2);
        $tags = implode(',',$request->tagsdanhmuc);
        $create->tieu_de = $request->tieude_danhmuc;
        $create->meta_desc = $request->meta_desc_danhmuc;
        $create->meta_key = $tags;
        $create->thuoc_tinh = 2;
        $create->save();
        return redirect()->route('caidat.metaseo')->with('success', 'sửa thành công');
    }
    public function postseosearch(Request $request){
        $create = metaall::find(3);
        $tags = implode(',',$request->tagssearch);
        $create->tieu_de = $request->tieude_search;
        $create->meta_desc = $request->meta_desc_search;
        $create->meta_key = $tags;
        $create->thuoc_tinh = 3;
        $create->save();
        return redirect()->route('caidat.metaseo')->with('success', 'sửa thành công');
    }
    public function postseotimanime(Request $request){
        $create = metaall::find(4);
        $tags = implode(',',$request->tagstimanime);
        $create->tieu_de = $request->tieude_timanime;
        $create->meta_desc = $request->meta_desc_timanime;
        $create->meta_key = $tags;
        $create->thuoc_tinh = 4;
        $create->save();
        return redirect()->route('caidat.metaseo')->with('success', 'sửa thành công');
    }
    // public function postmetaseo(Request $request){

    // }

    public function viewthongbao(){
        $data = thongbao::all();
        return view('admin.caidat.viewthongbao', compact('data'));
    }
    public function postthongbao(Request $request){
        $updated_create = thongbao::find(1);
        if($request->text_thongbao){
            $updated_create->text_thongbao = $request['text_thongbao'];
            $updated_create->trang_thai = $request['trangthai'];
            $updated_create->save();
        }else{
            $updated_create->text_thongbao = 'hiện chưa có thông báo nào !';
            $updated_create->trang_thai = $request['trangthai'];
            $updated_create->save();
        }
        return redirect()->route('caidat.viewthongbao')->with('success', 'sửa thành công');
    }
}
