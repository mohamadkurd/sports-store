    @extends('master-page')

@section('content')
 <div class="content-wrapper">

<h1>تغییر قیمت</h1>
   <form action="/productup2" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $products->id }}"><br>
   <input type="text" name="productghimat" value="{{ $products->productghimat }}"><br>
   
   <button type="submit">up</button>
      </form> 
   @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
 </div>
@endsection