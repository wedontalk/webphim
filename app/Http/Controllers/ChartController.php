<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WildlifePopulation;
use App\Models\phim;
use DB;

class ChartController extends Controller
{
    public function index()
    {
        $population = phim::select(
                        DB::raw("SUM(id) as id"),
                        DB::raw("SUM(num_view) as view"))
                        ->orderBy(DB::raw("YEAR(created_at)"))
                        ->groupBy(DB::raw("YEAR(created_at)"))
                    ->get();
  
        $res[] = ['id', 'view'];
        foreach ($population as $key => $val) {
            $res[++$key] = [(int)$val->id, (int)$val->view];
        }
  
        return view('admin.thongke.index')
            ->with('population', json_encode($res));
    }
}
