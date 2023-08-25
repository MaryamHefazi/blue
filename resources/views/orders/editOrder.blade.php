@extends('Front.Master')

@section('title' , 'Edit-Order-Page')

@section('main')


    <div class="container col-md-8">

        <div class="card mb-4">
            {{--card header--}}
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Order Information
            </div>
            {{--END card header--}}

            {{--card body--}}
            <div class="card-body">
                <form action="{{route('editOrder' , ['id'=>$order->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Customer</label>
                        <select class="form-control" name="user_id">
                            @foreach($users as $user)
                            <option value="{{$order->id}}" {{$order->customer_id == $user->id ? 'selected':''}}>
                                {{'['.$user->id.'] '.$user->firstName.' '.$user->lastName}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="products" class="form-label">Products</label>
                        <select name="products[]" class="form-control" multiple>
                            @foreach($products as $product)
                                <option value="{{$product->id}}" {{in_array($product->id , $selectedProducts) ? 'selected':''}}>
                                    {{$product->id.') '.$product->productName.' '.'['.$product->price.']'}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <textarea name="description" cols="20" rows="5" class="form-control">{{$order->description}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            {{--END card body--}}

        </div>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection
