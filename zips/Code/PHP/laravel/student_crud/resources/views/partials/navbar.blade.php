<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    
  <div class="container">

    <a class="navbar-brand" href="/">Najwa's Blog</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href="/about">About</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ ($title === "Posted") ? 'active' : '' }}" href="/post">Post</a>
        </li>

        {{-- <li class="nav-item">
          <a class="nav-link {{ ($title === "Profile") ? 'active' : '' }}" href="/profile">Profile</a>
        </li> --}}

        <li class="nav-item">
          <a class="nav-link {{ ($title === "Login") ? 'active' : '' }}" href="/login">Login</a>
        </li>

        {{-- <li class="nav-item">
          <a class="nav-link {{ ($title === "Create") ? 'active' : '' }}" href="/profile/create">Siswa</a>
        </li> --}}

      </ul>

    </div>

  </div>

</nav>