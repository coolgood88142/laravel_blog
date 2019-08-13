<?php

namespace App\Http\Controllers;

use App\Models\Titles;
use App\Models\Categorys;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CrawlerController extends Controller
{
    public function RunCrawler()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://tw.yahoo.com/');

        $crawler = new Crawler();

        $crawler->addHtmlContent($res->getBody()->getContents());

        $title = $crawler->filter('a > span[class="Va-tt"]')->each(function ($node) {
		    return $node->text();
        });

        $subtitle = $crawler->filter('p > span[class="Va-tt"]')->each(function ($node) {
            return $node->text();
        });

        $link = $crawler->filter('span[class="D-b Ov-h W-100"] > a')->each(function ($node) use ($crawler){
            $hrefText = trim($node->text());
            $link = $crawler->selectLink($hrefText)->link();
            return $url = $link->getUri();
        });

        $nav1 = $crawler->filter('span > i[class=" D-ib W-100"]')->each(function ($node) {
		    return $node->text();
        });
        
        $nav2 = $crawler->filter('span > i[class="separator D-ib W-100"]')->each(function ($node) {
            return $node->text();
        });

        $categorys = array_merge($nav1, $nav2);

        $href = $crawler->filterXPath('//div[@class="W-100 H-100 Ov-h "]')->filter('a')->each(function ($node) {
            return $node->attr('href');
        });

        $src = $crawler->filterXPath('//div[@class="W-100 H-100 Ov-h "]')->filter('a > img')->each(function ($node) {
            return $node->attr('src');
        });

        $gif = $src[3];

        $other_src = $crawler->filterXPath('//img[@class="MainStoryImage Pos-r Bd-0 ImageLoader ImageLoader-Delayed"]')->each(function ($node) {
            $style = $node->attr('style');
            if(preg_match_all('/background-image:url\(\'([\s\S]*?)\'\)/si',$style,$url)){
                return $url[1][0];
            }
        });

        $alt = $crawler->filterXPath('//div[@class="W-100 H-100 Ov-h "]')->filter('a > img')->each(function ($node) {
            return $node->attr('alt');
        });

        array_splice($src,3,15,$other_src); 

        $ti_array = ['title' => $title, 'subtitle' => $subtitle, 'link' => $link, 'categorys' => $categorys,
         'href' => $href, 'src' => $src, 'alt' => $alt];

        return view('clarwler', $ti_array);
    }

    public function CheckCategorys($Categorys){
        $table = Categorys::all();
        dd($table);
        exit;

        foreach($table as $category){
            $category->name;
        }


    }
}
