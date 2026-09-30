 @extends('master-page')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">داشبورد</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">صفحه نخست</a></li>
              <li class="breadcrumb-item active">داشبورد 1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
                   <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">

                <p>سفارشات جدید</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="/sefaresh" class="small-box-footer">
                اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

                <p> نظر ها </p>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
              </div>
              <a href="/nazar1" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <p> نظر مقاله</p>
              </div>
              <div class="icon">
                <i class="fas fa-comments"></i>
              </div>
              <a href="/nazarm2" class="small-box-footer">اطلاعات بیشتر <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="card-body pb-0">
          <div class="row">
@foreach($products as $product)           
           <a href="/product"><div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                   
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$product->productname}}</b></h2>
                      <p class="text-muted text-sm"><b>دسته بندی: </b>  {{$product->subcat1->maincat->maincatname}} /  {{$product->subcat1->subcat1name}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"></span> قیمت:{{$product->productghimat}}</li>
                        <li class="small"><span class="fa-li"></span> توضیحات: {{$product->producttozihat}}</li>
                        <li class="small"><span class="fa-li"></span> موجودی: {{$product->productmojodi}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{$product->productaks}}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="/productimg/{{ $product->id }}" class="btn btn-sm bg-teal">
                      عکس
                    </a>
                     <a href="/productup/{{ $product->id }}" class="btn btn-sm bg-teal">
                      قیمت
                    </a>
                      <a href="/producttakhfif/{{ $product->id }}" class="btn btn-sm bg-teal">
                      تخفیف
                    </a>
                    <a href="/sizeproduct/{{ $product->id }}" class="btn btn-sm bg-teal">
                      سایز
                    </a>
                     <a href="/producttozihat/{{ $product->id }}" class="btn btn-sm bg-teal">
                      توضیح
                    </a>
                     <a href="/productrang/{{ $product->id }}" class="btn btn-sm bg-teal">
                      رنگ
                    </a>
                  </div>
                </div>
              </div>
            </div></a>
@endforeach
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection