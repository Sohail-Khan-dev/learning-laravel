<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return 'I am an Index of Lecture Function ';
//        return redirect()->route('lecture.create');
//        return view('lecture');
        // Passing Data using Array Method Passing Value s
//        return view('lecture',['name'=>'Sohail Khan Shinwari','address'=>'Landikotal KhyberpakhtoonKhwa.']);
        // Passing Data Using with Keyword
        $name = 'Sohail Khan';
//        return view('lecture')->with('name',$name)->with('address','Landikotal Khyber Agency');
        // Pass Data using compact Method to the View
        $name = 'Sohail Khan C';
        $address = 'Landikotal Khyber ';        // Variable Name should be same as in view and controller
        return view('lecture',compact('name','address'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        return 'I am Create in Lecture Function : ' ;
//        return redirect()->route('lecture.show',['id'=>"sohail"]);
//        return view('lecture');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'I am in Store lectrue Function ';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'I am in Show of Lecture Function ';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'I am in Edit of Lecture Function ';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'I am in Update of Lecture Function ';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'I am in Destroy of Lecture Function : ';
    }
}
