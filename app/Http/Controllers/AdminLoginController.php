<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;


class AdminLoginController extends Controller {
    //
    public function index() {
        return view( 'admin.login' );
    }

    public function loginCheck( Request $request ) {
        $request->validate( [
            'email' => 'required',
            'password' => 'required'
        ] );
        $credentials = $request->only( 'email', 'password' );

        if ( Auth::guard( 'web' )->attempt( $credentials ) ) {
            return redirect()->route( 'admin.dashboard' );
        }
        return redirect()->route('admin.index')->with('msg', 'Login Credentials Does Not Match!!')->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.index');
    }

}
