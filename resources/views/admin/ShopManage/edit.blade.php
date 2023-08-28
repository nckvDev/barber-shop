<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Shop') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <div>
            @if(session('success'))
              {{--              <h3 class="text-green-600">Add Success !</h3>--}}
              <script>
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'แก้ไขข้อมูลสำเร็จ',
                  showConfirmButton: false,
                  timer: 3000
                })
              </script>
            @endif
          </div>
          <div>
            <form action="{{ url('/admin/shop-update/'.$shop->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-4">
                <label for="shop_name" class="block text-sm font-medium leading-6 text-gray-900">ชื่อร้าน</label>
                <input type="text" name="shop_name" placeholder="ดรีมเวิลด์ ซาลอน" value="{{ old('shop_name', $shop->shop_name) }}"
                       class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              <div class="mb-4 flex gap-4">
                <div class="grow">
                  <label for="status" class="block text-sm font-medium leading-6 text-gray-900">สถานะเปิด-ปิด</label>
                  <select name="status"
                          class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="active" {{old('status', $shop->status ) == "active" ? 'selected' : null}}>เปิดอยู่</option>
                    <option value="inActive" {{old('status', $shop->status ) == "inActive" ? 'selected' : null}}>ปิดอยู่</option>
                  </select>
                </div>
              </div>
              <div class="mb-4">
                <label for="phone_number"
                       class="block text-sm font-medium leading-6 text-gray-900">เบอร์โทรศัพท์</label>
                <input type="text" name="phone_number" placeholder="0999999999" value="{{ old('phone_number', $shop->phone_number)}}"
                       class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              <div class="mb-4"></div>
              <div class="mb-4">
                <label for="open_hours" class="block text-sm font-medium leading-6 text-gray-900">เวลาเปิดปิด</label>
                <input name="open_hours" type="text" placeholder="08:30-19:30" value="{{ old('open_hours', $shop->open_hours) }}"
                       class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
              </div>
              <div class="mb-4">
                <label for="shop_image" class="block text-sm font-medium leading-6 text-gray-900">รูปภาพร้าน</label>
                <input type="file" name="shop_image" accept="image/*">
                <div class="flex gap-4 mt-4">
                    <img src="/shop_image/{{$shop->shop_image}}" alt="image shop" class="w-52">
                </div>
              </div>
              <div class="mb-4">
                <label for="map_image"
                       class="block text-sm font-medium leading-6 text-gray-900">รูปภาพที่อยู่ร้าน</label>
                <input type="file" name="map_image" accept="image/*">
                <div class="flex gap-4 mt-4">
                  <img src="/shop_image/{{$shop->map_image}}" alt="image shop" class="w-52">
                </div>
              </div>
              {{--                  <button type="submit">Submit</button>--}}
              <button type="submit"
                      class="rounded-md w-full bg-indigo-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                บันทึก
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
