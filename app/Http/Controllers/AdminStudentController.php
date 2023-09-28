<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AdminStudentController extends Controller
{
    //
    public function index(){

    }

    public function store(Request $request){

    }

    public function show(){
        $student = Student::get();
        $data = compact('student');

        return view('admin.view_student')->with($data);
    }
}
