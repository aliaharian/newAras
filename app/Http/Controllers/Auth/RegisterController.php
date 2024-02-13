<?php

namespace App\Http\Controllers\Auth;

use App\Additional_information;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|persian_alpha',
            'last_name' => 'required|string|max:255|persian_alpha',
            'mobile' => 'required|iran_mobile|unique:additional_informations,phone_number',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //generate rand 4 digits
        $code = rand(pow(10, 4 - 1), pow(10, 4) - 1);

        //send sms

        $endpoint = 'https://api.kavenegar.com/v1/614B7A514F4D3067754C4668474E626358616C50356C47467343782B516C6A56/verify/lookup.json';
        $client = new \GuzzleHttp\Client();
        $receptor = $data["mobile"];
        $token = $code;
        $template = "verify";

        $response = $client->request('GET', $endpoint, [
            'query' => [
                'receptor' => $receptor,
                'token' => $token,
                'template' => $template,
            ]
        ]);
        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        if ($statusCode == 200) {

            $user = User::create([
                'name' => $data['name'],
                'last_name' => $data['last_name'],
//            'email' => $data['email'],
                'google_id' => $code,
                'password' => Hash::make($data['password']),
            ]);
            $additional = Additional_information::create([
                "user_id" => $user->id,
                "phone_number" => $data["mobile"]
            ]);

            return $user;
        }
        return back();


    }


}
