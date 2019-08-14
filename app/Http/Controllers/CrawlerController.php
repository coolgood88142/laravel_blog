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
    public function runCrawler()
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

        $new_categorys = array_merge($nav1, $nav2);
        $categorys_table = Categorys::where('status', 'Y')->get();
        $categorys_array = array();$i = 0;

        foreach ($categorys_table as $category) {
            $name = $category->name;
            if ($name != $new_categorys[$i]) {
                $max = Categorys::all()->max('id') + 1;
                $new_category = $new_categorys[$i];

                $category = new Categorys(); 
                $category->id = $max;
                $category->name = $new_category;
                $category->status = 'Y';
                $category->save();
                $categorys_array[$i]["id"] = $max;
                $categorys_array[$i]["name"] = $new_category;

                $category = Titles::where('name', $name)->first();
                $category->status = 'N';
                $category->save();
            } else {
                $categorys_array[$i]["id"] = $i+1;
                $categorys_array[$i]["name"] = $name;
            }
            $i++;
        }

        
        $ti_date = Carbon::now()->toDateString(); 
        $title_table = Titles::where('date', $ti_date)->get();
        $ti_count = count($title_table);
        $ca_count = count($new_categorys);

        if($ti_count>0){
            $k = 0;
            foreach ($title_table as $data) {
                $ti_name = $data->name;
                if ($title[$k] != $ti_name) {
                    $now = (ceil($k+1 / $ca_count)) - 1;
                    $now_category = $categorys_array[$now]["id"];

                    $titles = new Titles(); 
                    $titles->date = $ti_date;
                    $titles->category_id = $now_category;
                    $titles->name = $title[$k];
                    $titles->text = $subtitle[$k];
                    $titles->save();
                }
                $k++;
            }
        }else{
            for($i = 0; $i < $ca_count; $i++){
                $a = $i * 5;
                $b = $a + 5;

                for($j = $a; $j < $b; $j++){
                    $titles = new Titles(); 
                    $titles->date = $ti_date;
                    $titles->category_id = $categorys_array[$i]["id"]; 
                    $titles->name = $title[$j];
                    $titles->text = $subtitle[$j];
                    $titles->save();
                }
            }
        }


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

        $ti_array = ['title' => $title, 'subtitle' => $subtitle, 'link' => $link, 'categorys' => $new_categorys,
         'href' => $href, 'src' => $src, 'alt' => $alt];

        return view('clarwler', $ti_array);
    }
}
