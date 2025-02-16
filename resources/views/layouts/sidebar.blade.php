
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('home') }}" wire:navigate class="btn" {{ request()->routeIs('home') ? 'btn-primary' : 'btn-outline-primary' }}>
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      @if (Auth::user()->peran=='admin')
      <li class="nav-item">
        <a href="{{ route('user') }}" wire:navigate class="btn" {{ request()->routeIs('user') ? 'btn-primary' : 'btn-outline-primary' }}>
          <span class="menu-title">Pengguna</span>
          <i class="mdi mdi-table-large menu-icon"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
          </ul>
        </div>
      </li>
      @endif
      @if (Auth::user()->peran=='admin')
      
      <li class="nav-item">
        <a href="{{ route('produk') }}" wire:navigate class="btn" {{ request()->routeIs('produk') ? 'btn-primary' : 'btn-outline-primary' }}>
          <span class="menu-title">Produk</span>
          <i class="mdi mdi-table-large menu-icon"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
          </ul>
        </div>
      </li>
@endif
      <li class="nav-item">
        <a href="{{ route('transaksi') }}" wire:navigate class="btn" {{ request()->routeIs('transaksi') ? 'btn-primary' : 'btn-outline-primary' }}>
          <span class="menu-title">Transaksi</span>
          <i class="mdi mdi-table-large menu-icon"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
          </ul>
        </div>
      </li>
    </ul>
  </nav>