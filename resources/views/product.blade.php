 @extends('master-page')

@section('content')
<div class="container-fluid ml-5">
<div class="container col-md-9 mx-3">
  <form action="/insertproduct" method="post" enctype="multipart/form-data">
    @csrf
 <select name="maincat_id" id="maincat_id" >
   @foreach($maincats as $maincat)
 <option value="{{$maincat->id}}" selected='selected'>{{$maincat->maincatname}}</option>
 @endforeach 
</select> 

<select name="subcat1_id" id="subcat1_id">

</select>
    <script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#maincat_id").change(function(){
                alert("hi");
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/main',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, code:$("#maincat_id").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        console.log(data);
                        $('#subcat1_id').empty()
                        //$('#select2').append('<option value="five">Five</option>');
$.each(data, function (i, item) {
    $('#subcat1_id').append($('<option>', { 
        value: item.id,
        text : item.subcat1name 
    }));
});
                       
                    }
                }); 
            });
       });    
    </script>

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">نام محصول</label>
                    <input type="text" class="form-control" id="productname" name="productname" placeholder=" ">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">قیمت</label>
                    <input type="text" class="form-control" id="productghimat" name="productghimat" placeholder=" ">
                  </div> 
                   <div class="form-group">
                    <label for="exampleInputEmail1">توضیحات</label>
                    <input type="text" class="form-control" id="producttozihat" name="producttozihat" placeholder=" ">
                  </div> 

                  <div class="form-group">
                    <label for="exampleInputFile">فایل تصویر را انتخاب کنید</label>
                    <div class="input-group">
                    <div>
                      
					     	<input type="file"  id="productaks" name="productaks">
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
                      <th>نام محصول</th>
                      <th>قیمت</th>
                      <th>توضیحات</th>
                      <th> دسته فرعی</th>
                      <th> عکس </th>
                    </tr>
                  </thead>
                  <tbody>
                  
     @foreach($products as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>{{$product->productname}}</td>
                      <td>{{$product->productghimat}}</td>
                      <td>{{$product->producttozihat}}</td>
                       <td>{{$product->subcat1->subcat1name}}</td>
                       <td> <img  src="{{$product->productaks}}" width="100px" height="100px";></td>
                   
                      <td><a href='/productimg/{{ $product->id }}'><button type="button" class="btn btn-block bg-gradient-info">عکس بیشتر</button></a><br>
                      <a href='/sizeproduct/{{ $product->id }}'><button type="button" class="btn btn-block bg-gradient-info"> سایزها</button></a><br>
                      <a href='/productup/{{ $product->id }}'><button type="button" class="btn btn-block bg-gradient-info"> تغییر قیمت</button></a>
                    </td>
                      <td><button type="button" onclick="mojod({{$product->id}})" class="  btn btn-block bg-gradient-info">موجود</button><br>
                      <button type="button" onclick="namojod({{$product->id}})" class="btn btn-block bg-gradient-danger">ناموجود</button></a><br>
                      <a href='/productdel/{{ $product->id }}'><button type="button" class="btn btn-block bg-gradient-danger">حذف</button></a></td>
                    </tr>
    <script>
              function mojod(id){ 
        $(document).ready(function(){
           
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/mojod',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, code:id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                     success: function (data) { 
                        alert(data);
                        
                        //$('#select2').append('<option value="five">Five</option>');
                        
                       
                    }
                }); 
           

              });    
            }
                  function namojod(id){ 
        $(document).ready(function(){
           
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/namojod',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, code:id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                     success: function (data) { 
                        alert(data);
                        
                        //$('#select2').append('<option value="five">Five</option>');
                        
                       
                    }
                }); 
           

              });    
            }
    </script>         
      @endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
  @endsection