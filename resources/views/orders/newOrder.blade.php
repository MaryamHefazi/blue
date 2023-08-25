@extends('Front.Master')

@section('title' , 'New-Order-Page')

@section('main')


    <div class="container col-md-8">

        <div class="card mb-4">
            {{--card header--}}
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                New Order
            </div>
            {{--END card header--}}

            {{--card body--}}
            <div class="card-body">
                <form action="{{route('addOrder')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="user_id" class="form-label">Customer</label>
                        <select class="form-control" name="customer_id">
                         @foreach($users as $user)
                            <option value="{{$user->id}}">{{'['.$user->id.'] '.$user->firstName.' '.$user->lastName}}</option>
                         @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="products" class="form-label">Products</label>
                        <select name="products[]" class="form-control" multiple>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->id.')'.$product->productName.' ['.$product->price .']'}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <textarea name="description" cols="20" rows="5" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
            {{--END card body--}}

        </div>

{{--    ERROR IN VALIDATION--}}
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
