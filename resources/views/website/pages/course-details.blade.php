@extends('website.layout.app')

@section('content')
<main>
    <div class="flex flex-col gap-y-12">
      <section class="w-full p-12" role="banner">
        <div>
          <div
            class="container--fluid text-[var(--whiteColor)] pt-10"
          >
            
            <h1 class="text-4xl font-bold text-[var(--darkblack)] py-12">
                    {{ $course->title }}
            </h1>
          </div>
        </div>
      </section>
      <section
        class="container--fluid min-h-[100%] flex flex-col-reverse gap-8 lg:flex-row"
      >
        <div class="lg:w-[70%] flex flex-col gap-y-8">
          <div
            class="flex flex-wrap w-full gap-4 md:flex-nowrap md:justify-start md:gap-0"
          >
            <button
              class="tab flex-1 min-w-[calc(50%-0.5rem)] md:min-w-0 capitalize border rounded px-3 py-2 text-[var(--primaryColor)]"
              data-target="#tab1"
            >
              syllabus
            </button>

            <button
              class="tab flex-1 min-w-[calc(50%-0.5rem)] md:min-w-0 capitalize border rounded px-3 py-2 text-[var(--primaryColor)]"
              data-target="#tab2"
            >
              Academic content
            </button>

            <button
              class="tab flex-1 min-w-[calc(50%-0.5rem)] md:min-w-0 capitalize border rounded px-3 py-2 text-[var(--primaryColor)]"
              data-target="#tab3"
            >
              Notes
            </button>

           

            <button
              class="tab flex-1 w-1/2 md:w-auto capitalize border rounded px-3 py-2 text-[var(--primaryColor)]"
              data-target="#tab5"
            >
              MCQ
            </button>
          </div>
          <hr />
          <div class="shadow-xl h-full px-4">
            <div id="tab1" class="tab-content h-full hidden min-h-[1100px]">
              <h2 class="capitalize font-semibold text-xl py-8">Syllabus</h2>
              <p>
                   {!! $course->decription !!} 
              </p>
            </div>

            <div id="tab2" class="tab-content h-full hidden min-h-[1100px]">
              <h2 class="capitalize font-semibold text-xl py-6">
                Academic content
              </h2>
              <p>
                {!! $course->academic_content !!} 
              </p>
            </div>
            <div id="tab3" class="tab-content h-full hidden min-h-[1100px]">
              <h2 class="capitalize font-semibold text-xl py-8">Notes</h2>
              @auth
                <p>{!! $course->curriculum !!}</p>
                @else
                <div class="flex justify-center h-full">
                    <i class="fa-solid fa-lock text-4xl text-gray-500"></i>
                    <p class="mt-4 text-lg text-gray-500">To access this, please <a href="{{ route('login') }}" class="text-blue-500 font-bold">login first</a>.</p>
                </div>
                @endauth
            </div>
            
            <div
              id="tab5"
              class="tab-content hidden h-full min-h-[1100px] pb-12"
            >
              <h2 class="capitalize font-semibold text-xl py-8">MCQ</h2>
              @auth
                <p>{!! $course->curriculum !!}</p>
                @else
                <div class="flex justify-center h-full">
                    <i class="fa-solid fa-lock text-4xl text-gray-500"></i>
                    <p class="mt-4 text-lg text-gray-500">To access this, please <a href="{{ route('login') }}" class="text-blue-500 font-bold">login first</a>.</p>
                </div>
                @endauth
            </div>
          </div>
        </div>
        <div class="lg:w-[30%] lg:relative">
          <div
            class="p-4 border shadow-xl rounded space-y-4 lg:relative lg:right-0 lg:top-[-10%] lg:z-50"
          >
            <figure>
              <img
                class="object-cover"
                src="{{ $course->image_url }}"
                alt="course image"
                style="height: 300px"
              />
            </figure>
            <button
              class="capitalize bg-[var(--primaryColor)] py-2 rounded w-full text-[var(--whiteColor)] font-bold"
            >
              start learning
            </button>
            <h2 class="font-bold text-xl">This course includes:</h2>
            <ul class="capitalize">
              <li class="flex justify-between items-center py-6">
                <span>Level</span><span>Subba</span>
              </li>
              <hr />
              <li class="flex justify-between items-center py-6">
                <span>Total enrolled</span><span>{{ $course->students }}</span>
              </li>
              <hr />
              <li class="flex justify-between items-center py-6">
                <span>duration</span><span>{{ $course->duration }}months</span>
              </li>
              <hr />
              <li class="flex justify-between items-center py-6">
                <span>last updated</span><span>{{ \Carbon\Carbon::parse($course->updated_at)->format('F j, Y') }}</span>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <div
        class="container--fluid w-full h-[200px] flex flex-col items-center justify-center gap-y-4 bg-[#553CDF] md:flex-row md:justify-around md:items-center"
      >
        <div class="text-[var(--whiteColor)] capitalize text-3xl font-bold">
          <h2 class="">Learn From the</h2>
          <h2 class="">Vera institute</h2>
        </div>
        <div>
          <button
            class="capitalize p-3 font-bold flex items-center border border-[(--whiteColor)] gap-x-2 bg-[var(--whiteColor)] rounded text-[#553cdf] hover:bg-[#553cdf] hover:text-[var(--whiteColor)] hover:border-[var(--whiteColor)]"
          >
            <p>View All courses</p>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </button>
        </div>
      </div>
    </div>
  </main>



@endsection

@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>

  <script> 
const tabs = document.querySelectorAll(".tab");
const inactiveClass = "text-[var(--primaryColor)]";
const activeClass = ["bg-[#553cdf]", "text-[#ffffff]"];
const tab1 = document.querySelector("#tab1");
const tabContent = document.querySelectorAll(".tab-content");
console.log("i am in tabs section");
tabs[0].classList.remove(inactiveClass);
tabs[0].classList.add(...activeClass);

tab1.classList.remove("hidden");

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    const targetContent = document.querySelector(tab.dataset.target);
    tabContent.forEach((content) => {
      content.classList.add("hidden");
    });
    targetContent.classList.remove("hidden");
    tabs.forEach((activeTab) => activeTab.classList.remove(...activeClass));
    tab.classList.remove(inactiveClass);
    tab.classList.add(...activeClass);
  });
});

  </script>

@endpush