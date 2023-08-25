@extends('Front.Master')

@section('title' , 'Users-List-Page')

@section('main')

   <div class="container">


       <form class="d-flex flex-wrap col-md-10 mt-100 mb-200 m-auto" action="{{route('usersList')}}" method="get">
           <div class="form-group col-md-3">
               <label for="firstName">firstName</label>
               <input name="firstName" type="text" class="form-control">
           </div>
           <div class="form-group col-md-3">
               <label for="lastName"> lastName</label>
               <input name="lastName" type="text" class="form-control" >
           </div>
           <div class="form-group col-md-3">
               <label for="orders">Order</label>
               <select name="orders" class="form-control">
                   <option value="has">Has</option>
                   <option value="does_not_have">Doesnt Have</option>
                   <option value="all">All</option>
               </select>
           </div>
           <div class="form-group col-md-3">
               <label for="factures">Facture</label>
               <select name="factures" class="form-control">
                   <option>Has</option>
                   <option>Doesnt Have</option>
                   <option>All</option>
               </select>
           </div>
           <div class="col-md-12 d-flex justify-content-center mt-3">
               <button type="submit" class="btn btn-primary mx-2">Do</button>
               <button type="reset" class="btn btn-secondary mx-2">Cancel</button>
           </div>
       </form>

       <br>

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
