<?php

namespace App\Http\Controllers;

use App\Models\traffic;
use App\Models\baoloi;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(!Auth::guest()){
            return redirect()->route('admin.dashboard');
        }else{
            return view('admin.account.login');
        }
    }

    public function index(Request $request)
    {
        $user_request_ip = $request->ip(); //check ip

        //tổng tháng trước
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        // hiện tại
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        // tổng 1 năm
        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        // total one in year
        $traffic_year = traffic::whereBetween('date_traffic',[$oneyears, $now])->get();
        $traffic_year_count = $traffic_year->count();
        
        // total_last_month
        $traffic_of_last_month = traffic::whereBetween('date_traffic',[$early_last_month, $end_of_last_month])->get();
        $traffic_of_last_month_count = $traffic_of_last_month->count();
        //total_traffic
        $total_traffic = traffic::all();
        $count_total_traffic = $total_traffic->count();
        // traffic online and save traffic
        $check_traffic = traffic::where('ip_address', $user_request_ip)->get();
        // dd($check_traffic);
        $traffic_count = $check_traffic->count();

        // Báo lỗi phim
        $data = baoloi::orderBy('id','desc')->where('cap_nhat', 1)->whereBetween('created_at', [Carbon::now('Asia/Ho_Chi_Minh')->subDay(),Carbon::now('Asia/Ho_Chi_Minh')])->get();
        
        return view('admin.dashboard', compact('traffic_count','traffic_year_count','traffic_of_last_month_count','count_total_traffic','data'));
    }

    public function file(){
        return view('admin.file');
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
}
