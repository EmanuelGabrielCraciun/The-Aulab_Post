<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <div class="px-4 border border-primary-subtle rounded-3 py-1">
  <a href="{{route('welcome')}}">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-vector-pen" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
    <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086z"/>
 
  </svg>
 </a>
</div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       
      
     
      

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

         <form action="{{route('article.search')}}" method="GET" class="d-flex ms-auto px-2" role="search">
            <input type="search" name="query" placeholder="Cerca tra gli articoli" class="form-control me-2" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">cerca</button>
         </form>
         @guest
         <div class="justify-content-end">
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
          </div>
    @endguest
    </div>
  </div>  
  
</nav>