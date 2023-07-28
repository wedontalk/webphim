<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Illuminate\Pagination\Paginator;
use App\Models\danhmuc;
use App\Models\trangthai;
use App\Models\slider;
use App\Models\tapphim;
use App\Models\phim;
use App\Models\kieuphim;
use App\Models\cauhinhview;
use App\Models\thongbao;
use App\Models\quangcao;
// use App\Models\linktapphim;
use App\Models\serve;
use Carbon\Carbon;


use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('*',function($view){
            // danh sách category
            $view->with('showcategory', danhmuc::orderBy('id','ASC')->where('anHien', 1)->get());
            $view->with('showstatus', trangthai::orderBy('id','ASC')->get());
            $view->with('showslide', slider::orderBy('thu_tu','ASC')->get());
            $view->with('showkieuphim', kieuphim::orderBy('id','ASC')->get());
            $view->with('showcauhinh', cauhinhview::orderBy('id','ASC')->get());
            $view->with('thongbaouser', thongbao::all());
            $view->with('qc_header', quangcao::where('trang_thai', 1)->where('id_hienthi', 1)->first());
            $view->with('qc_right', quangcao::where('trang_thai', 1)->where('id_hienthi', 2)->first());
            $view->with('qc_footer', quangcao::where('trang_thai', 1)->where('id_hienthi', 3)->first());
            $view->with('qc_modal', quangcao::where('trang_thai', 1)->where('id_hienthi', 4)->first());
            $view->with('qc_onclick', quangcao::where('trang_thai', 1)->where('id_hienthi', 5)->first());
        });
        Carbon::setLocale('vi');
        // Paginator::useBootstrap();
        Paginator::defaultView('user.in-paginate');
        Paginator::useBootstrap();
    }
}
