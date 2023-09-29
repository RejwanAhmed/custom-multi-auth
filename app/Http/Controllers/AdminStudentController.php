<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminStudentController extends Controller {
    //
    public function index() {
        return view( 'admin.add_student' );
    }

    public function store( Request $request ) {
        $request->validate( [
            'name' => 'required|',
            'session' => 'required|size:9',
            'roll' => 'required|integer|digits:8',
            'email' => 'required|unique:students,email',
            'phone' => 'required|size:11',
        ] );

        $student = new Student;
        $student->name = $request->name;
        $student->session = $request->session;
        $student->roll = $request->roll;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->password = Hash::make( '123456789' );

        $student->save();
        return redirect()->route( 'admin.student.show' )->with( 'msg', 'New Student Registered!' );
    }

    public function show() {
        $student = Student::paginate(7);
        $data = compact( 'student' );

        return view( 'admin.view_student' )->with( $data );
    }

    public function delete( $id ) {
        $studentId = Student::find( $id );

        if ( $studentId ) {
            $studentId->delete();
            return redirect()->route( 'admin.student.show' )->with( 'msg', "Student Deleted!!" );
        }
        return redirect()->route( 'admin.student.show' )->with( 'msg', "Student Not Found!!" );
    }
}
