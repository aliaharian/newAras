<?php

namespace App\Http\Controllers;

use App\blog;
use App\Category;
use App\Color;
use App\Product;
use App\product_to_color;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function mainSite()
    {
        /* create new sitemap object */
        $sitemap = App::make("sitemap");

        /* add item to the sitemap (url, date, priority, freq) */
        $sitemap->add(URL::to('/'), date('c', time()), '1.0', 'daily');

//        english
        $sitemap->add(URL::to('/en'), date('c', time()), '1.0', 'daily');
//        arabic
        $sitemap->add(URL::to('/ar'), date('c', time()), '1.0', 'daily');

        $sitemap->add(route('about-us'),date('c', time()),'0.8', 'monthly');
//        english
        $sitemap->add(route('en-about-us'),date('c', time()),'0.8', 'monthly');
        //        arabic
        $sitemap->add(route('ar-about-us'),date('c', time()),'0.8', 'monthly');



        $sitemap->add(route('blog'),date('c', time()),'0.8', 'daily');
//        english
        $sitemap->add(route('en.blog'),date('c', time()),'0.8', 'daily');
//        arabic
        $sitemap->add(route('ar.blog'),date('c', time()),'0.8', 'daily');
//        blog
        $blogs = blog::where('published',1)->get();

        foreach ($blogs as $blog) {
            $images = [
                ['url' => URL::to($blog->image), 'title' => $blog->title],
            ];
            $sitemap->add(route('blog.post', [$blog->id, str_replace(' ','-',$blog->title)]), $blog->updated_at, '0.80', 'daily',$images);
        }

        $tags=Tag::all();
        foreach ($tags as $tag){
            $sitemap->add(route('blog.tagSearch', [$tag->tag_name]), $tag->updated_at, '0.80', 'daily');

        }


//        english
        $enblogs = blog::where('published',1)->whereNotNull('english_title')->get();

        foreach ($enblogs as $enblog) {
            $images = [
                ['url' => URL::to($enblog->image), 'title' => $enblog->english_title],
            ];
            $sitemap->add(route('en.blog.post', [$enblog->id, str_replace(' ','-',$enblog->english_title)]), $enblog->updated_at, '0.80', 'daily',$images);
        }

        //        arabic
        $arblogs = blog::where('published',1)->whereNotNull('arabic_title')->get();

        foreach ($arblogs as $arblog) {
            $images = [
                ['url' => URL::to($arblog->image), 'title' => $arblog->arabic_title],
            ];
            $sitemap->add(route('ar.blog.post', [$arblog->id, str_replace(' ','-',$arblog->arabic_title)]), $arblog->updated_at, '0.80', 'daily',$images);
        }


        /*******************************************************/

        $sitemap->add(route('shop'),date('c', time()),'0.8', 'daily');
//        english
        $sitemap->add(route('en-shop'),date('c', time()),'0.8', 'daily');
//        arabic
        $sitemap->add(route('ar-shop'),date('c', time()),'0.8', 'daily');


        $products = Product::where('published',1)->get();


        /* add every tab to the sitemap */
        foreach ($products as $product) {
           $images = array();

            foreach($product->galleries as $gallery){
                if ($gallery!=null&&$gallery!=''){
                    $images[] = array(
                        'url' => $gallery->address,
                        'title' => $product->name
                    );
                }
            }
            if ($product->variable!=0){

                $selectedcolorImage='';
                $colors=product_to_color::all();
                foreach($product->color as $color) {
                    foreach ($colors as $selectedcolor){
                        if($selectedcolor->product_id==$product->id && $selectedcolor->color_id==$color->id) {
                            $selectedcolorImage = $selectedcolor->image;
                            }
                    }
                    if($selectedcolorImage!=''){
                        $images[] = array(
                            'url' => $selectedcolorImage,
                            'title' => $product->name
                        );
                    }
                }




            }
            $images[] = array(
                'url' => $product->image,
                'title' => $product->name
            );

            $sitemap->add(route('shop.product', [$product->id, str_replace(' ','-',$product->name)]), $product->updated_at, '0.85', 'daily',$images);
        }

        $categories=Category::all();
        foreach ($categories as $category){
            if ($category->english_name!='promotional-towel' && $category->english_name!='gift-towel' ) {
                $sitemap->add(route('shop.category', [$category->english_name]), $category->updated_at, '0.80', 'daily');
                //english
                $sitemap->add(route('en-shop.category', [$category->english_name]), $category->updated_at, '0.80', 'daily');
                //arabic
                $sitemap->add(route('ar-shop.category', [$category->english_name]), $category->updated_at, '0.80', 'daily');
            }
        }

        /*******************************************************/
        $sitemap->add(route('contact-us'),date('c', time()),'0.8', 'monthly');
        //english
        $sitemap->add(route('en-contact-us'),date('c', time()),'0.8', 'monthly');
        //arabic
        $sitemap->add(route('ar-contact-us'),date('c', time()),'0.8', 'monthly');

        $sitemap->add(route('freeshipping'),date('c', time()),'0.8', 'monthly');

        /*******************************************************/

        $images = array();
        $products=Product::all();
        foreach ($products as $product){
            foreach($product->categories as $category){
                if($category->english_name=='gift-towel'){
                    $images[] = array(
                        'url' => $product->image,
                        'title' => $product->name
                    );
                }
            }
        }
        
          
        
        $sitemap->add(route('gift-pack'),date('c', time()),'0.9', 'daily',$images);
        //english
        $sitemap->add(route('en-gift-pack'),date('c', time()),'0.9', 'daily');
        //arabic
        $sitemap->add(route('ar-gift-pack'),date('c', time()),'0.9', 'daily');
        /*******************************************************/
        $sitemap->add(route('product-return'),date('c', time()),'0.8', 'monthly');
        /*******************************************************/

        $images = array();
        $products=Product::all();
        foreach ($products as $product){
            foreach($product->categories as $category){
                if($category->english_name=='promotional-towel'){
                    $sitemap->add(route('promo.detail',[$product->id , str_replace(' ','-',$product->name) ]),date('c', time()),'0.9', 'monthly');
                    $images[] = array(
                        'url' => $product->image,
                        'title' => $product->name
                    );
                }
            }
        }
        $sitemap->add(route('promotional-towels'),date('c', time()),'0.9', 'daily',$images);
        //english
        $sitemap->add(route('en-promotional-towels'),date('c', time()),'0.9', 'daily');
        //arabic
        $sitemap->add(route('ar-promotional-towels'),date('c', time()),'0.9', 'daily');
        /*******************************************************/
        $sitemap->add(route('shopping-steps'),date('c', time()),'0.8', 'monthly');

        $sitemap->add(route('order-promotional-towels'),date('c', time()),'0.8', 'monthly');
        $sitemap->add(route('newroz98'),date('c', time()),'0.9', 'daily');


        return $sitemap->render('xml');
    }
}


