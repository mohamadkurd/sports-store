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
                      <th> مقاله</th>
                      <th> تاریخ</th>
                      <th> وضعیت</th>
                    </tr>
                  </thead>
                  <tbody>
                  
@foreach ($nazarms as $nazarm) 
                    <tr>
                      <td>{{$nazarm->id}}</td>
                      <td>{{$nazarm->nazar}}</td>
                      <td>{{$nazarm->maghale->maghaletitle}}</td>
                       <td>{{$nazarm->created_at}}</td>
                      <td>
                      @if($nazarm->status==0) 
                      <button type="button" onclick="nmok({{$nazarm->id}})" class="  btn btn-block bg-gradient-info">تایید کرد</button><br>
                      @else
                      <button type="button" onclick="nmno({{$nazarm->id}})" class="btn btn-block bg-gradient-danger">رد کردن</button></a><br>
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
              function nmok(id){ 
        $(document).ready(function(){
           
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/nmok',
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
                  function nmno(id){ 
        $(document).ready(function(){
           
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/nmno',
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