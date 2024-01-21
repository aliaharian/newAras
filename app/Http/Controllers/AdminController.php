<?php

namespace App\Http\Controllers;

use App\brand_page;
use App\Campaign;
use App\countHome;
use App\daily_visit;
use App\logHomeUsers;
use App\newsletter;
use App\Off;
use App\Product;

use App\viewTracker;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        $view_trackers=daily_visit::all();
        $all_visit=0;
        foreach ($view_trackers as $view_tracker){
            $all_visit=$all_visit+$view_tracker->count;
        }

       return view('admin.index',compact('view_trackers','all_visit'));
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function rozatowel()
    {
        $roza=brand_page::where('page','roza')->get();
        return view('admin.rozatowel',compact('roza'));
    }

    public function rozatowelEdit(Request $request)
    {
        $roza_id=brand_page::where('page','roza')->where('position','main_image')->value('id');
        $roza=brand_page::find($roza_id);
        $roza->upper_text=$request->main_image_upper_text;
        $roza->lower_text=$request->main_image_lower_text;
        $roza->image=$request->main_image_link;
        $roza->save();
        for ($i=1;$i<12;$i++) {
            $image='img_'.$i.'_link';
            $upper_text='img_'.$i.'_upper_text';
            $lower_text='img_'.$i.'_lower_text';
            $link='img_'.$i.'_link_text';
            $roza_id = brand_page::where('page', 'roza')->where('position', 'img_'.$i)->value('id');
            $roza = brand_page::find($roza_id);
            $roza->upper_text = $request->$upper_text;
            $roza->lower_text = $request->$lower_text;
            $roza->image = $request->$image;
            $roza->link = $request->$link;
            $roza->save();
        }

        $roza_id=brand_page::where('page','roza')->where('position','contact_us')->value('id');
        $roza=brand_page::find($roza_id);
        $roza->upper_text=$request->contact_us_upper_text;
        $roza->save();

        $roza_id=brand_page::where('page','roza')->where('position','about_main')->value('id');
        $roza=brand_page::find($roza_id);
        $roza->upper_text=$request->about_main_upper_text;
        $roza->lower_text=$request->about_main_lower_text;
        $roza->save();


        for ($i=1;$i<4;$i++) {
            $image='about_'.$i.'_link';
            $upper_text='about_'.$i.'_upper_text';
            $lower_text='about_'.$i.'_lower_text';
            $roza_id = brand_page::where('page', 'roza')->where('position', 'about_'.$i)->value('id');
            $roza = brand_page::find($roza_id);
            $roza->upper_text = $request->$upper_text;
            $roza->lower_text = $request->$lower_text;
            $roza->image = $request->$image;
            $roza->link = $request->$link;
            $roza->save();
        }



        return back();
    }

    public function anargoltowel()
    {
        $anargol=brand_page::where('page','anargol')->get();
        return view('admin.anargoltowel',compact('anargol'));
    }

    public function anargoltowelEdit(Request $request)
    {
        for ($i=1;$i<9;$i++) {
            $image='img_'.$i.'_link';
            $upper_text='img_'.$i.'_upper_text';
            $roza_id = brand_page::where('page', 'anargol')->where('position', 'img_'.$i)->value('id');
            $roza = brand_page::find($roza_id);
            $roza->upper_text = $request->$upper_text;
            $roza->image = $request->$image;
            $roza->save();
        }
        return back();

    }

    public function special()
    {
        $products=Product::all();
        $hasSpecial=Off::where('special',1)->count();
        return view('admin.special',compact('products','hasSpecial'));
    }

    public function specialStore(Request $request)
    {
        $off_id=Off::where('product_id',$request->product)->value('id');
        $off=Off::find($off_id);
        $off->special=1;
        $off->image=$request->mainImage;
        $off->text=$request->text;
        $off->save();
        return back();
    }

    public function specialDestroy($special)
    {
        $off_id=Off::where('product_id',$special)->value('id');

        $off=Off::find($off_id);
        $off->special=0;
        $off->save();
        return back();
    }


    public function campaign()
    {
        $campaigns=Campaign::orderBy('id','DESC')->simplePaginate(9999999999);
        return view('admin.campaign.index',compact('campaigns'));
    }
    public function deleteCampaign($campaign)
    {
        $campaigndel=Campaign::find($campaign)->delete();
        $campaigns=Campaign::simplePaginate(9999999999);
        return redirect('/aras-admin/campaign');
    }

    public function newsletter()
    {
        $newsletter=newsletter::simplePaginate(9999999999);
        return view('admin.newsletter.index',compact('newsletter'));
    }


    public function analytics()
    {
        $today = date('Y-m-d', strtotime(Carbon::now()));
        $yesterday = date('Y-m-d', strtotime(Carbon::yesterday()));

//        $view_trackers=viewTracker::where('created_at', '>=', \Carbon\Carbon::now()->subDays(1)->toDateTimeString())->where('is_robot',0)->get();
        $logToday=countHome::where('date',$today)->paginate(999999999);
        $logYesterday=countHome::where('date',$yesterday)->paginate(999999999);
        $log=countHome::all();

        return view('admin.analytics',compact('logToday','logYesterday','log'));
    }
    public function single_analytics($selected_url)
    {
        $view_trackers=viewTracker::where('route',str_replace('-+','/',$selected_url))->where('created_at', '>=', \Carbon\Carbon::now()->subDays(30)->toDateTimeString())->where('is_robot',0)->get();
        return view('admin.single_analytics',compact('view_trackers','selected_url'));
    }

}
