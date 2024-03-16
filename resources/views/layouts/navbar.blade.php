<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="{{route('home')}}">
        BADR Images Stock
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">
            <i class="fas fa-sign-in"></i> Login
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('register')}}">
            <i class="fas fa-user-plus"></i> Sign Up
          </a>
        </li>
        @endguest
        <li class="nav-item">
          <a class="nav-link" href="{{route('photos.create')}}">
            <i class="fas fa-upload"></i> Upload
          </a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      

      
      <!-- Avatar -->
      @auth 
      <div class="dropdown">
        <a
          data-mdb-dropdown-init
          class="dropdown-toggle d-flex align-items-center hidden-arrow"
          href="#"
          id="navbarDropdownMenuAvatar"
          role="button"
          aria-expanded="false"
        >
          <img
            src="{{auth()->user()->profile_image}}"
            class="rounded-circle"
            height="25"
            alt="Black and White Portrait of a Man"
            loading="lazy"
          />
        </a>
        <ul
          class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuAvatar"
        >
          <li>
            <a class="dropdown-item" href="{{route('dashboard')}}">{{auth()->user()->name}}</a>
          </li>
          
          <li>
            <form id="formLogout" method="post" action="{{route('logout')}}">
              @csrf
              <a class="dropdown-item" href="#" 
              onclick="document.getElementById('formLogout').submit();">Logout</a>
            </form>
          </li>
        </ul>
      </div>
      @endauth
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->