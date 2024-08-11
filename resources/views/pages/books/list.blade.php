@extends("layout.app")

@section("content")
  <main class="mx-auto flex min-h-screen w-full max-w-[80vw] flex-col gap-4 py-8">
    <div class="flex flex-col items-start justify-between gap-3 lg:flex-row lg:items-center">
      {{-- Button Create Book --}}
      <a
        href="{{ route("books.create") }}"
        class="inline-block rounded border border-indigo-500 px-4 py-2 text-sm leading-none text-indigo-500 hover:border-transparent hover:bg-indigo-500 hover:text-white"
      >
        Create Book
      </a>

      {{-- Category Filter --}}

      <div class="relative">
        <select
          class="block rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
          required
        >
          <option value="" disabled selected>Filter by Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      {{-- Search --}}
      <div class="relative">
        <form class="mx-auto flex max-w-sm items-center">
          <label for="simple-search" class="sr-only">Search</label>
          <div class="relative w-full">
            <input
              type="text"
              id="simple-search"
              class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
              placeholder="Search book name..."
              required
            />
          </div>
          <button
            type="submit"
            class="ms-2 rounded-lg border border-blue-700 bg-blue-700 p-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
          >
            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
              />
            </svg>
            <span class="sr-only">Search</span>
          </button>
        </form>
      </div>
    </div>

    {{-- Table --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-left text-sm">
        <thead class="bg-gray-50 text-xs uppercase text-gray-700">
          <tr>
            <th scope="col" class="px-6 py-3">Book Cover</th>
            <th scope="col" class="px-6 py-3">Book Name</th>
            <th scope="col" class="px-6 py-3">Category</th>
            <th scope="col" class="px-6 py-3">Description</th>
            <th scope="col" class="px-6 py-3">Quantity</th>
            <th scope="col" class="px-6 py-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          {{--
            <tr class="border-b bg-white hover:bg-gray-50">
            <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
            <img src="https://via.placeholder.com/150" alt="Book Cover" class="h-24 w-16 rounded-lg object-cover" />
            </th>
            <td class="px-6 py-4">Bumi Manusia</td>
            <td class="px-6 py-4">Novel</td>
            <td class="px-6 py-4">
            Bumi Manusia adalah sebuah novel karya Pramoedya Ananta Toer yang pertama kali diterbitkan pada tahun
            1980.
            </td>
            <td class="px-6 py-4">10 pcs</td>
            <td class="flex h-full flex-row flex-wrap items-start gap-2 px-6 py-4 lg:flex-col">
            <a href="#" class="rounded-lg border border-blue-600 px-2 py-1 font-medium text-blue-600 hover:underline">
            Edit
            </a>
            <a href="#" class="rounded-lg border border-red-600 px-2 py-1 font-medium text-red-600 hover:underline">
            Delete
            </a>
            <a
            href="#"
            class="rounded-lg border border-green-600 px-2 py-1 font-medium text-green-600 hover:underline"
            >
            Download PDF
            </a>
            </td>
            </tr>
          --}}
          @if ($books->count() > 0)
            @foreach ($books as $book)
              <tr class="border-b bg-white hover:bg-gray-50">
                <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                  <img
                    src="{{ asset($book->book_cover_image) }}"
                    alt="Book Cover"
                    class="h-24 w-16 rounded-lg object-cover"
                  />
                </th>
                <td class="px-6 py-4">{{ $book->title }}</td>
                <td class="px-6 py-4">{{ $book->category->name }}</td>
                <td class="px-6 py-4">{{ $book->description }}</td>
                <td class="px-6 py-4">{{ $book->quantity }} pcs</td>
                <td class="flex h-full flex-row flex-wrap items-start gap-2 px-6 py-4 lg:flex-col">
                  <a
                    href="{{ route("books.edit", $book->id) }}"
                    class="rounded-lg border border-blue-600 px-2 py-1 font-medium text-blue-600 hover:underline"
                  >
                    Edit
                  </a>
                  <a
                    href="{{ route("books.delete", $book->id) }}"
                    class="rounded-lg border border-red-600 px-2 py-1 font-medium text-red-600 hover:underline"
                  >
                    Delete
                  </a>
                  <a
                    href="{{ asset($book->book_file) }}"
                    class="rounded-lg border border-green-600 px-2 py-1 font-medium text-green-600 hover:underline"
                  >
                    Download PDF
                  </a>
                </td>
              </tr>
            @endforeach
          @else
            <tr class="border-b bg-white hover:bg-gray-50">
              <td class="px-6 py-4" colspan="6">No data available</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </main>
@endsection
