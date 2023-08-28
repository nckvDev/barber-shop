<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Add Hair') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div>
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
                          class="rounded-md w-full bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                  </button>
                </div>
              </form>
              @if (session('success'))
                <script>
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'บันทึกข้อมูลสำเร็จ',
                    showConfirmButton: false,
                    timer: 1500
                  })
                </script>
              @endif
            </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
