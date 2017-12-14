<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #48b550 ;">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="/assets/img/logo/logo-white-stroke.svg" style="height: 40px; width: auto; margin: auto;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item @if (Route::currentRouteName() == 'aturan'){{ 'active' }} @endif ">
          <a class="nav-link" href="/aturan-penggunaan">Aturan penggunaan</a>
        </li>
        <li class="nav-item @if (Route::currentRouteName() == 'kebijakan'){{ 'active' }} @endif ">
          <a class="nav-link" href="/kebijakan-privasi">Kebijakan privasi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>