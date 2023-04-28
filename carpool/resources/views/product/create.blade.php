<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            <title>Add New Product</title> 
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        </title>
    </head>
    <body>
        <h2>Add New Product</h2><br/> 
        <form method="post"action="{{url('products')}}"> 
            @csrf 
            <p> 
                <label for="code">Product Code:</label> 
                <input type="text"name="code"> 
            </p>
            <p> 
                <label for="name">Product Name:</label> 
                <input type="text" name="name"> 
            </p> 
            <p> 
                <button type="submit">Submit</button> 
            </p> 
        </form>
    </body>
</html>
