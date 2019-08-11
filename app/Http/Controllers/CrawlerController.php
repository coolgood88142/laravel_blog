<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

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

        $titles = array($title,$subtitle,$link);

        $nav1 = $crawler->filter('span > i[class=" D-ib W-100"]')->each(function ($node) {
		    return $node->text();
        });
        
        $nav2 = $crawler->filter('span > i[class="separator D-ib W-100"]')->each(function ($node) {
            return $node->text();
        });

        $categorys = array_merge($nav1, $nav2);

        $href = $crawler->filterXPath('//div[@class="W-100 H-100 Ov-h "]')->filter('a')->each(function ($node) {
            return $node->extract(array('href'));
        });

        $src1 = $crawler->filterXPath('//div[@class="W-100 H-100 Ov-h "]')->filter('a > img')->each(function ($node) {
            return $node->extract(array('src'));
        });

        $gif = $src1[3];

        $alt = $crawler->filterXPath('//div[@class="W-100 H-100 Ov-h "]')->filter('a > img')->each(function ($node) {
            return $node->extract(array('alt'));
        });
        
        $image_url = "image:url\(\'[\s\S]*?\/(http[\s\S]*?)\'\)";
        $src2 = array();

        $crawler->each(function ($node) use ($src2, $image_url){
            return $node->text();
        });

        dd($src2);
        exit;
    }
}
