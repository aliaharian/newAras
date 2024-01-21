<?php

namespace App\Http\Controllers;

use App\gift_card;
use App\InstagramPost;
use App\User;
use Mail;
use Illuminate\Http\Request;

class InstagramPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = InstagramPost::orderBy('id', 'DESC')->paginate(99999999999999999);
        return view('admin.instagramPosts.index', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'link' => 'required',
            'mainImage' => 'required',
        ]);

        $post = new InstagramPost();
        $post->image = $request->mainImage;
        $post->link = $request->link;
        if ($request->for_sale=='on'){
            $post->for_sale = 1;
        }else{
            $post->for_sale = 0;

        }
        $post->save();
        return redirect('/aras-admin/instagramPosts');
    }

    public function edit($id)
    {
        $posts = InstagramPost::orderBy('id', 'DESC')->paginate(99999999999999999);
        $fPost = InstagramPost::findOrFail($id);
        return view('admin.instagramPosts.edit', compact('posts','fPost'));
    }


      public function update($id , Request $request)
    {

        $validatedData = $request->validate([
            'link' => 'required',
            'mainImage' => 'required',
        ]);

        $post = InstagramPost::findOrFail($id);
        $post->image = $request->mainImage;
        $post->link = $request->link;
        if ($request->for_sale=='on'){
            $post->for_sale = 1;
        }else{
            $post->for_sale = 0;

        }
        $post->save();
        return redirect('/aras-admin/instagramPosts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift=InstagramPost::find($id)->delete();
        return redirect('/aras-admin/instagramPosts');

    }
}
