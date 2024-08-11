@extends("layout.app")

@section("content")
  <main class="mx-auto flex min-h-screen w-full max-w-[80vw] flex-col gap-4 py-8">
    {{-- Create Form --}}
    <div class="flex flex-col items-start justify-between gap-3 lg:flex-row lg:items-center">
      <a
        href="{{ route("book-categories.index") }}"
        class="inline-block rounded border border-indigo-500 px-4 py-2 text-sm leading-none text-indigo-500 hover:border-transparent hover:bg-indigo-500 hover:text-white"
      >
        Back
      </a>
    </div>
    <h1 class="text-2xl font-semibold text-white">Edit Book Category</h1>

    <form action="{{ route("book-categories.update", $category->id) }}" method="POST" class="flex flex-col gap-4">
      @csrf

      <div class="flex flex-col gap-2">
        <label for="name" class="text-sm text-white">Category Name</label>
        <input
          type="text"
          id="name"
          name="name"
          class="rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
          placeholder="e.g. Novel"
          required
          value="{{ $category->name }}"
        />
        @error("name")
          <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <button
        type="submit"
        class="inline-block rounded border border-indigo-500 px-4 py-2 text-sm leading-none text-indigo-500 hover:border-transparent hover:bg-indigo-500 hover:text-white"
      >
        Create
      </button>
    </form>
  </main>
@endsection
