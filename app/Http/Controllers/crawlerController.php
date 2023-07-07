<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler;
use Session;


class crawlerController extends Controller
{
    public function index(){
        // link nguồn website animehay.club
        ini_set('max_execution_time', 9999999999999); 
        $crawl = new Client();
        $layurl = 'https://animehay.club/thong-tin-phim/than-lan-ky-vuc-vo-song-chau-3561.html';
        $crawler = $crawl->request('GET', $layurl);
        $laylink = $crawler->filter('.list-item-episode>a')->each(function($node){
            $src = $node->attr('href');
            $layidphim = $node->filter('span')->text(); // lấy id tập phim
            $linkphim = $node->getnode(0)->getAttribute('href'); // lấy link tập phim
            return $this->result[$node->getnode(0)->getAttribute('href')] = $node->filter('span')->text();
        });
        $chaylinkphim = $this->result;
        foreach (array_reverse($chaylinkphim) as $key => $value) {
            echo $key.'<br>';
            echo 'tập '. $value.'<br>';
            $crawlepisode = new Client(); //cào tập phim
            $crawlerepisode = $crawl->request('GET', $key); // bắt đầu lấy tập phim
            $layepisode = $crawlerepisode->filter('div:contains("video-player")>div>iframe')->each(function($node){
                $srcepisode = $node->attr('src');
                $hrefne = $node->getnode(0)->getAttribute('src');
                return $this->chayne[$node->getnode(0)->getAttribute('src')] = $node->getnode(0)->getAttribute('src');
            });
            $chaylinktapphim = $this->chayne;
            foreach ($chaylinktapphim as $key2 => $val2) {
                $pattern = '~https://www.dailymotion.com/(.+)~';
                $pattern2 = '~https://playhydrax.com/(.+)~';
                $pattern3 = '~https://lotus(.+)~';
                $pattern4 = '~https://ok.ru/(.+)~';
                if(preg_match($pattern, $val2, $matches)){ // lấy ra server embed
                    echo $matches[0].' server embed'.'<br>';
                }elseif(preg_match($pattern2, $val2, $matches2)){ // lấy ra server hydrax
                    echo $matches2[0].' server hydrax'.'<br>';
                }elseif(preg_match($pattern3, $val2, $matches3)){ // lấy ra server lotus
                    echo $matches3[0].' server lotus'.'<br>';
                }elseif(preg_match($pattern4, $val2, $matches4)){ // lấy ra server oku
                    echo $matches4[0].' server oku'.'<br>';
                }
            }
        }
        // link nguồn website animetvn.com


        // ini_set('max_execution_time', 9999999999999); 
        // $crawl = new Client();
        // $layurl = 'https://animetvn.tv/thong-tin-phim/f6666-hac-mon.html';
        // $crawler = $crawl->request('GET', $layurl);
        // $laylink = $crawler->filter('.btns>.play-now')->each(function($node){
        //     $src = $node->attr('href');
        //     $href = $node->getnode(0)->getAttribute('href');
        //     return $this->result[$node->getnode(0)->getAttribute('href')] = $node->text();
        // });
        // $chaylinkphim = $this->result;
        // foreach ($chaylinkphim as $key => $value) {
        //     $crawllink = new Client();
        //     $laytapphim = $crawllink->request('GET', $key);
        //     $batdaulay = $laytapphim->filter('.tapphim')->each(function($node){
        //         $src = $node->attr('href');
        //         $href = $node->getnode(0)->getAttribute('href');
        //         $title = $node->getnode(0)->getAttribute('title');
        //         return $this->chaytap[$node->getnode(0)->getAttribute('href')] = $node->text();
        //     });
        //     $chaytapphim = $this->chaytap;
        //     foreach ($chaytapphim as $key => $value) {
        //         echo $key.'<br>';
        //         echo $value.'<br>';
        //         $crawllink = new Client();
        //         $laytapphim = $crawllink->request('GET', $key);
        //         $batdaulay = $laytapphim->filter('div.for_iframe>iframe')->each(function($node){
        //             $srcepisode = $node->attr('src');
        //             $hrefne = $node->getnode(0)->getAttribute('src');
        //             $node->html();
        //             return $this->chayiframe[$node->getnode(0)->getAttribute('src')] = $node->getnode(0)->getAttribute('src');
        //         });
        //         $chayiframene = $this->chayiframe;
        //         foreach ($chayiframene as $key => $value) {
        //             echo $key.'<br>';
        //         }
        //     }
        // }


        // link nguồn website animeaz.net
        // ini_set('max_execution_time', 9999999999999); 
        // $crawl = new Client();
        // $layurl = 'https://animeaz.net/xem-anime/soredemo-ayumu-wa-yosetekuru-p1631158.html';
        // $crawler = $crawl->request('GET', $layurl);
        // $laylink = $crawler->filter('.btn-red')->each(function($node){
        //     $src = $node->attr('href');
        //     $href = $node->getnode(0)->getAttribute('href');
        //     return $this->result[$node->getnode(0)->getAttribute('href')] = $node->text();
        // });
        // $chayvotrangxemphim = $this->result;
        // foreach ($chayvotrangxemphim as $key => $value) {
        //     if($value == 'Xem Từ Đầu'){
        //         $link = 'https://animeaz.net/xem-anime/';
        //         $crawllink = new Client();
        //         $laytapphim = $crawllink->request('GET', $link.$key);
        //         $batdaulay = $laytapphim->filter('.episodelist>.ep')->each(function($node){
        //             $src = $node->attr('href');
        //             $href = $node->getnode(0)->getAttribute('href');
        //             $title = $node->getnode(0)->getAttribute('title');
        //             return $this->chaytap[$node->getnode(0)->getAttribute('href')] = $node->text();
        //         });
        //         $chaytapphim = $this->chaytap;
        //         foreach ($chaytapphim as $key => $value) {
        //             echo 'https://animeaz.net/xem-anime/'.$key.'<br>';
        //             echo $value.'<br>';
        //         $crawllink = new Client();
        //         $laytapphim = $crawllink->request('GET', 'https://animeaz.net/xem-anime/inc/apiPlayerV2.php');
        //         dd($laytapphim);
        //         }
        //     }
        // }
    }
}
