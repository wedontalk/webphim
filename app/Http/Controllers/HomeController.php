<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\phim;
use App\Models\danhmuc;
use App\Models\phimtheloai;
use App\Models\trangthai;
use App\Models\kieuphim;
use App\Models\tapphim;
use App\Models\baoloi;
use Carbon\Carbon;
use App\Models\metaall;
use App\Models\traffic;
use App\Models\server;
use App\Models\thongbao;
use App\Models\quangcao;
use DB;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $user_request_ip = $request->ip();
        $check_traffic = traffic::where('ip_address', $user_request_ip)->get();
        // dd($check_traffic);
        $traffic_count = $check_traffic->count();
        if($traffic_count < 1){
            $traffic = new traffic();
            $traffic->ip_address = $user_request_ip;
            $traffic->date_traffic = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $traffic->save();
        }
        // end check ip
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $datameta = metaall::all();
        foreach ($datameta as $key => $value) {
            if($value->thuoc_tinh == 1){
                $meta_desc = $value->meta_desc;
                $meta_keyword = $value->meta_key;
                $meta_title = $value->tieu_de;
            }
        }
        $meta_canontical = $request->url();
        $data = phim::orderBy('ngaycapnhat', 'desc')->where('anHien', 1)->paginate(24);
        $showcategory = danhmuc::orderBy('id', 'asc')->where('anHien', 1)->get();
        $showtrangthai = trangthai::orderBy('id', 'asc')->get();
        $check_quangcao = quangcao::where('trang_thai', 1)->where('id_hienthi', 5)->where('id_trang', 1)->first();
        $qc_header = quangcao::where('trang_thai', 1)->where('id_hienthi', 1)->where('id_trang', 1)->first();
        $qc_footer = quangcao::where('trang_thai', 1)->where('id_hienthi', 3)->where('id_trang', 1)->first();
        // $movie_theloai = phimtheloai::where('id_theloai', )->get();
        return view('user.home', compact('data','showcategory','check_quangcao','qc_header','qc_footer','showtrangthai','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function locanime(Request $request){
        $datameta = metaall::all();
        foreach ($datameta as $key => $value) {
            if($value->thuoc_tinh == 1){
                $meta_desc = $value->meta_desc;
                $meta_keyword = $value->meta_key;
                $meta_title = $value->tieu_de;
            }
        }
        $meta_canontical = $request->url();
        $theloai = $_GET['theloai'];
        $trangthai = $_GET['trangthai'];
        $sapxep = $_GET['status'];
        $data = phim::orderBy('updated_at', 'desc')->where('anHien', 1)->paginate(24);
        $showcategory = danhmuc::orderBy('id', 'asc')->where('anHien', 1)->get();
        $showtrangthai = trangthai::orderBy('id', 'asc')->get();
        $movie_theloai = phimtheloai::where('id_theloai', $theloai)->get();
            $nhieuphim = [];
            foreach ($movie_theloai as $key => $movi) {
                $nhieuphim[] = $movi->id_phim;
            }
            if($sapxep == "tuadenz" && $theloai != ""  && $trangthai !=""){
                $data = phim::orderBy('name', 'asc')->where('status', $trangthai)->whereIn('id', $nhieuphim)->where('anHien', 1)->paginate(24);
            }elseif ($sapxep == "tuzdena" && $theloai != ""  && $trangthai !="") {
                $data = phim::orderBy('name', 'desc')->where('status', $trangthai)->whereIn('id', $nhieuphim)->where('anHien', 1)->paginate(24);
            }elseif ($sapxep == "ngaycapnhat" && $theloai != ""  && $trangthai !="") {
                $data = phim::orderBy('updated_at', 'desc')->where('status', $trangthai)->whereIn('id', $nhieuphim)->where('anHien', 1)->paginate(24);
            }elseif ($sapxep == "duocxemnhieu" && $theloai != "" && $trangthai !="") {
                $data = phim::orderBy('updated_at', 'desc')->where('phim_noibat', 3)->where('status', $trangthai)->whereIn('id', $nhieuphim)->where('anHien', 1)->paginate(24);
            }elseif($theloai == "" && $trangthai != ""){
                $data = phim::orderBy('updated_at', 'desc')->where('status', $trangthai)->where('anHien', 1)->paginate(24);
            }elseif($theloai != "" && $trangthai == "" && $sapxep ==""){
                $data = phim::orderBy('updated_at', 'desc')->whereIn('id', $nhieuphim)->where('anHien', 1)->paginate(24);
            }elseif($theloai == "" && $trangthai =="" && $sapxep == "tuadenz"){
                $data = phim::orderBy('name', 'asc')->where('anHien', 1)->paginate(24);
            }elseif ($theloai == "" && $trangthai =="" && $sapxep == "tuzdena") {
                $data = phim::orderBy('name', 'desc')->where('anHien', 1)->paginate(24);
            }elseif($theloai == "" && $trangthai =="" && $sapxep == "ngaycapnhat"){
                $data = phim::orderBy('updated_at', 'desc')->where('anHien', 1)->paginate(24);
            }elseif($theloai == "" && $trangthai =="" && $sapxep == "duocxemnhieu"){
                $data = phim::orderBy('updated_at', 'desc')->where('phim_noibat', 3)->where('anHien', 1)->paginate(24);
            }else{
                $data = phim::orderBy('updated_at', 'desc')->where('anHien', 1)->paginate(24);
            }
        
         // show quảng cáo
        return view('user.home', compact('data','showcategory','showtrangthai','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function theloai($slug, Request $request){
        $slugtheloai = danhmuc::where('slug', $slug)->first();
        $loaiphim = danhmuc::where('id',$slugtheloai->id)->get();
        $movie_theloai = phimtheloai::where('id_theloai', $slugtheloai->id)->get();
        $nhieuphim = [];
        foreach ($movie_theloai as $key => $val) {
            $nhieuphim[] = $val->id_phim;
        }
        $data = phim::orderBy('ngaycapnhat', 'desc')->whereIn('id', $nhieuphim)->where('anHien', 1)->paginate(24);
        foreach ($loaiphim as $luu) {
            $meta_desc = $luu->meta_desc;
            $meta_keyword = $luu->meta_keyword;
            $meta_title = $luu->name;
            $meta_canontical = $request->url();
        }
        return view('user.theloai', compact('data','slugtheloai','nhieuphim','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function trangthai($slug, Request $request){
        $slugtt = trangthai::where('slug', $slug)->first();
        $loaitrangthai = trangthai::where('id', $slugtt->id)->get();
        $data = phim::orderBy('updated_at', 'desc')->where('status', $slugtt->id)->where('anHien', 1)->paginate(24);
        $meta_desc = 'Anime hot, anime vietsub + thuyết minh được cập nhật mới nhất | animetvh.net';
        $meta_keyword = 'Anime hot, anime vietsub, anime hay';
        $meta_title = 'Animehot | animetvh.net';
        $meta_canontical = $request->url();
        return view('user.tongdanhmuc', compact('data','slugtt','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function kieuphim($slug, Request $request){
        $slugtt = kieuphim::where('slug_type', $slug)->first();
        $loaitrangthai = kieuphim::where('id', $slugtt->id)->get();
        foreach ($loaitrangthai as $luu) {
            $meta_desc = $luu->meta_desc;
            $meta_keyword = $luu->meta_keyword;
            $meta_title = $luu->name;
            $meta_canontical = $request->url();
        }
        $data = phim::orderBy('updated_at', 'desc')->where('type_movie', $slugtt->id)->where('anHien', 1)->paginate(24);
        return view('user.tongdanhmuc', compact('data','slugtt','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function animehot(Request $request){
        $data = phim::orderBy('updated_at', 'desc')->where('phim_noibat', 1)->where('anHien', 1)->paginate(24);
        $meta_desc = 'Anime hot, anime vietsub + thuyết minh được cập nhật mới nhất | animetvh.net';
        $meta_keyword = 'Anime hot, anime vietsub, anime hay';
        $meta_title = 'Animehot | animetvh.net';
        $meta_canontical = $request->url();
        return view('user.tongdanhmuc', compact('data','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function xemnhieu(Request $request){
        $data = phim::orderBy('updated_at', 'desc')->where('phim_noibat', 3)->where('anHien', 1)->paginate(24);
        $meta_desc = 'Anime xem nhiều, anime vietsub + thuyết minh được cập nhật mới nhất | animetvh.net';
        $meta_keyword = 'Anime xem nhiều, anime vietsub, anime hay';
        $meta_title = 'Anime xem nhiều| animetvh.net';
        $meta_canontical = $request->url();
        return view('user.tongdanhmuc', compact('data','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function filteranime(Request $request){
        $showcategory = danhmuc::orderBy('id', 'asc')->where('anHien', 1)->get();
        $showtrangthai = trangthai::all();
        $data = phim::orderBy('updated_at', 'desc')->where('anHien', 1)->paginate(24);
        return view('user.timanime', compact('data','showcategory','showtrangthai'));
    }
    public function timkiemanime(Request $request){
        $trangthaitk = $_GET['status'];
        $showtrangthai = trangthai::orderBy('id', 'asc')->get();
        if(isset($_GET['timkiemtheloai'])){
            $theloaitk = $_GET['timkiemtheloai'];
            $tapphimtk = $_GET['tapphim'];
            // $data = phim::orderBy('updated_at', 'desc')->where('anHien', 1)->paginate(24);
            $movie_theloai = phimtheloai::whereIn('id_theloai', $theloaitk)->get();
            $nhieuphim = [];
            foreach ($movie_theloai as $key => $value) {
                $nhieuphim[] = $value->id_phim;
            };
        }
        if(isset($_GET['timkiemtheloai']) && $theloaitk != ""){
        $data = phim::orderBy('updated_at', 'desc')
        ->whereIn('id', $nhieuphim)
        ->where('status', $trangthaitk)
        ->where('anHien', 1)->paginate(24);
        }elseif(isset($_GET['timkiemtheloai']) && $theloaitk != "" && $trangthaitk == ""){
            $data = phim::orderBy('updated_at', 'desc')
            ->where('anHien', 1)->paginate(24);
        }elseif(!isset($_GET['timkiemtheloai']) && $trangthaitk == ""){
            $data = phim::orderBy('updated_at', 'desc')
            ->where('anHien', 1)->paginate(24);  
        }

        if(isset($data)){
            return view('user.timanime', compact('data','showtrangthai'));
        }else{
            return view('user.timanime', compact('showtrangthai'));
        }
    }
    public function chitiet($slug, Request $request){
        $slugchitiet = phim::where('slug', $slug)->first();
        $tap_phim = tapphim::with('phim')->orderBy('id','ASC')->where('film_id',$slugchitiet->id)->first();
        $thongtin = phim::with('cat','nhieutheloai','tapphim')->where('id', $slugchitiet->id)->get();
        $thongtinphim = phim::with('nhieutheloai')->where('id', $slugchitiet->id)->first();
        $showtapphim = tapphim::orderBy('id', 'desc')->where('film_id', $slugchitiet->id)->get()->unique('episode');
        $showtapphimmax = tapphim::where('film_id', $slugchitiet->id)->max('episode');
        $showphimlienquan = phim::orderBy('ngaycapnhat','desc')->where('id_theloai', $slugchitiet->id_theloai)->where('id', '!=', $slugchitiet->id)->where('anHien', 1)->take(8)->get();
        if(ctype_digit($thongtinphim->showphimfirst->max('episode'))){
            $nextfilm = $thongtinphim->showphimfirst->max('episode') + 1;
        }else{
            $nextfilm = 'full';
        }
        foreach ($thongtin as $luu) {
            $meta_desc = $luu->meta_desc;
            $meta_keyword = $luu->meta_keyword;
            $meta_title = $luu->name;
            $meta_canontical = $request->url();
        }
        return view('user.chitiet', compact('nextfilm','slugchitiet','tap_phim','thongtin','thongtinphim','showtapphim','showtapphimmax','showphimlienquan','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function search(Request $request){
        $datameta = metaall::all();
        foreach ($datameta as $key => $value) {
            if($value->thuoc_tinh == 3){
                $meta_desc = $value->meta_desc;
                $meta_keyword = $value->meta_key;
                $meta_title = $value->tieu_de;
            }
        }
        $meta_canontical = $request->url();
        $data = phim::where('name','like','%'.$request->search.'%')->orWhere('name2','like','%'.$request->search.'%')->paginate(12);
        $check_quangcao = quangcao::where('trang_thai', 1)->where('id_hienthi', 5)->where('id_trang', 3)->first();
        $qc_header = quangcao::where('trang_thai', 1)->where('id_hienthi', 1)->where('id_trang', 3)->first();
        $qc_footer = quangcao::where('trang_thai', 1)->where('id_hienthi', 3)->where('id_trang', 3)->first();
        return view('user.search', compact('data','check_quangcao','qc_header','qc_footer','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function xemphim($slug, Request $request){
        $slugxemphim = tapphim::where('slug_phim', $slug)->first();
        $showphim = phim::with('cat','nhieutheloai','tapphim')->where('id', $slugxemphim->film_id)->get();
        $showphimfirst = phim::with('cat','nhieutheloai','tapphim')->where('id', $slugxemphim->film_id)->first();
        $showtapphim = tapphim::orderBy('id', 'desc')->where('film_id', $slugxemphim->film_id)->get();
        $showtapphimmax = tapphim::where('film_id', $slugxemphim->film_id)->max('episode');
        $showphimlienquan = phim::orderBy('ngaycapnhat','desc')->where('id_theloai', $showphimfirst->id_theloai)->where('id', '!=', $slugxemphim->id)->where('anHien', 1)->take(8)->get();
        $showtapphimtheoserver = tapphim::orderBy('id', 'desc')->where('film_id', $slugxemphim->film_id)->get();
        $showlistunique = tapphim::orderBy('id', 'desc')->where('film_id', $slugxemphim->film_id)->get()->unique('episode');
        $showphimtap = tapphim::where('id', $slugxemphim->id)->first();
        $server = [];
        $showserver = server::with('serverlink')->where('action', '1')->get();
        foreach ($showserver as $key => $val) {
            $server[] = $val->id;
        }
        // $testserver = [];
        // foreach ($showtapphim->unique('id_server') as $key => $value) {
        //     $testserver[] = $value->id_server;
        // }
        // $textxem = collect($testserver);
        // dd($showtapphim);
        $serverlist = tapphim::orderBy('id', 'asc')->where('film_id', $slugxemphim->film_id)->get()->unique('id_server');
        if($slugxemphim){
            tapphim::find($slugxemphim->id)->increment('view_episode');
        }
        foreach ($showphim as $luu) {
            $meta_desc = $luu->meta_desc;
            $meta_keyword = $luu->meta_keyword;
            $meta_title = $luu->name;
            $meta_canontical = $request->url();
        }
        return view('user.xemphim', compact('showserver','showphim','serverlist','showphimtap','showphimfirst','showtapphim','showtapphimmax','showphimlienquan','showtapphimtheoserver','showlistunique','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }

    public function baoloitapphim(Request $request){
        $data = $request->all();
        $create = new baoloi();
        $create->id_film = $data['idphim'];
        $create->id_episode = $data['idtapphim'];
        $create->description = $data['description'];
        $create->save();
        echo 'thành công';
    }

    public function thongtincanhan(){
        $thongbao = thongbao::all();
        return view('user.thongtincanhan', compact('thongbao'));
    }
    public function animedaluu(){
        return view('user.luuanime');
    }
    // ajax show local anime yêu thích
    public function ajaxanime(Request $request){
        $localStorageData = $request->retrievedObject;
        $review = [];
        foreach (json_decode($localStorageData) as $key => $val) {
           $review[] = $val;
        }
        $data = phim::orderBy('ngaycapnhat','desc')->whereIn('id', $review)->select('id','name','name2','image','slug')->where('anHien', 1)->paginate(9);
        return response()->json(['data' => $data]);
    }

}
