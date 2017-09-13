<div class="sidebar" data-color="bmt-green" data-image="{{ asset('/assets/img/sidebar-1.jpg')}}">
      <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

      <div class="logo">
        <a href="/home" class="simple-text">
          <img src="/uploads/images/logo/logo.svg" style="height: 70px; width: auto; margin: auto; display: block;">
          BMT Mobile App
        </a>
      </div>

        <div class="sidebar-wrapper">
              <ul class="nav">
                  <li class="@if (Route::currentRouteName() == 'home'){{ 'active' }} @endif">
                      <a href="/home">
                          <i class="material-icons">dashboard</i>
                          <p>Beranda</p>
                      </a>
                  </li>
                  <li class="@if (Route::currentRouteName() == 'nasabah'){{ 'active' }} @endif">
                      <a href="/nasabah">
                          <i class="material-icons">person</i>
                          <p>Nasabah</p>
                      </a>
                  </li>
                  <li class="@if (substr(Route::currentRouteName(),0 ,9) == 'transaksi'){{ 'active' }} @endif ">
                    <a href="/transaksi">
                        <i class="material-icons">shopping_cart</i>
                        <p>Transaksi <span id="count-layan" class="badge notification-badge hidden-lg hidden-md">{{ $count }}</span></p>
                    </a>
                  </li>
                  <li class="@if (substr(Route::currentRouteName(),0 ,7) == 'layanan'){{ 'active' }} @endif ">
                    <a href="/layanan">
                        <i class="material-icons">account_balance_wallet</i>
                        <p>Layanan <span id="count-layan" class="badge notification-badge hidden-lg hidden-md">{{ $count_l }}</span></p>
                    </a>
                  </li>
                  <li class="@if (substr(Route::currentRouteName(),0 ,4) == 'chat'){{ 'active' }} @endif">
                    <a href="/chat">
                        <i class="material-icons">message</i>
                        <p>Chat</p>
                    </a>
                  </li>
                  <li class="@if (substr(Route::currentRouteName(),0 ,8) == 'reminder'){{ 'active' }} @endif">
                    <a href="/reminder">
                        <i class="material-icons">notifications</i>
                        <p>Reminder</p>
                    </a>
                  </li>
                  <li class="@if (substr(Route::currentRouteName(),0 ,6) == 'agenda'){{ 'active' }} @endif">
                    <a href="/agenda">
                        <i class="material-icons">today</i>
                        <p>Agenda</p>
                    </a>
                  </li>
                  <li class="@if (Route::currentRouteName() == 'kategori'){{ 'active' }} @endif">
                    <a href="/kategori">
                        <i class="material-icons">store</i>
                        <p>Kategori</p>
                    </a>
                  </li>
                  <li class="@if (substr(Route::currentRouteName(),0 ,3) == 'mku'){{ 'active' }} @endif">
                    <a href="/mku">
                        <i class="material-icons">groups</i>
                        <p>MKU</p>
                    </a>
                  </li>
                  <li class="@if (substr(Route::currentRouteName(),0 ,4) == 'news'){{ 'active' }} @endif">
                    <a href="/news">
                        <i class="material-icons">mms</i>
                        <p>News</p>
                    </a>
                  </li>
                  <li class="@if (substr(Route::currentRouteName(),0 ,8) == 'feedback'){{ 'active' }} @endif">
                    <a href="/feedback">
                        <i class="material-icons">feedback</i>
                        <p>Feedback</p>
                    </a>
                  </li>

                  <hr class="hidden-md hidden-lg separator">
                  <li class="dropdown hidden-md hidden-lg">
                    <a href="/setting">
                       <i class="material-icons">person</i>
                       <p class="hidden-lg hidden-md">Pengaturan</p>
                    </a>
                  </li>
                  <li class="dropdown hidden-md hidden-lg">
                    <a href="/logout" onclick="return confirm('Anda Yakin akan keluar?')">
                       <i class="material-icons">power_settings_new</i>
                       <p class="hidden-lg hidden-md">Keluar</p>
                    </a>
                  </li>
                </ul>
              </ul>
        </div>
      </div>