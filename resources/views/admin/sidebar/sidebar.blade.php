          <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="{{ url('dashboard') }}" class="logo-light">
                            <span class="logo-lg">
                                <img src="{{ getSiteSetting('logo_image')}}" alt="logo" height="50">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ getSiteSetting('logo_image')}}" alt="small logo" height="50">
                            </span>
                        </a>
                    </div>

                
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <a href="{{ route('logout') }}" class="dropdown-item">
                        <i class="bi bi-box-arrow-right fs-18 align-middle me-1"></i>
                        <span>Logout</span>
                    </a>
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="bi bi-search fs-22"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..." aria-label="Search">
                            </form>
                        </div>
                    </li>
                
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                {{-- <img src="assets/images/users/avatar-1.jpg" alt="user-image" width="32" class="rounded-circle"> --}}
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal">{{ Auth::user()->name }}</h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                
                            <!-- Uncomment the items below as needed -->
                
                            {{-- <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="bi bi-person fs-18 align-middle me-1"></i>
                                <span>My Account</span>
                            </a>
                
                            <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="bi bi-gear fs-18 align-middle me-1"></i>
                                <span>Settings</span>
                            </a>
                
                            <!-- item-->
                            <a href="pages-faq.html" class="dropdown-item">
                                <i class="bi bi-headset fs-18 align-middle me-1"></i>
                                <span>Support</span>
                            </a>
                
                            <!-- item-->
                            <a href="auth-lock-screen.html" class="dropdown-item">
                                <i class="bi bi-lock fs-18 align-middle me-1"></i>
                                <span>Lock Screen</span>
                            </a> --}}
                
                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                <i class="bi bi-box-arrow-right fs-18 align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
    
    <div class="leftside-menu">

            <!-- Brand Logo Dark -->
            <a href="{{ url('dashboard') }}" class="logo logo-dark" style="height: 120px; margin-top: -10px;">
                <span class="logo-lg">
                    <img src="{{ getSiteSetting('logo_image')}}" alt="dark logo" style="height: 100%; width: 80px;">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('Innov8itcode/assets/img/logo.png') }}" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar style="border-top: 1px solid;">
                <!--- Sidemenu -->
                <ul class="side-nav">

                    {{-- <li class="side-nav-title">Main</li> --}}

                    <li class="side-nav-item">
                        <a href="{{ url('dashboard') }}" class="side-nav-link">
                            <i class="bi-speedometer"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ route('dashboard.site-settings.index') }}" class="side-nav-link">
                            <i class="bi-gear"></i>
                            <span> Site Settings </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('cms/banner') }}" class="side-nav-link">
                            <i class="bi-calendar-week-fill"></i>
                            <span> Banner Management </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('cms/about') }}" class="side-nav-link">
                            <i class="bi-calendar-week-fill"></i>
                            <span> About Management </span>
                        </a>
                    </li>


                    <li class="side-nav-item">
                        <a href="{{ url('cms/course') }}" class="side-nav-link">
                            <i class="bi-file-earmark-plus"></i>
                            <span> Course Management </span>
                        </a>
                    </li>
                    {{-- <li class="side-nav-item">
                        <a href="{{ url('cms/news') }}" class="side-nav-link">
                            <i class="bi-book"></i>
                            <span> News Management </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ url('cms/bod') }}" class="side-nav-link">
                            <i class="bi-person"></i>
                            <span> Board Members</span>
                        </a>
                    </li> --}}

                    <li class="side-nav-item">
                        <a href="{{ url('course_categories') }}" class="side-nav-link">
                            <i class="bi-people-fill"></i>
                            <span> Course Category</span>
                        </a>
                    </li>

                    
                    {{-- <li class="side-nav-item">
                        <a href="{{ url('cms/cpd') }}" class="side-nav-link">
                            <i class="bi-bar-chart"></i>
                            <span>CPD Activites</span>
                        </a>
                    </li> --}}

                    {{-- <li class="side-nav-item">
                        <a href="{{ url('cms/syllabus') }}" class="side-nav-link">
                            <i class="bi-book"></i>
                            <span>Syllabus Management</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('cms/publication') }}" class="side-nav-link">
                            <i class="bi-printer"></i>
                            <span>Publication Management</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('cms/gallery') }}" class="side-nav-link">
                            <i class="bi-image"></i>
                            <span> Gallery Management </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('cms/college') }}" class="side-nav-link">
                            <i class="bi-building"></i>
                            <span>College Management </span>
                        </a>
                    </li> --}}


                    <li class="side-nav-item">
                        <a href="{{ url('cms/page') }}" class="side-nav-link">
                            <i class="bi-file"></i>
                            <span> Page Management </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('cms/user') }}" class="side-nav-link">
                            <i class="bi-file-earmark-post"></i>
                            <span> User Management </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{ url('cms/student') }}" class="side-nav-link">
                            <i class="bi-file-earmark-post"></i>
                            <span> Admission Management </span>
                        </a>
                    </li>

                    {{-- <li class="side-nav-item">
                        <a href="{{ url('cms/testimonial') }}" class="side-nav-link">
                            <i class="bi-chat-left-dots"></i>
                            <span> Testimonial Management </span>
                        </a>
                    </li> --}}
                    
                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->