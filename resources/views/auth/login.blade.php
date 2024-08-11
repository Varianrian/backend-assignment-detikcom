@extends("layout.app")

@section("content")
  <main class="flex min-h-screen items-center justify-center">
    <div class="w-full max-w-md">
      <div class="rounded-lg bg-white p-8 shadow-lg">
        <h1 class="mb-6 text-center text-2xl font-semibold">Login {{ config("app.name", "Laravel") }}</h1>

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

        <form method="POST" action="{{ route("login.authenticate") }}">
          @csrf
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
              id="email"
              type="email"
              name="email"
              value="{{ old("email") }}"
              required
              autocomplete="email"
              autofocus
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
              autocomplete="current-password"
              class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
            />
          </div>
          <button
            type="submit"
            class="w-full rounded-md bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100"
          >
            Login
          </button>

          @if (Route::has("register"))
            <p class="mt-4 text-sm text-gray-600">
              Don't have an account?
              <a href="{{ route("register") }}" class="text-indigo-600 hover:text-indigo-500">Register</a>
            </p>
          @endif
        </form>
      </div>
    </div>
  </main>
@endsection
