
@extends('website.layout.app')

@section('content')

<main class="w-full flex flex-col gap-y-16">
  <!-- banner container -->

  <div
    class="container--fluid flex flex-col gap-y-12 lg:flex-row md:gap-x-16"
  >
    <!-- title and form -->
    <div class="flex flex-col gap-y-12 lg:flex-1">
      <!-- title  -->
      <div class="flex flex-col gap-y-2">
        <strong class="text-4xl">Love to hear from you</strong>
        <p class="text-4xl">Get in touch !</p>
      </div>
      <!-- form container  -->
      @if(session('success'))
          <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">
              {{ session('success') }}
          </div>
      @endif
      <form action="{{ url('contact') }}" method="POST" class="space-y-4 w-full">
        @csrf
        <div class="space-y-2 w-full">
          <label class="capitalize block font-semibold" for="name"
            >Your Name <span class="font-bold">*</span></label
          >
          <input
            class="border p-2 focus:outline-1 focus:outline-[var(--secondaryColor)] w-full"
            type="text"
            name="name"
            id="name"
            placeholder="john..."
            required
            aria-required="true"
            autocomplete="on"
          />
        </div>
        <div class="space-y-2">
          <label class="capitalize block font-semibold" for="email"
            >Phone Number<span class="font-bold">*</span></label
          >
          <input
            class="border p-2 focus:outline-1 focus:outline-[var(--secondaryColor)] w-full"
            type="text"
            placeholder="98XXXXXXXX"
            name="phone"
            id="phone"
            required
            aria-required="true"
            autocomplete="on"
          />
        </div>
        <div class="space-y-2">
          <label class="capitalize block font-semibold" for="email"
            >Your Email<span class="font-bold">*</span></label
          >
          <input
            class="border p-2 focus:outline-1 focus:outline-[var(--secondaryColor)] w-full"
            type="email"
            placeholder="example@gmail.com"
            name="email"
            id="email"
            required
            aria-required="true"
            autocomplete="on"
          />
        </div>
        <div class="space-y-2">
          <label class="capitalize block font-semibold" for="message"
            >message<span class="font-bold">*</span></label
          >
          <textarea
            class="border p-2 focus:outline-1 focus:outline-[var(--secondaryColor)] w-full"
            name="message"
            id="message"
            placeholder="Tell us about you"
            rows="5"
            required
            aria-required="true"
            autocomplete="off"
          ></textarea>
        </div>
        <button
          class="capitalize bg-[var(--primaryColor)] py-2 px-4 rounded first-line:text-[var(--whiteColor)] font-bold"
          type="submit"
          aria-label="send message"
        >
          Send message
        </button>
      </form>
    </div>

    <!-- contacts and maps -->
    <div class="flex flex-col gap-y-12 lg:flex-1 mt-3">
      <!-- contacts  -->
      <div
        class="flex flex-col justify-between items-center gap-y-8 w-full md:flex-row"
      >
        <div class="flex flex-col justify-center items-center gap-y-4">
          <img
            src="{{ asset('frontend/icon_images/location_icon.png') }}"
            style="height:40px; object-fit:contain;"
            alt="location icon"
          />
          <p aria-label="address of vera institute">
            Sinamangal,Kathmandu,Nepal
          </p>
        </div>
        <div class="flex flex-col justify-center items-center gap-y-4">
          <img
            src="{{ asset('frontend/icon_images/phone_icon.png') }}"
            style="height:40px; object-fit:contain;"

            alt="location icon"
          />
          <ul aria-label="phone numbers of vera institute">
            <li>+97701-414243</li>
          </ul>
        </div>
        <div class="flex flex-col justify-center items-center gap-y-4">
          <img
            src="{{ asset('frontend/icon_images/clock_icon.png') }}"
            style="height:40px; object-fit:contain;"
            alt="location icon"
          />
          <ul aria-label="opening and closing time for vera institute">
            <li>Sun-Fri: 10 AM - 5 PM</li>
            <li>Sat: 10 AM - 5 PM</li>
          </ul>
        </div>
      </div>
      <!-- map  -->
      <div class="h-full">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14130.367130148492!2d85.34020015189226!3d27.69900911899382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19869793bff7%3A0xf2f77266b222365a!2sSinamangal%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1729768788234!5m2!1sen!2snp"
          width="100%"
          title="Google map showing address of vera institute"
          aria-label="Location map"
          height="100%"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        >
        </iframe>
      </div>
    </div>
  </div>
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
</main>
   

@endsection



@push('scripts')
<script src="https://cdn.tailwindcss.com"></script>
@endpush