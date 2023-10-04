  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('assets/img/liberator-app.svg') }}" alt="AdminLTE Logo" class="brand-image elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Liberator</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <a href="/profile"><img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                          alt="User Image"></a>
              </div>
              <div class="info">
                  @auth
                      <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                      @if (auth()->user()->role == '2')
                          <span class="badge bg-info">Human Resource</span>
                      @endif
                      @if (auth()->user()->role == '3')
                          <span class="badge bg-info">Staff</span>
                      @endif
                      <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  @endauth
              </div>
          </div>


          <!-- Sidebar Menu -->
          <nav class="mt-2">
              @if (auth()->user()->role == '2')
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item menu-open">
                          <a href="dashboard" class="nav-link active" id="dashboard">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index.html" class="nav-link ">
                              <i class="ion ion-ios-people"></i>
                              <p>Team Mates</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="/subscriptions" id="subscriptions">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Subscriptions</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="courses" class="nav-link" id="courses">
                              <i class="ion ion-ribbon-a"></i>
                              <p>Courses</p>
                          </a>
                      </li>
                      <li class="nav-item">

                          <a href="./index3.html" class="nav-link">
                              <i class="nav-icon far fa-envelope"></i>
                              <p>Mailbox</p>
                          </a>
                      </li>

                      <li class="nav-item">

                          <a href="./index3.html" class="nav-link">
                              <i class="nav-icon far fa-envelope"></i>
                              <p>Training Programs</p>
                          </a>
                      </li>
                      <li class="nav-item">

                          <a href="./index3.html" class="nav-link">
                              <i class="nav-icon far fa-envelope"></i>
                              <p>Enroll</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Programs
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview" style="display: none;">
                              <li class="nav-item">
                                  <a href="examples/invoice.html" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Training Programs</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="examples/profile.html" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Registered Programs</p>
                                  </a>
                              </li>


                          </ul>
                      </li>
                  </ul>
              @endif
              @if (auth()->user()->role == '3')
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item menu-open">
                          <a href="#" class="nav-link active">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Dashboard
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index.html" class="nav-link ">
                              <i class="ion ion-ribbon-a"></i>

                              <p>Courses</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index2.html" class="nav-link">
                              <i class="ion ion-ios-people"></i>
                              <p>Speakers</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                              <i class="ion ion-document-text"></i>
                              <p>Bookings</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index3.html" class="nav-link">
                              <i class="ion ion-ios-mic"></i>
                              <p>Webinars</p>
                          </a>
                      </li>
                  </ul>
              @endif
              @if (auth()->user()->role == '1')
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                      <li class="nav-item menu-open">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  Users
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index.html" class="nav-link ">
                              <i class="fas fa-graduation-cap"></i>

                              <p>Programs</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index.html" class="nav-link ">
                              <i class="fa fa-search" aria-hidden="true"></i>

                              <p>Explore</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index.html" class="nav-link ">
                              <i class="fa fa-edit"></i>

                              <p>Learn</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="./index.html" class="nav-link ">
                              <i class="fa fa-download" aria-hidden="true"></i>

                              <p>Download</p>
                          </a>
                      </li>

                  </ul>
              @endif
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
