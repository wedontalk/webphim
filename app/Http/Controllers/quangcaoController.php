<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quangcao;
use RahulHaque\Filepond\Facades\Filepond;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Storage;
use File;

class quangcaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = quangcao::all();
        return view('admin.caidat.quangcao', compact('data'));
    }
    public function showquangcao(){
        $data = quangcao::orderBy('id','desc')->paginate(6);
        if(isset($_GET['danhsach'])){
            $sort_by = $_GET['danhsach'];
            if($sort_by == '0'){
                $data = quangcao::orderBy('id','desc')->paginate(6);
                // $data->render();
            }elseif($sort_by == '1'){
                $data = quangcao::orderBy('id','desc')->where('id_trang', 1)->paginate(6);
                // $data->render();
            }elseif($sort_by == '2'){
                $data = quangcao::orderBy('id','desc')->where('id_trang', 2)->paginate(6);
                // $data->render();
            }elseif($sort_by == '3'){
                $data = quangcao::orderBy('id','desc')->where('id_trang', 3)->paginate(6);
                // $data->render();
            }elseif($sort_by == '4'){
                $data = quangcao::orderBy('id','desc')->where('id_trang', 4)->paginate(6);
                // $data->render();
            }elseif($sort_by == '5'){
                $data = quangcao::orderBy('id','desc')->where('id_trang', 5)->paginate(6);
                // $data->render();
            }
        }
        return view('admin.caidat.showquangcao', compact('data'));
    }

    public function postadsdanhmuc(Request $request){
        $request->validate([
            'id_hienthi' => 'required|unique:quang_cao',
            'link'=>'required'
        ],
        [
            'id_hienthi.required' => 'chỗ này không được để trống',
            'id_hienthi.unique' => 'phần này đã có trong CSDL',
            'link.required' => 'chỗ này không được để trống',
        ]);
        $created = new quangcao();
        $created->link = $request->link;
        if($request->has('file_upload'))
        {
            $file= $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'quangcao.'.$ext;
            $file->move(public_path('uploads/quangcao'), $file_name);
            $created->images = $file_name;
        }
        $created->id_hienthi = $request->id_hienthi;
        $created->trang_thai = $request->trang_thai;
        if($created->save()){
            return redirect()->route('caidat.quangcao')->with('success', 'thêm thành công');
        }else{
            return redirect()->route('caidat.quangcao')->with('error', 'không thành công !');
        }
    }

    public function tmpupload(Request $request){
        $image = $request->file('image');
        $file_name = $image->getClientOriginalExtension();
        return $file_name;
    }
    public function putquangcao(Request $request, $id){
        $data = $request->all();
        $updated = quangcao::find($id);
        $updated->link = $data['link'];
        if($request->has('inputfile') == null)
        {

        }elseif($request->has('inputfile')){
                $path = public_path('uploads/quangcao').'/'.$updated->images;
                if(file_exists($path)){
                    unlink($path);
                }
                $file= $data['inputfile'];
                $ext = $file->extension();
                $file_name = time().'-'.'quangcao.'.$ext;
                $file->move(public_path('uploads/quangcao'), $file_name);
                $updated->images = $file_name;
        }
        $updated->save();
        return redirect()->route('caidat.showquangcao')->with('success', 'sửa thành công !!!');
    }

    public function deletequangcao(Request $request){
        $data = $request->all();
        $delete = quangcao::find($data['ttdelete']);
        $delete->delete();
        // return redirect()->route('caidat.showquangcao')->with('success', 'xóa thành công !!!');
        echo'thành công';
    }
    public function puttrangthai(Request $request){
        $data = $request->all();
        $updated = quangcao::find($data['id_quangcao']);
        $updated->trang_thai = $data['idclick'];
        $updated->save();
        // return redirect()->route('caidat.showquangcao')->with('success', 'xóa thành công !!!');
        echo'thành công'; 
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
}
