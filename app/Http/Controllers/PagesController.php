<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    
	public function about()
	{
		// $name = 'Carl Bradshaw';
		// return view('pages.about')->with([
		// 	'name' => $name
		// ]);

		// $data = [];
		// $data['name'] = 'Carl Bradshaw';
		// return view('pages.about', $data);

		$name = 'Carl Bradshaw';
		$people = ['tom', 'dick', 'harry'];
		return view('pages.about', compact('name', 'people'));

	}

	public function notabout()
	{
		return 'hi there';
	}

}
