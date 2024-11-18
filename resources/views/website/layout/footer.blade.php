<footer>
  <div
    class="footer_container pt-8 text-[var(--bodyColor)] bg-[var(--bs-gray-100)] space-y-8"
  >
    <div
      class="container--fluid grid gap-12 md:grid-cols-2 lg:grid-cols-[2fr_1fr_1fr_2fr]"
    >
      <div class="left space-y-8">
        <div class="logo_container w-28">
          <img src="{{ getSiteSetting('logo_image') }}" alt="logo image" />
        </div>
        <div class="desc">
          <p class="leading-[1.6]">
            We are passionate education dedicated to providing high-quality
            resources learners all backgrounds.
          </p>
        </div>
        <div class="address space-y-4">
          <div class="location flex items-center gap-4">
            <span class="text-[var(--primaryColor)]">
              <i class="fa-solid fa-location-dot"></i>
            </span>
            <span class="font-semibold">{{ getSiteSetting('location') }}</span>
          </div>
          <div class="phone flex items-center gap-4">
            <span class="text-[var(--primaryColor)]">
              <i class="fa-solid fa-phone"></i>
            </span>
            <span>{{ getSiteSetting('social_phone') }}</span>
          </div>
        </div>
      </div>
      <div class="m1 space-y-6">
        <h5 class="text-[var(--titleColor)] font-extrabold text-lg">
          Useful link 1
        </h5>
        <ul class="space-y-4">
          <li>
            <a class="capitalize hover:text-[var(--hoverColor)]" href="/"
              >home</a
            >
          </li>
          <li>
            <a class="capitalize hover:text-[var(--hoverColor)]" href="/contact"
              >contact</a
            >
          </li>
          <li>
            <a class="capitalize hover:text-[var(--hoverColor)]" href="/about"
              >about</a
            >
          </li>
        </ul>
      </div>
      <div class="m2 space-y-6">
        <h5 class="text-[var(--titleColor)] font-extrabold text-lg">
          Useful Links
        </h5>
        <ul class="space-y-4">
          <li>
            <a
              class="capitalize hover:text-[var(--hoverColor)]"
              href="https://www.nmc.org.np/"
              target="_blank"
            >
              Nepal Medical Council (NMC)
            </a>
          </li>
          <li>
            <a
              class="capitalize hover:text-[var(--hoverColor)]"
              href="https://nepalpharmacycouncil.org.np/"
              target="_blank"
            >
              Nepal Pharmacy Council
            </a>
          </li>
          <li>
            <a
              class="capitalize hover:text-[var(--hoverColor)]"
              href="https://www.nhpc.org.np/"
              target="_blank"
            >
              Nepal Health Professional Council
            </a>
          </li>
          <li>
            <a
              class="capitalize hover:text-[var(--hoverColor)]"
              href="https://nnc.org.np/"
              target="_blank"
            >
              Nepal Nursing Council
            </a>
          </li>
          <li>
            <a
              class="capitalize hover:text-[var(--hoverColor)]"
              href="https://www.nepalveterinarycouncil.org.np/"
              target="_blank"
            >
              Nepal Veterinary Council
            </a>
          </li>
        </ul>
      </div>
      <div class="right space-y-6 lg:flex-1">
        <h5 class="text-[var(--titleColor)] font-extrabold text-lg">
          News Letter
        </h5>
        <div class="news_letter_form space-y-5">
          <p>Subscribe Our newsletter get update our new course</p>
          <div class="form_container">
            <form class="space-y-6">
              <div class="relative h-14">
                <input
                  class="h-full w-full inline-block outline-none bg-transparent border border-[var(--bodyColor)] placeholder:text-[var(--bodyColor)] rounded px-4 text-[var(--secondaryColor)]"
                  type="email"
                  name="email"
                  placeholder="Enter your email"
                  aria-required="true"
                  required
                />
                <button
                  class="absolute right-2 top-1/2 -translate-y-1/2 capitalize font-semibold px-2 py-1.5 text-white bg-[var(--primaryColor)] rounded"
                  type="submit"
                >
                  subscribe
                </button>
              </div>
              {{-- <div class="agree_container flex items-center gap-2">
                <input
                  class="accent-[var(--primaryColor)]"
                  type="checkbox"
                  name="agree"
                  value="agree"
                />
                <span class="text-sm"
                  >I agree to the terms of use and privacy policy.</span
                >
              </div> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
    <div
      class="copyright_container flex flex-col items-center border-t border-[var(--bs-gray-400)] mx-4 py-8 space-y-4"
    >
      <div class="left text-center">
        <p class="text-lg font-thin">
          {{ getSiteSetting('copy_right') }}
        </p>
      </div>
      <div class="right text-[var(--naveBlue)]">
        <ul class="flex gap-8">
          <li>
            <a href="" target="_blank">
              <span class="text-lg">
                <i class="fa-brands fa-facebook-f"></i>
              </span>
            </a>
          </li>
          <li>
            <a href="" target="_blank">
              <span class="text-lg">
                <i class="fa-brands fa-instagram"></i>
              </span>
            </a>
          </li>

          <li>
            <a href="" target="_blank">
              <span class="text-lg">
                <i class="fa-brands fa-linkedin"></i>
              </span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>