<?php

namespace App\Http\Controllers\Homeopath;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Crypt;
use App\Models\User;
use App\Models\ServiceBooking;


class CustomerController extends Controller
{
    public function index(Request $req)
    {

        $users = ServiceBooking::whereHomeopathId(Auth::id())->pluck('user_id');
        $users = User::whereIn('id', $users)->get();

        return view('homeopath.customers.index', get_defined_vars());
    }
}
