<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\NewsLetterMail;
use Illuminate\Http\Request;
use App\Models\NewsLetterEmail;

class NewsLetterEmailController extends Controller
{
     public function index()
    {
    	$data=NewsLetterEmail::all();
    	return view('admin.newsletter_email.list',get_defined_vars());

    }


    public function save(Request $request)
	{

		$validate=$request->validate([
			'email'=>'required|email|unique:news_letter_emails',
		]);
          $prev_mail = NewsLetterEmail::where('email',$request->email)->first();
          if(!$prev_mail)
               NewsLetterEmail::create(['email'=>$request->email,]);
          return redirect()->back()->with('message','Thanks for subscribing to our newsletter.');

    }
    public function email_send(Request $request)
    {
          $this->validate($request,[
               'mail_file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf,doc,docs'
          ]);

          $path = 'uploads/newsletter';
          $name = time().'-'.str_replace(' ', '-', $request->mail_file->getClientOriginalName());
          $request->mail_file->move($path,$name);

          $path = asset('uploads/newsletter/'.$name);

         $users = NewsLetterEmail::all();
         foreach($users as $user)
          Mail::to($user)->send(new NewsLetterMail($path,$user));

         return redirect()->back()->with('message', 'Mail sent successfully.');

    }

    public function email_unsubscribe($mail)
    {
         NewsLetterEmail::where('email',$mail)->delete();
         return redirect()->route('index');
    }
}
