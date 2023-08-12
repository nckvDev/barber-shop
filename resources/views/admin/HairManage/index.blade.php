<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Hair Manage') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <div>
            @if(session('success'))
              <h3 class="text-green-600">Add Success !</h3>
            @endif
          </div>
          <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
              <h3>Hair Style</h3>
              <table class="w-full  border-collapse text-sm rounded-l">
                <thead>
                <tr>
                  <th class="border border-slate-400">id</th>
                  <th class="border border-slate-400 p-2">Title</th>
                  <th class="border border-slate-400">Sub Title</th>
                  <th class="border border-slate-400">Description</th>
                  <th class="border border-slate-400 p-4">View</th>
                </tr>
                </thead>
                <tbody>
                @forelse($hairs as $hair)
                  <tr>
                    <td class="border border-slate-400 ">
                      <div class="w-max p-4">
                        {{ $hair->id }}
                      </div>
                    </td>
                    <td class="border border-slate-400 ">
                      <div class="w-max p-4">
                        {{ $hair->title }}
                      </div>
                    </td>
                    <td class="border border-slate-400 w-1/4">
                      <div class="px-4 line-clamp-2 hover:line-clamp-none">
                        {{ $hair->sub_title }}
                      </div>
                    </td>
                    <td class="border border-slate-400 ">
                      <div class="px-4 line-clamp-2 hover:line-clamp-none">
                        {{ $hair->description }}
                      </div>
                    </td>
                    <td class="border border-slate-400 text-center">
                      <a href="{{ url('/view/'.$hair->id) }}">view</a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="3" class="text-center py-4 bg-gray-100">
                      No Hair Style
                    </td>
                  </tr>
                @endforelse
                </tbody>
              </table>
            </div>
            <div>
              <h3>Add Hair Style</h3>
              <form action="{{ route('addHair') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                  <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                  <input type="text" name="title"
                         class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="mb-4">
                  <label for="sub_title" class="block text-sm font-medium leading-6 text-gray-900">Sub Title</label>
                  <input type="text" name="sub_title"
                         class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <div class="mb-4 flex gap-4">
                  <div class="grow">
                    <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                    <select name="category"
                            class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      <option value="">เลือก</option>
                      <option value="0">ทรงผม</option>
                      <option value="1">สไตล์ผม</option>
                      <option value="2">สีผม</option>
                      <option value="3">การดูแลผม</option>
                      <option value="4">ผลิตภัณฑ์ดูแลผม</option>
                      <option value="5">ร้าน</option>
                    </select>
                  </div>
                  <div class="grow">
                    <label for="sub_category" class="block text-sm font-medium leading-6 text-gray-900">Sub-category</label>
                    <select name="sub_category"
                            class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      <option value="">เลือก</option>
                      <option value="0">ประเภทผม</option>
                      <option value="1">รูปหน้า</option>
                    </select>
                  </div>
                </div>
                <div class="mb-4"></div>
                <div class="mb-4">
                  <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                  <textarea rows="6" name="description" type="text"
                            class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
                <div class="mb-4">
                  <label for="images" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                  <input type="file" name="images[]" accept="image/*" multiple>
                </div>
                <div>
                  {{--                  <button type="submit">Submit</button>--}}
                  <button type="submit"
                          class="rounded-md w-full bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
