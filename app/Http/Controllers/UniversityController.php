<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;


class UniversityController extends Controller
{
    public function viewUniversity()
    {
        
        $university = University::all();
        // return $university;
        return view('contents.university.view_university', compact('university'));
    }
    public function addUniversity()
    {
        return view('contents.university.add_university');
    }
    public function storeUniversity(Request $request)
    {
        // return $request;
        $university = new University();
        $university->university_name = $request->university_name;
        $university->save();

        return "succes";
    }

    public function view_all_students(){
        $university = University::with('getStudents')->orderBy('id','desc')->get();
        // getUniversity->university_name
        dd($university->getStudents);
        // return view('contents.student_details',compact('user'));
    }
    
}
