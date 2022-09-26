<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationTex;
use App\Models\HomeopathService;
use App\Models\User;

class FinanceController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:browse_finance']);
    }


    public function index()
    {
    	$data=LocationTex::all();

        return view('admin.finance.index',get_defined_vars());
    }
    public function homeopathRevenue()
    {
    	// $data=HomeopathService::with('ServiceBookings','homeopath')->get();
        $users = User::whereRole('homeopath')->orderBy('balance', 'DESC')->get();
    	// $data[0]->ServiceBookings->sum('price')
    	return view('admin.finance.revenue',get_defined_vars());
    }
}
