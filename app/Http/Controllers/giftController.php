<?php

namespace App\Http\Controllers;

use App\Additional_information;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'percent' => 'required|digits_between:1,2|numeric',
        ]);

        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
            . 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            . '0123456789'); // and any other characters
        shuffle($seed); // probably optional since array_is randomized; this may be redundant
        $rand = '';
        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];

        $gift = new gift_card();
        $gift->code = $rand;
        $gift->user_id = $request->user_id;
        $gift->percent = $request->percent;
        $gift->save();

        try {
            $mobile = Additional_information::where("user_id", $request->user_id)->first()->phone_number;
            $user_name = User::find($request->user_id)->name . ' ' . User::find($request->user_id)->last_name;

            //send sms
            $endpoint = 'https://api.kavenegar.com/v1/614B7A514F4D3067754C4668474E626358616C50356C47467343782B516C6A56/verify/lookup.json';
            $client = new \GuzzleHttp\Client();
            $receptor = $mobile;
            $token = str_replace(" ", "_", $user_name);
            $token2 = $request->percent;
            $token3 = $rand;
            $template = "discountCode";

            $response = $client->request('GET', $endpoint, [
                'query' => [
                    'receptor' => $receptor,
                    'token' => $token,
                    'token2' => $token2,
                    'token3' => $token3,
                    'template' => $template,
                ]
            ]);
        } catch (\Exception $e) {
        }
        return redirect('/aras-admin/gifts');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift = gift_card::find($id)->delete();
        return redirect('/aras-admin/gifts');

    }
}
