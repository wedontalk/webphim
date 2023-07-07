<?php

namespace App\Http\Controllers;

use App\Models\crawllink;
use App\Models\phim;
use App\Models\tapphim;
use App\Models\linktapphim;
use App\Models\crawlerauto;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;
use Session;

use Carbon\Carbon;

class crawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = crawllink::orderBy('id', 'desc')->search()->paginate(10);
        $data1 = crawllink::orderBy('id', 'desc')->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toTimeString();
        $crawlerauto = crawlerauto::get();
        return view('admin.crawler.index', compact('data','data1','crawlerauto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chonphim = phim::orderBy('id', 'desc')->get();
        return view('admin.crawler.create', compact('chonphim'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $themcrawl = new crawllink();
        $data = $request->all();
        $themcrawl->id_phim = $data['id_phim'];
        $themcrawl->link_tapphim = $data['link_tapphim'];
        $themcrawl->save();
        return redirect()->route('crawler.index')->with('success', 'thêm thành công !!!');
    }
    public function chaycrawler(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $updatecrawler = crawllink::find($id);
        $updatecrawler->action = $data['val'];
        $updatecrawler->save();
        echo 'done';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = tapphim::where('film_id', $id)->get();
        // lấy link
        ini_set('max_execution_time', 9999999999999); 
        $crawl = new Client();
        $laylinkdau = crawllink::where('id_phim', $id)->first();
        $layurl = $laylinkdau->link_tapphim;
        $crawler = $crawl->request('GET', $layurl);
        $layname_phim = $crawler->filter('.heading_movie')->text();
        // echo $layname_phim.'<br>';
        $link = null;
        $laylink = $crawler->filter('.list-item-episode>a')->each(function ($node) use(&$link){
            $src = $node->attr('href');
            $layid = $node->filter('span')->text(); // lấy id tập phim
            $linkphim = $node->getnode(0)->getAttribute('href'); // lấy link tập phim
            return $this->result[$node->getnode(0)->getAttribute('href')] = $node->filter('span')->text();
            if($linkphim){
                $client = new Client();
                $url = $linkphim;
                $page = $client->request('GET', $url);
                $link = $page->filter('div:contains("video-player")>div>iframe')->each(function ($node) use($hrefne){
                $src = $node->attr('src');
                $hrefne = $node->getnode(0)->getAttribute('src');
                    if($hrefne == "/iframe-lot.php?link="){
                        echo '';
                    }else {
                        return $hrefne;
                    }
                });
            }
        });
        $namephim = $layname_phim;
        $linkvaid =  $this->result;
        $linkne = $link;
        // thêm tập phim 
        if($laylinkdau->action == 1){
            foreach ($linkvaid as $key => $value) {
                if ($test = linktapphim::where('link_nguon', $key)->orWhereNull('link_nguon')->exists() ) {
                    if($test){
                        echo ' đã tồn tại trong database <br>';
                    }else{
                        echo 'chưa tồn tại trong database <br>';
                    }
                }else{
                    $themtapphim = new linktapphim();
                    $themtapphim->id_phim = $laylinkdau->id_phim;
                    $themtapphim->id_tapphim = $value;
                    $themtapphim->link_nguon = $key;
                    $themtapphim->slug_phim = \Str::slug($namephim).'-tap'.$value.'.html';
                    $themtapphim->action = 1;
                    if($key){
                        $client = new Client();
                        $page = $client->request('GET', $key);
                        $link = $page->filter('div:contains("video-player")>div>iframe')->each(function ($lay){
                        $src = $lay->attr('src');
                        $hrefne = $lay->getnode(0)->getAttribute('src');
                            if($hrefne == "/iframe-lot.php?link="){
                                echo '';
                            }else {
                                return $this->result[$hrefne] = $lay->getnode(0)->getAttribute('src');
                            }
                        });
                        $datalink = $this->result;
                        foreach ($datalink as $key => $value) {
                            $themtapphim->content = $value;
                        }
                    }
                    $themtapphim->save();
                    echo 'thêm thành công <br>';
                }
            }
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crawl = crawllink::find($id);
        $chonphim = phim::get();
        return view('admin.crawler.edit', compact('crawl','chonphim'));
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
        $updatecrawl = crawllink::find($id);
        $data = $request->all();
        $updatecrawl->id_phim = $data['id_phim'];
        $updatecrawl->link_tapphim = $data['link_tapphim'];
        $updatecrawl->action = $data['action'];
        $updatecrawl->save();
        return redirect()->route('crawler.index')->with('success', 'thêm thành công !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = crawllink::find($id);
        linktapphim::whereIn('id_phim', [$delete->id_phim])->delete();
        $delete->delete();
        return redirect()->route('crawler.index')->with('success', 'delete thành công !!!');
    }


    public function autocrawler(Request $request){
        $dtaaa = $request->all();
        $updateauto = crawlerauto::find(1);
        $updateauto->name = $dtaaa['id'];
        $updateauto->save();
        echo 'thanhcongne'; 
        $data1 = crawllink::orderBy('id', 'desc')->get();
        foreach (crawlerauto::get() as  $autocrl) {  
            if($autocrl->name == 1){
                    foreach ($data1 as $key => $dat1) {
                    // lấy link
                    ini_set('max_execution_time', 9999999999999); 
                    $crawl = new Client();
                    $layurl = $dat1->link_tapphim;
                    $crawler = $crawl->request('GET', $layurl);
                    $layname_phim = $crawler->filter('.heading_movie')->text();
                    // echo $layname_phim.'<br>';
                    $link = null;
                    $laylink = $crawler->filter('.list-item-episode>a')->each(function ($node) use(&$link){
                        $src = $node->attr('href');
                        $layid = $node->filter('span')->text(); // lấy id tập phim
                        $linkphim = $node->getnode(0)->getAttribute('href'); // lấy link tập phim
                        return $this->result[$node->getnode(0)->getAttribute('href')] = $node->filter('span')->text();
                        if($linkphim){
                            $client = new Client();
                            $url = $linkphim;
                            $page = $client->request('GET', $url);
                            $link = $page->filter('div:contains("video-player")>div>iframe')->each(function ($node) use($hrefne){
                            $src = $node->attr('src');
                            $hrefne = $node->getnode(0)->getAttribute('src');
                                if($hrefne == "/iframe-lot.php?link="){
                                    echo '';
                                }else {
                                    return $hrefne;
                                }
                            });
                        }
                    });
                    $namephim = $layname_phim;
                    $linkvaid =  $this->result;
                    $linkne = $link;
                    // thêm tập phim 
                    if($dat1->action == 1){
                        foreach ($linkvaid as $key => $value) {
                            if ($test = linktapphim::where('link_nguon', $key)->orWhereNull('link_nguon')->exists() ) {
                                if($test){
                                    echo ' đã tồn tại trong database <br>';
                                }else{
                                    echo 'chưa tồn tại trong database <br>';
                                }
                            }else{
                                $themtapphim = new linktapphim();
                                $themtapphim->id_phim = $dat1->id_phim;
                                $themtapphim->id_tapphim = $value;
                                $themtapphim->link_nguon = $key;
                                $themtapphim->slug_phim = \Str::slug($namephim).'-tap'.$value.'.html';
                                $themtapphim->action = 1;
                                if($key){
                                    $client = new Client();
                                    $page = $client->request('GET', $key);
                                    $link = $page->filter('div:contains("video-player")>div>iframe')->each(function ($lay){
                                    $src = $lay->attr('src');
                                    $hrefne = $lay->getnode(0)->getAttribute('src');
                                        if($hrefne == "/iframe-lot.php?link="){
                                            echo '';
                                        }else {
                                            return $this->result[$hrefne] = $lay->getnode(0)->getAttribute('src');
                                        }
                                    });
                                    $datalink = $this->result;
                                    foreach ($datalink as $key => $value) {
                                        $themtapphim->content = $value;
                                    }
                                }
                                $themtapphim->save();
                                echo 'thêm thành công <br>';
                            }
                        }
                    }
                }
            }
        }
    }
}
