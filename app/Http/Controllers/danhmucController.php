<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use Illuminate\Support\Facades\DB;

class danhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = danhmuc::orderBy('id','desc')->paginate(10);
        return view('admin.danhmuc.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = new danhmuc();
        $create->name = $request->name;
        $create->slug = \Str::slug($request->name).'.html';
        $create->meta_desc = $request->meta_desc;
        $create->meta_keyword = $request->meta_keyword;
        $create->anHien = $request->anHien;
        $create->save();
        return redirect()->route('danhmuc.index')->with('success', 'thêm thành công');
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
        $idedit = danhmuc::find($id);
        return view('admin.danhmuc.edit', compact('idedit'));
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
        $updated = danhmuc::find($id);
        $updated->name = $request->name;
        $updated->slug = \Str::slug($request->name).'.html';
        $updated->meta_desc = $request->meta_desc;
        $updated->meta_keyword = $request->meta_keyword;
        $updated->anHien = $request->anHien;
        $updated->save();
        return redirect()->route('danhmuc.index')->with('success', 'sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = danhmuc::find($id);
        if($delete->products()->count() > 0  ){
            return redirect()->route('danhmuc.index')->with('error', 'không thể xóa danh mục này');
        }else{
            $delete->delete();
            return redirect()->route('danhmuc.index')->with('success', 'xóa thành công !!!');
        }
    }
}
