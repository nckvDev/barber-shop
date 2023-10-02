<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('แก้ไขการดูแลผม') }}
      </h2>
      <div>{{ Auth::user()->name }}</div>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <div>
            <form action="{{ url('/admin/hair-care-update/'.$hair->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-4">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">หัวข้อ</label>
                <input type="text" name="title" value="{{$hair->title}}"
                       class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              <div class="mb-4">
                <label for="sub_title" class="block text-sm font-medium leading-6 text-gray-900">คำอธิบาย</label>
                <input type="text" name="sub_title" value="{{$hair->sub_title}}"
                       class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              <div class="mb-4 flex gap-4">
{{--                <div class="grow">--}}
{{--                  <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>--}}
{{--                  <select name="category"--}}
{{--                          class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">--}}
{{--                    --}}{{--                    <option value="">เลือก</option>--}}
{{--                    <option value="0" {{old('category', $hair->category ) == "0" ? 'selected' : null}}>ทรงผม</option>--}}
{{--                    <option value="1" {{old('category', $hair->category ) == "1" ? 'selected' : null}}>สไตล์ผม</option>--}}
{{--                    <option value="2" {{old('category', $hair->category ) == "2" ? 'selected' : null}}>สีผม</option>--}}
{{--                    <option value="3" {{old('category', $hair->category ) == "3" ? 'selected' : null}}>การดูแลผม--}}
{{--                    </option>--}}
{{--                    <option value="4" {{old('category', $hair->category ) == "4" ? 'selected' : null}}>ผลิตภัณฑ์ดูแลผม--}}
{{--                    </option>--}}
{{--                    <option value="5" {{old('category', $hair->category ) == "5" ? 'selected' : null}}>ร้าน</option>--}}
{{--                  </select>--}}
{{--                </div>--}}
                <div class="grow">
                  <label for="sub_category"
                         class="block text-sm font-medium leading-6 text-gray-900">หมวดหมู่ย่อย</label>
                  <select name="sub_category"
                          class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    {{--                    <option value="">เลือก</option>--}}
                    <option value="0" {{old('sub_category', $hair->sub_category ) == "0" ? 'selected' : null}}>
                      เคล็ดลับดูแลผม
                    </option>
                    <option value="1" {{old('sub_category', $hair->sub_category ) == "1" ? 'selected' : null}}>การดูแลทั่วไป
                    </option>
                  </select>
                </div>
              </div>
              <div class="mb-4">
                <label for="images" class="block text-sm font-medium leading-6 text-gray-900">อัพรูปภาพ</label>
                <input type="file" name="images[]" accept="image/*" multiple>
                <div class="flex gap-4 mt-4">
                  @foreach($hair->images as $image)
                    <div>

                      <img src="/hair_care_image/{{$image->image}}" alt="image"
                           style="width: 143px;height: 180px;object-fit: cover;overflow: hidden;">
                      <div class="bg-red-200 px-3 py-2 rounded-md text-center mt-3">
                        <a href="/admin/image-care-remove/{{$image->id}}">ลบภาพ</a>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="mb-4"></div>
              <div class="mb-4">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">เนื้อหา</label>
                <textarea rows="6" name="description" type="text" id="description"
                          class="block w-full rounded-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  {{$hair->description}}
                </textarea>
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
                  title: 'บันทึกข้อมูลเรียบร้อย',
                  showConfirmButton: false,
                  timer: 1500
                })
              </script>
            @endif

            <script type='text/javascript'
                    src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
            <script>
              new FroalaEditor('#description', {
                // imageUploadParam: 'image_param',
                imageUploadMethod: 'POST',
                height: 400,
                imageUploadURL: "{{ route('imageUpload') }}",
                imageUploadParams: {
                  froala: 'true',
                  _token: "{{ csrf_token() }}"
                }
              });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
