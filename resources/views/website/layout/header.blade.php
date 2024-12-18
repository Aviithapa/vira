<div
class="fixed hidden inset-0 z-10 bg-[rgba(0,_0,_0,_0.4)]"
id="nav_overlay"
></div>

<header id="homeHeader" style="border-bottom: 1px solid #ddd;">
  <div class="hidden xl:block bg-[var(--primaryColor)] px-3 py-2">
    <div
      class="container--fluid text-white text-[0.875rem] flex justify-between items-center"
    >
      <div class="flex justify-between items-center gap-12">
        <div class="">
          <span>
            <i class="fa-regular fa-envelope"></i>
          </span>
          <span>{{ getSiteSetting('email')}}</span>
        </div>
        <div class="flex justify-center items-center gap-4">
          <span>
            <i class="fa-solid fa-phone"></i>
          </span>
          <span>{{ getSiteSetting('social_phone') }}</span>
        </div>
      </div>
      <div class="flex justify-center items-center gap-4">
        <span> <i class="fa-solid fa-location-dot"></i> </span>
        <span>{{ getSiteSetting('location') }}</span>
      </div>
    </div>
  </div>
  <!-- main navbar -->
  <div class="py-2">
    <div class="container--fluid">
      <div class="flex items-center justify-between">
        <div class="flex flex-row items-center">
          <div class="w-28">
            <img src="{{ getSiteSetting('logo_image') }}" alt="{{ getSiteSetting('site_title') }}" style="height: 80px; width:80px;"/>
          </div>
          <div style="width: 250px; text-align:center; margin-left: -35px; font-weight: 600; text-transform: uppercase;">
             Vira Institute of science & Technology
          </div>
        </div>

        <!-- nav links -->
        <nav class="hidden lg:flex items-center">
          <div style="padding: 0px 10px">
            <a class="inline-block px-2 py-2 capitalize hover:text-[var(--hoverColor)] " href="/">home</a>
          </div>

          <div style="padding: 0px 10px">
            <a class="inline-block px-2 py-2 capitalize hover:text-[var(--hoverColor)] hover:text-bold" href="/student-join"
              >student zone</a
            >
          </div>

          <div style="padding: 0px 10px">
            <a class="inline-block px-2 py-2 capitalize hover:text-[var(--hoverColor)] " href="/online-form"
              >online form</a
            >
          </div>
          <div style="padding: 0px 10px">
            <a class="inline-block px-2 py-2 capitalize hover:text-[var(--hoverColor)] " href="/contact"
              >Contact</a
            >
          </div>
        </nav>

        <!-- Login and Register Buttons-->
        <div class="hidden lg:block">
          @auth
            <div class="flex">
              <!-- If logged in, show the profile circle and hover effect -->
              <div class="profile-container" id="profile-container">
                <div class="profile-circle" id="profile-circle">
                  <!-- Display the first two letters of the username -->
                  {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}{{ strtoupper(substr(Auth::user()->username, 1, 1)) }}
                </div>
              
                <div class="hover-content" id="hover-content">
                  <!-- Display username and email from Auth user data -->
                  <div class="username">{{ Auth::user()->username }}</div>
                  <div class="email">{{ Auth::user()->email }}</div>
                  <div class="logout">
                    <!-- Logout link -->
                    <a href="{{ route('logout') }}" class="logout-link" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                       Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                  </div>
                </div>
              </div>
              <div class="logout" style="margin-left: 10px;">
                    <!-- Logout link -->
                    <a href="{{ route('logout') }}" class="logout-link" >
                       Logout
                    </a>
                    
              </div>
            </div>
              
          @else
              <!-- If not logged in, show the login button -->
              <div class="flex items-center justify-center gap-2">
                  <a href="/login" class="inline-block px-6 py-2 capitalize border border-[var(--primaryColor)] text-[1rem] rounded text-[var(--primaryColor)] leading-[1.625rem]">
                      <span>login</span>
                  </a>
              </div>
          @endauth
      </div>
        <!-- hamburger icon -->
        <div class="lg:hidden" id="hamburger_icon">
          <span class="">
            <i class="fa-solid fa-bars"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <!-- mobile nav -->

  <!-- nav slider -->
  <div
    id="nav_slider"
    class="fixed z-50 top-0 right-0 bottom-0 shadow-[0_0_30px_rgba(0,_0,_0,_0.2)] bg-white w-[80%] px-8 translate-x-[105%] transition-transform duration-[400ms] ease-[cubic-bezier(0.9,_0,_0.3,_1)]"
  >
    <div class="mt-14">
      <nav>
        <div class="border-b py-2 capitalize">
          <a href="/">
            <span>home</span>
          </a>
        </div>
        <div class="border-b py-2 capitalize">
          <a href="/student-join">
            <span>student zone</span>
          </a>
        </div>
        <div class="border-b py-2 capitalize">
          <a href="/online-form">
            <span>Admission Form</span>
          </a>
        </div>
        <div class="border-b py-2 capitalize">
          <a href="/contact">
            <span>Contact Us</span>
          </a>
        </div>
      </nav>

      <div
        id="cross_icon"
        class="absolute left-0 top-0 bg-[var(--primaryColor)] px-3.5 py-1 text-white text-2xl font-thin"
      >
        <span>
          <i class="fa-solid fa-xmark"></i>
        </span>
      </div>
    </div>
  </div>
</header>
