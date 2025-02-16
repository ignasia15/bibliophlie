{{-- <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head> --}}

<div>   
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')" 
                class="btn {{ $pilihanMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                Semua produk
                </button>
                <button wire:click="pilihMenu('tambah')" 
                class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                Tambah produk
                </button>
                <button wire:loading class="btn btn-info" disabled>
                    Loading...
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($pilihanMenu=='lihat')
                        <h4 class="card-title">Semua produk</h4>
                        <p class="card-description">Daftar semua produk yang tersedia.</p>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaProduk as $produk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $produk->kode }}</td>
                                    <td><img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}" width="50"></td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ $produk->harga }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>
                                        <button wire:click="pilihEdit({{ $produk->id }})" class="btn btn-sm btn-warning">Edit</button>
                                        <button wire:click="pilihHapus({{ $produk->id }})" class="btn btn-sm btn-danger">Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @elseif ($pilihanMenu=='tambah')
                        <h4 class="card-title">Tambah produk</h4>
                        <p class="card-description">Form untuk menambahkan produk baru.</p>
                        <form wire:submit.prevent="simpan" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Produk:</label>
                                <input type="text" class="form-control" wire:model="nama" required/>
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Kode / Barcode:</label>
                                <input type="text" class="form-control" wire:model="kode" required/>
                                @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga:</label>
                                <input type="number" class="form-control" wire:model="harga" required/>
                                @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Stok:</label>
                                <input type="number" class="form-control" wire:model="stok" required/>
                                @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Foto:</label>
                                <input type="file" class="form-control" wire:model="foto" required/>
                                @error('foto') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" wire:loading.attr="disabled">Simpan</button>
                        </form>
                        
                        @elseif ($pilihanMenu=='edit')
                        <h4 class="card-title">Edit produk</h4>
                        <p class="card-description">Form untuk mengedit produk yang dipilih.</p>
                        <form wire:submit.prevent="simpanEdit" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama Produk:</label>
                                <input type="text" class="form-control" wire:model="nama" required/>
                                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Kode / Barcode:</label>
                                <input type="text" class="form-control" wire:model="kode" required/>
                                @error('kode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga:</label>
                                <input type="number" class="form-control" wire:model="harga" required/>
                                @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Stok:</label>
                                <input type="number" class="form-control" wire:model="stok" required/>
                                @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label>Foto:</label>
                                <input type="file" class="form-control" wire:model="foto"/>
                                @error('foto') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3" wire:loading.attr="disabled">Simpan</button>
                            <button type="button" wire:click='batal' class="btn btn-secondary mt-3">Batal</button>
                        </form>
                        @elseif ($pilihanMenu=='hapus')
                        <div class="card border-danger">
                            <div class="card-header bg-danger text-white">
                                <h4>Hapus produk</h4>
                            </div>
                            <div class="card-body">
                                Anda yakin ingin menghapus produk ini?
                                <br/>
                                <p>Kode: {{$produkTerpilih->kode}}</p>
                                <p>Nama: {{$produkTerpilih->nama}}</p>
                                <button class="btn btn-danger" wire:click='hapus' wire:loading.attr="disabled">Hapus</button>
                                <button class="btn btn-secondary" wire:click='batal'>Batal</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>