<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <div class="form-inline mr-auto"></div>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
      <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Logged in 5 min ago</div>
        <a href="{{route('profile.edit')}}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="features-settings.html" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{route('logout')}}"  onclick="event.preventDefault();
            this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
        </form>
      </div>
    </li>
  </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item {{setSidebarActive(['dashboard'])}}">
          <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Sections</li>
        <li class="nav-item dropdown {{setSidebarActive(['admin.hero.*' , 'admin.typer-title.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-heading"></i> <span>Hero</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li class="{{setSidebarActive(['admin.hero.*'])}}"><a class="nav-link" href="{{route('admin.hero.index')}}">Hero Section</a></li>
              <li class="{{setSidebarActive(['admin.typer-title.*'])}}"><a class="nav-link" href="{{route('admin.typer-title.index')}}">Typer Title</a></li>

            </ul>
          </li>
        <li class="{{setSidebarActive(['admin.service.*'])}}"><a class="nav-link" href="{{route('admin.service.index')}}"><i class="fas fa-info-circle"></i> <span>Services</span></a></li>
        <li class="{{setSidebarActive(['admin.about.*'])}}"><a class="nav-link" href="{{route('admin.about.index')}}"><i class="fas fa-address-card"></i> <span>About Me</span></a></li>

        <li class="nav-item dropdown {{setSidebarActive(['admin.category.*' , 'admin.portfolio-item.*' , 'admin.portfolio-setting.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-file"></i></i> <span>Portfolio</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li class="{{setSidebarActive(['admin.category.*'])}}"><a class="nav-link" href="{{route('admin.category.index')}}">Category</a></li>
              <li class="{{setSidebarActive(['admin.portfolio-item.*'])}}"><a class="nav-link" href="{{route('admin.portfolio-item.index')}}">Portfolio Items</a></li>
              <li class="{{setSidebarActive(['admin.portfolio-setting.*'])}}"><a class="nav-link" href="{{route('admin.portfolio-setting.index')}}">Section Setting</a></li>
            </ul>
          </li>

        <li class="nav-item dropdown {{setSidebarActive(['admin.skill-item.*' , 'admin.skill-setting.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-thumbs-up"></i> <span>Skill</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li class="{{setSidebarActive(['admin.skill-item.*'])}}"><a class="nav-link" href="{{route('admin.skill-item.index')}}">Skill Items</a></li>
              <li class="{{setSidebarActive(['admin.skill-setting.*'])}}"><a class="nav-link" href="{{route('admin.skill-setting.index')}}">Section Setting</a></li>
            </ul>
          </li>

          <li class="{{setSidebarActive(['admin.experience.*'])}}"><a class="nav-link" href="{{route('admin.experience.index')}}"><i class="fas fa-user"></i> <span>Experience</span></a></li>

          <li class="nav-item dropdown {{setSidebarActive(['admin.feedback.*' , 'admin.feedback-setting.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-comments"></i></i> <span>Feedback</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li class="{{setSidebarActive(['admin.feedback.*'])}}"><a class="nav-link" href="{{route('admin.feedback.index')}}">Feedbacks</a></li>
              <li class="{{setSidebarActive(['admin.feedback-setting.*'])}}"><a class="nav-link" href="{{route('admin.feedback-setting.index')}}">Section Setting</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{setSidebarActive(['admin.blog-category.*' , 'admin.blog.*' , 'admin.blog-setting.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-blog"></i></i> <span>Blog</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li class="{{setSidebarActive(['admin.blog-category.*'])}}"><a class="nav-link" href="{{route('admin.blog-category.index')}}">Category</a></li>
              <li class="{{setSidebarActive(['admin.blog.*'])}}"><a class="nav-link" href="{{route('admin.blog.index')}}">Blog List</a></li>
              <li class="{{setSidebarActive(['admin.blog-setting.*'])}}"><a class="nav-link" href="{{route('admin.blog-setting.index')}}">Section Setting</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{setSidebarActive(['admin.contact-setting.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-id-card-alt"></i><span>Contact</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li class="{{setSidebarActive(['admin.contact-setting.*'])}}"><a class="nav-link" href="{{route('admin.contact-setting.index')}}">Section Setting</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{setSidebarActive(['admin.footer-social-link.*' , 'admin.footer-info.*' , 'admin.footer-useful-link.*' , 'admin.footer-contact-info.*' , 'admin.footer-help-link.*'])}}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Footer</span></a>
            <ul class="dropdown-menu" style="display: none;">
              <li class="{{setSidebarActive(['admin.footer-social-link.*'])}}"><a class="nav-link" href="{{route('admin.footer-social-link.index')}}">Social Links</a></li>
              <li class="{{setSidebarActive(['admin.footer-info.*'])}}"><a class="nav-link" href="{{route('admin.footer-info.index')}}">Footer Information</a></li>
              <li class="{{setSidebarActive(['admin.footer-useful-link.*'])}}"><a class="nav-link" href="{{route('admin.footer-useful-link.index')}}">Footer Useful Link</a></li>
              <li class="{{setSidebarActive(['admin.footer-contact-info.*'])}}"><a class="nav-link" href="{{route('admin.footer-contact-info.index')}}">Footer Contact Info</a></li>
              <li class="{{setSidebarActive(['admin.footer-help-link.*'])}}"><a class="nav-link" href="{{route('admin.footer-help-link.index')}}">Footer Help Link</a></li>
            </ul>
          </li>

          <li class="menu-header">Settings</li>
          <li class="{{setSidebarActive(['admin.setting.*'])}}"><a class="nav-link" href="{{route('admin.setting.index')}}"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
      </ul>
  </aside>
</div>
