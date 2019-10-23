<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;
use Alert;
class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->id;
        return view('create_education', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //dd($request->all());
        $education = new Education();
        $education->student_id = $request->student_id;
        $education->attainment = 'Elementary';
        $education->name = $request->name1;
        $education->period_from = $request->period_from1;
        $education->period_to = $request->period_to1;
        $education->graduate = $request->graduate1;
        $education->course = $request->course1;
        $education->degree = $request->degree1;
        $education->status = 1;
        $education->save();

        $education = new Education();
        $education->student_id = $request->student_id;
        $education->attainment = 'High School';
        $education->name = $request->name2;
        
        $education->period_from = $request->period_from2;
        $education->period_to = $request->period_to2;
        $education->graduate = $request->graduate2;
        $education->course = $request->course2;
        $education->degree = $request->degree2;
        $education->status = 1;
        $education->save();

        $education = new Education();
        $education->student_id = $request->student_id;
        $education->attainment = 'College';
        $education->name = $request->name3;

        $education->period_from = $request->period_from3;
        $education->period_to = $request->period_to3;
        $education->graduate = $request->graduate3;
        $education->course = $request->course3;
        $education->degree = $request->degree3;
        $education->status = 1;
        $education->save();

        Alert::success('Success Title', 'Success Message');

        return view('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        //
    }
}
