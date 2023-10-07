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
use App\Models\account;
use App\Models\comment;

use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use DB;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, SessionManager $session)
    {
        // lấy ra session
        $this->session = $session;
        // lấy ra request ip
        $user_request_ip = $request->ip();
        $check_traffic = traffic::where('ip_address', $user_request_ip)->get();
        // dd($check_traffic);
        $traffic_count = $check_traffic->count();
        if($traffic_count < 1){
            $traffic = new traffic();
            $traffic->ip_address = $user_request_ip;
            $traffic->date_traffic = Carbon::now('Asia/Ho_Chi_Minh');
            $traffic->save();
        }
        // end check ip
        return view('admin.dashboard', compact('traffic_count'));
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
        // $movie_theloai = phimtheloai::where('id_theloai', )->get();
        return view('user.home', compact('data','showcategory','showtrangthai','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
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
        $tapphimtk = $_GET['tapphim'];
        $showtrangthai = trangthai::orderBy('id', 'asc')->get();
        if(isset($_GET['timkiemtheloai'])){
            $theloaitk = $_GET['timkiemtheloai'];
            // $data = phim::orderBy('updated_at', 'desc')->where('anHien', 1)->paginate(24);
            $movie_theloai = phimtheloai::whereIn('id_theloai', $theloaitk)->get();
            $nhieuphim = [];
            foreach ($movie_theloai as $key => $value) {
                $nhieuphim[] = $value->id_phim;
            };
            if($theloaitk != ""  && $trangthaitk != ""){
            $data = phim::orderBy('updated_at', 'desc')
            ->whereIn('id', $nhieuphim)
            ->where('status', $trangthaitk)
            ->when($request->tapphim, function($query, $epi){
                $query->whereHas('tapphim', function($query) use($epi){
                    $query->where('episode', '>=',$epi);
                });
            })
            ->where('anHien', 1)->paginate(24);
            }
            // dd(tapphim::orderBy('id')->select('episode')->where('episode','>=', 50)->get());
        }
        
        return (isset($data)) ?  view('user.timanime', compact('data','showtrangthai')):view('user.timanime', compact('showtrangthai'));
    }
    public function chitiet($slug, Request $request){
        $slugchitiet = phim::where('slug', $slug)->first();
        $tap_phim = tapphim::with('phim')->orderBy('id','ASC')->where('film_id',$slugchitiet->id)->first();
        $thongtin = phim::with('cat','nhieutheloai','tapphim')->where('id', $slugchitiet->id)->get();
        $thongtinphim = phim::with('nhieutheloai')->where('id', $slugchitiet->id)->first();
        $showtapphim = tapphim::orderBy('episode', 'desc')->where('film_id', $slugchitiet->id)->get()->unique('episode');
        $showtapphimmax = tapphim::where('film_id', $slugchitiet->id)->max('episode');
        $showphimlienquan = phim::orderBy('ngaycapnhat','desc')->where('id_theloai', $slugchitiet->id_theloai)->where('id', '!=', $slugchitiet->id)->where('anHien', 1)->take(8)->get();
        if(ctype_digit($thongtinphim->showphimfirst->max('episode'))){
            $nextfilm = $thongtinphim->showphimfirst->max('episode') + 1;
        }else{
            $nextfilm = 'full';
        }
        $select_comment = comment::orderBy('id','desc')->where('id_phim', $slugchitiet->id)->where('parent_id', 0)->paginate(10);

        foreach ($thongtin as $luu) {
            $meta_desc = $luu->meta_desc;
            $meta_keyword = $luu->meta_keyword;
            $meta_title = $luu->name;
            $meta_canontical = $request->url();
        }
        return view('user.chitiet', compact('nextfilm','slugchitiet','tap_phim','thongtin','thongtinphim','showtapphim','showtapphimmax','showphimlienquan','select_comment','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
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
        return view('user.search', compact('data','meta_desc', 'meta_keyword', 'meta_title', 'meta_canontical'));
    }
    public function xemphim($slug, Request $request){
        $slugxemphim = tapphim::where('slug_phim', $slug)->first();
        $showphim = phim::with('cat','nhieutheloai','tapphim')->where('id', $slugxemphim->film_id)->get();
        $showphimfirst = phim::with('cat','nhieutheloai','tapphim')->where('id', $slugxemphim->film_id)->first();
        $showtapphim = tapphim::orderBy('id', 'desc')->where('film_id', $slugxemphim->film_id)->get();
        $showtapphimmax = tapphim::where('film_id', $slugxemphim->film_id)->max('episode');
        $showphimlienquan = phim::orderBy('ngaycapnhat','desc')->where('id_theloai', $showphimfirst->id_theloai)->where('id', '!=', $slugxemphim->id)->where('anHien', 1)->take(8)->get();
        // show server tập phim
        $showtapphimtheoserver = tapphim::orderBy('id', 'asc')
        ->where('slug_phim', $slugxemphim->slug_phim)
        ->select('id_server','content')
        ->groupBy('id_server')
        ->havingRaw('COUNT(*) > 0')
        ->get();
        // show tập phim
        $showlistunique = tapphim::orderBy('episode', 'desc')->where('film_id', $slugxemphim->film_id)->get()->unique('episode');
        $showphimtap = tapphim::where('id', $slugxemphim->id)->first();
        // tăng lượt xem
        if($slugxemphim){
            tapphim::find($slugxemphim->id)->increment('view_episode');
        }
        $select_comment = comment::orderBy('id','desc')->where('id_episode', $slugxemphim->id)->where('parent_id', 0)->paginate(10);

        // select comment phim
        // hiễn thị một số thẻ meta để seo web
        foreach ($showphim as $luu) {
            $meta_desc = $luu->meta_desc;
            $meta_keyword = $luu->meta_keyword;
            $meta_title = $luu->name;
            $meta_canontical = $request->url();
        }
        return view('user.xemphim',
        compact(
        'showphim',
        'showphimtap',
        'showphimfirst',
        'showtapphim',
        'showtapphimmax',
        'select_comment',
        'showphimlienquan',
        'showtapphimtheoserver',
        'showlistunique',
        'meta_desc',
        'meta_keyword',
        'meta_title',
        'meta_canontical'
        ));
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
        $data = phim::orderBy('ngaycapnhat','desc')->whereIn('id', $review)->select('id','name','name2','image','slug')->where('anHien', 1)->paginate(6);
        return response()->json(['data' => $data]);
    }

    public function doimatkhau(){
        return view('user.doimatkhau');
    }
    public function returnpass(Request $request){
        $id = Auth::user()->id;
        $password_old = $request->password_old;
        $password_new = $request->password_new;
        if (Hash::check($password_old , Auth::user()->password)) { 
            $update = account::find($id);
            $update->password = Hash::make($password_new);
            $update->save();
            return redirect()->back()->with('success','Đổi Mật Khẩu Thành Công !');
        }else{
            return redirect()->back()->with('error','Đổi Mật Khẩu thất bại !');
        }
    }

    public function commentphim(Request $request){
        try {
            $data = $request->all();
            $user_id = Auth::user()->id;
            $id_phim = $data['id_phim'];
            $id_episode = $data['id_episode'];
            $textcomment = $data['textarea'];
            $create_comment = new comment();
            $create_comment->id_phim = $id_phim;
            $create_comment->id_episode = $id_episode;
            $create_comment->content = $textcomment;
            $create_comment->id_user = $user_id;
            $create_comment->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            if($create_comment->save()){
                $loadcomment = $this->autoloadComment($request);
            }
            return $loadcomment;
        } catch (\Throwable $th) {
            
        }
    }

    public function autoloadComment(Request $request){

        $select_comment = comment::where('id_episode', $request->id_episode)->where('parent_id', 0)->orderBy('id','desc')->paginate(10);

        $loadcomment = $this->loadCommentTree($select_comment);

        return $loadcomment;
    }
    public function binhluanshow(Request $request){
        $data = comment::orderBy('id','desc')->where('id_user', Auth::user()->id)->paginate(5);
        return view('user.binhluan', compact('data'));
    }

    public function loadCommentChiTiet(Request $request){
        
        $select_comment = comment::where('id_phim', $request->id_phim)->orderBy('id','desc')->orderBy('id','desc')->paginate(10);

        $loadcomment = $this->loadCommentTree($select_comment);

        return $loadcomment;
    }

    private function loadCommentTree($select_comment){
        $html = '';
        foreach ($select_comment as $val) {
            $html .='<div class="media col-md-12" style="margin-top:10px">';
                $html .='<div class="media-left" style="">';
                    $html .='<div style="width:55px">';
                        $html .='<img src="'.asset('uploads/logo').'/logoauto1.jpg" alt="..." style="width:55px; max-width:55px">';
                        $html .='<a data-id="'.$val->id.'" style="cursor:pointer" data-toggle="collapse" href="#comment'.$val->id.'" role="button" aria-expanded="false" aria-controls="collapseExample">Trả lời</a>';
                    $html .='</div>';
                $html .='</div>';
            $html .='<div class="media-body" style="">';
                $html .='<h4 class="media-heading" style="color:#000;font-size:12px">'.$val->idUser->name.' - ';
                if(isset(Auth::user()->id)){
                    if(Auth::user()->id == $val->id_user){
                        $html .='<a style="font-size:12px;cursor:pointer">Xóa</a>';
                    }
                }
                $html .='</h4>';
                $html .='<p style="color:#000">'.$val->content.'</p>';
                if (count($val->replies) > 0) {
                foreach ($val->replies as $val_cr) {
                $html .='<div class="media col-md-12" style="margin-top:10px;">';
                $html .='<div class="media-left" style="">';
                $html .='<div style="width:55px">';
                $html .='<img src="'.asset('uploads/logo').'/logoauto1.jpg" alt="..." style="width:55px; max-width:55px">';
                $html .='<a data-id="'.$val_cr->id.'" style="cursor:pointer" data-toggle="collapse" href="#comment'.$val_cr->id.'" role="button" aria-expanded="false" aria-controls="collapseExample">Trả lời</a>';
                $html .='</div>';
                $html .='</div>';
                $html .='<div class="media-body">';
                $html .='<h4 class="media-heading" style="color:#000;font-size:12px">'.$val_cr->idUser->name.' - ';
                if(isset(Auth::user()->id)){
                    if(Auth::user()->id == $val->id_user){
                        $html .='<a style="font-size:12px;cursor:pointer">Xóa</a>';
                    }
                }
                $html .='</h4>';
                if($val_cr->reply_id != null){
                    $html .='<p style="color:#000"><span style="color:#58e570">'.$val_cr->reply_id_user->name.'</span> - '.$val_cr->content.'</p>';
                }
                $html .='</div>';
                $html .='</div>';
                $html .='<div class="col-md-12 collapse" id="comment'.$val_cr->id.'">';
                $html .='<div class="card card-body">';
                $html .='<div class="form-group" id="reply-form-'.$val_cr->id.'">';
                $html .='<textarea class="form-control reply_content" rows="3" placeholder="nhập bình luận tại đây. Vui lòng không share link bậy bạ dẫn tới bị khóa tài khoản."></textarea>';
                $html .='<div class="comment_form">';
                $html .='<button type="button" id="reply_comment" data-reply-id="'.$val_cr->id_user.'" data-reply="'.$val_cr->id.'" data-pr="'.$val->id.'" class="btn btn-info">Bình Luận</button>';
                $html .='</div>';
                $html .='</div>';
                $html .='</div>';
                $html .='</div>';
               }
            }
            $html .= '</div>';
            $html .= '</div>';
            $html .='<div class="col-md-12 collapse" id="comment'.$val->id.'">';
            $html .='<div class="card card-body">';
            $html .='<div class="form-group" id="reply-form-'.$val->id.'">';
            $html .='<textarea class="form-control reply_content" rows="3" placeholder="nhập bình luận tại đây. Vui lòng không share link bậy bạ dẫn tới bị khóa tài khoản."></textarea>';
            $html .='<div class="comment_form">';
            $html .='<button type="button" id="reply_comment" data-reply-id="'.$val->id_user.'" data-reply="'.$val->id.'" data-pr="'.$val->id.'" class="btn btn-info">Bình Luận</button>';
            $html .='</div>';
            $html .='</div>';
            $html .='</div>';
            $html .='</div>';
        }
        return $html;
    }

    public function replycomment(Request $request){
        try {
            $data = $request->all();
            $create_comment = new comment();
            $create_comment->id_phim = $data['id_phim'];
            $create_comment->id_episode = $data['id_episode'];
            $create_comment->content = $data['content'];
            $create_comment->id_user = Auth::user()->id;
            $create_comment->parent_id = $data['parent'];
            $create_comment->reply_id = $data['reply'];
            $create_comment->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
            if($create_comment->save()){
                $loadcomment = $this->autoloadComment($request);
                return $loadcomment;
            }
        } catch (\Throwable $th) {
            
        }
    }
}
