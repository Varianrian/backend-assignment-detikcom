{{-- Navbar --}}
<nav class="flex flex-wrap items-center justify-between bg-gray-600 px-6 py-4">
  <div class="mr-6 flex flex-shrink-0 items-center text-white">
    <span class="text-xl font-semibold tracking-tight">{{ config("app.name", "Laravel") }}</span>
  </div>
  <div class="block lg:hidden">
    <button
      id="nav-toggle"
      class="flex items-center rounded border border-gray-200 px-3 py-1 text-gray-200 hover:text-white"
    >
      <svg class="h-3 w-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <title>Menu</title>
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
      </svg>
    </button>
  </div>
  <div class="block hidden w-full flex-grow lg:flex lg:w-auto lg:items-center" id="nav-content">
    <div class="text-sm lg:flex-grow">
      <a href="" class="mr-4 mt-4 block text-gray-200 hover:text-white lg:mt-0 lg:inline-block">Book</a>
      @if (auth()->user()->role === "admin")
        <a
          href="{{ route("book-categories.index") }}"
          class="mr-4 mt-4 block text-gray-200 hover:text-white lg:mt-0 lg:inline-block"
        >
          Categories
        </a>
      @endif
    </div>

    @auth
      <p class="mt-4 text-gray-200 lg:mx-4 lg:mt-0 lg:inline-block">Hi, {{ auth()->user()->name }}!</p>
      <div>
        <a
          href="{{ route("logout") }}"
          class="mt-4 inline-block rounded border border-white px-4 py-2 text-sm leading-none text-white hover:border-transparent hover:bg-blue-500 lg:mt-0"
        >
          Logout
        </a>
      </div>
    @else
      <div>
        <a
          href="{{ route("login") }}"
          class="mt-4 inline-block rounded border border-white px-4 py-2 text-sm leading-none text-white hover:border-transparent hover:bg-blue-500 lg:mt-0"
        >
          Login
        </a>
      </div>
    @endauth
  </div>

  <script>
    document.getElementById('nav-toggle').addEventListener('click', function () {
      document.getElementById('nav-content').classList.toggle('hidden');
    });
  </script>
</nav>
