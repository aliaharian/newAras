<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        foreach ($users as $user) {
            $user->additionalInformation;
        }
//        return response()->json($users);
        return view('admin.users.index', compact('users'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
//        $articles=DB::table('articles')->get();
        return redirect('/aras-admin/users');
    }

    public function loginAs($id)
    {
        Auth::loginUsingId($id);
        return redirect('/profile');

    }
}
