<nav class="navbar">
    <a href="#" class="sidebar-toggler">
      <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
      
      <ul class="navbar-nav" style="display: flex;
      justify-content: center;
      align-items: center;
  ">             
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="wd-30 ht-30 rounded-circle" src="{{ asset('assets/images/logo.jpg') }}" alt="profile">
          </a>
          <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
              <div class="mb-3">
                <img class="wd-80 ht-80 rounded-circle" src="{{ url('https://via.placeholder.com/80x80') }}" alt="">
              </div>
              <div class="text-center">
                <p class="tx-16 fw-bolder">{{ auth()->user()->name }}<p>
                <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
              </div>
            </div>
            <ul class="list-unstyled p-1">
              <li class="dropdown-item py-2">
                <a href="{{ url('/profile') }}" class="text-body ms-0">
                  <i class="me-2 icon-md" data-feather="user"></i>
                  <span>Profile</span>
                </a>
              </li>
              <li class="dropdown-item py-2">
                <a href="{{ url('/edit-profile') }}" class="text-body ms-0">
                  <i class="me-2 icon-md" data-feather="edit"></i>
                  <span>Edit Profile</span>
                </a>
              </li>
              <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                               
                            </li>
               
              <!-- <li class="dropdown-item py-2">
                <a href="{{ url('/logout') }}" class="text-body ms-0">
                  <i class="me-2 icon-md" data-feather="log-out"></i>
                  <span>Log Out</span>
                </a>
              </li> -->
            </ul>

           
          </div>
        </li>

        <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                               
                            </li>
               
        <!-- <li>
          <a href="{{ url('/logout') }}" class="text-body ms-0" title="logout">
            <i class="me-2 icon-md" data-feather="log-out"></i>
          </a>
        </li>
        -->
      </ul>
   
    </div>
   
  </nav>