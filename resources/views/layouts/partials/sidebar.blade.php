 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image">
                <img src="{{ asset('assets/images/faces/face21.jpg')}}" alt="image"/>
              </div>
              <div class="profile-name">
                <p class="name">
                  {{ Auth()->user()->name }}
                </p>
                <p class="designation">
                  Super Admin
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          {{-- Module De Facturación --}}
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#module_1" aria-expanded="false" aria-controls="module_1">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Modulo de Facturación</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="module_1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('guides.index') }}">Guias</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('invoices.index') }}">Facturas</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('payments.index') }}">Pagos</a></li>
              </ul>
            </div>
          </li>
          {{-- Module de Ajustes --}}
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#sales" aria-expanded="false" aria-controls="sales">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Ajustes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sales">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="{{ route('countrys.index') }}">Paises</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
