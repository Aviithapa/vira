
@extends('website.layout.app')

@section('content')
   

<main>
  <div class="container--fluid py-8 md:py-16">
    <div
      class="login_form_container w-full max-w-[800px] mx-auto border border-[var(--bs-gray-300)] rounded-md px-4 py-4 md:px-12 md:py-12 shadow-[0_4px_20px_0px_rgba(0,_0,_0_0.05)]"
    >
    <form action="{{ url('/login') }}" method="POST"  class="flex flex-col gap-8">

        <h2 class="text-2xl font-[500] tracking-wider mb-4 md:mb-8">
          Login
        </h2>
        <div class="space-y-4 md:space-y-6">
          <div class="form_input">
            <input
              class="w-full text-[var(--bodyColor)] h-9 md:h-12 outline-none border border-gray-300 rounded-md px-4"
              type="text"
              required
              name="email"
              placeholder="Email"
              value="{{ old('email') }}"

            />
          </div>
          <div class="form_input">
            <input
              class="w-full text-[var(--bodyColor)] h-9 md:h-12 outline-none border border-gray-300 rounded-md px-4"
              type="password"
              required
              name="password"
              placeholder="password"
              value="{{ old('password') }}"

            />
          </div>
          <div class="text-right">
            {{-- <a href="/forgot">
              <span class="text-[var(--bodyColor)] capitalize"
                >forgot?</span
              >
            </a> --}}
          </div>
          <div class="">
            <button
              class="w-full py-2 md:py-4 text-center bg-[var(--primaryColor)] rounded-md text-white"
              type="submit"
            >
              Sign In
            </button>
          </div>
          {{-- <div class="ext-lg md:text-xl text-center">
            <span class="text-[var(--bodyColor)]"
              >Don't have an account?</span
            >
            <a class="text-[var(--primaryColor)]" href="">Register Now</a>
          </div> --}}
        </div>
      </form>
    </div>
  </div>
</main>



@endsection