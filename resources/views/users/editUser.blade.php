@extends('Front.Master')

@section('title' , 'Edit-User-Page')

@section('main')


  <div class="container col-md-8">

      <div class="card mb-4">
          {{--card header--}}
          <div class="card-header">
              <i class="fas fa-table me-1"></i>
              Edit User Information
          </div>
          {{--END card header--}}

          {{--card body--}}
          <div class="card-body">
          <form action="{{route('editUser' , [$user->id])}}" method="post">
          @csrf
          @method('put')
              <div class="mb-3">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" name="firstName" value="{{$user->firstName}}" >
              </div>

              <div class="mb-3">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control"  name="lastName"value="{{$user->lastName}}" >
              </div>

              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" value="{{$user->email}}">
              </div>

              <div class="mb-3">
                  <label for="nationalCode" class="form-label">National Code</label>
                  <input type="text" class="form-control" name="nationalCode" value="{{$user->nationalCode}}">
              </div>

              <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-control" name="gender">
                      <option {{$user->gender == '-' ? 'selected' : ''}}>-</option>
                      <option {{$user->gender == 'Male' ? 'selected' : ''}}>Male</option>
                      <option {{$user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                  </select>
              </div>

              <div class="mb-3">
                  <label for="phoneNumber" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phoneNumber" value="{{$user->phoneNumber}}" >
              </div>

              <div class="mb-3">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" name="country" value="{{$user->country}}">
              </div>

              <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" name="city"  value="{{$user->city}}">
              </div>

              <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <textarea name="address" cols="20" rows="5" class="form-control">{{$user->address}}</textarea>
              </div>
              <div class="mb-3">
                  <label>Education</label>
                  <select name="education" class="form-control" >
                      <option {{$user->education == 'High school degree' ? 'selected' : ''}}>High school degree</option>
                      <option {{$user->education == 'Associate degree' ? 'selected' : ''}}>Associate degree</option>
                      <option {{$user->education == "Bachelor's degree" ? 'selected' : ''}}>Bachelor's degree </option>
                      <option {{$user->education == "Master's degree" ? 'selected' : ''}}>Master's degree</option>
                      <option {{$user->education == 'Doctoral degree' ? 'selected' : ''}}>Doctoral degree</option>
                      <option {{$user->education == 'Professional degree' ? 'selected' : ''}}>Professional degree</option>
                  </select>
              </div>

              <div class="mb-3">
                  <label for="job" class="form-label">Job</label>
                  <input type="text" class="form-control" name="job"  value="{{$user->job}}">
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
