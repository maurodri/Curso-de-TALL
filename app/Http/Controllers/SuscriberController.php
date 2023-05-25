<?php

namespace App\Http\Controllers;

use App\Models\Suscriber;
use Illuminate\Http\Request;

class SuscriberController extends Controller
{
    public function all()
    {
        return view('suscribers.all');
    }
    public function verify(Suscriber $suscriber)
    {
        if(! $suscriber->hasVerifiedEmail()){
            $suscriber->markEmailAsVerified();
        }

        return redirect('/?verified=1');
    }
}
