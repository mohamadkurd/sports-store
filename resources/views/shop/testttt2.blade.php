@foreach($products as $product)

<a href="/singleproduct/{{$product->id}}" class="bg-white rounded-xl shadow-box hover:drop-shadow-lg transition px-4 py-4">

    <img class="mx-auto" src="{{asset($product->productaks)}}" alt="">

    <div class="text-zinc-600 text-sm">
        {{$product->productname}}
    </div>

    <div class="flex justify-between items-center mt-3">

        @if($product->productghimatghabl>0)
            <div class="bg-red-500 rounded-full px-2 py-1 text-white text-xs">
                تخفیف
            </div>
        @endif

        @if($product->productmojodi!=0)
            <div class="flex justify-center gap-x-1 text-sm text-zinc-700">
                <div>{{ number_format($product->productghimat) }}</div>
                <div>تومان</div>
            </div>
        @else
            <div class="text-xs text-red-400">
                ناموجود
            </div>
        @endif

    </div>

</a>

@endforeach