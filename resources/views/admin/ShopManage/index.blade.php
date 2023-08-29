<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Shop Manage') }}
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
                  title: 'บันทึกข้อมูลสำเร็จ',
                  showConfirmButton: false,
                  timer: 3000
                })
              </script>
            @endif
          </div>
          <div class="mb-4">
            <a href="{{ route('add-Shop') }}"
               class="rounded-md  bg-green-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
              Add Shop
            </a>
          </div>
          <table class="min-w-full text-left text-sm font-light">
            <thead class="border-b font-medium dark:border-neutral-500">
            <tr>
              <th scope="col" class="px-6 py-4">#</th>
              <th scope="col" class="px-6 py-4">ชื่อร้าน</th>
              <th scope="col" class="px-6 py-4">สถานะ</th>
              <th scope="col" class="px-6 py-4">เบอร์โทรศัพท์</th>
              <th scope="col" class="px-6 py-4">เวลาเปิด</th>
              <th scope="col" class="px-6 py-4">ภาพร้าน</th>
              <th scope="col" class="px-6 py-4">จัดการ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($shops as $shop)
              <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 ">
                <td class=" px-6 py-4 font-medium">
                  {{ $shop->id }}
                </td>
                <td class=" px-6 py-4">
                  <div class="w-max">
                    {{ $shop->shop_name }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="w-max">
                    {{ $shop->status === 'active' ? 'เปิดอยู่' : 'ปิดอยู่' }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="line-clamp-2 hover:line-clamp-none transition delay-1000 ">
                    {{ $shop->phone_number }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="w-max">
                    {{ $shop->open_hours }}
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div>
                    <img src="/shop_image/{{$shop->shop_image}}" alt="image" class="w-36">
                  </div>
                </td>
                <td class=" px-6 py-4">
                  <div class="w-max">
                    <a href="{{ url('/admin/shop-edit/'.$shop->id) }}"
                       class="text-yellow-500 font-semibold border border-yellow-500 rounded-md px-2 py-1 hover:bg-yellow-500 hover:text-white transition">edit</a>
                    <a href="{{ url('/admin/shop-delete/'.$shop->id) }}"
                       class="text-red-500 font-semibold border border-red-500 rounded-md px-2 py-1 hover:bg-red-500 hover:text-white transition">delete</a>
                  </div>
                </td>

                {{--                    <img src="/hair_image/{{$image->image}}" alt="image">--}}
                {{--                    <td class="border border-slate-400 text-center">--}}
                {{--                      <a href="{{ url('/view/'.$shop->id) }}">view</a>--}}
                {{--                    </td>--}}
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
      </div>
    </div>
  </div>
</x-app-layout>
