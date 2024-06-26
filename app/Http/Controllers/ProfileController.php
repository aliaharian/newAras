<?php

namespace App\Http\Controllers;

use App\Additional;
use App\Additional_information;
use App\address;
use App\Color;
use App\country;
use App\favorite;
use App\gift_card;
use App\invoice;
use App\invoice_line_item;
use App\Pre_order;
use App\Product;
use App\Province;
use App\size;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;
use Morilog\Jalali\CalendarUtils;

class ProfileController extends Controller
{
    public function index()
    {
        $invoice_id = invoice::where('user_id', Auth::user()->id)->value('id');
        if ($invoice_id != null) {
            $invoices = invoice::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        } else {
            $invoices = null;
        }
        $additional_information = Additional_information::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->id]);
        $agent = new Agent();
        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.index', compact('additional_information', 'invoices'));
        } else {
            return view('profile.index', compact('additional_information', 'invoices'));
        }

    }

    public function orders()
    {
        $invoice_id = invoice::where('user_id', Auth::user()->id)->value('id');
        if ($invoice_id != null) {
            $invoices = invoice::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        } else {
            $invoices = null;
        }
        $agent = new Agent();
        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.orders', compact('invoices'));
        } else {
            return view('profile.orders', compact('invoices'));
        }

    }

    public function favorites()
    {
        $favorites = favorite::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $agent = new Agent();
        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.favorites', compact('favorites'));
        } else {
            return view('profile.favorites', compact('favorites'));
        }

    }

    public function destroyFavorites($product)
    {
        $favoriteId = favorite::where('user_id', Auth::user()->id)->where('product_id', $product)->value('id');
        favorite::find($favoriteId)->delete();
        return redirect('/profile/favorites');

    }

    public function giftcards()
    {
        $gifts = gift_card::where('user_id', Auth::user()->id)->where('used', 0)->get();
        $agent = new Agent();
        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.giftcards', compact('gifts'));
        } else {
            return view('profile.giftcards', compact('gifts'));
        }

    }

    public function orderTracking()
    {
        return view('profile.order-tracking');
    }

    public function sendOrderTrack(Request $request)
    {
        $invoice_id = invoice::where('tracking_code', $request->order)->value('id');
        $invoice = invoice::find($invoice_id);
        $invoice_line_items = invoice_line_item::where('invoice_id', $invoice_id)->get();
        $agent = new Agent();

        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.order-detail', compact('invoice', 'invoice_line_items'));
        } else {
            return view('profile.order-detail', compact('invoice', 'invoice_line_items'));
        }

    }

    public function addresses()
    {
        $agent = new Agent();
        $addresses = address::where('user_id', Auth::user()->id)->paginate(99999);
        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.addresses', compact('addresses'));
        } else {
            return view('profile.addresses', compact('addresses'));
        }
    }

    public function personalInfo()
    {
        $additional_information = Additional_information::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->id]);
        $agent = new Agent();
        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.personal-info', compact('additional_information'));
        } else {
            return view('profile.personal-info', compact('additional_information'));
        }

    }

    public function editPersonalInfo(Request $request)
    {
        $validatedData = $request->validate([
            'national_code' => 'required|string|min:10|melli_code',
            'phone_number' => 'required|string|min:11|iran_mobile',
            'card_number' => 'required|string|min:16|card_number',
            'name' => 'required|persian_alpha',
            'last_name' => 'required|persian_alpha',

        ],
            [
                'national_code.required' => 'وارد کردن کد ملی الزامی است',
                'national_code.min' => 'کد ملی وارد شده صحیح نیست',

                'card_number.required' => 'وارد کردن شماره کارت الزامی است',
                'card_number.min' => 'شماره کارت وارد شده صحیح نیست',

                'phone_number.required' => 'وارد کردن شماره موبایل الزامی است',
                'phone_number.min' => 'شماره موبایل وارد شده صحیح نیست',

                'name.required' => 'وارد کردن نام الزامی است',
                'name.persian_alpha' => 'نام را به فارسی وارد کنید',


                'last_name.required' => 'وارد کردن نام خانوادگی الزامی است',
                'last_name.persian_alpha' => 'نام خانوادگی را به فارسی وارد کنید',

            ]
        );


        if (Additional_information::where('user_id', Auth::user()->id)->count() == 0) {
            $add_info = new Additional_information();
            $add_info->user_id = Auth::user()->id;
            $add_info->national_number = $request->national_code;
            $add_info->phone_number = $request->phone_number;
            $add_info->card_number = str_replace(' ', '', $request->card_number);
            if (isset($request->newsletter)) {
                $add_info->newsletter = 1;
            } else {
                $add_info->newsletter = 0;
            }
            $add_info->save();
        } else {
            $add_info_id = Additional_information::where('user_id', Auth::user()->id)->value('id');
            $add_info = Additional_information::find($add_info_id);
            $add_info->national_number = $request->national_code;
            $add_info->phone_number = $request->phone_number;
            $add_info->card_number = str_replace(' ', '', $request->card_number);
            if (isset($request->newsletter)) {
                $add_info->newsletter = 1;
            } else {
                $add_info->newsletter = 0;
            }
            $add_info->save();
        }

        $info = User::find(Auth::user()->id);
        $info->name = $request->name;
        $info->last_name = $request->last_name;
        $info->save();
        return redirect('profile');
    }

    public function additionalInfo()
    {
        $additional_information = Additional_information::where(['user_id' => \Illuminate\Support\Facades\Auth::user()->id]);
        $agent = new Agent();
        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.additional-info', compact('additional_information'));
        } else {
            return view('profile.additional-info', compact('additional_information'));
        }

    }

    public function orderDetail($invoice_number)
    {
        $invoice_id = invoice::where('invoice_number', $invoice_number)->value('id');
        $invoice = invoice::find($invoice_id);
        $invoice_line_items = invoice_line_item::where('invoice_id', $invoice_id)->get();
        $agent = new Agent();

        if ($agent->isMobile() || $agent->isTablet()) {
            return view('profile.mobile.order-detail', compact('invoice', 'invoice_line_items'));
        } else {
            return view('profile.order-detail', compact('invoice', 'invoice_line_items'));
        }

    }

    public function resetPassword()
    {
        return view('profile.reset-pass');
    }

    public function addAddress()
    {
//        $countries = country::where('province_id', 8)->paginate(9999999999);
        $provinces = Province::all();
        return view('profile.addresses.create', compact('provinces'));
    }

    public function changepass(Request $request)
    {
        $validatedData = $request->validate([
            'oldPassword' => 'required|string',
            'newPassword' => 'required|string|min:6|confirmed',
        ],
            [
                'oldPassword.required' => 'ورود کلمه عبور فعلی الزامی است',
                'newPassword.required' => 'ورود کلمه عبور جدید الزامی است',
                'newPassword.confirmed' => ' کلمه عبور جدید با تکرار آن تطابق ندارد ',
                'newPassword.min' => ' کلمه عبور جدید باید حداقل ۶ حرف باشد ',
            ]

        );
        $user = User::find(Auth::user()->id);
        if (password_verify($request->oldPassword, $user->password)) {
            $pm = 'کلمه عبور با موفقیت تغییر یافت';
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return view('profile.reset-pass', compact('pm'));
        } else {
            $pm = 'کلمه عبور فعلی نادرست است';

            return view('profile.reset-pass', compact('pm'));
        }

    }

    public function storeAddress(Request $request, $callback)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|persian_alpha',
            'province' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required|address',
            'postal_code' => 'required|iran_postal_code',
            'mobile' => 'required|iran_mobile',

        ],
            [
                'province.required' => 'وارد کردن استان و شهر الزامی است',
                'country.required' => 'وارد کردن شهرستان و شهر الزامی است',

                'city.required' => 'وارد کردن شهرستان و شهر الزامی است',

                'address.required' => 'وارد کردن آدرس الزامی است',

                'postal_code.required' => 'وارد کردن کد پستی الزامی است',

                'full_name.required' => 'وارد کردن نام الزامی است',

                'mobile.required' => 'وارد کردن شماره موبایل الزامی است',
            ]
        );

        $addresscount = address::where('user_id', Auth::user()->id)->count();
        if ($addresscount == 0) {
            $address = new address();
            $address->user_id = Auth::user()->id;
            $address->name = $request->full_name;
            $address->province_id = $request->province;
            $address->country_id = $request->country;
            $address->city_id = $request->city;
            $address->address = $request->address;
            $address->postal_code = $request->postal_code;
            $address->phone_number = $request->mobile;
            $address->save();
        } else {
            $addressid = address::where('user_id', Auth::user()->id)->value('id');
            $address = address::find($addressid);

            $address->user_id = Auth::user()->id;
            $address->name = $request->full_name;
            $address->province_id = 8;
            $address->country_id = $request->country;
            $address->city_id = $request->city;
            $address->address = $request->address;
            $address->postal_code = $request->postal_code;
            $address->phone_number = $request->mobile;
            $address->save();
        }

        if ($callback == 'shipping') {
            //return $pre_order;
            return redirect('/shipping');
        } else {
            return redirect('/profile/addresses');
        }

    }

    public function editAddress()
    {
        $addresses = address::where('user_id', Auth::user()->id)->paginate(1);
        $provinces = Province::all();
        return view('profile.addresses.edit', compact('provinces', 'addresses'));

    }

    public function updateAddress(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|persian_alpha',
            'province' => 'required',
            'country' => 'required',
            'city' => 'required',
            'address' => 'required|address',
            'postal_code' => 'required|iran_postal_code',
            'mobile' => 'required|iran_mobile',

        ],
            [
                'province.required' => 'وارد کردن استان و شهر الزامی است',
                'country.required' => 'وارد کردن شهرستان و شهر الزامی است',

                'city.required' => 'وارد کردن شهرستان و شهر الزامی است',

                'address.required' => 'وارد کردن آدرس الزامی است',

                'postal_code.required' => 'وارد کردن کد پستی الزامی است',

                'full_name.required' => 'وارد کردن نام الزامی است',

                'mobile.required' => 'وارد کردن شماره موبایل الزامی است',
            ]
        );
        $addresssave = address::where('user_id', Auth::user()->id)->value('id');
        $address = address::find($addresssave);

        $address->user_id = Auth::user()->id;
        $address->name = $request->full_name;
        $address->province_id = $request->province;
        $address->country_id = $request->country;
        $address->city_id = $request->city;
        $address->address = $request->address;
        $address->postal_code = $request->postal_code;
        $address->phone_number = $request->mobile;
        $address->save();

        return redirect('/profile/addresses');

    }

    public function destroyAddress()
    {
        $addresssave = address::where('user_id', Auth::user()->id)->value('id');
        address::find($addresssave)->delete();
        return redirect('/profile/addresses');

    }

    public function payFromZarrin(Request $request, $invoice_number)
    {
//        dd($request->all());
//        "respmsg" => "تراکنش توسط کاربر لغو شد."
//  "respcode" => "-1"
//  "terminalid" => "98784217"
//  "invoiceid" => "27039570"
//  "amount" => "207000"
//  "payload" => "27039570"
        $respcode = $request->respcode;
        $digitalreceipt = $request->digitalreceipt;
        $terminalid = $request->terminalid;
        $respmsg = $request->respmsg;
        $tracenumber = $request->tracenumber; //شماره تراکنش
        $amount = $request->amount;

        $rrn = $request->rrn;//شماره پیگیری
        if ($respcode == 0) {

            $AdviceAddress = "https://sepehr.shaparak.ir:8081/V1/PeymentApi/Advice";

            $dataQuery = 'digitalreceipt=' . $digitalreceipt . '&Tid=' . $terminalid;

            $mainController = new mainController();
            $AdviceArray = $mainController->makeHttpChargeRequest('POST', $dataQuery, $AdviceAddress);
            $decode_AdviceArray = json_decode($AdviceArray);

            //var_dump($decode_TokenArray);

            $Status = $decode_AdviceArray->Status;
            $ReturnId = $decode_AdviceArray->ReturnId;
            $Message = $decode_AdviceArray->Message;
        }


        $invoice_id = invoice::where('invoice_number', $invoice_number)->value('id');
        $invoice = invoice::find($invoice_id);
        $invoice->transaction_number = $tracenumber;
        $error_message = $request->error_message;

        if ($respcode == 0 && $Status == "Ok" && $ReturnId == $amount) {
            $invoice->payed = 1;
            $invoice->transaction_token = $rrn;

            try {
                ////////////////////////
                //send sms to admin
                $endpoint = 'https://api.kavenegar.com/v1/614B7A514F4D3067754C4668474E626358616C50356C47467343782B516C6A56/sms/send.json';
                $client = new \GuzzleHttp\Client();
                $receptor = "09127257962,09127942759";
                $text = "سفارش جدید";
                $newLine = "\n";
                $text .= $newLine;
                $text .= "شماره فاکتور: ";
                $text .= $invoice->id;
                $text .= $newLine;
                $orders = invoice_line_item::where("invoice_id", $invoice->id)->get();
                foreach ($orders as $order) {
                    $text .= "* ";
                    $text .= Product::find($order->product_id)->name;
                    if ($order->color_id != 0) {
                        $text .= " " . Color::find($order->color_id)->name;
                    }
                    if ($order->size_id != 0) {
                        $text .= " (" . size::find($order->size_id)->name . ")";
                    }
                    $text .= " " . $order->qty . " عدد";
                    $text .= $newLine;
                }
                $text .= "اطلاعات کامل: ";
                $text .= "aras" . $invoice->id;
                $text .= "به 10000100088088";

                $text .= $newLine;
                $text .= "لغو ۱۱";

                $response = $client->request('GET', $endpoint, [
                    'query' => [
                        'receptor' => $receptor,
                        'message' => $text,
                        'sender' => "10000100088088"
                    ]
                ]);
            } catch (\Exception $e) {
            }


            //send lookup admin
            try {
                $endpoint = 'https://api.kavenegar.com/v1/614B7A514F4D3067754C4668474E626358616C50356C47467343782B516C6A56/verify/lookup.json';
                $receptor = "09121331044";
                $token = $invoice->id;
                $token2 = number_format($invoice->transaction_amount);
                $token3 = "https://arastowel.com/profile/show-order?order=" . $invoice->tracking_code;
                $template = "newOrderAdmin";

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

            //send to customer:
            try {
                $endpoint = 'https://api.kavenegar.com/v1/614B7A514F4D3067754C4668474E626358616C50356C47467343782B516C6A56/verify/lookup.json';
                $client = new \GuzzleHttp\Client();
                $receptor = $invoice->phone_number;
                $token = $invoice->tracking_code;
                $token2 = number_format($invoice->transaction_amount) . "تومان";
                $template = "confirmBuy";

                $response = $client->request('GET', $endpoint, [
                    'query' => [
                        'receptor' => $receptor,
                        'token' => $token,
                        'token2' => $token2,
                        'template' => $template,
                    ]
                ]);
//            $statusCode = $response->getStatusCode();
//            $content = $response->getBody();
            } catch (\Exception $e) {
            }
        } else {
            $invoice->payed = 0;
        }

        $invoice->save();
        if ($error_message) {
            return redirect('/profile/order/' . $invoice_number . '?respMsg=' . $error_message);
        } else if ($respmsg) {
            return redirect('/profile/order/' . $invoice_number . '?respMsg=' . $respmsg);

        } else {
            return redirect('/profile/order/' . $invoice_number);
        }
    }


}
