@extends('Front.Master')

@section('title' , 'Product-List-Page')

@section('main')

    <div class="container">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Factore {{$order->id}} <br>
                <p>Customer Name : {{$customer->firstName . " " . $customer->lastName}} <br>
                Customer PhoneNumber : {{$customer->phoneNumber}}</p>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Operator</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->productName}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{route('displayEditOrderPage' , ['id'=>$order->id])}}" class="btn btn-primary">+</a>
                                <a href="{{route('displayFactore' , ['id'=>$order->id])}}" class="btn btn-success">-</a>
                                <a href="{{route('deleteOrder' , ['id'=>$order->id])}}" class="btn btn-danger" onclick="confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>

           <form action="{{route('pay')}}" method="post">
            @csrf
           <div class="input-group mb-6">
                 <input type="text" class="form-control"  readonly value="{{$totalPrice}}" name="amount">
                <button class="btn btn-primary" type="submit" id="button-addon2">Pay</button>
           </div>
           </form>
    </div>
@endsection
