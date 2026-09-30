@extends('shop.master-page-shop')

@section('content')
    <!-- top section -->
    <div class="lg:mr-8 lg:ml-16 h-full p-5 text-sm bg-white rounded-xl shadow-box-sm flex items-center gap-x-2">
      <a href="#" class="text-zinc-800 hover:text-red-400 transition">
        خانه
      </a>
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#3d3d3d" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
      </div>
      <a href="#" class="text-zinc-800 hover:text-red-400 transition">
        صفحه
      </a>
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#3d3d3d" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
      </div>
      <a class="text-red-400" href="#">
        وبلاگ
      </a>
      
    </div>

    <!-- 5 section blog -->
    <div>
      <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 lg:gap-5 mt-5 mb-10">
@foreach($maghales as $maghale)        
        <a href="/singlemaghale/{{$maghale->id}}" class="my-2 p-2 md:p-4 bg-white rounded-2xl drop-shadow-lg h-fit">
          <div class="image-box mb-6">
            <div class="relative">
              <img class="mx-auto rounded-xl " src="{{$maghale->maghaleimg}}" alt="" />
              <div class="absolute top-2 left-2">
              </div>
            </div>
          </div>
          <div class="">
            <span class="mb-2 flex justify-between items-center flex-wrap gap-y-2">
              <div class="flex flex-col gap-y-2">
                <span class="text-sm font-semibold text-zinc-800">
                 {{$maghale->maghaletitle}}
                </span>
              </div>
              <div class="flex items-start gap-x-1 text-xs text-zinc-400">
                <span>
                  {{$maghale->created_at}}
                </span>
                <svg class="fill-gray-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z"></path></svg>
              </div>
            </span>
          </div>
        </a>
@endforeach
      </div>
      <!-- number pages -->
      <div class="mb-14">
        <ul class="flex items-center justify-center gap-x-2 md:gap-x-3 h-8 text-sm">
          <li>
            <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 ms-0 text-gray-500 bg-white rounded-lg  hover:bg-red-100 hover:text-red-400">
              <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"></path>
              </svg>
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-red-500 bg-red-200 rounded-lg hover:bg-red-100">1</a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-gray-500 bg-white rounded-lg hover:bg-red-100 hover:text-red-400">2</a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 rounded-lg text-gray-500 bg-white  hover:bg-red-100 hover:text-red-400">3</a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-gray-500 bg-white rounded-lg  hover:bg-red-100 hover:text-red-400">...</a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-gray-500 bg-white rounded-lg  hover:bg-red-100 hover:text-red-400">8</a>
          </li>
          <li>
            <a href="#" class="flex items-center justify-center transition shadow-lg px-3 h-8 text-gray-500 bg-white rounded-lg  hover:bg-red-100 hover:text-red-400">
              <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
              </svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </main>
  <!-- footer -->
 @endsection