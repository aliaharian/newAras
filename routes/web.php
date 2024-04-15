<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \Illuminate\Support\Facades\Redirect;


//indexable routes
Route::group(['middleware' => 'viewTracker'], function() {

    Route::domain(env('APP_DEV_URL'))->group(function () {
        Route::get('checkFactor', "mainController@smsFactor");
        Route::any('/', function(){
            echo ":)";
        });
        Route::any('/{path?}', function(){
            echo ":)";
        });
    });


    Route::get('/', 'mainController@index')->name('index');
    Route::get('product', 'mainController@shop')->name('shop');
    Route::get('products/category/{category}', 'mainController@shopCategory')->name('shop.category');
    Route::get('product/{product_id}/{product_name}', 'mainController@showProduct')->name('shop.product');
    Route::get('blog', 'mainController@blog')->name('blog');
    Route::get('blog/{blog_id}/{blog_title}', 'mainController@showPost')->name('blog.post');
    Route::get('blog/{blog_id}', 'mainController@showShortPost')->name('blog.shortpost');
    Route::get('blog/search/tag/{tag_name}', 'mainController@blogByTag')->name('blog.tagSearch');
    Route::get('blog/search', 'mainController@blogsearch')->name('blog.msearch');
    Route::get('about-us', 'mainController@aboutUs')->name('about-us');
    Route::get('gift-pack', 'mainController@giftPack')->name('gift-pack');
    Route::get('promotional-towels', 'mainController@promotionalTowels')->name('promotional-towels');
    Route::get('promotional-towels/{product_id}/{product_name}', 'mainController@promoDetail')->name('promo.detail');

    Route::get('promotional-archive', 'mainController@promotionalArchive')->name('promotional-archive');
    Route::get('order-promotional-towels', 'mainController@orderForm')->name('order-promotional-towels');
    Route::get('freeshipping', 'mainController@freeshipping')->name('freeshipping');
    Route::get('shopping-steps', function () {
        return view('shopping-steps');
    })->name('shopping-steps');
    Route::get('product-return', function () {
        return view('product-return');
    })->name('product-return');
    Route::get('contact-us', 'mainController@contactUs')->name('contact-us');


    //english pages
    Route::group(['prefix' => 'en'], function() {
        Route::get('/', 'EnglishController@index')->name('en-index');
        Route::get('about-us', 'EnglishController@aboutUs')->name('en-about-us');
        Route::get('contact-us', 'EnglishController@contactUs')->name('en-contact-us');
        Route::get('product', 'EnglishController@shop')->name('en-shop');
        Route::get('products/category/{category}', 'EnglishController@shopCategory')->name('en-shop.category');
        Route::get('promotional-towels', 'EnglishController@promotionalTowels')->name('en-promotional-towels');
        Route::get('gift-pack', 'EnglishController@giftPack')->name('en-gift-pack');

        Route::get('blog', 'EnglishController@blog')->name('en.blog');

        Route::get('blog/{blog_id}/{blog_title}', 'EnglishController@showPost')->name('en.blog.post');
        Route::get('blog/{blog_id}', 'EnglishController@showShortPost')->name('en.blog.shortpost');
        Route::get('blog/search/tag/{tag_name}', 'EnglishController@blogByTag')->name('en.blog.tagSearch');
    });


    //arabic pages
    Route::group(['prefix' => 'ar'], function() {
        Route::get('/', 'ArabicController@index')->name('ar-index');
        Route::get('about-us', 'ArabicController@aboutUs')->name('ar-about-us');
        Route::get('contact-us', 'ArabicController@contactUs')->name('ar-contact-us');
        Route::get('product', 'ArabicController@shop')->name('ar-shop');
        Route::get('products/category/{category}', 'ArabicController@shopCategory')->name('ar-shop.category');
        Route::get('promotional-towels', 'ArabicController@promotionalTowels')->name('ar-promotional-towels');
        Route::get('gift-pack', 'ArabicController@giftPack')->name('ar-gift-pack');

        Route::get('blog', 'ArabicController@blog')->name('ar.blog');

        Route::get('blog/{blog_id}/{blog_title}', 'ArabicController@showPost')->name('ar.blog.post');
        Route::get('blog/{blog_id}', 'ArabicController@showShortPost')->name('ar.blog.shortpost');
        Route::get('blog/search/tag/{tag_name}', 'ArabicController@blogByTag')->name('ar.blog.tagSearch');
    });



    });

//post requests in mainController
Route::post('send-promotional-form','mainController@sendPromotionalForm')->name('send-promotional-form');


//ordering spteps
Route::group(['middleware' => ['auth', 'verified','address','orders']], function() {
    Route::get('shipping','mainController@shipping')->name('shipping');
    Route::post('/invoice/create','mainController@createInvoice')->name('add-invoice');
    Route::post('/order/pay','mainController@payFromGateway')->name('pay-from-gateway');
});
Route::group(['middleware' => ['orders']], function() {
    Route::get('cart','mainController@cart')->name('cart');
    Route::post('loadCartAsync','AjaxController@loadCartAsync')->name('loadCartAsync');
    Route::post('add-gift','mainController@addGift')->name('add-gift');
    Route::put('delete-gift','mainController@deleteGift')->name('delete-gift');
});




//admin panel routes
Route::group(['prefix'=>'aras-admin','middleware' => ['auth','adminAuth']], function(){
    //index and profile
    Route::get('', 'AdminController@index')->name('admin.index');
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');

    /////////////////////////////////products create
    Route::resource('products','ProductsController', [
        'except' => [ 'show' ]
    ]);
    Route::get('product/search', 'ProductsController@search')->name('products.search');
    Route::get('product/promote/{id}', 'ProductsController@promote')->name('products.promote');
    Route::get('product/type/{type}', 'ProductsController@type')->name('products.type');
    /////////////////////////////////invoice display
    Route::resource('invoices','invoiceController', [
        'except' => [ 'create','store','edit' ]
    ]);
        Route::get('invoice/type/{type}', 'invoiceController@type')->name('invoices.type');
    /////////////////////////////////gift cards
    Route::resource('gifts','giftController', [
        'except' => ['show','edit','create']
    ]);
    /////////////////////////////////instagram posts
    Route::resource('instagramPosts','InstagramPostsController', [
        'except' => ['show','create']
    ]);
    /////////////////////////////////users
    Route::resource('users','usersController', [
        'except' => ['show','create','store','edit','update']
    ]);
    Route::post("users/loginAs","usersController@loginAs")->name("users.loginAs");
    /// /////////////////////////////prod. color

    Route::resource('colors','ColorController', [
        'except' => [ 'show','create' ]
    ]);
    Route::get('color/search', 'ColorController@search')->name('colors.search');
    /////////////////////////////////prod. size

    Route::resource('sizes','SizeController', [
        'except' => [ 'show','create' ]
    ]);
    Route::get('size/search', 'SizeController@search')->name('sizes.search');

    /////////////////////////////////blog posts
    Route::resource('blog','BlogController', [
        'except' => [ 'show' ]
    ]);
    Route::get('blog/search', 'BlogController@search')->name('blog.search');
    Route::get('blogs/type/{type}', 'BlogController@type')->name('blog.type');
    /////////////////////////////////blog tags
    Route::resource('tags','TagController', [
        'except' => [ 'show','create' ]
    ]);
    Route::get('tag/search', 'TagController@search')->name('tags.search');

    //promo and gift towels
    Route::resource('towels','TowelController', [
        'except' => [ 'show','create' ]
    ]);
    Route::get('towel/search', 'TowelController@search')->name('towels.search');


    //takhfif vije
    Route::get('product/special', 'AdminController@special')->name('special.index');
    Route::post('product/special', 'AdminController@specialStore')->name('special.store');
    Route::delete('product/special/{special}', 'AdminController@specialDestroy')->name('special.destroy');


    //////campaign
    Route::get('campaign', 'AdminController@campaign')->name('campaign');
    Route::delete('campaign/{campaign}', 'AdminController@deleteCampaign')->name('campaign.destroy');

    //////newsletter
    Route::get('newsletter', 'AdminController@newsletter')->name('shownewsletter');

    //////analytics
    Route::get('analytics', 'AdminController@analytics')->name('analytics');

    //////single_analytics
    Route::get('analytics/{selected_url}', 'AdminController@single_analytics')->name('single_analytics');


    ///all visits
    Route::get('visits',function (){
       $visits=\App\viewTracker::orderBy('id','DESC')->simplePaginate(100);
       return view('admin.visits',compact('visits'));
    });

    //////template settings
    Route::resource('template','templateController', [
        'except' => [ 'show','create','store','destroy' ]
    ]);
});



//user panel routes
Route::group(['prefix'=>'profile','middleware'=>['auth','verified']], function() {
    Route::get('', 'ProfileController@index')->name('profile.index');
    Route::get('order-tracking', 'ProfileController@orderTracking')->name('profile.order-tracking');
    Route::get('orders', 'ProfileController@orders')->name('profile.orders');
    Route::get('favorites', 'ProfileController@favorites')->name('profile.favorites');
    Route::delete('favorites/{product}', 'ProfileController@destroyFavorites')->name('favorites.destroy');
    Route::get('giftcards', 'ProfileController@giftcards')->name('profile.giftcards');
    Route::get('addresses', 'ProfileController@addresses')->name('profile.addresses');
    Route::get('personal-info', 'ProfileController@personalInfo')->name('profile.personal-info');
    Route::put('edit-personal-info', 'ProfileController@editPersonalInfo')->name('edit-personal-info');
    Route::get('additional-info', 'ProfileController@additionalInfo')->name('profile.additional-info');
    Route::get('order/{invoice_number}', 'ProfileController@orderDetail')->name('profile.order-detail');
    Route::get('reset-password', 'ProfileController@resetPassword')->name('profile.reset-password');
    Route::put('changepass', 'ProfileController@changepass')->name('profile.changepass');
    Route::get('addresses/add', 'ProfileController@addAddress')->name('profile.address.add');
    Route::post('addresses/add/{callback}', 'ProfileController@storeAddress')->name('profile.address.store');
    Route::get('addresses/edit', 'ProfileController@editAddress')->name('profile.address.edit');
    Route::put('addresses', 'ProfileController@updateAddress')->name('profile.address.update');
    Route::delete('addresses/delete', 'ProfileController@destroyAddress')->name('profile.address.destroy');
    Route::get('show-order', 'ProfileController@sendOrderTrack')->name('send-orderTrack');
    Route::get('pay-redirect/{invoice_number}', 'ProfileController@payFromZarrin')->name('pay-from-zarrin');
    Route::post('pay-redirect/{invoice_number}', 'ProfileController@payFromZarrin')->name('pay-from-zarrin');
});



//ajax routes
Route::post('loadPrice','AjaxController@loadPrice')->name('loadPrice');
Route::post('addToCart','AjaxController@addToCart')->name('addToCart');
Route::post('deleteFromCart','AjaxController@deleteFromCart')->name('deleteFromCart');
Route::get('addToWishlist','AjaxController@addToWishlist')->name('addToWishlist');
Route::get('selectCountry','AjaxController@selectCountry')->name('selectCountry');
Route::get('selectCity','AjaxController@selectCity')->name('selectCity');
Route::get('newsletter','AjaxController@newsletter')->name('newsletter');
Route::get('php-file',function (){
    return view('php-file');
})->name('php-file');

Route::get('more-info',function (){
    if (isset($_GET['variable'])) {
        return view('ajax.more-info');
    }
    else{
        return abort('403');
    }
})->name('more-info');

Route::get('check-campaign','AjaxController@checkCampaign')->name('check-campaign');
Route::get('check-campaign-code','AjaxController@checkCampaignCode')->name('check-campaign-code');
Route::get('send-campaign-gift','AjaxController@sendCampaignGift')->name('send-campaign-gift');



//Auth routes
Auth::routes(['verify' => true]);

Route::get('/register','Auth\RegisterController@index')->name('register');
Route::get('/register/{promo}','Auth\RegisterController@index')->name('registerPromo');
Route::post('confirm-sms','Auth\VerificationController@confirmSms')->name('confirmSms');





//redirect 301
Route::get('/gift-towels', function(){
    return Redirect::to('/gift-pack', 301);
});

Route::get('/sport-towels', function(){
    return Redirect::to('/product', 301);
});

Route::get('/accessories', function(){
    return Redirect::to('/product', 301);
});

Route::get('/gallery', function(){
    return Redirect::to('/product', 301);
});
Route::get('/products', function(){
    return Redirect::to('/product', 301);
});

Route::get('/dyeing-and-finishing', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/towels', function(){
    return Redirect::to('/product', 301);
});

Route::get('/bathrobe-towels', function(){
    return Redirect::to('/products/category/bathrobe-towel', 301);
});

Route::get('/kids-towels', function(){
    return Redirect::to('/products/category/kids-towel', 301);
});

Route::get('/lifestyle', function(){
    return Redirect::to('/blog', 301);
});


Route::get('/lifestyle-single.php', function(){
    return Redirect::to('/blog', 301);
});

Route::get('/products---fa.html', function(){
    return Redirect::to('/product', 301);
});


Route::get('/about---fa.html', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/contact-us---fa.html', function(){
    return Redirect::to('/contact-us', 301);
});


Route::get('/promotional-towel---fa.html', function(){
    return Redirect::to('/promotional-towels', 301);
});

Route::get('/kids-towels.html', function(){
    return Redirect::to('/products/category/kids-towel', 301);
});


Route::get('/dyeing---fnishing---fa.html', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/towels---en.html', function(){
    return Redirect::to('/product', 301);
});


Route::get('/arastowel---en.html', function(){
    return Redirect::to('/', 301);
});

Route::get('/accessoris.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/products---en.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/gallery---en.html', function(){
    return Redirect::to('/', 301);
});

Route::get('/accessoris---en.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/about-us---en.html', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/kids-towels---en.html', function(){
    return Redirect::to('/products/category/kids-towel', 301);
});


Route::get('/promotional-towel---en.html', function(){
    return Redirect::to('/promotional-towels', 301);
});

Route::get('/gift-towels---en.html', function(){
    return Redirect::to('/gift-pack', 301);
});

Route::get('/sport-towels--en.html', function(){
    return Redirect::to('/product', 301);
});


Route::get('/contact-us---en.html', function(){
    return Redirect::to('/contact-us', 301);
});

Route::get('/dyeing---fnishing---en.html', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/gift-towels.php', function(){
    return Redirect::to('/gift-pack', 301);
});


Route::get('/bathrob-towel.php', function(){
    return Redirect::to('/product', 301);
});

Route::get('/product/188/محصول-تست', function(){
    return Redirect::to('/product', 301);
});

Route::get('/dyeing-and-fnishing', function(){
    return Redirect::to('/promotional-towels', 301);
});
Route::get('/towels.html', function(){
    return Redirect::to('/promotional-towels', 301);
});
Route::get('/towels.php', function(){
    return Redirect::to('/product', 301);
});

Route::get('/order-form', function(){
    return Redirect::to('/order-promotional-towels', 301);
});

Route::get('/sport-towels.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/gallery---fa.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/gift-towels.html', function(){
    return Redirect::to('/gift-pack', 301);
});

Route::get('/bathrob-towel.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/kids-towels.php', function(){
    return Redirect::to('/products/category/kids-towel', 301);
});
Route::get('/home', function(){
    return Redirect::to('/', 301);
});
Route::get('/404', function(){
    return Redirect::to('/', 301);
});
Route::get('/promotional-towel---fa.php', function(){
    return Redirect::to('/promotional-towels', 301);
});
Route::get('/about---fa.php', function(){
    return Redirect::to('/about-us', 301);
});
Route::get('/bathrob-towel---en.html', function(){
    return Redirect::to('/products/category/bathrobe-towel', 301);
});



//tests
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');
Route::get('zarrin','ZarrinController@pay');
Route::get('show-colors',function (){
    return view('all-colors');
});



Route::get('kave','mainController@kave');

Route::get('email-message','mainController@emailMessage');

////contactUs
Route::post('send-contact-us','mainController@sendContactUs')->name('mail-contact-us');

Route::get('valentineOffer',function (){
    return view('mailt');
});


//sitemap
Route::get('sitemap','SitemapController@mainSite');


//etc
Route::get('403','mainController@error403')->name('403');
Route::get('anargoltowel','mainController@anargol')->name('anargol');
Route::get('maysatowel','mainController@maysa')->name('maysa');

Route::get('auth/google', 'oauth@redirectToProvider');
Route::get('auth/google/callback', 'oauth@handleProviderCallback');

Route::get('/winter', function(){
    return view('campain.ended');
});

Route::get('/valentine97', function(){
    return view('campain.ended');
});

Route::get('/newroz98', function(){
    return view('campain.index');
})->name('newroz98');


Route::get('migrate', function () {
    Artisan::call('migrate');
    die('migrate complete');

});


Route::get('add_date', function () {
    $begin = new DateTime('2019-12-18');
    $end = new DateTime('2020-02-09');

    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end);

    foreach ($period as $dt) {
        $ip_array=array('127.0.0.2');
        $count=0;
        $visits=\App\viewTracker::where('visited_date',$dt->format("d-m-Y"))->where('is_robot',0)->get();
        foreach ($visits as $visit){
            if (!in_array($visit->user_ip,$ip_array)){
                $count++;
                array_push($ip_array,$visit->user_ip);
            }
        }

        $visit=new \App\daily_visit();
        $visit->count=$count;
        $visit->created_at=$dt->format("Y-m-d H:i:s");
        $visit->updated_at=$dt->format("Y-m-d H:i:s");
        $visit->save();

        echo $dt->format("Y-m-d H:i:s").' : '.$count.'<br>';
    }

});


Route::get('getFile/{filename}.{extension}', 'mainController@showImage')->where(['filename' => '.*', 'extension' => '.*'])->name('image.show');

Route::get("createKey",function(){
    $privkey = openssl_pkey_new(array(
        "digest_alg"=>'md5',
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ));
    $key_details = openssl_pkey_get_details($privkey);
    print_r($key_details["key"]);
});
