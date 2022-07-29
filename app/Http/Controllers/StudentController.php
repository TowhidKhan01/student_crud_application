<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use App\Models\User;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $productList = Product::with('CategoryData')->orderBy('id','desc')->get();
 
        // $student = Student::all();
        $students = Student::with('getUniversity')->orderBy('id','desc')->get();
        // insted of all we can use get()-->also can 
        // dd('hi');
        // $users = DB::select('select * from student');
        // return $student;
        return view('layouts.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestudentRequest $request)
    {
        // return $request;
        $student = new Student();
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->university_id = $request->university;
        $student->save();

        return "succes";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($student)
    {
        $user = Student::find($student);

        // $user = Student::where('id', $student)->with('getUniversity')->get();
        return view('contents.student_details',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        $editData = Student::find($student);
        // return $editData ;
        return view('contents.student_edit', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestudentRequest  $request
     * @param  \App\Models\student  $Student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {

        $data = Student::find($id);

        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;
        $data->email = $request->email;
        $data->university_id = $request->university;
        // $data ->password = bcrypt($request->password);

        dd($data);
        $data->save();

        // $notification = array(
        //     'message' => 'User Updated Succesfully',
        //     'alert-type' => 'info'

        // );
        // return redirect()->route('index')->with($notification);
        return "Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $Student
     * @return \Illuminate\Http\Response
     */
    public function destroy($student)
    {
        $user = Student::find($student);
        // return $user;
        $user->delete();
        // return redirect('layouts.index')->with("Delete Success");
    }
}
