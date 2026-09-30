@extends('master-page')

@section('content')
<div class="container-fluid ml-5">
<div class="container col-md-9 mx-3">
  <form action="/insertproductimg" method="post" enctype="multipart/form-data">
    @csrf
    
<select name="product_id" id="product_id" >
   @foreach($products as $product)
 <option value="{{$product->id}}" selected='selected'>{{$product->productname}}</option>
 @endforeach 
</select>

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">فایل تصویر را انتخاب کنید</label>
                    <div class="input-group">
                    <div>
                      
					     	<input type="file"  id="img1" name="img1">
           
                
				         	</div>
                    </div>
                   </div>
                   


                <div class="card-footer">
                  <button type="submit" class="btn btn-block bg-gradient-info">ثبت</button>
                </div>

  </form>
               @if($errors->any())
             <h4>{{$errors->first()}}</h4>
               @endif

          <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ردیف</th>
                     
                      <th>عکس </th>
                
                    </tr>
                  </thead>
                  <tbody>
                  
     @foreach($productimgs as $productimg)
                    <tr>
                      <td>{{$productimg->id}}</td>
                      <td><img src="{{asset($productimg->img1)}}" width="100px" height="100px"></td>

                      <td><a href='/productimgdel/{{ $productimg->id }}'><button type="button" class="btn btn-block bg-gradient-danger">حذف</button></a><br>
                    </tr>
      @endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
@endsection