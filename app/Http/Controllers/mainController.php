<?php

namespace App\Http\Controllers;

use App\Color;
use App\countHome;
use App\gift_card;
use App\logHomeUsers;
use App\size;
use App\templateSetting;
use Illuminate\Support\Facades\Input;
use Mail;
use App\InstagramPost;
use App\address;
use App\blog;
use App\Blog_to_tag;
use App\brand_page;
use App\Category;
use App\city;
use App\country;
use App\invoice;
use App\invoice_line_item;
use App\Pre_order;
use App\Product;
use App\product_to_color;
use App\product_to_size;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Zarinpal\Laravel\Facade\Zarinpal;
use Kavenegar;


class mainController extends Controller
{
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

    public function index()
    {
        $products = Product::where('published', 1)->paginate(999999999);
        $proproducts = Product::orderBy('id', 'DESC')->paginate(6);
        $sizes = product_to_size::all();
        $template = templateSetting::all();
        $posts = blog::orderBy('id', 'desc')->limit(3)->get();
        $instas = InstagramPost::orderBy('id', 'desc')->limit(21)->get();
        return view('index', compact('products', 'sizes', 'template', 'proproducts', 'posts', 'instas'));
    }

    public function shop()
    {

        if (isset($_GET['ref'])) {
            $ref = $_GET['ref'];
            $ip = $this->getUserIP();
            $agent = new Agent();
            $robot = $agent->isRobot();
            $today = date('Y-m-d', strtotime(Carbon::now()));
            $checkref = logHomeUsers::where('date', $today)->where('ip', $ip)->where('button_name', $ref)->count();
            if ($checkref == 0 && $robot == 0) {
                $addref = new logHomeUsers();
                $addref->button_name = $ref;
                $addref->ip = $ip;
                $addref->date = $today;
                $addref->save();
                $checkref = countHome::where('date', $today)->where('ref', $ref)->count();
                if ($checkref == 0) {
                    $addref = new countHome();
                    $addref->ref = $ref;
                    $addref->count = 1;
                    $addref->date = $today;
                    $addref->save();
                } else {
                    $addref = countHome::where('date', $today)->where('ref', $ref)->value('id');
                    $addref = countHome::findOrFail($addref);
                    $addref->count = $addref->count + 1;
                    $addref->save();
                }
            }

        }
        $template = templateSetting::all();

//        $products = Product::where('published', 1)->orderBy('qty', 'desc')->paginate(99999);

        $products = Product::whereHas('categories', function ($q) {
            $q->where('english_name', '<>', 'promotional-towel')->where('english_name', '<>', 'gift-towel');
        })->where('published', 1)->with(['categories' => function ($q) {
            $q->where('english_name', '<>', 'promotional-towel')->where('english_name', '<>', 'gift-towel');
        }])->orderBy('qty', 'desc')->paginate('9999999999');


        $sizes = product_to_size::all();
        $instas = InstagramPost::orderBy('id', 'desc')->limit(21)->get();


        return view('shop', compact('products', 'sizes', 'template', 'instas'));
    }

    public function shopCategory($category)
    {
        $template = templateSetting::all();
        $categoryid = Category::where('english_name', $category)->value('id');
        $categoryArray = Category::find($categoryid);
        $products = Product::where('published', 1)->orderBy('qty', 'desc')->paginate('999999');
        $sizes = product_to_size::all();
        $instas = InstagramPost::orderBy('id', 'desc')->limit(21)->get();
        $currCat = $category;
        return view('category', compact('categoryArray', 'products', 'sizes', 'template', 'instas', 'currCat'));
    }

    public function showProduct($product_id, $product_title)
    {

        $product = Product::find($product_id);
        if ($product != null) {
            $products = Product::where('published', 1)->paginate(99999999999);
            $sizes = product_to_size::all();
            $colors = product_to_color::all();
            return view('product-detail', compact('product', 'product_title', 'products', 'sizes', 'colors'));
        } else {
            return abort('404');
        }


    }

    public function cart(Request $request)
    {
        $user_ip = $this->getUserIP();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
        //return $pre_order;
        return view('cart', compact('pre_order'));

    }

    public function addGift(Request $request)
    {
        $user_ip = $this->getUserIp();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();


        $gift_user = gift_card::where('code', $request->gift_code)->value('user_id');
        $gift_used = gift_card::where('code', $request->gift_code)->value('used');
        $gift_in_pre = gift_card::where('code', $request->gift_code)->value('in_pre');
        $gift_count = gift_card::where('code', $request->gift_code)->count();
        $gift_percent = gift_card::where('code', $request->gift_code)->value('percent');
        if ($gift_user != Auth::user()->id || $gift_count != 1) {
            $err = 'این کد وجود ندارد';
            return view('cart', compact('pre_order', 'err'));
        } elseif ($gift_used == 1) {
            $err = 'این کد قبلا استفاده شده';
            return view('cart', compact('pre_order', 'err'));
        } elseif ($gift_in_pre == 1) {
            $err = 'این کد در سبد خرید دیگری در حال استفاده است';
            return view('cart', compact('pre_order', 'err'));
        } else {

            $gift_id = gift_card::where('code', $request->gift_code)->value('id');
            $gift = gift_card::find($gift_id);
            $gift->in_pre = 1;
            $gift->user_ip = $user_ip;
            $gift->user_browser = $user_browser;
            $gift->user_platform = $user_platform;
            $gift->save();
            return view('cart', compact('pre_order', 'gift_percent'));
        }
    }

    public function deleteGift(Request $request)
    {

        $user_ip = $this->getUserIp();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();

        $gift_id = gift_card::where('code', $request->gift_code)->where('user_id', Auth::user()->id)->where('in_pre', 1)->where('used', 0)->where('user_ip', $user_ip)->where('user_browser', $user_browser)->where('user_platform', $user_platform);
        if ($gift_id->count() != 0) {
            $gift = gift_card::find($gift_id->value('id'));
            $gift->in_pre = 0;
            $gift->save();
        }
        return view('cart', compact('pre_order'));

    }

    public function shipping(Request $request)
    {
        $user_ip = $this->getUserIp();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
        $addresses = address::where('user_id', Auth::user()->id)->paginate(99999);
        //return $pre_order;
        return view('shipping', compact('pre_order', 'addresses'));

    }


    public function blog()
    {
        $sizes = product_to_size::all();
        $posts = blog::orderBy('updated_at', 'desc')->paginate(999999999);
        $tags = Tag::all();
        $template = templateSetting::all();

        return view('blog', compact('sizes', 'posts', 'tags', 'template'));
    }

    public function showPost($blog_id, $blog_title)
    {

        $post = blog::find($blog_id);
        if ($post != null) {
            $products = Product::all();
            $sizes = product_to_size::all();
            $tags = Tag::all();

            return view('blog-detail', compact('products', 'sizes', 'post', 'tags'));
        } else {
            return abort('404');
        }

    }

    public function promoDetail($product_id, $product_name)
    {
        $product = Product::find($product_id);
        if (!$product) {
            return redirect('/');
        }
        return view('promotional-detail', compact('product'));
    }

    public function showShortPost($blog_id)
    {

        $post = blog::find($blog_id);
        if ($post != null) {
            $post_title = $post->title;

            return redirect('/blog/' . $blog_id . '/' . str_replace(' ', '-', $post_title));
        } else {
            return abort('404');
        }

    }

    public function blogByTag($tag_name)
    {
        $products = Product::where('published', 1)->paginate(99999999999999);
        $sizes = product_to_size::all();
        $tag_id = Tag::where('tag_name', str_replace('-', ' ', $tag_name))->orderBy('updated_at', 'desc')->value('id');
        $selectedTags = Blog_to_tag::where('tag_id', $tag_id)->get();
        $tags = Tag::all();
        return view('blog-by-tag', compact('products', 'sizes', 'selectedTags', 'tags', 'tag_name'));
    }


    public function blogsearch(Request $request)
    {
        $search = $request->search;
        $products = Product::where('published', 1)->paginate(99999999999999);
        $sizes = product_to_size::all();
        $tags = Tag::all();
        $posts = blog::where('title', 'LIKE', '%' . $search . '%')->orderBy('updated_at', 'desc')->paginate(9);
        return view('blog', compact('posts', 'tags', 'products', 'sizes'));
    }


    public function aboutUS()
    {
        $template = templateSetting::all();
        return view('about-us', compact('template'));
    }

    public function contactUS()
    {
        $template = templateSetting::all();
        $instas = InstagramPost::orderBy('id', 'desc')->limit(21)->get();

        return view('contact-us', compact('template', 'instas'));
    }

    public function giftPack()
    {
        if (isset($_GET['ref'])) {
            $ref = $_GET['ref'];
            $ip = $this->getUserIP();
            $agent = new Agent();
            $robot = $agent->isRobot();
            $today = date('Y-m-d', strtotime(Carbon::now()));
            $checkref = logHomeUsers::where('date', $today)->where('ip', $ip)->where('button_name', $ref)->count();
            if ($checkref == 0 && $robot == 0) {
                $addref = new logHomeUsers();
                $addref->button_name = $ref;
                $addref->ip = $ip;
                $addref->date = $today;
                $addref->save();
                $checkref = countHome::where('date', $today)->where('ref', $ref)->count();
                if ($checkref == 0) {
                    $addref = new countHome();
                    $addref->ref = $ref;
                    $addref->count = 1;
                    $addref->date = $today;
                    $addref->save();
                } else {
                    $addref = countHome::where('date', $today)->where('ref', $ref)->value('id');
                    $addref = countHome::findOrFail($addref);
                    $addref->count = $addref->count + 1;
                    $addref->save();
                }
            }

        }
        $template = templateSetting::all();
        $products = Product::orderBy('id', 'desc')->paginate(9999);
        $instas = InstagramPost::orderBy('id', 'desc')->limit(21)->get();

        return view('gift-pack', compact('products', 'template', 'instas'));
    }

    public function promotionalTowels()
    {

        if (isset($_GET['ref'])) {
            $ref = $_GET['ref'];
            $ip = $this->getUserIP();
            $agent = new Agent();
            $robot = $agent->isRobot();
            $today = date('Y-m-d', strtotime(Carbon::now()));
            $checkref = logHomeUsers::where('date', $today)->where('ip', $ip)->where('button_name', $ref)->count();
            if ($checkref == 0 && $robot == 0) {
                $addref = new logHomeUsers();
                $addref->button_name = $ref;
                $addref->ip = $ip;
                $addref->date = $today;
                $addref->save();
                $checkref = countHome::where('date', $today)->where('ref', $ref)->count();
                if ($checkref == 0) {
                    $addref = new countHome();
                    $addref->ref = $ref;
                    $addref->count = 1;
                    $addref->date = $today;
                    $addref->save();
                } else {
                    $addref = countHome::where('date', $today)->where('ref', $ref)->value('id');
                    $addref = countHome::findOrFail($addref);
                    $addref->count = $addref->count + 1;
                    $addref->save();
                }
            }

        }
        $products = Product::orderBy('id', 'desc')->get();
        $instas = InstagramPost::orderBy('id', 'desc')->limit(21)->get();

        return view('promotional-towels', compact('products', 'instas'));

    }

    public function promotionalArchive()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('promotional-towels-archive', compact('products'));
    }

    public function orderForm()
    {
        return view('order-form');
    }

    public function sendPromotionalForm(Request $request)
    {
        if (!empty($_FILES['file']['name'])) {
            $name = 'saved-' . $request->email . '-' . date('dmyhis') . '.' . $request->file('file')->getClientOriginalExtension();
            $request->file('file')->move('files/saved', $name);
            $data = array('text' => "    <tr>
                                <td>
                                    نام و نام خانوادگی:
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->name
                                    </b>
                                </td>

                                <td>

                                    شماره تماس:
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->phone
                                    </b>
                                </td>

                            </tr>
                            <tr>
                                <td>

                                    ایمیل :
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->email
                                    </b>
                                </td>
                                <td>
                                    وب سایت
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->site
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    نوع حوله  :
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->service
                                    </b>
                                </td>
                                <td>
                                     نوع بافت :
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->type_product
                                    </b>
                                </td>

                            </tr>
                            <tr>

                                <td>
                                    تعداد
                                </td>
                                <td style='color:green;'>
                                    <b>
                                     $request->qty

                                    </b>
                                </td>

                                <td>

                                   توضیحات
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->message
                                    </b>
                                </td>


                            </tr>

                            <tr>

                                <td>
                                    فایل پیوست
                                </td>
                                <td style='color:green;'>
                                    <b>
                                     <a href='https://arastowel.com/files/saved/$name'>دانلود فایل پیوست</a>

                                    </b>
                                </td>

                                <td>


                                </td>
                                <td style='color:green;'>
                                    <b>
                                    </b>
                                </td>


                            </tr>

");
        } else {
            $data = array('text' => "     <tr>
                                <td>
                                    نام و نام خانوادگی:
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->name
                                    </b>
                                </td>

                                <td>

                                    شماره تماس:
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->phone
                                    </b>
                                </td>

                            </tr>
                            <tr>
                                <td>

                                    ایمیل :
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->email
                                    </b>
                                </td>
                                <td>
                                    وب سایت
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->site
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    نوع حوله  :
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->service
                                    </b>
                                </td>
                                <td>
                                     نوع بافت :
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->type_product
                                    </b>
                                </td>

                            </tr>
                            <tr>

                                <td>
                                    تعداد
                                </td>
                                <td style='color:green;'>
                                    <b>
                                     $request->qty

                                    </b>
                                </td>

                                <td>

                                   توضیحات
                                </td>
                                <td style='color:green;'>
                                    <b>
                                        $request->message
                                    </b>
                                </td>


                            </tr>

                            </tr>
");
        }

//        Mail::send('mail', $data, function ($message) {
//            $message->to('ha.nasirzadeh@gmail.com', 'حوله ارس')->subject
//            ('سفارش حوله تبلیغاتی');
//            $message->from('orders@arastowel.com', 'حوله ارس');
//
//        });
        $pm = 'درخواست شما با موفقیت ارسال شدو همکاران ما در اسرع وقت با شما تماس خواهند گرفت';
        return view('order-form', compact('pm'));
    }

    public function freeshipping()
    {
        return view('freeshipping');

    }


    public function anargol()
    {
        $anargol = brand_page::where('page', 'anargol')->get();

        return view('anargol', compact('anargol'));

    }

    public function maysa()
    {
        return view('maysa');

    }

    public function error403()
    {
        return view('errors.403');
    }


    public function createInvoice(Request $request)
    {
        $isHack = 0;
        $user_ip = $this->getUserIp();
        $agent = new Agent();
        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
        foreach ($pre_order as $order) {

            $products = Product::find($order->product_id);
            $remain = $products->qty - $order->qty;
            if ($remain < 0) {
                $isHack = 1;
            }
            if ($order->qty <= 0) {
                $isHack = 1;
            }
        }
        if ($isHack == 0) {

            $invoice = new invoice();
            $invoice_number = mt_rand(10000000, 99999999);
            while (invoice::where('invoice_number', $invoice_number)->count() != 0) {
                $invoice_number = mt_rand(10000000, 99999999);
            }
            $invoice->invoice_number = $invoice_number;
            $invoice->user_id = Auth::user()->id;
            $invoice->pay_method = $request->bank_id;
            $number = mt_rand(10000000, 99999999);
            while (invoice::where('tracking_code', $number)->count() != 0) {
                $number = mt_rand(10000000, 99999999);
            }
            $invoice->tracking_code = $number;
            $invoice->status = 'در صف بررسی';
            /////for address
            ///
            ///
            ///
            $address_id = address::where('user_id', Auth::user()->id)->value('id');
            $address = address::find($address_id);
            $invoice->full_name = $address->name . ' ' . $address->last_name;
            $invoice->phone_number = $address->phone_number;
            $invoice->address = '  تهران- شهرستان ' . country::find($address->country_id)->name . '- شهر' . city::find($address->city_id)->name . '-' . $address->address . ' کد پستی :' . $address->postal_code;

            ///
            /// /////for address


            $invoice->save();

            $invoice_id = invoice::where('invoice_number', $invoice_number)->value('id');
            $invoice = invoice::find($invoice_id);


            $total_price = 0;
            $off_total_price = 0;
            foreach ($pre_order as $order) {

                $off_total_price += ($order->off_price * $order->qty);
                $total_price += ($order->price * $order->qty);
            }

            $gift = gift_card::where('user_id', Auth::user()->id)->where('used', 0)->where('in_pre', 1)->where('user_ip', $user_ip)->where('user_browser', $user_browser)->where('user_platform', $user_platform);

            if ($gift->count() == 0) {
                if ($off_total_price <= 500000) {

                    $invoice->post_price = 8000;
                    $invoice->transaction_amount = $off_total_price + 8000;

                } else {
                    $invoice->post_price = 0;
                    $invoice->transaction_amount = $off_total_price;
                }
            } else {
                if ($off_total_price <= 500000) {

                    $invoice->post_price = 8000;
                    $invoice->transaction_amount = 8000 + ($off_total_price * (100 - $gift->value('percent')) / 100);

                } else {
                    $invoice->post_price = 0;
                    $invoice->transaction_amount = $off_total_price * (100 - $gift->value('percent')) / 100;
                }

            }
            $invoice->save();

            foreach ($pre_order as $order) {
                $invoice_line_item = new invoice_line_item();
                $invoice_line_item->invoice_id = $invoice_id;
                $invoice_line_item->product_id = $order->product_id;
                $invoice_line_item->color_id = $order->color_id;
                $invoice_line_item->size_id = $order->size_id;
                $invoice_line_item->qty = $order->qty;
                $invoice_line_item->price = $order->price;
                $invoice_line_item->off_price = $order->off_price;
                $invoice_line_item->off_percent = $order->off_percent;
                $invoice_line_item->image = $order->image;
                $invoice_line_item->save();

                $products = Product::find($order->product_id);
                $remain = $products->qty - $order->qty;
                if ($remain < 0) {
                    $products->qty = 0;
                } else {
                    $products->qty = $remain;
                }
                $products->save();
                Pre_order::find($order->id)->delete();
            }

            $gift = gift_card::where('user_id', Auth::user()->id)->where('used', 0)->where('in_pre', 1)->where('user_ip', $user_ip)->where('user_browser', $user_browser)->where('user_platform', $user_platform);
            if ($gift->count() == 0) {
                if ($off_total_price <= 500000) {

                    $zarinpay = $off_total_price + 8000;

                } else {
                    $zarinpay = $off_total_price;
                }
            } else {
                if ($off_total_price <= 500000) {

                    $zarinpay = 8000 + $off_total_price * (100 - $gift->value('percent')) / 100;

                } else {
                    $zarinpay = $off_total_price * (100 - $gift->value('percent')) / 100;
                }
            }


            $text = '<table dir="rtl" style="font-size:11px;" width="98%" cellspacing="0" cellpadding="0" border="0" align="center">
                            <tbody>
                            <tr>
                                <td style="width:790px;vertical-align:top;text-align:right;">
                                    <div style="border:1px solid #3c3c3c;border-radius:5px;margin-left:8px;">
                                        <table dir="rtl" style="min-height:99px;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td rowspan="3" class="yiv1390015794buyer" style="width:34px;vertical-align:middle;">
                                                </td>
                                                <td style="width:200px;padding-right:10px;"><span style="font-weight:bold;">خریدار : ' . $address->name . ' ' . $address->last_name . '</span></td>
                                                <td style="width:150px;"><span style="font-weight:bold;">وضعیت پرداخت : </span></td>
                                                <td style="width:150px;"><span style="font-weight:bold;"></span></td>
                                                <td style="width:150px;"><span style="font-weight:bold;"></span></td>
                                            </tr>                                                    <tr>
                                                <td colspan="4" style="padding-right:10px;"><span style="font-weight:bold;">نشانی : </span>  تهران- شهرستان ' . country::find($address->country_id)->name . '- شهر' . city::find($address->city_id)->name . '-' . $address->address . '</td>
                                            </tr>
                                            <tr>
                                                <td style="min-width:200px;padding-right:10px;"><span style="font-weight:bold;">شماره تماس : </span>' . $address->phone_number . '</td>
                                                <td colspan="3"><span style="font-weight:bold;">کدپستی : </span>' . $address->postal_code . '</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                                <td style="width:192px;vertical-align:top;text-align:right;">
                                    <div style="border:1px solid #3c3c3c;border-radius:5px;">
                                        <table dir="rtl" style="min-height:99px;" width="100%" cellspacing="0" cellpadding="0" align="center">
                                            <tbody>
                                            <tr>
                                                <td style="font-size:11px;min-height:25px;padding:0 15px;font-weight:bold;">تاریخ : </td>
                                                <td>' . \Morilog\Jalali\CalendarUtils::strftime('d M Y', strtotime(invoice::find($invoice_id)->created_at)) . '</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:11px;min-height:25px;padding:0 15px;font-weight:bold;">شماره پیگیری : </td>
                                                <td>' . invoice::find($invoice_id)->tracking_code . '</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:11px;min-height:25px;padding:0 15px;font-weight:bold;">کد مشتری : </td>
                                                <td>' . Auth::user()->id . '</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <table dir="rtl" style="font-family:Tahoma;font-size:11px;text-align:center;border:1px solid #3c3c3c;" width="98%" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                            <tr style="background-color:#f0f0f0;">
                                <td style="border-bottom:1px solid #3c3c3c;padding:5px 0;width:30px;">کد محصول</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;width:200px;">نام محصول</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;width:30px;">تعداد</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;width:100px;">قیمت واحد(تومان)</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;width:100px;">قیمت کل(تومان)</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;width:30px;">تخفیف(درصد)</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;width:100px;">قیمت نهایی (تومان)</td>
                            </tr>';

            foreach ($pre_order as $order) {
                $pname = '<span>' . Product::find($order->product_id)->name . '</span>';

                if ($order->color_id != 0 && $order->size_id == 0) {
                    $pname .= ' <span>
                رنگ
                   ' . Color::find($order->color_id)->name . '</span>';
                } elseif ($order->color_id != 0 && $order->size_id != 0) {
                    $pname .= '<span>
                                                    رنگ

                                                    ' . Color::find($order->color_id)->name . '
                                                    </span>
                                                    <span>
                سایز
                                                    ' . size::find($order->size_id)->name . '
                                                    </span>';
                }
                $text .= '<tr>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;">' . $order->product_id . '</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;">' . $pname . '</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;text-align:right;">' . $order->qty . '</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;text-align:right;">' . number_format($order->price) . '</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;">' . number_format($order->price * $order->qty) . '</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;">' . $order->off_percent . '</td>
                                <td style="border-right:1px solid #3c3c3c;padding:5px 0;border-bottom:1px solid #3c3c3c;">' . number_format($order->off_price * $order->qty) . '</td>
                            </tr>';
            }
            $text .= '<tr style="background-color:#f0f0f0;">
                                <td colspan="4" style="border-top:1px solid #3c3c3c;text-align:right;padding-right:5px;min-height:30px;">
                                    <span style="width:137px;display:inline-block;">هزینه ارسال : ' . @number_format(invoice::find($invoice_id)->post_price) . ' تومان</span>
                                    <span style="width:136px;display:inline-block;">کارت هدیه :' . number_format($off_total_price * ($gift->value('percent')) / 100) . ' تومان</span>
                                </td>
                                <td colspan="2" style="font-weight:bold;font-size:11px;border-right:1px solid #3c3c3c;border-top:1px solid #3c3c3c;">جمع مبلغ کل پس از تخفیف و هزینه ارسال(تومان)</td>
                                <td style="border-right:1px solid #3c3c3c;border-top:1px solid #3c3c3c;">' . number_format(invoice::find($invoice_id)->transaction_amount) . '</td>
                            </tr>
                            </tbody>
                        </table>';
            if ($gift->count() != 0) {
                $giftupdate = gift_card::find($gift->value('id'));
                $giftupdate->used = 1;
                $giftupdate->save();
            }
            if ($request->bank_id == 'zarinpal') {

                $dataQuery = 'Amount=' . $zarinpay . '&callbackURL=' . route('pay-from-zarrin', [$invoice_number]) . '&InvoiceID=' . $invoice_number . '&TerminalID=98610186';
                $AddressServiceToken = "https://sepehr.shaparak.ir:8081/V1/PeymentApi/GetToken";
                $TokenArray = $this->makeHttpChargeRequest('POST', $dataQuery, $AddressServiceToken);
                $decode_TokenArray = json_decode($TokenArray);

                dd($decode_TokenArray);

//                $results = Zarinpal::request(
//                    route('pay-from-zarrin', [$invoice_number]),
//                    $zarinpay,
//                    'پرداخت فاکتور ' . $invoice_number,
//                    Auth::user()->email
//
//                );
//
//                Zarinpal::redirect(); // redirect user to zarinpal
//
//// after that verify transaction by that $results['Authority']
//                Zarinpal::verify('OK', 1000, $results['Authority']);


            } else {

                $data = array('text' => $text);

//                Mail::send('invoice-mail', $data, function ($message) {
//                    $message->to(Auth::user()->email, Auth::user()->name . ' ' . Auth::user()->last_name)->cc('ha.nasirzadeh@gmail.com')->subject
//                    ('اطلاعات سفارش - حوله ارس');
//                    $message->from('invoice@arastowel.com', 'حوله ارس');
//
//                });


                return redirect('/profile/order/' . $invoice_number);
            }
        } else {
            foreach ($pre_order as $order) {
                Pre_order::find($order->id)->delete();
            }
            return redirect('/');
        }
    }

    public function kave()
    {
        try {
            $sender = "100065995";
//            09147845149
            $receptor = ['09123973847'];
            $receptor = ['09125332797', '09123973847', '09029252323', '09116969391', '09125864908', '09167062701', '09100033977', '09183122553', '09113963351', '09173120267', '09382205039', '09149107838', '09103839100', '09125003658', '09122718242', '09143043260', '09331021397', '09155127513', '09149277889', '09144179324', '09121331044', '09124757467', '09197232770', '09197142538', '09010610552', '09123224910', '09390951093', '09121988748', '09216021576', '09144114969', '09149932340', '09143036192', '09177615156', '09122360007', '09126140575', '09122179156', '09123888241', '09366478773', '09385097560', '09125097560', '09111310895', '09121459246', '09381838784', '09122728960', '09383871681', '09194614046', '09142409400', '09133513471', '09039868737', '09309559972', '09393761522', '09352612615', '09121715442', '09108352859', '09391331044', '09359730104', '09146586589', '09013502178', '09147845149', '09148882025', '09307473703', '09029252323'];
            $message = "درود \n فصل ها را ورق زدیم تا به بهار برسیم.چه زییاست دمیدن شکوفه ها وزیباتر از آن روییدن گل لبخندبرلبهایتان.امیدوارم بهار زندگیتان سبز وخرم، چراغ دلتان روشن،خانه تان آبادان و نغمه سعادت بر زبانتان جاری باد. سال نو مبارک \nحوله ارس \nhttps://arastowel.com";
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


    public function emailMessage(Request $request)
    {
        $data = array('text' => '
                <p style="text-align: center">پیامک از طرف</p>
                <p style="text-align: center">' . $request->from . '</p>
                 <p style="text-align: center">به</p>
                <p style="text-align: center">' . $request->to . '</p>
                <p style="text-align: center">متن:</p>
                <p style="text-align: center">' . $request->message . '</p>

                ',
            'title' => 'دریافت پیامک',
            'subtitle' => 'در صورتی که مورد رخ داده بر خلاف چیزی است که شما انتظار دارید، از طریق شماره تماس های موجود در بخش تماس با ما به ما اطلاع دهید. با تشکر');
//        Mail::send('blank-mail', $data, function ($message) {
//            $message->to('ha.nasirzadeh@gmail.com')->subject
//            ('دریافت اس ام اس از مشتری- حوله ارس');
//            $message->from('reciever@arastowel.com', 'حوله ارس');
//        });

    }


    public function sendContactUs(Request $request)
    {

        $flag = 1;

        if (strpos($request->message, 'http') !== false) {
            $flag = 0;
        }
        if (substr($request->phone_number, 0, 2) !== "09") {
            $flag = 0;
        }
        if ($flag === 1) {
            $data = array('text' => '
                <p style="text-align: center">پیام از طرف</p>
                <p style="text-align: center">' . $request->name . '</p>
                 <p style="text-align: center">شماره تماس</p>
                <p style="text-align: center">' . $request->phone_number . '</p>
                  <p style="text-align: center">ایمیل</p>
                <p style="text-align: center">' . $request->email . '</p>
                <p style="text-align: center">متن:</p>
                <p style="text-align: center">' . $request->message . '</p>

                ',
                'title' => 'دریافت پیام تماس با ما',
                'subtitle' => 'در صورتی که مورد رخ داده بر خلاف چیزی است که شما انتظار دارید، از طریق شماره تماس های موجود در بخش تماس با ما به ما اطلاع دهید. با تشکر');
//            Mail::send('blank-mail', $data, function ($message) {
//                $message->to('ha.nasirzadeh@gmail.com')->subject
//                ('دریافت پیام تماس با ما- حوله ارس');
//                $message->from('reciever@arastowel.com', 'حوله ارس');
//            });
            if ($request->lang == 'en') {
                return redirect('/en/contact-us');
            } else {
                return redirect('/contact-us');
            }
        } elseif ($flag === 0) {
            if ($request->lang == 'en') {
                return redirect('/en');

            } else {
                return redirect('/');

            }
        }

    }

    public function makeHttpChargeRequest($_Method, $_Data, $_Address){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $_Address);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $_Method);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_Data);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;

    }
}




















