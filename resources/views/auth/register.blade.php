@extends("layout.app")

@section("content")
<main class="flex min-h-screen items-center justify-center">
  <div class="w-full max-w-md">
    <div class="rounded-lg bg-white p-8 shadow-lg">
      <h1 class="mb-6 text-center text-2xl font-semibold">Register {{ config("app.name", "Laravel") }}</h1>

      {{-- error messages --}}
      @if ($errors->any())
        <div class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-2 text-red-700" role="alert">
          <ul class="list-inside list-disc">
            @foreach ($errors->all() as $error)
              <li class="text-sm">{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route("register.store") }}">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input
            id="name"
            type="text"
            name="name"
            value="{{ old("name") }}"
            required
            autocomplete="name"
            autofocus
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
          />
        </div>
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
            id="email"
            type="email"
            name="email"
            value="{{ old("email") }}"
            required
            autocomplete="email"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
          />
        </div>
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            id="password"
            type="password"
            name="password"
            required
            autocomplete="new-password"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
          />
        </div>
        <div class="mb-4">
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
          />
        </div>
        <button
          type="submit"
          class="w-full rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100"
        >
          Register
        </button>

        @if (Route::has("login"))
          <p class="mt-4 text-sm text-gray-600">
            Already have an account?
            <a href="{{ route("login") }}" class="text-indigo-600 hover:text-indigo-500">Login</a>
          </p>
        @endif
      </form>
    </div>
  </div>
</main>

@endsection

