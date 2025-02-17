<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class Laporan extends Component
{
    public $semuaTransaksi;

    public function mount()
    {
        if (Auth::user()->peran != 'admin') {
            abort(403);
        }

        $this->semuaTransaksi = Transaksi::all();
    }

    public function render()
    {
        return view('livewire.laporan');
    }
}
