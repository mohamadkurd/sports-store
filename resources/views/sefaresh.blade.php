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
                      <th>ادرس</th>
                      <th> تلفن </th>
                      <th> کدکاربر </th>
                      <th> مبلغ </th>
                      <th> تاریخ</th>
                    </tr>
                  </thead>
                  <tbody>
                  
@foreach ($facktours as $facktour) 
 @if ($facktour->status==1) 
                    <tr>
                      <td>{{$facktour->id}}</td>
                      <td>{{$facktour->nam}}{{$facktour->famil}} </td>
                      <td>{{$facktour->ostan}}{{$facktour->shahr}}{{$facktour->khiabankoche}}</td>
                      <td>{{$facktour->phone}}</td>
                       <td>{{$facktour->user_id}}</td>
                       <td>{{$facktour->mablaghkol}}</td>
                       <td>{{$facktour->created_at}}</td>
                       
                      <td><a href='nemayeshsabad/{{$facktour->id}}'><button type="button" class="btn btn-block bg-gradient-info">نمایش</button></a><br>
                      <td><a href='#'><button type="button" class="btn btn-block bg-gradient-danger">حذف</button></a><br>
               
                    </tr>
@endif                    
@endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
@endsection