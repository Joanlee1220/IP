@extends('layouts.temp')

@section('content')
        <div class="container">
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
            <td>
                            <a href="http://localhost:8000/products/create" class="btn btn-warning">Add</a>
                        </td>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product['id']}}</td>
                        <td>{{$product['code']}}</td>
                        <td>{{$product['name']}}</td>
                        
                        <td>
                            <a href="{{route('products.edit', $product['id'])}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('products.destroy',$product['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
        @endsection