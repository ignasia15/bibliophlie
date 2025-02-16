<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk as ModelProduk;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Produk extends Component
{
    use WithFileUploads;

    public $pilihanMenu = 'lihat';
    public $nama, $kode, $harga, $stok, $foto, $produkTerpilih;

    public function mount()
    {
        if (Auth::user()->peran != 'admin') {
            abort(403);
        }
    }

    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    public function pilihEdit($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->nama = $this->produkTerpilih->nama;
        $this->kode = $this->produkTerpilih->kode;
        $this->harga = $this->produkTerpilih->harga;
        $this->stok = $this->produkTerpilih->stok;
        $this->foto = $this->produkTerpilih->foto;
        $this->pilihanMenu = 'edit';
    }

    public function pilihHapus($id)
    {
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->pilihanMenu = 'hapus';
    }

    public function hapus()
    {
        $this->produkTerpilih->delete();
        $this->pilihanMenu = 'lihat';
    }

    public function batal()
    {
        $this->pilihanMenu = 'lihat';
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => 'required|min:9',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|file|max:1024', // 1MB Max
        ]);

        $fotoPath = $this->foto ? $this->foto->store('produk-foto', 'public') : null;

        ModelProduk::create([
            'nama' => $this->nama,
            'kode' => $this->kode,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'foto' => $fotoPath,
        ]);

        $this->pilihanMenu = 'lihat';
    }

    public function simpanEdit()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => 'required|min:9',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'foto' => 'nullable|max:1024', // 1MB Max
        ]);

        if ($this->foto) {
            $fotoPath = $this->foto->store('produk-foto', 'public');
            $this->produkTerpilih->update([
                'nama' => $this->nama,
                'kode' => $this->kode,
                'harga' => $this->harga,
                'stok' => $this->stok,
                'foto' => $fotoPath,
            ]);
        } else {
            $this->produkTerpilih->update([
                'nama' => $this->nama,
                'kode' => $this->kode,
                'harga' => $this->harga,
                'stok' => $this->stok,
            ]);
        }

        $this->pilihanMenu = 'lihat';
    }

    public function render()
    {
        return view('livewire.produk')->with(['semuaProduk' => ModelProduk::all(), 'pilihanMenu' => $this->pilihanMenu]);
    }
}
