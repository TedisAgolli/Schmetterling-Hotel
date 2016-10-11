<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\RoomAvailability;
use DB;
use Session;
use Hash;
use Carbon;

class RoomAvailabilityController extends Controller
{
    /**
     * Instantiate a new Controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $available = RoomAvailability::all();
        return view('admin.room_availability.index',compact('available'));
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
        $room_number = $request->input('roomnumber');
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        $note = $request->input('note');

        $now = Carbon\Carbon::now();

        if($startdate<$enddate) {

            $roomid = DB::select("select id from room WHERE roomnumber = $room_number", array());
            $id = $roomid[0]->id;

            DB::table('room_availability')->insertGetId(
                array('available' => 0, 'roomid' => $id, 'startdate' => $startdate, 'enddate' => $enddate, 'note' => $note)
            );
        }
        
        return Redirect::to('admin/room_availability');
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
        $room_availability = RoomAvailability::find($id);
        $room_availability->delete();

        return Redirect::to('admin/room_availability');
    }
}
