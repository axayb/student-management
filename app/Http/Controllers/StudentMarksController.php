<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentMarkRequest;
use App\Models\StudentMarks;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentMarks=StudentMarks::paginate(5);
        $students=Students::all();
        return view('admin.student-marks.index',compact('studentMarks','students'));
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
    public function store(StoreStudentMarkRequest $request)
    {
        $studentMarks=new StudentMarks();
        $studentMarks->student_id=$request->student;
        $studentMarks->maths_marks=$request->maths_marks;
        $studentMarks->science_marks=$request->science_marks;
        $studentMarks->history_marks=$request->history_marks;
        $studentMarks->term=$request->term;
        $studentMarks->total_marks= $request->maths_marks+$request->science_marks+$request->history_marks;
        $studentMarks->save();
        return redirect()->back()->with('success','StudentMark Created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function show(StudentMarks $studentMarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studentMarks=StudentMarks::find($id);
        $students=Students::all();
        return view('admin.student-marks.edit',compact('studentMarks','students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $studentMarks=StudentMarks::find($id);
        $studentMarks->student_id=$request->student;
        $studentMarks->maths_marks=$request->maths_marks;
        $studentMarks->science_marks=$request->science_marks;
        $studentMarks->history_marks=$request->history_marks;
        $studentMarks->term=$request->term;
        $studentMarks->total_marks= $request->maths_marks+$request->science_marks+$request->history_marks;
        $studentMarks->save();
        return redirect()->back()->with('success','StudentMark Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentMarks=StudentMarks::find($id);
       $studentMarks->delete();
       return redirect()->back()->with('success','Student Created successfully');
    }
}
