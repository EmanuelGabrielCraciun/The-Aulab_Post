<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href='/'>Home</a>
        </li>

     
      

        @Auth

          <li class="nav-item">
            <a href="{{route('article.create')}}" class="nav-link">Inserire articolo</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ben venuto {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>

            </ul>
          </li>  
          
          <li class="nav-item">
            <a href="{{route('careers')}}" class="nav-link active">Lavora con noi</a>
          </li>

        
          <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('article.index')}}">Tutti gli articoli</a>
          </li>
       
            @if (Auth::user()->is_admin)
                <li>
                  <a class="nav-link active" href="{{route('admin.dashboard')}}">Dashboard Admin</a>
                </li>
            @endif

           @if (Auth::user()->is_revisor)
            <li>
              <a href="{{route('revisor.dashboard')}}" class="nav-link active">Dashboard revisore</a>
              </li>         
           @endif
           @if (Auth::user()->is_writer)
            <li>
              <a href="{{route('writer.Dashboard')}}" class="nav-link active">Dashboard redattore</a>
            </li>
           @endif
        </ul>
         @endauth 

         <form action="{{route('article.search')}}" method="GET" class="d-flex" role="search">
            <input type="search" name="query" placeholder="Cerca tra gli articoli" class="form-control me-2" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">cerca</button>
         </form>

    </div>
  </div>  
   @guest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ben venuto ospite
            </a>
            <ul class="dropdown-menu">
              <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Registrati</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}">Accedi</a>
              </li>
            </ul>
          </li>
    @endguest
</nav>