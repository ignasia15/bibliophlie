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
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head> --}}
<div>
   
    <div class="container">
        <div class="row my-2">
            <div class="col-12">
                <button wire:click="pilihMenu('lihat')" 
                class="btn {{ $pilihanMenu=='lihat' ? 'btn-primary' : 'btn-outline-primary' }}">
                Semua Pengguna
                </button>
                <button wire:click="pilihMenu('tambah')" 
                class="btn {{ $pilihanMenu=='tambah' ? 'btn-primary' : 'btn-outline-primary' }}">
                Tambah Pengguna
                </button>
                <button wire:loading class="btn btn-info">
                    Loading...
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($pilihanMenu=='lihat')
                <div class="card border-primary">
                    <div class="card-header">
                        <h4>Semua Pengguna</h4>
                    </div>
                    <div class="card-body">
                       <table class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Email</th>
                                   <th>Peran</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($semuaPengguna as $pengguna)
                               <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $pengguna->name }}</td>
                                   <td>{{ $pengguna->email }}</td>
                                   <td>{{ $pengguna->peran }}</td>
                                   <td>
                                       <button wire:click="pilihEdit({{ $pengguna->id }})" class="btn btn-sm btn-warning">Edit</button>
                                       <button wire:click="pilihHapus({{ $pengguna->id }})" class="btn btn-sm btn-danger">Hapus</button>
                                   </td>
                               </tr>
                               @endforeach
                           </tbody>

                       </table>
                    </div>
                </div>
                @elseif ($pilihanMenu=='tambah')
                <div class="card border-primary">
                    <div class="card-header">
                        <h4>Tambah Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit="simpan">
                            <label>Nama : </label>
                            <input type="text" class="form-control" wire:model="nama"/>
                            @error('nama') <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br />
                            <label>Email : </label>
                            <input type="email" class="form-control" wire:model="email"/>
                            @error('email') <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br/>
                            <label>Password : </label>
                            <input type="password" class="form-control" wire:model="password"/>
                            @error('password') <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br/>
                            <label>Peran : </label>
                            <select class="form-control" wire:model="peran">
                                <option value="">--Pilih Peran--</option>
                                <option value="kasir">Kasir</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('peran') <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br/>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
                @elseif ($pilihanMenu=='edit')
                <div class="card border-primary">
                    <div class="card-header">
                        <h4>Edit Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form wire:submit="simpanEdit">
                            <label>Nama : </label>
                            <input type="text" class="form-control" wire:model="nama"/>
                            @error('nama') <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br />
                            <label>Email : </label>
                            <input type="email" class="form-control" wire:model="email"/>
                            @error('email') <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br/>
                            <label>Password : </label>
                            <input type="password" class="form-control" wire:model="password"/>
                            @error('password') <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br/>
                            <label>Peran : </label>
                            <select class="form-control" wire:model="peran">
                                <option value="">--Pilih Peran--</option>
                                <option value="kasir">Kasir</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('peran') <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br/>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <button type="button" wire:click='batal' class="btn btn-secondary mt-3">Batal</button>
                        </form>
                    </div>
                </div>
                @elseif ($pilihanMenu=='hapus')
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h4>Hapus Pengguna</h4>
                    </div>
                    <div class="card-body">
                        Anda yakin ingin menghapus pengguna ini?
                        <p>Nama: {{$penggunaTerpilih->name}}</p>
                        <button class="btn btn-danger" wire:click='hapus'>Hapus</button>
                        <button class="btn btn-secondary" wire:click='batal'>Batal</button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
