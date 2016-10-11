<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Guest;
use App\PaymentInfo;
use App\Room;
use App\Reservation;
use App\RoomReservation;
use App\Order;
use Input;
use Session;

class GuestController extends Controller
{
    public function login(Request $request)
    {
        // test if auth
        if (!$request->session()->has('userid')) {
            return view("guest_login");    	
        }
        
        return redirect('guest_landing');
    }

    public function loginauth(Request $request)
    {
        $guestname = $request->input('name');
        $credentials = $request->input('credentials');

        // find guest with that name 
        $guest = DB::table('guest')
            ->where('lastname', '=', $guestname)
            ->get();

        if (count($guest) != 1) {
            $request->session()->flash('alert', 'Login Err: there are either too many or not enough guests!');
            return redirect('guest_login');
        }

        // find payment info for that guest
        $cardnumbers = DB::table('payment_info')
            ->where('guestid', '=', $guest[0]->id)
            ->get(array('cardnumber'));

        if (count($cardnumbers) != 1) {
            $request->session()->flash('alert', 'Login Err: there are either too many or not enough credentials matching!');
            return redirect('guest_login');
        }
        
        $lastdigits = substr($cardnumbers[0]->cardnumber, strlen($cardnumbers[0]->cardnumber) - 4);


        // compare last 4 digits
        if (strcmp($lastdigits, $credentials) === 0) {
            session(['userid' => $guest[0]->id]);
            $request->session()->flash('alert', 'Login successfull!');
            return redirect('guest_landing');
        } 

        $request->session()->flash('alert', 'Login NOT successfull!');
        return redirect('guest_login');

    }

    public function guestLandingPage(Request $request)
    {
        // next line flushes session -> logs guest out (for debugging and dev)
        // $request->session()->flush();

        // test if auth
        if (!$request->session()->has('userid')) {
            return redirect('guest_login');
        }

        // delte booking in case there is a parameter in the url
        $cancelbookingid = Input::get('cancelbooking');
        if ($cancelbookingid > 0) {
            $result = Guest::cancelReservation($cancelbookingid);

            $request->session()->flash('alert', 'Booking canceled!');
            return redirect('guest_landing');
        }

        $reservations = Guest::allUpcommingReservations(session('userid'));
        
        $username = Guest::where('id', session('userid'))
            ->get(array('firstname', 'lastname'));

        return view('guest_landing')->with('reservations', $reservations)->with('username', $username);
        return $reservations;
    }

    public function search()
    {
		return view("rooms");    	
    }

    public function showRooms(Request $request)
    {
        // make request available in next request
        $request->flash();

        $checkin= $request->input('checkin');
        $checkout = $request->input('checkout');
        $guests = $request->input('guests');

        $rooms = Room::available($checkin, $checkout, $guests);

        // return $rooms;
		return view('show_rooms')->with('rooms', $rooms)
            ->with('checkin', $checkin)->with('checkout', $checkout)
            ->with('guests', $guests);
    }

    public function bookinginfo(Request $request)
    {
        Session::reflash();
        $checkin= Input::old()['checkin'];
        $checkout = Input::old()['checkout'];
        $guests = Input::old()['guests'];

        $roomid = $request->input('roomid');
        $priceid = $request->input('priceid');
        $total = $request->input('total');

        return view('bookinginfo')
            ->with('checkin', $checkin)->with('checkout', $checkout)->with('guests', $guests)
            ->with('roomid', $roomid)->with('total', $total)->with('priceid', $priceid);
    }

    public function sendbooking(Request $request)
    {
        // guest
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $guest = Guest::firstOrCreate(['firstname' => $firstname, 'lastname' => $lastname]);

        // payment info
        $cardtype = $request->input('cardtype');
        $cardnumber = $request->input('cardnumber');
        $expirationdate = $request->input('expirationdate');
        $payment_info = PaymentInfo::firstOrCreate(['creditcardtype' => $cardtype, 'cardnumber' => $cardnumber,
            'expirationdate' => $expirationdate, 'guestid' => $guest->id]);

        // reservation
        $checkin = $request->input('checkin');
        $checkout = $request->input('checkout');
        $guests = $request->input('guests');
        $note = $request->input('note');
        $reservation = Reservation::firstOrCreate([
            'checkin' => $checkin, 'checkout' => $checkout, 'adults' => $guests,
            'note' => $note, 'guestid' => $guest->id
        ]);

        // room reservation
        $roomid = $request->input('roomid');
        $room_reservation = RoomReservation::firstOrCreate(['roomid' => $roomid, 'reservationid' => $reservation->id]);

        // order
        $total = $request->input('total');
        $priceid = $request->input('priceid');
        $room_reservation = Order::firstOrCreate([
            'currentprice' => $total,
            'reservationid' => $reservation->id, 'priceid' => $priceid
        ]);

        $request->session()->flash('alert', 'Reservation successfull. We are looking forward to seeing you!');
        return redirect('/');
    }
}

