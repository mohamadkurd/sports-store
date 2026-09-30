 @extends('master-page')

@section('content')
<div class="container-fluid ml-5">
<div class="container col-md-9 mx-3">
  <form action="/insertsubcat1" method="post" enctype="multipart/form-data" >
    @csrf
    
<select name="maincat_id" id="maincat_id">
   @foreach($maincats as $maincat)
 <option value="{{$maincat->id}}" selected='selected'>{{$maincat->maincatname}}</option>
 @endforeach 
</select>

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">دسته فرعی1</label>
                    <input type="text" class="form-control" id="subcat1name" name="subcat1name">
                  </div>

 <div class="form-group">
                    <label for="exampleInputFile">فایل تصویر را انتخاب کنید</label>
                    <div class="input-group">
                    <div>
                      
					     	<input type="file"  name="subcatimg">
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
                      <th>نام دسته فرعی1</th>
                      <th>نام دسته اصلی</th>
                      <th> عکس</th>
                    </tr>
                  </thead>
                  <tbody>
                  
     @foreach($subcat1s as $subcat1)
                    <tr>
                    <td>{{$subcat1->id}}</td>
                    <td>{{$subcat1->subcat1name}}</td>
                    <td>{{$subcat1->maincat->maincatname}}</td>
                    <td> <img  src="{{$subcat1->subcatimg}}" width="100px" height="100px";></td>

                      <td><a href='/subcat1del/{{ $subcat1->id }}'><button type="button" class="btn btn-block bg-gradient-danger">حذف</button></a><br>
                      <a href='/subcat1up/{{ $subcat1->id }}'><button type="button" class="btn btn-block bg-gradient-info">ویرایش</button></a></td>
                    </tr>
      @endforeach  
                  </tbody>
                </table>
              </div>
</div>
</div>
  @endsection