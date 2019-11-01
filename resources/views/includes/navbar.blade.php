<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a href="index.html" class="navbar-brand mu-font">Online Book Store</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <router-link class="nav-link header-edit" :to="{name: 'home-component'}" class="nav-link">Home</router-link>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link header-edit">Contact</a>
          </li> 
          <li class="nav-item">
            <a href="#about" class="nav-link header-edit">About</a>
          </li>
          <li class="nav-item">
             <router-link class="nav-link header-edit" :to="{name: 'product-list'}" class="nav-link">Products</router-link>
          </li>
          <li class="nav-item">
              <a class="nav-link header-edit" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>