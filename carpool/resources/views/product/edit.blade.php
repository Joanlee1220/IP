@extends('layouts.temp')

@section('content')
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
        @endsection