<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi as ModelsTransaksi;

class Laporan extends Component
{
    public $semuaTransaksi;

    public function mount()
    {
        $this->semuaTransaksi = ModelsTransaksi::all();
    }

    public function render()
    {
        $semuaTransaksi = Transaksi::where('status', 'selesai')->get();
        return view('livewire.laporan')->with([
            'semuaTransaksi' => $this->semuaTransaksi
        ]);
    }
}
