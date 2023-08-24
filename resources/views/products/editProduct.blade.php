@extends('Front.Master')

@section('title' , 'Edit-Product-Page')

@section('main')


    <div class="container col-md-8">

        <div class="card mb-4">
            {{--card header--}}
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Product Information
            </div>
            {{--END card header--}}

            {{--card body--}}
            <div class="card-body">
                <form action="{{route('editProduct' , ['id'=>$product->id])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="productName" value="{{$product->productName}}">
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" name="categories[]" multiple>
                            @foreach($categories as $category)
                                <option value= {{$category->id}} {{in_array($category->id , $selectedCategories) ? 'selected' : '' }}>{{'['.$category->id.'] '.$category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="number" class="form-label">Number</label>
                        <input type="number" class="form-control" name="number" value="{{$product->number}}" >
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" value="{{$product->price}}">
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <select class="form-control" name="color">
                            <option {{$product->color == 'Black' ? 'selected':''}}>Black</option>
                            <option {{$product->color == 'White' ? 'selected':''}}>White</option>
                            <option {{$product->color == 'Blue' ? 'selected':''}}>Blue</option>
                            <option {{$product->color == 'Red' ? 'selected':''}}>Red</option>
                            <option {{$product->color == 'Yellow' ? 'selected':''}}>Yellow</option>
                            <option {{$product->color == 'Pink' ? 'selected':''}}>Pink</option>
                            <option {{$product->color == 'Orange' ? 'selected':''}}>Orange</option>
                            <option {{$product->color == 'Purple' ? 'selected':''}}>Purple</option>
                            <option {{$product->color == 'Green' ? 'selected':''}}>Green</option>
                            <option {{$product->color == 'Brown' ? 'selected':''}}>Brown</option>
                            <option {{$product->color == 'Silver' ? 'selected':''}}>Silver</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="text" name="productImage" class="form-control" value="{{$product->productImage}}" >
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
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
