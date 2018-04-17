<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('home');
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
    public function store(Request $request)
    {
		
		
		$file = $request->file('fileUpload');
		
		if(empty($file)){
		   $message = 'No file';
		   return view('error',compact('message'));
			}
		
		
		
	    $extension = File::extension($_FILES["fileUpload"]["name"]);
		
		
		Log::emergency($extension."bbbbbbbbbbb");

		
		
		
		// Check File Type
		 if ( $extension !== "xls") {
		   $message = 'Not the correct file type';
		   return view('error',compact('message'));
			}
				
		$filename = str_replace(" ","-",$_FILES["fileUpload"]["name"]);


		
		$target_file = public_path().'/uploads/'.$filename;
		// Save file
	 if (!move_uploaded_file($file, $target_file)) {
		$message ="move_uploaded_file failed";
		return view('error',compact('message'));
		}
		
	
	
	
	
	
	
	
	return redirect('/export-list');
	
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
