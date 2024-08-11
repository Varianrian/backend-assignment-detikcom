@extends("layout.app")

@section("content")
  <main class="mx-auto flex min-h-screen w-full max-w-[80vw] flex-col gap-4 py-8">
    {{-- Create Form --}}
    <div class="flex flex-col items-start justify-between gap-3 lg:flex-row lg:items-center">
      <a
        href="{{ route("books.index") }}"
        class="inline-block rounded border border-indigo-500 px-4 py-2 text-sm leading-none text-indigo-500 hover:border-transparent hover:bg-indigo-500 hover:text-white"
      >
        Back
      </a>
    </div>
    <h1 class="text-2xl font-semibold text-white">Create Book</h1>

    <form
      action="{{ route("books.update", $book->id) }}"
      method="POST"
      class="flex flex-col gap-4"
      enctype="multipart/form-data"
    >
      @csrf

      <div class="flex flex-col gap-2">
        <label for="title" class="text-sm text-white">Book Title</label>
        <input
          type="text"
          id="title"
          name="title"
          class="rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
          placeholder="e.g. The Great Gatsby"
          required
          value="{{ $book->title }}"
        />
        @error("title")
          <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex flex-col gap-2">
        <label for="author" class="text-sm text-white">Description</label>
        <textarea
          id="description"
          name="description"
          class="rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
          placeholder="e.g. A novel by F. Scott Fitzgerald"
          required
        >
{{ $book->description }}</textarea
        >
        @error("description")
          <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex flex-col gap-2">
        <label for="category_id" class="text-sm text-white">Category</label>
        <select
          id="book_category_id"
          name="book_category_id"
          class="rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
          required
        >
          <option value="" disabled selected>Select Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        @error("book_category_id")
          <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex flex-col gap-2">
        <label for="author" class="text-sm text-white">Quantity</label>
        <input
          type="number"
          id="quantity"
          name="quantity"
          min="0"
          class="rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
          placeholder="e.g. 10"
          required
          value="{{ $book->quantity }}"
        />
        @error("quantity")
          <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex flex-col gap-2">
        <label for="book_cover_image" class="text-sm text-white">Cover</label>
        <input
          type="file"
          accept="image/*"
          id="book_cover_image"
          name="book_cover_image"
          class="rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
        />
        @error("book_cover_image")
          <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex flex-col gap-2">
        <label for="book_file" class="text-sm text-white">File</label>
        <input
          type="file"
          accept="application/pdf"
          id="book_file"
          name="book_file"
          class="rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
        />
        @error("book_file")
          <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <button
        type="submit"
        class="inline-block rounded border border-indigo-500 px-4 py-2 text-sm leading-none text-indigo-500 hover:border-transparent hover:bg-indigo-500 hover:text-white"
      >
        Update
      </button>
    </form>
  </main>
@endsection
