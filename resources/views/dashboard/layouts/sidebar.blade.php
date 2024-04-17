<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column fs-6">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-grid-fill"></i>
            <span class="ms-2">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/blogs*') ? 'active' : '' }}" href="/dashboard/blogs">
            <i class="bi bi-body-text"></i>
            <span class="ms-2">My Blogs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/projects*') ? 'active' : '' }}" href="/dashboard/projects">
            <i class="bi bi-terminal-fill"></i>
            <span class="ms-2">My Projects</span>
          </a>
        </li>
        @can('admin')  
        <div class="nav-item mt-2">
          <small class="nav-link text-secondary fw-light">Administrator</small>
        </div>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/tags*') ? 'active' : '' }}" href="/dashboard/tags">
            <i class="bi bi-tags-fill"></i>
            <span class="ms-2">Tags</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users">
            <i class="bi bi-people-fill"></i>
            <span class="ms-2">Users Settings</span>
          </a>
        </li>
        @endcan
      </ul>
    </div>
</nav>