<?php

namespace App\Http\Controllers;

use App\Repositories\TitlesRepository;
use App\Repositories\CategorysRepository;
use Illuminate\Http\Request;
use Goutte\Client;

class CrawlerController extends Controller
{
    protected $titlesRepo;
    protected $categorysRepo;

    public function __construct(TitlesRepository $titlesRepo, CategorysRepository $categorysRepo)
    {
        $this->titlesRepo = $titlesRepo;
        $this->categorysRepo = $categorysRepo;
    }

    public function runCrawler()
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://tw.yahoo.com/');

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
        $categorys_table = $this->categorysRepo->getToNormalCategory();
        $categorys_array = $this->categorysRepo->getMatchCategoryData($categorys_table, $new_categorys);

        $title_table = $this->titlesRepo->getToDayData();
        $ti_count = count($title_table);
        $ca_count = count($new_categorys);

        if ($ti_count>0) {
            $name_array = array();
            foreach ($title_table as $data) {
                array_push($name_array, $data->name);
            }
            
            $diff = array_diff($title, $name_array);
            $diff_count = count($diff);

            if ($diff_count>0) {
                 foreach ($diff as $diff_name) {
                     $diff_now =  array_keys($title, $diff_name);
                     foreach ($diff_now as $now) {
                        $ti_category = $now+1;
                        
                        if($ti_category>$ca_count){
                            $ti_category = (ceil($ti_category / $ca_count)) - 1;
                        }

                        $this->titlesRepo->save($ti_category, $title[$now], $subtitle[$now]);
                    }
                 }
            }
        } else {
            for ($i = 0; $i < $ca_count; $i++) {
                $a = $i * 5;
                $b = $a + 5;

                for ($j = $a; $j < $b; $j++) {
                    $category_id = $categorys_array[$i]["id"] + 1;
                    $this->titlesRepo->save($category_id, $title[$j], $subtitle[$j]);
                }
            }
        }

        $n = 0;$m = 0;
        foreach ($title as $value) {
            if (mb_strlen( $value, "utf-8") > 17) {
                $value = mb_substr($value,0,17,"utf-8") . '...';
                $title[$n] = $value;
            }
            $n++;
        }

        foreach ($subtitle as $value) {
            if (mb_strlen( $value, "utf-8") > 34) {
                $value = mb_substr($value,0,34,"utf-8") . '...';
                $subtitle[$m] = $value;
            }
            $m++;
        }

        $href = $crawler->filterXPath('//div[@class="W-100 H-100 Ov-h "]')->filter('a')->each(function ($node) {
            return $node->attr('href');
        });

        $src = $crawler->filterXPath('//div[@class="W-100 H-100 Ov-h "]')->filter('a > img')->each(function ($node) {
            return $node->attr('src');
        });

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

        for ($i = 0; $i < $ca_count; $i++) {
            $img_array = array();$p = 0;
            for ($j = ($i * 3); $j < ($i * 3) + 3; $j++) {
                $img_array[$j]["href"] = $href[$j];
                $img_array[$j]["src"] = $src[$j];
                $img_array[$j]["alt"] = $alt[$j];

                $sub  = '';$img_sub  = '';
                if($j != ($i * 3)){
                    $sub = '-sub';
                    $img_sub = $sub . $p;
                }

                $img_array[$j]["titleClass"] = "title-img" . $img_sub;
                $img_array[$j]["imgClass"] = "img-size" . $sub;
                $img_array[$j]["textClass"] = "img-text" . $sub;
                $p++;
            }

            $categorys_array[$i]["img"] = $img_array;

            $title_array = array();
            for ($k = ($i * 5); $k < ($i * 5) + 5; $k++) {
                $title_array[$k]["link"] = $link[$k];
                $title_array[$k]["title"] = $title[$k];
                $title_array[$k]["subtitle"] = $subtitle[$k];
            }

            $categorys_array[$i]["title"] = $title_array;
        }

        return view('clarwler', ['categorys' => $categorys_array]);
    }
}
