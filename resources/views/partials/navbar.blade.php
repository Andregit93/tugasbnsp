<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center fs-5 fw-medium" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item mx-4">
            <a class="nav-link {{ Request::is('beasiswa') ? 'active' : 'text-secondary' }}" aria-current="page" href="/beasiswa">Pilihan Beasiswa</a>
          </li>
          <li class="nav-item mx-4">
            <a class="nav-link {{ Request::is('/') ? 'active' : 'text-secondary' }}" href="/">Daftar</a>
          </li>
          <li class="nav-item mx-4">
            <p class="nav-link {{ Request::is('hasil') ? 'active' : 'text-secondary' }}">Hasil</p>
        </li>        
        </ul>
      </div>
    </div>
  </nav>