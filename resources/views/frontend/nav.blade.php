
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">Liberator</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle explore-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Explore
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/">Business</a></li>
                        <li><a class="dropdown-item" href="/data-science-and-artificial-intelligence">Data, Excel & Power BI</a></li>
                        <li><a class="dropdown-item" href="/human-resource">Human Resource</a></li>
                        <li><a class="dropdown-item" href="/finance">Finance and Environmental Social Governance Institute</a></li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- <form class="d-flex ms-auto">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
                    <div class="input-group search-wrap ms-auto">
                        <div class="form-outline">
                            <input type="search" id="form1" class="form-control" placeholder="What do you want to learn?" />
                        </div>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Find your New Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                </svg></i></a>
                        </li>

                    </ul>
                    @if(Auth::check())
                    <ul class="navbar-nav align-items-center">

                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle pt-1 px-0 user-info" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                <div class="media d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::user()->name }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1" data-bs-popper="none">
                                <a class="dropdown-item d-flex align-items-center" href="/profile">
                                    My Profile
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="/purchases">
                                    My Purchases
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    Settings
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="/updates">
                                    Updates
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="/accomplishments">
                                    Accomplishments
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="/helpcentre">
                                    Help Centre
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>

                    @else
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/login" tabindex="-1" aria-disabled="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register" tabindex="-1" aria-disabled="true">Register</a>
                        </li>
                    </ul>
                    @endif

                </div>
            </div>
        </nav>
