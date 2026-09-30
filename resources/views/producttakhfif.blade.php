    @extends('master-page')

@section('content')
 <div class="content-wrapper">

<h2> قیمت بعد تخفیف</h2>
   <form action="/producttakhfif2" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $products->id }}"><br>
   <input type="text" name="productghimat" value="{{ $products->productghimat }}"><br>

   <input type="hidden" name="id" value="{{ $products->id }}"><br>
   <h2> قیمت قبل تخفیف</h2>
   <input type="text" name="productghimatghabl" value="{{ $products->productghimat }}"><br>
   <button type="submit">up</button>
      </form> 
   @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
 </div>
@endsection