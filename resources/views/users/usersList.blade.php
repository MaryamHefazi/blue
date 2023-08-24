@extends('Front.Master')

@section('title' , 'Users-List-Page')

@section('main')

   <div class="container">
     <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Users Table
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>PhoneNumber</th>
                    <th>City</th>
                    <th>Operator</th>
                </tr>
                </thead>

                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->firstName}}</td>
                    <td>{{$user->lastName}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phoneNumber}}</td>
                    <td>{{$user->city}}</td>
                    <td>
                        <a href="{{route('displayEditUserPage' , ['customer'=>$user->id])}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('deleteUser' , ['customer'=>$user->id])}}" class="btn btn-danger" onclick="confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
  </div>
@endsection
