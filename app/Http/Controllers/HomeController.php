<?php
//*CONTROLLER OSPITI = GUEST
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewMail;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function contatti(){
        return view('guest.post.contatti');
    }


    
    public function sendcontact(Request $request){
        $data = $request->all();

        $newLead = new Lead();

        $newLead->fill($data);
        $newLead->save();
        Mail::to('davide@info.com')->send(new SendNewMail($newLead));

        return redirect()->route('validation')->with('status', 'Il messaggio é stato inviato correttamente, grazie per averci contattato');

    }

    


    public function contattoInviato(){
        return view('guest.post.messagevalidate');
    }
}
