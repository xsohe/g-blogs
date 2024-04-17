<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container col-lg-8">
      <a class="navbar-brand fw-bold" href="/about">~/g-Blogs</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto fw-bold">
          <li class="nav-item me-3">
            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" aria-current="page" href="/about">About</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link {{ Request::is('blogs*') ? 'active' : '' }}" href="/blogs">Blog</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link {{ Request::is('tags') ? 'active' : '' }}" href="/tags">Tags</a>
          </li>
          <li class="nav-item me-3">
            <a class="nav-link {{ Request::is('projects*') ? 'active' : '' }}" href="/projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link switch-mode" href=""><i class="bi bi-moon-fill"></i></a>
          </li>
        </ul>
      </div>
    </div>
</nav>

<script>
  const switchMode = document.querySelector('.switch-mode');
  const icon = switchMode.querySelector('i');

  const isDarkMode = localStorage.getItem('darkMode');

  if (isDarkMode === 'true') {
    document.body.classList.add('dark-mode');
    icon.classList.remove('bi-moon-fill');
    icon.classList.add('bi-sun-fill');
  }

  switchMode.addEventListener('click', () => {
    if (document.body.classList.contains('dark-mode')) {
      document.body.classList.remove('dark-mode');
      icon.classList.remove('bi-sun-fill');
      icon.classList.add('bi-moon-fill');
      localStorage.setItem('darkMode', 'false');
    } else {
      document.body.classList.add('dark-mode');
      icon.classList.remove('bi-moon-fill');
      icon.classList.add('bi-sun-fill');
      localStorage.setItem('darkMode', 'true');
    }
  });
</script>