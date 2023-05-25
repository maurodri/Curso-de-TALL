<?php

namespace App\Http\Livewire;

use App\Models\Suscriber;
use Livewire\Component;

class Suscribers extends Component
{
    public $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];
    public function delete(Suscriber $suscriber){
        $suscriber->delete();
    }
    public function render()
    {

        $suscribers = Suscriber::where('email', 'like', "%{$this->search}%")->get();
        return view('livewire.suscribers')->with([
            'suscribers' => $suscribers ,
        ]);;
    }
}
