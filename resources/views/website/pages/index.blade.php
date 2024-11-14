@extends('website.layout.app')

@section('content')

<main>
  <div class="banner_container bg-[#f9f9f9]">
    <div class="container--fluid flex flex-col md:flex-row">
      <!-- right content -->
      <div class="right order-2 flex flex-col justify-center gap-8 py-5">
        <!-- heading -->
        <div class="react-heading">
          <div class="title-inner mb-4">
            <h1
              class="title text-[#221859] text-[1.625rem] leading-[1.2] sm:text-[2.75rem] sm:leading-[1.5] md:leading-[4.125rem] font-semibold md:text-[3.75rem] font-title"
            >
            {!! $banners->title !!}

            </h1>
          </div>
          <div class="description">
            <p
              class="disc text-base leading-[1.9] text-[var(--bodyColor)] font-[500]"
            >
            {{ $banners->content }}
            </p>
          </div>
        </div>
        <!-- view all courses -->
        <div class="widget-container">
          <div class="primary_btn w-48">
            <a
              class="react_button flex justify-center gap-4 py-2 px-4 rounded bg-[var(--primaryColor)] text-white"
              href=""
            >
              <span class="btn_text">View All Course</span>
              <span>
                <i class="fa-solid fa-arrow-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      <!-- left content -->
      <div class="left md:order-2 flex items-center">
        <div class="img_container">
          <img
            loading="lazy"
            decoding="async"
            src="{{ $banners->getImageUrlAttribute() }}"
            alt=""
            srcset="
              https://studyhub.themewant.com/wp-content/uploads/2024/03/01.png         635w,
              https://studyhub.themewant.com/wp-content/uploads/2024/03/01-150x150.png 150w,
              https://studyhub.themewant.com/wp-content/uploads/2024/03/01-300x298.png 300w,
              https://studyhub.themewant.com/wp-content/uploads/2024/03/01-600x595.png 600w,
              https://studyhub.themewant.com/wp-content/uploads/2024/03/01-100x100.png 100w
            "
            sizes="(max-width: 635px) 100vw, 635px"
          />
        </div>
      </div>
    </div>
  </div>

  <!-- about us -->
  <div class="about_container py-12">
    <div class="container--fluid md:flex md:gap-16">
      <div class="right">
        <div
          class="about_img_container w-full min-w-[320px] h-[380px]"
          class="rounded-md"
        >
          <img
            class="rounded-md object-cover object-center"
            src="{{ $about->getImageUrlAttribute() }}"
            alt=""
          />
        </div>
      </div>
      <div class="left py-8 space-y-8">
        <div class="widget flex items-center gap-2">
          <div class="bulb_container w-5 h-auto">
            <img
              src="https://studyhub.themewant.com/wp-content/uploads/2024/03/bulb.png"
              alt=""
            />
          </div>
          <h3
            class="text-[var(--primaryColor)] font-[500] leading-[1] tracking-wider"
          >
          {!! $about->excerpt !!}
          </h3>
        </div>
        <div class="msg_container space-y-8">
            <h2 class="text-[1.5rem] leading-[1.25] font-semibold">
              {!! $about->title !!}
          </h2>
          <p
            class="disc text-base leading-[1.9] text-[var(--bodyColor)] font-[500]"
          >
            {!! $about->content !!}
          </p>
        </div>
        <div class="w-48">
          <a
            href="/about-us"
            class="px-4 py-2 bg-[var(--primaryColor)] text-white rounded flex gap-4 items-center justify-center"
          >
            <span>About</span>
            <span>
              <i class="fa-solid fa-arrow-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="testimonial_container">
    <div class="container bg-[var(--primaryColor)] flex flex-col text-white py-6 px-6 md:flex-row md:gap-16">
        <div class="container--fluid md:flex md:gap-16">
          <div class="left order-2 py-4 space-y-6 md:order-1">
            <div class="quotation_container">
              <span>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="60"
                  height="60"
                  viewBox="0 0 60 60"
                  fill="none"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M11.4563 28.125H22.5C23.4946 28.125 24.4484 28.5201 25.1516 29.2234C25.8549 29.9266 26.25 30.8804 26.25 31.875V43.125C26.25 44.1196 25.8549 45.0734 25.1516 45.7766C24.4484 46.4799 23.4946 46.875 22.5 46.875H11.25C10.2554 46.875 9.30161 46.4799 8.59835 45.7766C7.89509 45.0734 7.5 44.1196 7.5 43.125V30.6562C7.50114 27.2613 8.34029 23.9192 9.943 20.9264C11.5457 17.9335 13.8624 15.3826 16.6875 13.5L20.0437 11.25L22.1063 14.3625L18.75 16.6125C16.8006 17.9188 15.1451 19.6174 13.8892 21.5997C12.6334 23.582 11.8047 25.8044 11.4563 28.125ZM37.7063 28.125H48.75C49.7446 28.125 50.6984 28.5201 51.4016 29.2234C52.1049 29.9266 52.5 30.8804 52.5 31.875V43.125C52.5 44.1196 52.1049 45.0734 51.4016 45.7766C50.6984 46.4799 49.7446 46.875 48.75 46.875H37.5C36.5054 46.875 35.5516 46.4799 34.8484 45.7766C34.1451 45.0734 33.75 44.1196 33.75 43.125V30.6562C33.7511 27.2613 34.5903 23.9192 36.193 20.9264C37.7957 17.9335 40.1124 15.3826 42.9375 13.5L46.3125 11.25L48.3563 14.3625L45 16.6125C43.0506 17.9188 41.3951 19.6174 40.1392 21.5997C38.8834 23.582 38.0547 25.8044 37.7063 28.125Z"
                    fill="white"
                  ></path>
                </svg>
              </span>
            </div>
            <div>
              <p class="text-xl tracking-wide">
               {!! $message->content !!}
              </p>
            </div>
            <div class="">
              <h4 class="font-bold text-[1.3rem] leading-4 tracking-wide">
                {!! $message->title !!}
              </h4>
              <span class="font-semibold text-xs">{!! $message->excerpt !!}</span>
            </div>
          </div>

          <div class="right order-1 flex justify-center">
            <div class="img_container w-full max-w-[600px] h-auto">
              <img
                class="rounded-md"
                src="{{ $message->getImageUrlAttribute() }}"
                alt=""
              />
            </div>
          </div>
      </div>
    </div>
  </div>
</main>

@endsection

@push('scripts')
<script>
 
</script>
@endpush