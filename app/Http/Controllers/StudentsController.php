<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Students;
use App\Models\Teachers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $students=Students::orderBy('name','asc')->paginate(5);
       $teachers=Teachers::all();
       return view('admin.students.index',compact('students','teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
      $student= new Students();
      $student->name=$request->name;
      $student->age=$request->age;
      $student->gender=$request->gender;
      $student->teacher_id=$request->teacher;
      $student->save();
      return redirect()->back()->with('success','Student Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($students)
    {
        $students=Students::find($students);
        $teachers=Teachers::all();
        return view('admin.students.edit',compact('students','teachers')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentRequest $request,$id)
    {
       $students=Students::find($id);
       $students->name=$request->name;
       $students->age=$request->age;
       $students->gender=$request->gender;
       $students->teacher_id=$request->teacher;
       $students->save();
       return redirect()->back()->with('success','Student Updated SuccessFully');
    }

   
    public function destroy($students)
    {
        Students::find($students)->delete();
        return redirect()->back()->with('success','Student Deleted successfully');
    }
}
