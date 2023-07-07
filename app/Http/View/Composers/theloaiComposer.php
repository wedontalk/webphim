<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\loaiphim;
use App\Models\phim;

class TheloaiComposer
{
    public function compose(View $view)
    {
        // View::composer( views:['user.about'], callback: function ($view){
        //     $view->with( 'menu_id', loaiphim::where('id',$slug)->first());
        //     $view->with('phimtc', phim::orderBy('id','DESC')->where('anHien', 1)->where('category_id',$menu_id->id)->search()->paginate(12));
        // });

        // $view->with('phimtc', phim::orderBy('id','DESC')->where('anHien', 1)->where('category_id',$menu_id->id)->search()->paginate(12));
    }
}