<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Notifications\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;



class NotifiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        return view('product');
    }
    
    public function sendOfferNotification() {
        $userSchema = User::first();
  
        $offerData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
  
        Notification::send($userSchema, new Admin($offerData));
   
        dd('Task completed!');
    }
}
