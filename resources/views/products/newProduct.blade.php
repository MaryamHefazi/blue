@extends('Front.Master')

@section('title' , 'New-Product-Page')

@section('main')

    <div class="container col-md-8">

        <div class="card mb-4">
            {{--card header--}}
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                New Product
            </div>
            {{--END card header--}}

            {{--card body--}}
            <div class="card-body">
                <form action="{{route('addProduct')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="productName">
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option value= {{$category->id}}>{{'['.$category->id.'] '.$category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">Number</label>
                        <input type="number" class="form-control" name="number">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price">
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <select class="form-control" name="color">
                            <option>Black</option>
                            <option>White</option>
                            <option>Blue</option>
                            <option>Red</option>
                            <option>Yellow</option>
                            <option>Pink</option>
                            <option>Orange</option>
                            <option>Purple</option>
                            <option>Green</option>
                            <option>Brown</option>
                            <option>Silver</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="text" name="productImage" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
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
