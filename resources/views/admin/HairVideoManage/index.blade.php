<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('วิดีโอ') }}
      </h2>
      <div>{{ Auth::user()->name }}</div>
    </div>
  </x-slot>

  <div class="py-12 overflow-x-auto">
    <div class="mx-auto sm:px-6 lg:px-8 ">
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
          <div>
            <div class="mb-4">
              <a href="{{ route('admin.add-hair-video') }}"
                 class="rounded-md  bg-green-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                เพิ่มวิดีโอทรงผม
              </a>
            </div>
            <table class="min-w-full text-left text-sm font-light">
              <thead class="border-b font-medium dark:border-neutral-500">
              <tr>
{{--                <th scope="col" class="px-6 py-4">#</th>--}}
                <th scope="col" class="px-6 py-4">หัวเรื่อง</th>
                <th scope="col" class="px-6 py-4">คำอธิบาย</th>
                <th scope="col" class="px-6 py-4">เนื้อหา</th>
                <th scope="col" class="px-6 py-4"></th>
              </tr>
              </thead>
              <tbody>
              @forelse($hairs as $hair)
                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 ">
{{--                  <td class="px-6 py-4 font-medium">--}}
{{--                    {{ $hair->id }}--}}
{{--                  </td>--}}
                  <td class="px-6 py-4">
                    <div class="w-max">
                      {{ $hair->title }}
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="line-clamp-2 hover:line-clamp-none transition delay-1000 w-40">
                      {{ $hair->sub_title }}
                    </div>
                  </td>
                  <td class="px-6 py-4 ">
                    <div class="line-clamp-2 hover:line-clamp-none transition delay-1000 w-72">
                      {{ $hair->description }}
                    </div>
                  </td>
                  <td class=" px-6 py-4">
                    <div class="w-max">
                      <a href="{{ url('/admin/hair-video-edit/'.$hair->id) }}"
                         class="text-yellow-500 font-semibold border border-yellow-500 rounded-md px-2 py-1 hover:bg-yellow-500 hover:text-white transition">แก้ไข</a>
                      <a href="{{ url('/admin/hair-video-delete/'.$hair->id) }}" class="text-white font-semibold bg-red-600 rounded-md px-2 py-1 border hover:bg-red-900 transition delete-confirm">ลบ</a>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center py-4 bg-gray-100">
                    No Video Hair Style
                  </td>
                </tr>
              @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function () {
      $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
          title: 'คุณแน่ใจ?',
          text: "คุณต้องการลบข้อมูลนี้หรือไม่!",
          icon: 'warning',
          focusCancel: true,
          showCancelButton: true,
          confirmButtonColor: '#007bff',
          cancelButtonColor: '#dc3545',
          confirmButtonText: 'ตกลง',
          cancelButtonText: 'ยกเลิก'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url;
            // Swal.fire({
            //   position: 'center',
            //   icon: 'success',
            //   title: 'ลบข้อมูลเรียบร้อย',
            //   showConfirmButton: false,
            //   timer: 1500
            // })
          }
        })
      })
    });
  </script>
</x-app-layout>
