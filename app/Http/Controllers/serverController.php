<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\server;
use Validator;

class serverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = server::orderBy('id', 'asc')->get();
        return view('admin.server.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.server.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = new server();
        $create->name_server = $request->name_server;
        $create->thong_tin_them = $request->thong_tin_them;
        $create->action = $request->action;
        $create->save();
        return redirect()->route('server.index')->with('success', 'thêm thành công');
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
        $updatesv = server::find($id);
        return view('admin.server.edit', compact('updatesv'));
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
        $updated = server::find($id);
        $updated->name_server = $request->name_server;
        $updated->thong_tin_them = $request->thong_tin_them;
        $updated->action = $request->action;
        $updated->save();
        return redirect()->route('server.index')->with('success', 'sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remove = server::find($id);
        $remove->delete();
        return redirect()->route('server.index')->with('success', 'xóa thành công');
    }
}
