<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use App\Models\Suscriber;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Livewire\Component;

class LandingPage extends Component
{
    public $email;
    public $showSuscriber = false;
    public $showSuccess = false;

    protected $rules = [
        'email' => 'required|email:filter|unique:suscribers,email',
    ];

    public function mount(Request $request)
    {
        if ($request->has('verified') && $request->verified == 1) {
            $this->showSuccess = true;
        }
    }

    public function suscribe()
    {
        $this->validate();

        DB::transaction(function() {
            $suscriber = Suscriber::create([
                'email' => $this->email,
            ]);

            $notification = new VerifyEmail;

            $notification::createUrlUsing(function($notifiable) {
                return URL::temporarySignedRoute(
                    'suscribers.verify',
                    now()->addMinutes(30),
                    [
                        'suscriber' => $notifiable->getKey(),
                    ]
                );
            });

            $suscriber->notify($notification);
        }, $deadlockRetries = 5);


        $this->reset('email');
        $this->showSuscriber = false;
        $this->showSuccess = true;
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}












