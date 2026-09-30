@extends('shop.master-page-shop')

@section('content')

  <main class="max-w-[1500px] mx-auto px-3 md:px-5 mt-44 md:mt-32">
    <div class="my-8 lg:my-10 py-5 lg:px-10 flex flex-col md:flex-row gap-5">
      <div class="md:w-4/12 lg:w-3/12">
        <div class="mb-4 rounded-2xl bg-white shadow-box-md">
          <div class="flex flex-col overflow-y-auto overflow-x-hidden px-4 py-3">
            <div>
              <!-- title -->
              <div class="mb-6 flex items-center justify-between">
                <h3 class="text-zinc-700">
                  فیلتر ها
                </h3>
                <button class="py-2 text-sm text-red-400 hover:text-red-500 transition">
                  حذف همه
                </button>
              </div>
              <ul class="space-y-6 divide-y">
                <!-- category -->
                <li>
                  <details class="group">
                    <summary class="flex cursor-pointer items-center justify-between rounded-lg py-3 text-zinc-700">
                      <span> دسته بندی </span>
                      <span class="shrink-0 transition duration-200 group-open:-rotate-90">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M165.66,202.34a8,8,0,0,1-11.32,11.32l-80-80a8,8,0,0,1,0-11.32l80-80a8,8,0,0,1,11.32,11.32L91.31,128Z"></path></svg>
                      </span>
                    </summary>
                    <div class="mt-2 max-h-60 overflow-y-auto pl-1">
                      <ul class="space-y-2 rounded-lg">
 @foreach($subcat1s as $subcat1)                        
                        <li>
                          <a class="flex items-center gap-x-2 rounded-lg px-4 py-2 text-red-700" href="/search/{{$subcat1->id}}">
                            <span>{{$subcat1->subcat1name}}</span>
                            <svg class="h-5 w-5">
                              <use xlink:href="#chevron-left"></use>
                            </svg>
                          </a>
                        </li>
@endforeach
                      </ul>
                    </div>
                  </details>
                </li>
                <!-- price -->
                    <li>
                  <div>
                    <p class="mb-4 text-zinc-700">
                      محدوده قیمت
                    </p>
                    <div class="space-y-4">
                      <div id="shop-price-slider"></div>
                      <div class="flex items-center justify-between">
                        <div
                          class="text-red-400">
                          <span
                            class="text-xs font-semibold xl:text-sm"
                            id="shop-price-slider-min">
                          </span>
                          <span class="text-xs">تومان</span>
                        </div>
                        <div
                          class="text-red-400">
                          <span
                            class="text-xs font-semibold xl:text-sm"
                            id="shop-price-slider-max">
                          </span>
                          <span class="text-xs">تومان</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- brand -->
    
                <!-- type seller -->
               
                <!-- available -->
                <li>
                  <label class="flex cursor-pointer items-center justify-between py-3" for="onlyAvailableDesktop">
                    <div class="text-zinc-700 dark:text-white">
                      فقط کالا های موجود
                    </div>
                    <div class="relative inline-flex cursor-pointer items-center">
                      <input class="peer sr-only" onchange="mojodiha()" id="onlyAvailableDesktop" type="checkbox">
                      <div class="peer h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:bg-white after:transition-all after:content-[''] peer-checked:bg-red-400 peer-checked:after:translate-x-full peer-focus:ring-red-400"></div>
                    </div>
                  </label>
                </li>
    <script>
              function mojodiha(){
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // alert("hi")
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/mojodiha',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        console.log(data);
                        // alert(data)
                        $('#product').html(data.data);
                        
                        //$('#select2').append('<option value="five">Five</option>');  
                    }
                }); 
              });    
            }
  </script>          
                <!-- special -->

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="md:w-8/12 lg:w-9/12">
        <!-- filter -->
        <div class="bg-white shadow-box-sm rounded-2xl grid place-items-start p-5">
          <div class="flex flex-wrap gap-5 justify-start items-center">
                <div class="text-zinc-600 text-sm">
                  مرتب سازی:
                </div>
                <div class="text-zinc-500 text-xs hover:text-red-400 transition cursor-pointer" onclick="jadid()">
                  جدیدترین
                </div>
                <div class="text-zinc-500 text-xs hover:text-red-400 transition cursor-pointer" onclick="arzan()">
                  ارزان ترین
                </div>
          
                <div class="text-zinc-500 text-xs hover:text-red-400 transition cursor-pointer" onclick="geran()">
                  گران ترین
                </div>
       
          </div>
<script>
                  function jadid(){
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert("hi")
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/jadid',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        console.log(data);
                        // alert(data)
                        $('#product').html(data.data);
                        
                        //$('#select2').append('<option value="five">Five</option>');  
                    }
                }); 
              });    
            }


              function arzan(){
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // alert("hi")
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/arzan',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        console.log(data);
                        // alert(data)
                        $('#product').html(data.data);
                        
                        //$('#select2').append('<option value="five">Five</option>');  
                    }
                }); 
              });    
            }

                 function geran(){
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // alert("hi")
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/geran',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        console.log(data);
                        // alert(data)
                        $('#product').html(data.data);
                        
                        //$('#select2').append('<option value="five">Five</option>');  
                    }
                }); 
              });    
            }
</script>             
        </div>
        <!-- products -->
<div id="product"
     class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5 mt-5">

    @include('shop.testttt2')

</div>

<div class="auto-load text-center py-5" style="display:none">
    در حال بارگذاری...
</div>
      </div>
    </div>
  </main>
  <!-- footer -->

<script>

let page = 1;
let loading = false;

$(window).on('scroll', function () {

    if (loading) return;

    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {

        loading = true;
        page++;

        loadMore(page);

    }

});

function loadMore(page){

    $.ajax({

        url: "{{ request()->url() }}?page=" + page,

        type: "GET",

        beforeSend:function(){

            $('.auto-load').show();

        },

        success:function(response){

            if(response.html == ""){

                $('.auto-load').html("محصول دیگری وجود ندارد.");

                return;

            }

            $('#product').append(response.html);

            $('.auto-load').hide();

            loading = false;

        },

        error:function(){

            loading = false;

        }

    });

}

</script>
@endsection