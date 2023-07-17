<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
       Dashboard
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item ">
          <a href="{{ url('/home')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        @can('role-list')
        <li class="nav-item ">
            <a href="{{ url('/roles') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Roles</span>
            </a>
          </li>
        @endcan
        @can('subscription-type-list')

          <li class="nav-item ">
            <a href="{{ url('/subscription_type') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Subscription Type</span>
            </a>
          </li>
          @endcan

          @can('user-list')

          <li class="nav-item ">
            <a href="{{ url('/users') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Users</span>
            </a>
          </li>
       @endcan
        </ul>
    </div>
  </nav>
  