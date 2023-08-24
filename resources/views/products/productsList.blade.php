@extends('Front.Master')

@section('title' , 'Product-List-Page')

@section('main')

    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Product Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Number</th>
                        <th>Price</th>
                        <th>Color</th>
                        <th>Operator</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->productName}}</td>
                            <td>{{$product->number}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->color}}</td>

                            <td>
                                <a href="{{route('displayEditProductPage' , ['id'=>$product->id])}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('deleteProduct' , ['id'=>$product->id])}}" class="btn btn-danger" onclick="confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
