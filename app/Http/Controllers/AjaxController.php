<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\city;
use App\favorite;
use App\newsletter;
use App\Pre_order;
use App\Product;
use App\product_to_color;
use App\product_to_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Mail;

class AjaxController extends Controller
{

    public function loadPrice(Request $request)
    {
        if (isset($request->size)) {
            $selectedSize = $request->size;
            $product_id = $request->product_id;
            $product = Product::find($product_id);
            $sizes = product_to_size::all();
            return view('ajax.loadPrice', compact('selectedSize', 'sizes', 'product'));
        } else return abort('403');
    }

    public function showCart()
    {
        return view('ajax.addToCart');
    }

    public function loadCartAsync()
    {
        $user_ip = $this->getUserIP();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
        //return $pre_order;
        return view('cartDetail', compact('pre_order'));


    }

    function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }

    public function addToCart(Request $request)
    {
        //save if user logged in
        if (isset($request->size) && isset($request->userId)) {
            $selectedSize = $request->size;
            $selectedColor = $request->color;
            $product_id = $request->product_id;
            $qty = $request->qty;
//            $user_ip = $request->ip();
            $user_ip = $this->getUserIP();
            $agent = new Agent();

            $user_platform = $agent->platform();
            $user_browser = $agent->browser();

            if (count(Pre_order::where('product_id', $product_id)->where('size_id', $selectedSize)->where('color_id', $selectedColor)->where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get()) > 0) {
                $existproductid = Pre_order::where('product_id', $product_id)->where('size_id', $selectedSize)->where('color_id', $selectedColor)->where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->value('id');
                $pre_order = Pre_order::find($existproductid);
                $pre_order->qty = $pre_order->qty + $qty;
                $pre_order->save();
            } else {
                $pre_order = new Pre_order();
                $pre_order->qty = $qty;
                $pre_order->product_id = $product_id;
                $pre_order->color_id = $selectedColor;
                $pre_order->size_id = $selectedSize;
                $pre_order->user_ip = $user_ip;
                $pre_order->user_platform = $user_platform;
                $pre_order->user_browser = $user_browser;


                ///////color image
                if (Product::find($product_id)->variable != 0) {
                    $image = product_to_color::where('product_id', $product_id)->where('color_id', $selectedColor)->value('image');
                    if ($image != '') {
                        $pre_order->image = $image;
                    } else {
                        $pre_order->image = Product::find($product_id)->image;
                    }
                } else if (Product::find($product_id)->variable == 0) {
                    $pre_order->image = Product::find($product_id)->image;
                }
                //////////////

                /////////size price
                if (Product::find($product_id)->variable == 2) {
                    $pre_order->price = product_to_size::where('product_id', $product_id)->where('size_id', $selectedSize)->value('price');
                    $pre_order->off_price = product_to_size::where('product_id', $product_id)->where('size_id', $selectedSize)->value('price');

                } else {
                    $pre_order->price = Product::find($product_id)->price;
                    $pre_order->off_price = Product::find($product_id)->price;

                }
                ///////////////


                ///////////////off percent

                if (Product::find($product_id)->off->count() > 0) {
                    foreach (Product::find($product_id)->off as $off) {
                        if (strtotime($off->start) < time() && strtotime($off->end) > time()) {
                            $pre_order->off_percent = $off->percent;
                            $percent = 100 - $off->percent;
                            if (Product::find($product_id)->variable == 2) {
                                $pre_order->off_price = product_to_size::where('product_id', $product_id)->where('size_id', $selectedSize)->value('price') * $percent / 100;
                            } else {
                                $pre_order->off_price = Product::find($product_id)->price * $percent / 100;
                            }
                        }
                    }
                }
                ///////////////////
                $pre_order->save();
            }
            $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
            //return $pre_order;
            return view('ajax.addToCart', compact('pre_order'));
        } else {
            return abort('403');
        }
    }

    public function deleteFromCart(Request $request)
    {
        if (isset($request->pre_order_id)) {
            $user_ip = $this->getUserIP();
            $agent = new Agent();

            $user_platform = $agent->platform();
            $user_browser = $agent->browser();
            Pre_order::find($request->pre_order_id)->delete();
            $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
            //return $pre_order;
            return view('ajax.addToCart', compact('pre_order'));
        } else {
            return abort('403');
        }
    }

    public function selectCity(Request $request)
    {
        if (isset($request->selectedCountry)) {
            $selectedCountry = $request->selectedCountry;
            $cities = city::where('province_id', 8)->where('county_id', $selectedCountry)->paginate(999999999);
            return view('ajax.selectCity', compact('cities'));
        } else {
            return abort('403');
        }
    }

    public function newsletter(Request $request)
    {
        if (isset($request->email)) {
            if (newsletter::where('email', $request->email)->count() == 0) {
                $newsletter = new newsletter();
                $newsletter->email = $request->email;
                $newsletter->save();
            }
            return '200';
        } else {
            return abort('403');
        }
    }

    public function addToWishlist(Request $request)
    {
        if (isset($request->product_id)) {
            if (favorite::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->count() == 0) {
                $favorite = new favorite();
                $favorite->user_id = Auth::user()->id;
                $favorite->product_id = $request->product_id;
                $favorite->save();
            }
            return '200';
        } else {
            return abort('403');
        }
    }

    public function checkCampaign(Request $request)
    {
        if ($request->type == 'email') {
            $campaign = Campaign::where('campaign_name', $request->campaignName)->where('email', $request->variable)->count();
            if ($campaign == 0) {
                $digits = 4;
                $email_code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
                $camp = new Campaign();
                $camp->email = $request->variable;
                $camp->campaign_name = $request->campaignName;
                $camp->email_code = $email_code;
                $camp->save();


                $email = $request->variable;
                $data = array('text' => '
                <p style="text-align: center">با تشکر از شرکت شما در جشنواره</p>
                <p style="text-align: center"> کد تایید: '
                    . $email_code . '

                </p>
                ',
                    'title' => 'کد تاییدیه شرکت در جشنواره حوله ارس',
                    'subtitle' => 'در صورتی که مورد رخ داده بر خلاف چیزی است که شما انتظار دارید، از طریق شماره تماس های موجود در بخش تما با ما به ما اطلاع دهید. با تشکر');
//                Mail::send('blank-mail', $data, function($message) use($email) {
//                    $message->to($email)->subject
//                    ('کد تایید شرکت در جشنواره - حوله ارس');
//                    $message->from('campaign@arastowel.com','حوله ارس');
//                });

                return 'true';
            } else if ($campaign != 0) {
                return 'false';
            }
        } else if ($request->type == 'phone') {
            $campaign = Campaign::where('campaign_name', $request->campaignName)->where('phone', $request->variable)->count();
            if ($campaign == 0) {
                $digits = 4;
                $email_code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
                $camp = new Campaign();
                $camp->phone = $request->variable;
                $camp->campaign_name = $request->campaignName;
                $camp->phone_code = $email_code;
                $camp->save();
                $pm = 'حوله ارس. کد تایید: ' . $email_code;
                try {
                    $sender = "100065995";
                    $receptor = "$request->variable";
                    $message = "$pm";
                    $api = new \Kavenegar\KavenegarApi("614B7A514F4D3067754C4668474E626358616C50356C47467343782B516C6A56");
                    $api->Send($sender, $receptor, $message);
                } catch (\Kavenegar\Exceptions\ApiException $e) {
                    // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                    echo $e->errorMessage();
                } catch (\Kavenegar\Exceptions\HttpException $e) {
                    // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                    echo $e->errorMessage();
                }


                return 'true';
            } else if ($campaign != 0) {
                return 'false';
            }

        }
    }


    public function checkCampaignCode(Request $request)
    {
        if ($request->type == 'email') {
            $campaign = Campaign::where('campaign_name', $request->campaignName)->where('email', $request->variable);
            if ($request->code == $campaign->value('email_code')) {
                $camp = Campaign::find($campaign->value('id'));
                $camp->email_verify = date('d-m-Y H:i:s');
                $camp->save();
                return 'true';
            } else {
                return 'false';
            }

        } else if ($request->type == 'phone') {
            $campaign = Campaign::where('campaign_name', $request->campaignName)->where('phone', $request->variable);
            if ($request->code == $campaign->value('phone_code')) {
                $camp = Campaign::find($campaign->value('id'));
                $camp->phone_verify = date('d-m-Y H:i:s');
                $camp->save();
                return 'true';
            } else {
                return 'false';
            }
        }
    }

    public function sendCampaignGift(Request $request)
    {
        if ($request->type == 'email') {
            $campaign = Campaign::where('campaign_name', $request->campaignName)->where('email', $request->variable);
            $camp = Campaign::find($campaign->value('id'));
            $camp->gift = $request->gift;
            $camp->save();
            if ($request->gift == 'SPECIAL') {
                $giftText = 'پک حوله دستی ارس';
            } else if ($request->gift == 'DOUBLE') {
                $giftText = 'پک حوله دوتایی ارس';
            } else {
                $giftText = 'کد تخفیف ' . $request->gift . ' خرید از فروشگاه اینترنتی ارس';
            }
            $email = $request->variable;
            $data = array('text' => '
                <p style="text-align: center">با تشکر از شرکت شما در جشنواره</p>
                <p style="text-align: center"> جایزه شما: '
                . $giftText . '
                </p>
                <p>
                جهت آموزش چگونگی استفاده از کد تخفیف یا چگونگی ارسال هدایای شما، از طریق همین ایمیل با شما در ارتباط خواهیم بود.
</p>
<p>
منتظر ما باشید
</p>
                ',
                'title' => 'دریافت جایزه شرکت در جشنواره حوله ارس',
                'subtitle' => 'در صورتی که مورد رخ داده بر خلاف چیزی است که شما انتظار دارید، از طریق شماره تماس های موجود در بخش تما با ما به ما اطلاع دهید. با تشکر');
//            Mail::send('blank-mail', $data, function($message) use($email) {
//                $message->to($email)->subject
//                ('دریافت جایزه شرکت در جشنواره حوله ارس- حوله ارس');
//                $message->from('campaign@arastowel.com','حوله ارس');
//            });

        }


        if ($request->type == 'phone') {
            $campaign = Campaign::where('campaign_name', $request->campaignName)->where('phone', $request->variable);
            $camp = Campaign::find($campaign->value('id'));
            $camp->gift = $request->gift;
            $camp->save();
            if ($request->gift == 'SPECIAL') {
                $giftText = 'پک حوله دستی ارس';
            } else if ($request->gift == 'DOUBLE') {
                $giftText = 'پک حوله دوتایی ارس';
            } else {
                $giftText = 'کد تخفیف ' . $request->gift . ' خرید از فروشگاه اینترنتی ارس';
            }
            $pm = 'با تشکر از شما برای شرکت در جشنواره حوله ارس . هدیه شما: ' . $giftText . '. جهت استفاده از هدیه ی خود، در سایت حوله ارس به نشانی www.arastowel.com ثبت نام کنید و سپس نام ، نام خانوادگی و ایمیل خود را به سامانه پیامکی 10000100088088 ارسال کنید تا نسبت به ارسال یا فعال سازی هدیه شما اقدام شود. با تشکر.';

            try {
                $sender = "100065995";
                $receptor = "$request->variable";
                $message = "$pm";
                $api = new \Kavenegar\KavenegarApi("614B7A514F4D3067754C4668474E626358616C50356C47467343782B516C6A56");
                $api->Send($sender, $receptor, $message);
            } catch (\Kavenegar\Exceptions\ApiException $e) {
                // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
                echo $e->errorMessage();
            } catch (\Kavenegar\Exceptions\HttpException $e) {
                // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
                echo $e->errorMessage();
            }


        }

    }


}
