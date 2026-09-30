@extends('shop.master-page-shop')

@section('content')

  <main class="max-w-[1500px] mx-auto px-3 md:px-5 mt-44 md:mt-32">
    <div class="my-8 lg:my-10 lg:px-5">

@foreach($products as $product)      
      <div class="bg-white shadow-box-sm rounded-xl py-5 px-2 sm:px-6">
        <div class="flex flex-col lg:flex-row gap-8">
          <!-- photo -->
          <div class="lg:w-4/12">
       
            
              @foreach($productimgs as $productimg)               
                
                  <img class="mySlides w-10/12 lg:w-full mx-auto border-2 rounded-xl" src="{{asset($productimg->img1)}}" @if($loop->index!=0) style="display:none" @endif>
                
              @endforeach
         
         {{-- <img class="mySlides w-10/12 lg:w-full mx-auto border-2 rounded-xl" src="assets/image/products/9.webp">
              <img class="mySlides w-10/12 lg:w-full mx-auto border-2 rounded-xl" src="assets/image/products/91.jpg" style="display:none">
              <img class="mySlides w-10/12 lg:w-full mx-auto border-2 rounded-xl" src="assets/image/products/92.jpg" style="display:none">
              <img class="mySlides w-10/12 lg:w-full mx-auto border-2 rounded-xl" src="assets/image/products/93.jpg" style="display:none"> --}}
              <div class="flex mt-4">
@foreach($productimgs as $productimg)               
                <div class="">
                  <img class="opacity-50 hover:opacity-95 transition-all cursor-pointer w-10/12 lg:w-12/12 border-2 rounded-lg hover:border-red-400" src="{{asset($productimg->img1)}}" onclick="currentDiv({{$loop->index+1}})">
                </div>
@endforeach
              </div>
          </div>
          <!-- info -->
          <div class="lg:w-5/12">
            <div class="mb-7 text-sm flex items-center gap-x-2 opacity-90">
              <a href="#" class="text-zinc-800 hover:text-red-400 transition">
              {{$product->subcat1->maincat->maincatname}}
              </a>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#3d3d3d" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
              </div>
              <a href="#" class="text-zinc-800 hover:text-red-400 transition">
                {{$product->subcat1->subcat1name}}
              </a>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#3d3d3d" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
              </div>
              <a class="text-red-400" href="#">
               {{$product->productname}}
              </a>
            </div>
            <div class="text-zinc-700 text-lg md:text-xl">
             {{$product->productname}}
            </div>
            <div class="text-zinc-400 text-xs mt-4">
                {{$product->producttozihat}}
            </div>
           
          </div>
          <!-- buy -->
    
          <div class="lg:w-3/12">
            
             
<form action="/sabad" method="POST">
@csrf    
 <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">               
              
 


              <div class="lg:mt-8 lg:mb-8">
              <div class="text-zinc-700">
                رنگ:
              </div>
              <ul class="flex flex-wrap gap-2">
@foreach($productrangs as $productrang)                 
                <li>
                  <input type="radio" id="{{$loop->iteration+1}}"  name="productrang" value="{{$loop->iteration+1}}" class="hidden peer" required="">
                  <label for="{{$loop->iteration+1}}" class="inline-flex items-center justify-center px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-full cursor-pointer peer-checked:border-red-400 peer-checked:text-red-400 hover:text-gray-600 hover:bg-gray-100">                           
                    <div class="flex gap-x-2">
                      <div class="w-5 h-5 bg-gray-400 rounded-full" style="background-color:{{$productrang->rang}}"></div>
                      <div class="text-sm">{{$productrang->namerang}}</div>
                    </div>
                  </label>
                </li>
@endforeach
              </ul>
            </div>
              <div class="lg:mt-8 lg:mb-8">
              <div class="text-zinc-700">
                سایز:
              </div>
              <ul class="flex flex-wrap gap-2">
@foreach($sizes as $size) 
                <li>
                  <input type="radio" id="1"  name="productsize" value="1" class="hidden peer" required="">
                  <label for="1" class="inline-flex items-center justify-center px-2 py-3 text-gray-600 bg-white border border-gray-200 rounded-full cursor-pointer peer-checked:border-red-400 peer-checked:text-red-400 hover:text-gray-600 hover:bg-gray-100">                           
                    <div class="flex gap-x-2">
                      <div class="w-5 h-5 bg-gray-400 rounded-full"></div>
                      <div class="text-sm"  >{{$size->size}}</div>
                    </div>
                  </label>
                </li>
@endforeach
              </ul>
            </div>
            <div class="p-3 border rounded-xl mx-auto divide-y hidden lg:block">
              <div class="flex gap-x-1 items-center text-zinc-600 text-sm pb-5 pt-3">
                <svg class="fill-zinc-700" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M208,40H48A16,16,0,0,0,32,56v58.78c0,89.61,75.82,119.34,91,124.39a15.53,15.53,0,0,0,10,0c15.2-5.05,91-34.78,91-124.39V56A16,16,0,0,0,208,40Zm0,74.79c0,78.42-66.35,104.62-80,109.18-13.53-4.51-80-30.69-80-109.18V56H208ZM82.34,141.66a8,8,0,0,1,11.32-11.32L112,148.68l50.34-50.34a8,8,0,0,1,11.32,11.32l-56,56a8,8,0,0,1-11.32,0Z"></path></svg>
                <div>
                  گارانتی 18 ماهه
                </div>
              </div>
              <div class="flex gap-x-1 items-center text-zinc-600 text-sm py-5">
                <svg class="fill-zinc-700" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="" viewBox="0 0 256 256"><path d="M247.42,117l-14-35A15.93,15.93,0,0,0,218.58,72H184V64a8,8,0,0,0-8-8H24A16,16,0,0,0,8,72V184a16,16,0,0,0,16,16H41a32,32,0,0,0,62,0h50a32,32,0,0,0,62,0h17a16,16,0,0,0,16-16V120A7.94,7.94,0,0,0,247.42,117ZM184,88h34.58l9.6,24H184ZM24,72H168v64H24ZM72,208a16,16,0,1,1,16-16A16,16,0,0,1,72,208Zm81-24H103a32,32,0,0,0-62,0H24V152H168v12.31A32.11,32.11,0,0,0,153,184Zm31,24a16,16,0,1,1,16-16A16,16,0,0,1,184,208Zm48-24H215a32.06,32.06,0,0,0-31-24V128h48Z"></path></svg>
                <div>
                  ارسال 2 روز کاری
                </div>
              </div>
               @if($product->productmojodi!=0)
              <div class="flex flex-col justify-center py-5">
                <div class="text-zinc-600 text-left">
                  <span class="font-semibold text-xl"> {{$product->productghimat}}</span>
                  <span class="text-xs">تومان</span>
                </div>
                
              </div>
            
              <button class="mx-auto w-full px-2 py-3 text-sm bg-red-500 hover:bg-red-400 transition text-gray-100 rounded-lg">
                افزودن به سبد خرید
              </button>
@endif
          @if($product->productmojodi!=1)
                <div class="text-ml text-red-700">
                  ناموجود
          </div>
@endif
            </div>
            
            <!-- fixed div buy -->

          </div>
        </div>
</form> 
       
        <!-- service -->
  
        <div class="p-4 border-b" id="comments">
          <span class="border-b-red-300 border-b text-zinc-800">
            دیدگاه ها
          </span>
          <div class="lg:flex gap-5">
@if(Auth::check())             
            <div class="lg:w-3/12 py-5">
      
              <div class="mt-6 mb-2 text-sm text-zinc-700">
                شما هم دیدگاه خود را ثبت کنید
              </div>
           <form action="/nazar" method="POST">
            @csrf
            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
              <textarea placeholder="متن دیدگاه" id="nazar" name="nazar" cols="30" rows="7" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all focus:border-red-400 focus:outline-none"></textarea>
              <button class="mx-auto w-full px-2 py-3 mt-5 text-sm bg-red-500 hover:bg-red-400 transition text-gray-100 rounded-lg">
                ارسال
              </button>
            </form>  
            </div>
@endif            
@foreach ($nazars as $nazar)
@if ($nazar->status==1) 
            <div class="lg:w-9/12 divide-y">
              <div class="px-2 pt-5">
                <div class="text-lg text-zinc-700">
                     {{$nazar->nazar}}
                </div>
                <div class="mt-2 flex gap-x-4 items-center border-b pb-3">
                  <div class="text-xs text-zinc-600">
                     {{$nazar->created_at}} 
                  </div>
                
                </div>
                </div>
@endif
@endforeach                
              </div>
 
            </div>

          </div>
        </div>

      </div>
@endforeach


  
  </main>
  <!-- footer -->
@endsection