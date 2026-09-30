 @extends('master-page')

@section('content')
<div class="container-fluid ml-5">
<div class="container col-md-9 mx-3">
  <form action="/insertslider" method="post" enctype="multipart/form-data">
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">متن</label>
                    <input type="text" class="form-control" id="matn" name="matn" placeholder=" متن">
                    <input type="text" class="form-control" id="etc" name="etc" placeholder=" متن">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputFile">فایل تصویر را انتخاب کنید</label>
                    <div class="input-group">
                    <div>
                      
					     	<input type="file"  name="aks">
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
                      <th>متن</th>
                      <th>عکس</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  
     @foreach($sliders as $slider)
                    <tr>
                      <td>{{$slider->id}}</td>
                      <td>{{$slider->matn}}</td>
                      <td> <img  src="{{$slider->aks}}" width="100px" height="100px";></td>
                    <td><a href='/sliderdel/{{ $slider->id }}'><button type="button" class="btn btn-block bg-gradient-danger">حذف</button></a><br>
                    </tr>
      @endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
  @endsection