 @extends('master-page')

@section('content') 
<div class="container-fluid ml-5">
<div class="container col-md-9 mx-3">        
   
         <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ردیف</th>
                      
                      <th> نظر </th>
                      <th> محصول</th>
                      <th> تاریخ</th>
                      <th> وضعیت</th>
                    </tr>
                  </thead>
                  <tbody>
                  
@foreach ($nazars as $nazar) 
                    <tr>
                      <td>{{$nazar->id}}</td>
                      <td>{{$nazar->nazar}}</td>
                      <td>{{$nazar->product->productname}}</td>
                       <td>{{$nazar->created_at}}</td>
                      <td>
                      @if($nazar->status==0) 
                      <button type="button" onclick="ok({{$nazar->id}})" class="  btn btn-block bg-gradient-info">تایید کرد</button><br>
                      @else
                      <button type="button" onclick="no({{$nazar->id}})" class="btn btn-block bg-gradient-danger">رد کردن</button></a><br>
                      </td>
                       
                    </tr>
                    @endif
@endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
    <script>
              function ok(id){ 
        $(document).ready(function(){
           
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/ok',
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
                  function no(id){ 
        $(document).ready(function(){
           
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/no',
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
@endsection