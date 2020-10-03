<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="/">Online Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('site.showCart')}}">Cart <span class="badge badge-danger">{{count(session('cart.items') ?? [])}}</span> <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form action="/" method="get" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" name="q" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      <div class="dropdown">
        <a class="dropdown-toggle btn btn-primary" href="#"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          @auth
              {{auth()->user()->name}}
          @else
          Guest
          @endauth
        </a>
        <div class="dropdown-menu">
          @auth
            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            @else
            <a class="dropdown-item" href="{{route('register')}}">Register</a>
            <a class="dropdown-item" href="{{route('login')}}">Login</a>  
          @endauth
        </div>
    </div>
    </div>
  </nav>