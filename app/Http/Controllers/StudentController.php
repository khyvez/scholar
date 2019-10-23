<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Relative;
use App\Address;
use App\Education;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $query = Student::first();
       // dd($query->relatives->all());
        /*
        $query =     DB::table('students')
            ->join('relatives', 'relatives.student_id', '=', 'students.id')
            ->join('addresses', 'addresses.student_id', '=', 'students.id')
            ->join('education', 'education.student_id', '=', 'students.id')
            ->get();

            dd($query);
            */
        $students = Student::all();
        
       return view('student', compact('students'));
       
    }
    public function getRelative(Request $request, $id)
    {
        $relative = Relative::where('student_id', $id)->get();
        return $relative;
    }
    public function getAddress(Request $request, $id)
    {
        $address = Address::where('student_id', $id)->get();
        return $address;
    }
    public function getEducation(Request $request, $id)
    {
        $education = Education::where('student_id', $id)->get();
        return $education;
    }
    public function deleteStudent(Student $student) {

        if($student) {
            $student->delete();
        }
        return 'Student Deleted';
    }

    public function getStudent(Request $request)
    {
        
        if ( $request->input('showdata') ) {
    	    return Student::orderBy('lastname', 'asc')->get();
            
    	}
        $columns = ['lastname', 'firstname', 'middlename', 'gender', 'contact'];
        $length = $request->input('length');
        $column = $request->input('column'); 
        $search_input = $request->input('search');

        //select('lastname', 'firstname', 'middlename', 'gender', 'contact')
        $query = Student::all()->orderBy($columns[$column]);
        
        if ($search_input) {
            $query->where(function($query) use ($search_input) {
                $query->where('lastname', 'like', '%' . $search_input . '%')
                ->orWhere('firstname', 'like', '%' . $search_input . '%');
                 });
        }

        $data = $query->paginate($length);
        return ['data' => $data];
 
    }
    public function create()
    {
        return view('create_student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request->all());
         $student = new Student();

        //$student = Student::create($request->all());
       // $id = $student->id;

        $student->lastname = $request->lastname;
        $student->firstname = $request->firstname;
        $student->middlename = $request->middlename;
        $student->birthdate = $request->birthdate;
        $student->gender = $request->gender;
        $student->birthplace = $request->birthplace;
        $student->contact = $request->contact;
        $student->email = $request->email;
        $student->save();

        $id = $student->id;
        $relative = new Relative();
        $relative->student_id = $student->id;
        $relative->firstname = $request->ffirstname;
        $relative->middlename = $request->fmiddlename;
        $relative->lastname = $request->flastname;
        $relative->type = 'father';
        $relative->save();
        
        $relative = new Relative();
        $relative->student_id = $student->id;
        $relative->firstname = $request->mfirstname;
        $relative->middlename = $request->mmiddlename;
        $relative->lastname = $request->mlastname;
        $relative->type = 'mother';
        $relative->save();
        




        return redirect()->route('address.create', compact('id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $student = Student::find($id);
        
        $student->lastname = $request->lastname;
        $student->firstname = $request->firstname;
        $student->middlename = $request->middlename;
        $student->birthdate = $request->birthdate;
        $student->gender = $request->gender;
        $student->birthplace = $request->birthplace;
        $student->contact = $request->contact;
        $student->email = $request->email;
        $student->save();
        return "Succesfully updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
