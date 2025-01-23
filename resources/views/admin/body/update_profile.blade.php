@extends('admin.admin_master')	 
                @section('admin')

    <div class="card card-default">
                            <div class="card-header card-header-border-bottom">
                                <h2>Update User Profile</h2>

            

            </div>
            @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      @endif
            <div class="card-body">
                <form class="form-pill"  method="POST" action="{{ route('user.profile.update') }}">
                @csrf

<div class="form-group">

<label for="exampleFormControlInput3">User name</label>
<input type="text" class="form-control" name="name" value="{{$user->name}}" >
</div>

<div class="form-group">

<label for="exampleFormControlInput3">User Email</label>
<input type="text" class="form-control" name="email" value="{{$user->email}}" >
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="form-label">User Profile Picture</label>
                    <input type="file" name="profile_photo_path" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                 
                    </div>

             
     <div class="form-group">
         <img src="{{asset($user->profile_photo_path )}}" style="height:200px; rounded; width: 300px;" name="profile_photo_path">
   </div>       
<button class="btn btn-primary btn-default" type="submit" >Update</button>







                </form>
            </div>
        </div>


@endsection