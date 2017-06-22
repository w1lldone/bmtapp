<nav class="navbar navbar-transparent navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      @yield('breadcrumb')
      
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">

        {{-- TRANSAKSI DROPDOWN --}}
        <li class="dropdown">
          <a id="dLabel" class="hidden-xs" role="button" data-toggle="dropdown" data-target="#" href="/transaksi">
            <i class="material-icons">shopping_cart</i>
            <span id="count-trans" class="badge notification-badge hidden-xs">{{ $count }}</span>
          </a>
          <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
            <div class="notification-heading">
              <h4 class="menu-title">Transaksi butuh tindakan</h4>
            </div>
           <div class="notifications-wrapper">
            <ul id="transaksi-list" class="collection notification-collection">
                @if ($orders->isEmpty())
                  <div id="trans-empty" class="text-center">
                      <i class="material-icons text-muted" style="font-size: 100px; margin-top: 20px; opacity: 0.5;">shopping_cart</i>
                      <h4 class="text-muted">Belum ada transaksi butuh tindakan </h4>
                  </div>
                @endif
                 @foreach ($orders as $order)
                  <a class="collection-item avatar" href="/transaksi/{{$order->kode}}">
                      <i class="material-icons circle">shopping_cart</i>
                      <span class="title">Transaksi # {{ $order->kode }}</span>
                      <p> <b>{{$order->nasabah->name}} </b> 
                      @if ($order->status == 'confirmed')
                        <span class="label label-success">Siap Dibayar</span>
                      @endif
                      @if ($order->status == 'delivered')
                        <span class="label label-info">Produk Diterima</span>
                      @endif
                      </p>
                      <p class="text-muted"> {{ $order->updated_at->diffForHumans() }}</p>
                  </a>
                 @endforeach
              </ul>     
            </div>
            <div class="notification-footer text-center"><h4 class="menu-title"><a href="/transaksi">Lihat semua</a></h4></div>
          </ul>
        </li>
        
        {{-- LAYANAN DROPDOWN --}}
        <li class="dropdown">
          
          <a id="dLabel" class="hidden-xs" role="button" data-toggle="dropdown" data-target="#" href="/layanan">
            <i class="material-icons">account_balance_wallet</i>
            <span id="countLayan" class="badge notification-badge hidden-xs">{{ $count_l }}</span>
          </a>

          <ul class="dropdown-menu notifications hidden-xs" role="menu" aria-labelledby="dLabel">
            <div class="notification-heading">
              <h4 class="menu-title">Layanan butuh tindakan</h4>
            </div>
           <div class="notifications-wrapper">
            
             <ul id="layanan-list" class="collection notification-collection">
                 @if ($layanans->isEmpty())
                  <div id="layan-empty" class="text-center">
                      <i class="material-icons text-muted" style="font-size: 100px; margin-top: 20px; opacity: 0.5;">account_balance_wallet</i>
                      <h4 class="text-muted">Belum ada pembayaran layanan butuh tindakan</h4>
                  </div>
                 @endif
                 @foreach ($layanans as $layanan)
                  <a class="collection-item avatar" href="/layanan/{{$layanan->kode}}">
                      <i class="material-icons circle">account_balance_wallet</i>
                      <span class="title">Pembayaran # {{ $layanan->kode }}</span>
                      <p> <b>{{$layanan->nasabah->name}} </b> 
                        <span class="label label-info">{{ $layanan->layananDetail->produkLayanan->katLayanan->name }}</span>
                      </p>
                      <p class="text-muted"> {{ $layanan->updated_at->diffForHumans() }}</p>
                  </a>
                 @endforeach
              </ul>     
            </div>
            <div class="notification-footer text-center"><h4 class="menu-title"><a href="/layanan">Lihat semua</a></h4></div>
          </ul>
        </li>

        {{-- ACCOUNT MENU --}}
        <li class="dropdown">
          <a href="#pablo" class="dropdown-toggle hidden-xs" data-toggle="dropdown">
             <h4 class="visible-md-inline visible-lg-inline">{{ $user->name }}</h4>
             <i class="material-icons">person</i>
             <p class="hidden-lg hidden-md">Profile</p>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/setting">Pengaturan</a></li>
            <li><a href="/logout">Logout</a></li>
          </ul>
        </li>

        {{-- SMALL DEVICE MENU --}}
{{--         <li class="dropdown">
          <a href="/setting" class="dropdown-toggle hidden-md hidden-lg">
             <i class="material-icons">person</i>
             <p class="hidden-lg hidden-md">Pengaturan</p>
          </a>
        </li>
        <li class="dropdown">
          <a href="/logout" class="dropdown-toggle hidden-md hidden-lg" onclick="return confirm('Anda Yakin akan keluar?')">
             <i class="material-icons">power_settings_new</i>
             <p class="hidden-lg hidden-md">Keluar</p>
          </a>
        </li> --}}
      </ul>

      {{-- <form class="navbar-form navbar-right" role="search">
        <div class="form-group  is-empty">
          <input type="text" class="form-control" placeholder="Search">
          <span class="material-input"></span>
        </div>
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i><div class="ripple-container"></div>
        </button>
      </form> --}}
    </div>
  </div>
</nav>