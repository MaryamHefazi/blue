@extends('Front.Master')

@section('title' , 'Product-List-Page')

@section('main')

    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Order Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Description</th>
                        <th>Operator</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->customer_id}}</td>
                            <td>{{$order->description}}</td>
                            <td>
                                <a href="{{route('displayEditOrderPage' , ['id'=>$order->id])}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('displayFactore' , ['id'=>$order->id])}}" class="btn btn-success">Facture</a>
                                <a href="{{route('deleteOrder' , ['id'=>$order->id])}}" class="btn btn-danger" onclick="confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
