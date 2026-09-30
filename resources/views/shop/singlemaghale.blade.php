
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
      <a class="text-zinc-800 hover:text-red-400 transition" href="#">
        وبلاگ
      </a>
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#3d3d3d" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
      </div>
      <a class="text-red-400" href="#">
        معرفی نینتندو سوئیچ 2
      </a>
    </div>
    <!-- text blogs -->
   
    <div class="my-2 py-5 lg:px-10 flex flex-col lg:flex-row gap-4">
      <div class="lg:w-10/12">
@foreach($maghales as $maghale)         
        <div class="bg-white rounded-xl shadow-box-md p-4">
        
          <img class="rounded-lg" src="{{asset($maghale->maghaleimg)}}" alt="">
          <div class="mt-7 text-sm">
            <a href="#" class="text-xl md:text-2xl text-zinc-700">
              {{$maghale->maghaletitle}}
            </a>
            <div class="bg-red-400 w-6/12 h-px mt-5"></div>
            <div class="text-zinc-600 my-7 flex flex-wrap gap-y-5">
              <span class="leading-8 font-normal">
      {{$maghale->maghaletozihat}}
              </span>
            </div>
          </div>
        </div>
@endforeach        
        <div class="flex flex-col p-4 mt-5 rounded-2xl bg-white shadow-box-md">
          <!-- top comments -->
          <div>
            <div class="text-zinc-600"></div>
          </div>
          <!-- COMMENT -->
@foreach ($nazarmaghales as $nazarmaghale)

          <div class="border rounded-xl px-5 py-3 my-2">
            <div class="flex items-center gap-x-1">
              <svg class="fill-zinc-500" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path></svg>
              <div class="text-xs opacity-60">
               {{$nazarmaghale->username}}-
                {{$nazarmaghale->created_at}}
              </div>
            </div>
            <div class="opacity-60 text-sm py-3">
              {{$nazarmaghale->nazar}}            
            </div>
          </div>
@endforeach   
          <!-- BOX SENT COMMENT -->
<form action="/nazarmaghale" method="POST">
@csrf        
<input type="hidden" id="maghale_id" name="maghale_id" value="{{$maghale->id}}">  
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
              <label for="username" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">نام شما:</label>
              <input id="username" name="username" type="text" class="text-sm block w-full rounded-lg border border-gray-400 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300">
            </div>

          </div>
          <div class="mb-4">
            <label for="mailTicket" class="inline-block mb-2 ml-1 font-semibold text-xs text-slate-700">نظر شما:</label>
            <textarea id="nazar" name="nazar" cols="30" rows="5" class="text-sm block w-full rounded-lg border border-gray-400 bg-white px-3 py-2 font-normal text-gray-700 outline-none focus:border-red-300"></textarea>
          </div>
          <button class="inline-block px-8 py-2 ml-auto text-center text-white bg-red-400 hover:bg-red-500 transition rounded-lg shadow-md text-xs">ارسال نظر</button>
        </div>
</form>
       
      </div>
      <div class="lg:w-4/12">
        <div class="p-3 bg-white rounded-xl shadow-box-sm mb-4">
          <div class="mx-auto flex gap-x-1 group items-center text-right w-full px-2 py-3 text-sm text-gray-600 rounded-lg mb-2 font-semibold">
            
            <span class="bg-red-400 w-full h-px"></span>
          </div>
          <ul class="grid w-full gap-3">
@foreach($maghales as $maghale)             
            <li>
              <label class="flex items-center justify-start gap-x-2 w-full p-2 text-gray-600 bg-white border border-gray-200 rounded-lg cursor-pointer hover:text-gray-600 hover:bg-gray-100">                           
                <img class="max-w-20 rounded-md"  src="{{asset($maghale->maghaleimg)}}" alt="">
                <div class="text-center flex flex-col space-y-3">
                  <div class="text-xs sm:text-sm">  {{$maghale->maghaletitle}}</div>
                  <div class="flex items-start gap-x-1 text-xs text-zinc-400">
                    <svg class="fill-gray-400" xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z"></path></svg>
                    <span>
                     {{$maghale->created_at}}
                    </span>
                  </div>
                </div>
              </label>
            </li>
@endforeach 
            <li  >
              <a href="/maghaleha">
              <label  class="flex items-center justify-start gap-x-2 w-full p-3 text-gray-600 bg-red border border-red-200 rounded-lg cursor-pointer hover:text-white-600 hover:bg-red-100">
                <div class="text-center flex flex-col space-y-3">
                  <div class="text-xs sm:text-sm  hover:text-red-400 transition" >مشاهده همه مقالات</div>
                </div>
              </label>
              </a>
            </li>  
          </ul>
        </div>
       
      </div>
    </div>
    <!-- blog slider -->

  </main>
 @endsection