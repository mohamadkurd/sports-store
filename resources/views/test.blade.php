<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
    <select id="select1">
        <option value="1">aaa</option>
        <option value="5">bbb</option>
        <option value="4">ccc</option>
    </select>
    <select name="ss" id="select2">

    </select>
    <script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $("#select1").change(function(){
                //alert("hi");
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/posttest',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, code:$("#select1").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        console.log(data);
                        //$('#select2').append('<option value="five">Five</option>');
$.each(data, function (i, item) {
    $('#select2').append($('<option>', { 
        value: item.id,
        text : item.subcat1name 
    }));
});
                       
                    }
                }); 
            });
       });    
    </script>


</body>
</html>