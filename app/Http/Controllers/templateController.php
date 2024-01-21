<?php

namespace App\Http\Controllers;

use App\templateSetting;
use Illuminate\Http\Request;

class templateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates=templateSetting::all();
        return view('admin.template.index',compact('templates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $templates=templateSetting::all();
        $selectedTemplate=templateSetting::find($id);
        return view('admin.template.edit',compact('templates','selectedTemplate'));
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
        $template=templateSetting::find($id);
        $template->image=$request->mainImage;
        if ($template->place=='slide1'||$template->place=='slide2'||$template->place=='slide3'||$template->place=='slide4'){
            $template->link=$request->link;
        }

        if ($template->place=='video'||$template->place=='video2'){
            $template->video=$request->mainVideo;
        }
        if ($template->place=='iran'){
            $template->text=$request->text;
            $template->link=$request->link;
        }

        if($template->place=='gift1'||$template->place=='gift2'||$template->place=='gift3'||$template->place=='bath1'||$template->place=='bath2'||$template->place=='bath3'||$template->place=='promo1'||$template->place=='promo2'||$template->place=='promo3'){
//            $template->logo=$request->mainImage2;
            $template->text=$request->text;
        }
        $template->save();
        $pm= $template->name .' با موفقیت ویرایش شد';

        $templates=templateSetting::all();
        $selectedTemplate=templateSetting::find($id);
        return view('admin.template.edit',compact('templates','selectedTemplate','pm'));

    }

}
