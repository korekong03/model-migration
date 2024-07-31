<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SubjectGrade;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['students'] = Student::all();
        return view('students.index', $data);
       // return Student::all();
        //return Student::where('province', 'Nevada')->get();

       // return Student::where('province', 'Nevada')
            //->Where('fname', 'Yolanda')
          //  ->get();

          // return Student::where('province', 'Nevada')
           // ->orWhere('province', 'Louisiana')
           // ->orWhere('fname', 'Isaiah')
            //->get();

           // return Student::where('fname', 'like', '%t%')->get();
          // return Student::orderBY('fname')->get();
         // return Student::orderBY('fname', 'desc')->get();
         // return Student::orderBY('city', 'desc')->get();
         //return Student::limit(3)->get();
         //return Student::whereNotIn('id', [1,3,5,7,9])->get();
        // return Student::where('province','Vermont')->first();
        //return Student::with(['grades' => function($query){
          //  return $query->where('grade', '>=', 90);
       // }])->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'fname'=> 'required',
            'lname'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
            'city' => 'required',
            'province'=> 'required',
            'zip'=> 'required',
            'birthdate'=> 'required|date',
            
        ]);
        $student = new Student();
        $student ->fname        =$request['fname'];
        $student ->lname        =$request['lname'];
        $student ->email        =$request['email'];
        $student ->phone        =$request['phone'];
        $student ->address      =$request['address'];
        $student ->city         =$request['city'];
        $student ->province     =$request['province'];
        $student ->zip          =$request['zip'];
        $student ->birthdate    =$request['birthdate'];
        $student ->save();

        return redirect()->to('students');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //return Student::find($id);
        $student =Student::find($id);
        return $student->fullname;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['students'] = Student::all();
        return view('students.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::find($id);
        $student ->fname        =$request['fname'];
        $student ->lname        =$request['lname'];
        $student ->email        =$request['email'];
        $student ->phone        =$request['phone'];
        $student ->address      =$request['address'];
        $student ->city         =$request['city'];
        $student ->province     =$request['province'];
        $student ->zip          =$request['zip'];
        $student ->birthdate    =$request['birthdate'];
        $student ->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student ->delete();
        return redirect()->to('students');
    }
}
