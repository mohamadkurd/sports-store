@extends('master-page')

@section('content')
<div class="container-fluid ml-5">
<div class="container col-md-9 mx-3">
  <form action="/insertproductrang" method="post" enctype="multipart/form-data">
    @csrf
    
<select name="product_id" id="product_id" >
   @foreach($products as $product)
 <option value="{{$product->id}}" selected='selected'>{{$product->productname}}</option>
 @endforeach 
</select>

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputFile">رنگ  را انتخاب کنید</label>
                    <div class="input-group">
                    <div>
                      
					     	<input type="color"  id="rang" name="rang">
           
                
				         	</div>
                    </div>
                     <label for="exampleInputFile">رنگ  را انتخاب کنید</label>
                    <div class="input-group">
                    <div>
                      
					     	<input type="text"  id="namerang" name="namerang">
           
                
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
                     
                      <th>رنگ </th>
                
                    </tr>
                  </thead>
                  <tbody>
                  
     @foreach($productrangs as $productrang)
                    <tr>
                      <td>{{$productrang->id}}</td>
                       <td><div class="radio" style="background-color:{{$productrang->rang}}">{{$productrang->namerang}}</div></td>
                      <td><a href='/delproductrang/{{ $productrang->id }}'><button type="button" class="btn btn-block bg-gradient-danger">حذف</button></a><br>
                    </tr>
      @endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
@endsection