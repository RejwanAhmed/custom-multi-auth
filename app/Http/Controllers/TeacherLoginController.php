<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller {
    //
    public function index() {
        return view( 'teacher.login' );
    }

    public function loginCheck( Request $request ) {
        $request->validate( [
            'email' => 'email|required',
            'password' => 'required',
        ] );
        $teacher = Teacher::where( 'email', $request->email )->first();

        if ( $teacher ) {
            if ( $teacher->status == 1 ) {
                $credentials = $request->only( 'email', 'password' );
                if ( Auth::guard( 'teacher' )->attempt( $credentials ) ) {
                    return redirect()->route( 'teacher.dashboard' );
                }
            } else {
                return redirect()->route( 'teacher.index' )->with( 'msg', 'You dont have permission' )->withInput();
            }
        }
        return redirect()->route( 'teacher.index' )->with( 'msg', 'Credentials Does Not Match' )->withInput();
    }

    public function logout() {
        Auth::logout();
        return redirect()->route( 'teacher.index' );
    }
}
