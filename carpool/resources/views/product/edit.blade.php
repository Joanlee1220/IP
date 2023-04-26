<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Product Details</title>
                   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    </head>
    <body>
        <h2>Edit Product Details</h2> 
        <form method="post" action="{{route('products.update',$id)}}"> 
            @csrf 
            <input name="_method" type="hidden" value="PATCH"> 
            <p> 
                <label for="code"> Product Code: </label> 
            <input type="text" name="code" value="{{$product->code}}"> </p> 
            <p> 
                <label for="code"> Product Name: </label> 
            <input type="text" name="name" value="{{$product->name}}"> 
            </p> 
            <p> 
                <button type="submit" > Update </button> 
            </p> 
        </form>
    </body>
</html>
