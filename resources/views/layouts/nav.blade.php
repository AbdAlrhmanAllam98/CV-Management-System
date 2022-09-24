<nav class="navbar navbar-expand-lg bg-light mb-2">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{request()->route()->named('users')? 'active' :''}}" aria-current="page" href="{{url('/')}}">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->route()->named('cvs')? 'active' :''}}" href="{{url('cvs')}}">CVs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{request()->route()->named('sections')? 'active' :''}}" href="{{url('sections')}}">Sections</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>