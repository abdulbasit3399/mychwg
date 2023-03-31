<?php

namespace App\Http\Controllers\Admin;

use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DiscountController extends Controller
{
    public function index()
    {
        $codes = Discount::orderBy('id','DESC')->get();
        return view('admin.discount.index', get_defined_vars());
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'code' =>'required',
            'validity' =>'required',
        ]);

        $prev_disc = Discount::where('code',$request->code)->first();
        if($prev_disc)
            return back()->withError('Discount Code already exist.');

        $code = new Discount();
        $code->code = $request->code;
        $code->type = $request->type;
        $code->value = $request->value;
        $code->validity = $request->validity;
        $code->status = $request->status;
        $code->save();

        return redirect()->route('admin.discount-code')->with('message', 'Discount code added successfully.');
    }
    public function discount_toggle(Request $request)
    {
        $code = Discount::find($request->checkboxId);
        $code->status = $request->isChecked == 'true' ? 1 : 0;
        $code->save();
    }
}
