 @extends('master-page')

@section('content') 
<div class="container-fluid ml-5">
<div class="container col-md-9 mx-3">        
   
         <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ردیف</th>
                      <th>نام </th>
                      <th> مبلغ </th>
                      <th> تعداد</th>
                      <th> سایز</th>
                      <th> رنگ</th>
                    </tr>
                  </thead>
                  <tbody>
                  
@foreach ($sabads as $sabad) 
 @if ($sabad->status==1) 
                    <tr>
                      <td>{{$sabad->id}}</td>
                      <td>{{$sabad->product->productname}}</td>
                      <td>{{$sabad->product->productghimat}}</td>
                      <td>{{$sabad->tedad}}</td>
                       <td>{{$sabad->productsize}}</td>
                       <td>{{$sabad->productrang}}</td>
                      
                       
                    
               
                    </tr>
@endif                    
@endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
@endsection