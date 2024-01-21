<?php

namespace App\Http\Controllers;

use App\gift_card;
use App\User;
use Mail;
use Illuminate\Http\Request;

class giftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $gifts = gift_card::orderBy('id', 'DESC')->paginate(99999999999999999);
        return view('admin.gifts.index', compact('users', 'gifts'));
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
            'percent' => 'required|digits_between:1,2|numeric',
        ]);

                $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            .'0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

        $gift=new gift_card();
        $gift->code=$rand;
        $gift->user_id=$request->user_id;
        $gift->percent=$request->percent;
        $gift->save();

        $user_email=User::find($request->user_id)->email;
        $user_name=User::find($request->user_id)->name.' '.User::find($request->user_id)->last_name;

        $data = array('text' => '<h1 style="text-align:center;"> تخفیف
 ' .$request->percent.'
  درصدی
</h1>
<h1 style="text-align:center;">:کد تخفیف
<br>
 '.$rand.'
</h1>
',
            'title'=>'تبریک! از طرف حوله ارس یک کارت تخفیف به شما تعلق گرفت',
            'subtitle'=>'برای استفاده از کارت هدیه می توانید به سایت حوله ارس که در انتهای ایمیل موجود است مراجعه کنید و خرید خود را آغاز کنید ');
//        Mail::send('blank-mail', $data, function($message) use($user_email,$user_name) {
//            $message->to($user_email, $user_name)->subject
//            ('کارت هدیه خرید از حوله ارس!');
//            $message->from('gift@arastowel.com','حوله ارس');
//        });
        return redirect('/aras-admin/gifts');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift=gift_card::find($id)->delete();
        return redirect('/aras-admin/gifts');

    }
}
