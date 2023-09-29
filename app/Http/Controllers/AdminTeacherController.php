<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminTeacherController extends Controller {
    //
    public function index() {
        return view( 'admin.add_teacher' );
    }

    public function store( Request $request ) {
        $request->validate( [
            'name' => 'required',
            'designation' => 'required',
            'email' => 'email|unique:teachers,email',
            'phone' => 'required|unique:teachers,phone|size:11',
        ] );
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->designation = $request->designation;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->password = Hash::make( '123456789' );
        $teacher->save();

        return redirect()->route( 'admin.teacher.show' )->with( 'msg', 'Teacher Registered Successfully!!' );
    }

    public function show() {
        $teacher = Teacher::paginate( 7 );
        $data = compact( 'teacher' );
        return view( 'admin.view_teacher' )->with( $data );
    }

    public function delete( $id ) {
        $teacher = Teacher::find( $id );
        if ( $teacher ) {
            $teacher->delete();
            return redirect()->route( 'admin.teacher.show' )->with( 'msg', 'Teacher Deleted Successfully' );
        }
        return redirect()->route( 'admin.teacher.show' )->with( 'msg', 'Teacher Not Found!!' );
    }

    public function changeStatus($id){
        // dd($request);
        $teacher = Teacher::find($id);
        if($teacher){
            $teacher->status = ($teacher->status == '0') ? '1' : '0';
            $teacher->save();
            return redirect()->route('admin.teacher.show')->with('msg', 'Status Changed');
        }
        return redirect()->route('admin.teacher.show')->with('msg', 'Error');
    }
}
