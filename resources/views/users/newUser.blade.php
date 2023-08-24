@extends('Front.Master')

@section('title' , 'New-User-Page')

@section('main')


  <div class="container col-md-8">

      <div class="card mb-4">
          {{--card header--}}
          <div class="card-header">
              <i class="fas fa-table me-1"></i>
              New Customer
          </div>
          {{--END card header--}}

          {{--card body--}}
          <div class="card-body">
          <form action="{{route('addUser')}}" method="post">
          @csrf
              <div class="mb-3">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" class="form-control" name="firstName" >
              </div>

              <div class="mb-3">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control"  name="lastName" >
              </div>

              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" >
              </div>

              <div class="mb-3">
                  <label for="nationalCode" class="form-label">National Code</label>
                  <input type="text" class="form-control" name="nationalCode" >
              </div>

              <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-control" name="gender">
                      <option>-</option>
                      <option>Male</option>
                      <option>Female</option>
                  </select>
              </div>

              <div class="mb-3">
                  <label for="phoneNumber" class="form-label">Phone Number</label>
                  <input type="text" class="form-control" name="phoneNumber"  >
              </div>

              <div class="mb-3">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" name="country">
              </div>

              <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" name="city" >
              </div>

              <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <textarea name="address" cols="20" rows="5" class="form-control"></textarea>
              </div>
              <div class="mb-3">
                  <label>Education</label>
                  <select name="education" class="form-control" >
                      <option>High school degree</option>
                      <option>Associate degree</option>
                      <option>Bachelor's degree </option>
                      <option>Master's degree</option>
                      <option>Doctoral degree</option>
                      <option>Professional degree</option>
                  </select>
              </div>

              <div class="mb-3">
                  <label for="job" class="form-label">Job</label>
                  <input type="text" class="form-control" name="job" >
              </div>

              <div class="mb-3">
                  <label for="password">Password</label>
                  <input name="password" type="password" class="form-control">
              </div>
              <div class="mb-3">
                  <label for="password_confirmation">Repeat Password</label>
                  <input name="password_confirmation" type="password" class="form-control">
              </div>
              <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" name="check">
                  <label class="form-check-label" for="Check">Remember me</label>
              </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
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
