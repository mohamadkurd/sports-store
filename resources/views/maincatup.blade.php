    @extends('master-page')

@section('content')
 <div class="content-wrapper">

<h1>gggggg</h1>
   <form action="/maincatup2" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   <input type="text" name="maincatname" value="{{ $maincats->maincatname }}"><br>
   <input type="file" name="maincatimg"><br>
   <button type="submit">up</button>
      </form> 
   @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
 </div>
@endsection