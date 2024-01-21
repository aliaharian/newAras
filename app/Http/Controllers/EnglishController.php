<?php

namespace App\Http\Controllers;

use App\blog;
use App\Blog_to_tag;
use App\Category;
use App\Product;
use App\product_to_size;
use App\Tag;
use App\templateSetting;
use Illuminate\Http\Request;

class EnglishController extends Controller
{
    public function index()
    {  $products = Product::where('published', 1)->paginate(999999999);
        $proproducts = Product::orderBy('id','DESC')->paginate(6);
        $sizes = product_to_size::all();
        $template = templateSetting::all();
        return view('en.index', compact('products', 'sizes', 'template','proproducts'));
    }


    public function aboutUS()
    {
        $template = templateSetting::all();
        return view('en.about-us',compact('template'));
    }

    public function contactUS()
    {
        $template = templateSetting::all();
        return view('en.contact-us',compact('template'));
    }

    public function shop()
    {
        $template = templateSetting::all();

        $products = Product::where('published', 1)->orderBy('qty', 'desc')->paginate('9');
        $sizes = product_to_size::all();


        return view('en.shop', compact('products', 'sizes', 'template'));
    }

    public function shopCategory($category)
    {
        $template = templateSetting::all();
        $categoryid = Category::where('english_name', $category)->value('id');
        $categoryArray = Category::find($categoryid);
        $products = Product::where('published', 1)->orderBy('qty', 'desc')->paginate('900');
        $sizes = product_to_size::all();
        return view('en.category', compact('categoryArray', 'products', 'sizes', 'template'));
    }

    public function promotionalTowels()
    {
        $template = templateSetting::all();
        $products = Product::orderBy('id', 'desc')->paginate(9999);
        return view('en.promotional-towels', compact('products','template'));

    }

    public function giftPack()
    {
        $template = templateSetting::all();
        $products = Product::orderBy('id', 'desc')->paginate(999999);

        return view('en.gift-pack', compact('products','template'));
    }

    public function blog()
    {
        $posts = blog::orderBy('updated_at', 'desc')->paginate(99999999999);
        $tags = Tag::all();
        return view('en.blog', compact( 'posts', 'tags'));
    }



    public function showPost($blog_id, $blog_title)
    {

        $post = blog::find($blog_id);
        if ($post != null) {
            $tags = Tag::all();

            return view('en.blog-detail', compact( 'post', 'tags'));
        } else {
            return abort('404');
        }

    }

    public function showShortPost($blog_id)
    {

        $post = blog::find($blog_id);
        if ($post != null) {
            $post_title=$post->english_title;

            return redirect('/en/blog/'.$blog_id.'/'.str_replace(' ','-',$post_title));
        } else {
            return abort('404');
        }

    }

    public function blogByTag($tag_name)
    {
        $tag_id = Tag::where('tag_english_name', str_replace('-', ' ', $tag_name))->orderBy('updated_at', 'desc')->value('id');
        $selectedTags = Blog_to_tag::where('tag_id', $tag_id)->get();
        $tags = Tag::all();
        return view('en.blog-by-tag', compact( 'selectedTags', 'tags', 'tag_name'));
    }

}
