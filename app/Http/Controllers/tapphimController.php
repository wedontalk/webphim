<?php

namespace App\Http\Controllers;

use App\Models\tapphim;
use App\Models\phim;
use App\Models\server;
// use App\Models\linktapphim;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class tapphimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tapphim::orderBy('id', 'ASC')->search()->paginate(10);
        $products = phim::orderBy('name', 'ASC')->select('id','name')->get();
        return view('admin.tapphim.index', compact('data','products','phimauto'));
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
    public function themphim($slug,Request $request){
        $name_mn = phim::where('slug',$slug)->first();
        $phimtc = phim::orderBy('id','DESC')->where('anHien', 1)->where('id',$name_mn->id)->get();
        $data = phim::orderBy('id', 'ASC')->select('id','name')->get();
        $link_server = server::orderBy('id', 'ASC')->where('action', 1)->get();
        $products = phim::orderBy('name', 'ASC')->select('id','name2')->get();
        return view('admin.tapphim.create', compact('data','products','name_mn','phimtc','link_server'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created = new tapphim();
        $created->film_id = $request->film_id;
        $created->episode = $request->episode;
        $created->episode_name = $request->episode_name;
        $created->content = $request->content;
        $created->id_server = $request->link_server;
        $created->slug_phim = \Str::slug($request->name_slug).'-tap-'.\Str::slug($request->episode).'.html';
        $created->anHien = $request->anHien;
        if($created->save())
        {
            $updatephimcapnhat = phim::find($request->film_id);
            $updatephimcapnhat->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            $updatephimcapnhat->save();
            return redirect()->route('phim.show',$request->film_id)->with('success', 'Thêm thành công');
        }
        else{
            return redirect()->route('phim.show',$request->film_id)->with('error', 'thất bại');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tapphim  $tapphim
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phimne = tapphim::where('id', $id)->first();
        $data = tapphim::orderBy('id', 'asc')->where('id', $id)->get();
        $alltapphim = tapphim::where('film_id',$phimne->film_id)->get();
        return view('admin.tapphim.show', compact('data','alltapphim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tapphim  $tapphim
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tapphim = tapphim::find($id);
        $link_server = server::orderBy('id', 'ASC')->where('action', 1)->get();
        $products = phim::orderBy('name', 'ASC')->select('id','name','name2')->get();
        $data = phim::orderBy('id', 'ASC')->select('id','name')->get();
        return view('admin.tapphim.edit', compact('tapphim','data','products','link_server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tapphim  $tapphim
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $updated = tapphim::find($id);
        $updated->film_id = $request->film_id;
        $updated->episode = $request->episode;
        $updated->episode_name = $request->episode_name;
        $updated->content = $request->content;
        $updated->id_server = $request->link_server;
        $updated->slug_phim = \Str::slug($request->name_slug).'-tap-'.\Str::slug($request->episode).'.html';
        $updated->anHien = $request->anHien;
        if($updated->save()){
            $updatephimcapnhat = phim::find($request->film_id);
            $updatephimcapnhat->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            $updatephimcapnhat->save();
            return redirect()->route('phim.show',$request->film_id)->with('success', 'sửa thành công');
        }else{
            return redirect()->route('phim.show',$request->film_id)->with('error', 'sửa thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tapphim  $tapphim
     * @return \Illuminate\Http\Response
     */
    public function destroy(tapphim $tapphim)
    {
            $tapphim->delete();
            return redirect()->back()->with('success', 'xóa thành công !!!');
        
    }
}
