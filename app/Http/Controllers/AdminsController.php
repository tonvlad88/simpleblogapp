<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Blog;

class AdminsController extends Controller
{
    public function showLogin()	{
	    // show the form
	    return View::make('admin-login');
	}

	public function doLogin() {
		// validate the info, create rules for the inputs
		$rules = array(
		    'user-id'    => 'required', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'username'     => Input::get('user-id'),
		        'password'  => Input::get('password')
		    );

		    // attempt to do the login
		    if (Auth::attempt($userdata)) {

		        // validation successful!		        
		        return Redirect::to('admin-list');		        
		    } else {        
		        // validation not successful, send back to form 
		        return Redirect::to('login')->with('error', 'Error')->withInput(Input::except('password'));
		    }

		}
	}

	public function showBlogList()	{

		if (!$user = Auth::check()) {
		    return Redirect::to('login');		     
		}

	    // show the list
	    $blogs = Blog::all()->sortByDesc("created_at");     	
	    return View::make('admin-list', ['blogs' => $blogs]);
	}

	public function showBlogPost($id) {	 
		if (!$user = Auth::check()) {
		    return Redirect::to('login');		     
		}

		if ($id == 'add') {
			return View::make('admin-post');	
		} else {
			$blog_data = Blog::find($id);			
    		return View::make('admin-post', ['blog' => $blog_data]);
		}	    
	}

	public function doBlogPost(Request $request, $id)  {		
		if (!$user = Auth::check()) {
		    return Redirect::to('login');		     
		}
		
		$this->validate($request,[
          'filename'=>['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048'],
          'title'=>'required',
          'contents'=>'required'          
        ]);        

        $inputimagename = time().'.'.$request->file('filename')->getClientOriginalExtension();            
        $request->filename->storeAs('public/uploads', $inputimagename);

        if ($id > 0) {
        	$blog = Blog::findOrFail($id);
        	print_r($blog);
        	//unlink the old image		               	
        	if (file_exists(storage_path('app/public/uploads/'.$blog->filename) )) {
        		unlink(storage_path('app/public/uploads/'.$blog->filename));
        	}	        

	    	$input = $request->all();
	    	$input['filename'] = $inputimagename;
	    	
	        $blog->fill($input)->save();		       

        	return redirect('/admin-list')->with('message', 'Blog successfully updated!');   

        } else {
        	// add data to the database
        	Blog::create([
	            'title' 	=>	request('title'),
	            'contents'	=>	request('contents'),
	            'filename'		=> 	$inputimagename,
           	]);	
        }

        return redirect('/admin-list');
    }


}
