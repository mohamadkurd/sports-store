 @extends('master-page')

@section('content')
<div class="container-fluid ml-5">
<div class="container col-md-9 mx-3">
  <form action="/insertmaincat" method="post" enctype="multipart/form-data">
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">دسته اصلی</label>
                    <input type="text" class="form-control" id="maincatname" name="maincatname" placeholder="دسته اصلی">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputFile">فایل تصویر را انتخاب کنید</label>
                    <div class="input-group">
                    <div>
                      
					     	<input type="file"  name="maincatimg">
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
                      <th>نام دسته اصلی</th>
                      <th>عکس</th>
                      <th>وضعیت</th>
                    </tr>
                  </thead>
                  <tbody>
                  
     @foreach($maincats as $maincat)
                    <tr>
                      <td>{{$maincat->id}}</td>
                      <td>{{$maincat->maincatname}}</td>
                      <td> <img  src="{{$maincat->maincatimg}}" width="100px" height="100px";></td>
                      <td><a href='/maincatdel/{{ $maincat->id }}'><button type="button" class="btn btn-block bg-gradient-danger">حذف</button></a><br>
                      <a href='/maincatup/{{ $maincat->id }}'><button type="button" class="btn btn-block bg-gradient-info">ویرایش</button></a></td>
                    </tr>
      @endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
  @endsection