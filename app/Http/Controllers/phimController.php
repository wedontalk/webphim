<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phim;
use App\Models\danhmuc;
use App\Models\tapphim;
use App\Models\kieuphim;
use App\Models\phimtheloai;
use App\Models\trangthai;
use App\Models\slider;
use App\Models\baoloi;
use App\Models\server;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Storage;
use File;

class phimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = phim::with('tapphim','cat', 'nhieutheloai')->orderBy('ngaycapnhat', 'desc')->search()->paginate(10);
        $list = phim::orderBy('id', 'desc')->select('id','name','name2','slug','image','description')->get();
        // $tapphim = tapphim::orderBy('id','ASC')->where('anHien', 1)->get();
        // $phimcate = danhmuc::orderBy('id','ASC')->where('anHien', 1)->get();
        // $phimtheloai = phimtheloai::orderBy('id','ASC')->get();
        $taojson= public_path()."/json_file/";
        if(!is_dir($taojson)){
            mkdir($taojson,0777,true);
        }
        File::put($taojson."movies.json",json_encode($list));

        return view('admin.phim.index', compact('data','list'));
    }
    public function json_index_phim(){
        $data = phim::with('tapphim','cat', 'nhieutheloai')->orderBy('ngaycapnhat', 'desc')->get();
        $get_data = json_decode($data, true);
        return response()->json($get_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = danhmuc::orderBy('id', 'ASC')->select('id','name')->get();
        $kieuphim = kieuphim::orderBy('id', 'ASC')->select('id','name')->get();
        $trangthai = trangthai::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.phim.create', compact('cats','kieuphim','trangthai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:film'
        ],
        [
            'name.required' => 'Tên danh mục không để trống',
            'name.unique' => 'Danh mục này đã có trong CSDL'
        ]);
        $themphim = new phim();
        $data = $request->all();
        $themphim->id_theloai = $data['danhmuc'][0];
        if($request->has('file_upload'))
        {
            $file= $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'phim.'.$ext;
            $file->move(public_path('uploads'), $file_name);
        }
        $themphim->name = $data['name'];
        $themphim->name2 = $data['name2'];
        $themphim->slug = \Str::slug($request->name).'.html';
        $themphim->status = $data['status'];
        $themphim->type_movie = $data['type_movie'];
        $themphim->year = $data['year'];
        $themphim->image = $file_name;
        $themphim->description = $data['description'];
        $themphim->duration = $data['duration'];
        $themphim->phim_noibat = $data['phim_noibat'];
        $themphim->anHien = $data['anHien'];
        $themphim->meta_desc = $data['meta_desc'];
        $themphim->meta_keyword = $data['meta_keyword'];
        $themphim->save();
        $themphim->nhieutheloai()->attach($data['danhmuc']);
        return redirect()->route('phim.index')->with('success', 'thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phim = phim::find($id);
        $baoloi_failer = baoloi::orderBy('updated_at','desc')->where('cap_nhat', 1)->where('id_film', $phim->id)->get();
        $phimtheloaine = $phim->nhieutheloai;
        $cats = danhmuc::orderBy('id', 'desc')->get();
        $link_server = server::orderBy('id', 'ASC')->get();
        $tap_phim = tapphim::with('phim')->orderBy('id','desc')->where('film_id', $phim)->get();
        $thongtin_first = phim::where('id', $phim->id)->first();
        $thongtin = phim::with('cat','nhieutheloai','tapphim')->where('id', $phim->id)->get();
        $kieuphim = kieuphim::orderBy('id', 'ASC')->select('id','name')->get();
        $trangthai = trangthai::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.phim.show', compact('thongtin','tap_phim','phimtheloaine','kieuphim','thongtin_first','cats','trangthai','baoloi_failer','link_server'));
    }

    public function postfilmdescription(Request $request){
        $data = $request->all();
        // dd($data);
        $updated_des = phim::find($data['id']);
        $updated_des->description = $data['content'];
        $updated_des->save();
        echo 'thành công';
    }
    public function postfilmstatus(Request $request){
        $data = $request->all();
        // dd($data);
        $updated_des = phim::find($data['id']);
        $updated_des->status = $data['selectchange'];
        $updated_des->save();
        echo 'thành công';
    }
    public function postfilmimages(Request $request){
        $data = $request->all();
        $updated_img = phim::find($data['id']);
        if($request->has('file_upload') == null)
        {

        }elseif($request->has('file_upload')){
                $path = public_path('uploads').'/'.$updated_img->image;
                if(file_exists($path)){
                    unlink($path);
                }
                $file= $request->file_upload;
                $ext = $request->file_upload->extension();
                $file_name = time().'-'.'phim.'.$ext;
                $file->move(public_path('uploads'), $file_name);
                $updated_img->image = $file_name;
        }
        $updated_img->save();
        echo 'thành công';
    }
    public function postfilmtrailer(Request $request){
        $data = $request->all();
        // dd($data);
        $trailer = phim::find($data['id_phim']);
        $trailer->trailer = $data['input_trailer'];
        $trailer->save();
        return $data['input_trailer'];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phim = phim::find($id);
        $phimtheloaine = $phim->nhieutheloai;
        $cats = danhmuc::orderBy('id', 'desc')->get();
        $kieuphim = kieuphim::orderBy('id', 'ASC')->select('id','name')->get();
        $trangthai = trangthai::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.phim.edit', compact('phim','phimtheloaine','cats','trangthai','kieuphim'));
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
        $data = $request->all();
        $themdanhmuc = $data['danhmuc'];
        $updated = phim::find($id);
        $updated->name = $data['name'];
        $updated->name2 = $data['name2'];
        $updated->status = $data['status'];
        $updated->type_movie = $data['type_movie'];
        $updated->year = $data['year'];
        $updated->id_theloai = $data['danhmuc'][0];
        $updated->slug = \Str::slug($request->name).'.html';
        $updated->description = $data['description'];
        $updated->duration = $data['duration'];
        $updated->phim_noibat = $data['phim_noibat'];
        $updated->anHien = $data['anHien'];
        $updated->meta_desc = $data['meta_desc'];
        $updated->meta_keyword = $data['meta_keyword'];
        if($request->has('file_upload') == null)
        {

        }elseif($request->has('file_upload')){
                $path = public_path('uploads').'/'.$updated->image;
                if(file_exists($path)){
                    unlink($path);
                }
                $file= $request->file_upload;
                $ext = $request->file_upload->extension();
                $file_name = time().'-'.'phim.'.$ext;
                $file->move(public_path('uploads'), $file_name);
                $updated->image = $file_name;
        }
        if($updated->save()){
            $updated->nhieutheloai()->sync($data['danhmuc']);
            return redirect()->route('phim.show',$updated->id)->with('success', 'sửa thành công');
        }else{
            return redirect()->route('phim.show',$updated->id)->with('error', 'sửa thất bại');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = phim::find($id);
        $path = public_path('uploads').'/'.$delete->image;
        if(file_exists($path)){
                unlink($path);
        }
        phimtheloai::whereIn('id_phim', [$delete->id])->delete();
        tapphim::whereIn('film_id', [$delete->id])->delete();
        slider::whereIn('id_phim', [$delete->id])->delete();
        $delete->delete();
        return redirect()->route('phim.index')->with('success', 'xóa thành công !!!');
    }
}
