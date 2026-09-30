<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
</head>
<body>
    <main class="container my-5">
      <h1 class="mb-4">Products</h1>
      <div class="row g-4" id="data-wrapper">

      
     @include('shop.testttt2')


      </main>

     <script>
    
    var page = 1;
    var isLoading = false;
    $(window).scroll(function () {
                // alert(page);

            if ($(window).scrollTop() + $(window).height() >= ($(document).height() - 50)) {
                // alert(page);
                if(isLoading) return;
                page++;
                isLoading = true;
                infiniteLoadMore(page)

            }

        });

    function infiniteLoadMore(page)
    {
        $.ajax({

            type : 'get',
            url : '{{url('/testttt')}}' + "?page=" + page,

            beforeSend: function () {

                    $('.auto-load').show();

                },

            success:function(data)
            {   
                if (data.html === "" || data.html == null) {
                    // no more data
                    $('.auto-load').html("No more products to load.");
                    return;
                }
                $('#data-wrapper').append(data.html)
                $('.auto-load').hide();
                isLoading = false;
            },
            error: function () {
                $('.auto-load').html("Error loading more data.");
                isLoading = false; // reset on error
            }   
        })
    }
</script>
</body>
</html>