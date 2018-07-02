<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;
use App\Blog;

class UsersController extends Controller
{
    public function showBlogList()	{
	    // show the list
	    $blogs = Blog::get();
	    $blogs = $blogs->sortByDesc("created_at")->take(5);     	
	    return View::make('index', ['blogs' => $blogs]);
	}

	public function showPaginatedBlogList()	{
	    // show the list with pagination
	    $blogs = Blog::orderBy("created_at","desc")->paginate(2);	
	    $links = $blogs->links();
        
        $links = str_replace('"pagination"', '"pagination pagination-lg"', $links);     	
	    return View::make('archive', ['blogs' => $blogs, 'links' => $links]);
	}

	public function showSingle($id)	{	 
		$blog_data = Blog::find($id);			
    	return View::make('single', ['blog' => $blog_data]);   
	}
}
