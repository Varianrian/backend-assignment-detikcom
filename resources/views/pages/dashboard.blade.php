@extends("layout.app")

@section("content")
  <main class="flex flex-col min-h-screen py-8 w-full max-w-[80vw] mx-auto gap-4">
    {{-- Button Create Book --}}
    <div class="">
      <a
        href=""
        class="inline-block rounded border border-indigo-500 px-4 py-2 text-sm leading-none text-indigo-500 hover:border-transparent hover:bg-indigo-500 hover:text-white"
      >
        Create Book
      </a>
    </div>
      
    {{-- Table --}}
    <div class="overflow-x-auto w-full bg-white shadow-md rounded-lg">
      <table class="table-auto w-full">
        <thead>
          <tr>
            <th class="px-4 py-2">No</th>
            <th class="px-4 py-2">Book Cover</th>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Author</th>
            <th class="px-4 py-2">Book Category</th>
            <th class="px-4 py-2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="border px-4 py-2 text-center">1</td>
            <td class="border px-4 py-2 flex justify-center">
              <img
                src="https://via.placeholder.com/150"
                alt="Book Cover"
                class="w-24 h-32 object-cover object-center"
              />
            </td>
            <td class="border px-4 py-2">Book Title</td>
            <td class="border px-4 py-2">Book Author</td>
            <td class="border px-4 py-2">
              <a
                href=""
                class="inline-block rounded border border-indigo-500 px-4 py-2 text-sm leading-none text-indigo-500 hover:border-transparent hover:bg-indigo-500 hover:text-white"
              >
                Edit
              </a>
              <a
                href=""
                class="inline-block rounded border border-red-500 px-4 py-2 text-sm leading-none text-red-500 hover:border-transparent hover:bg-red-500 hover:text-white"
              >
                Delete
              </a>
            </td>
          </tr>
      </table>
    </div>

    {{-- Pagination --}}
    {{-- {{ $paginator->links('view.name') }} --}}
  </main>
@endsection