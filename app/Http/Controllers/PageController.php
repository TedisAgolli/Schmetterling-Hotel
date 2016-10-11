<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('index');
    }
	
	public function getBooking()
	{
		return view('booking');
	}
	
	 public function getAmenities()
   {
       return view ('amenities');
   }
}
