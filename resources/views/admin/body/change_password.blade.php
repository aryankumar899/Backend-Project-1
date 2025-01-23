@extends('admin.admin_master')	 
                @section('admin')

    <div class="card card-default">
                            <div class="card-header card-header-border-bottom">
                                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form class="form-pill"  method="POST" action="{{ route('password.update') }}">


<div class="form-group">
    @csrf
    <label for="exampleFormControlInput3">Current Password</label>
    <input type="password" class="form-control" name="oldpassword"  placeholder="Current Password" id="current_password">
</div>
@error('oldpassword')
    <span class="text-danger">{{$message}}</span>
@enderror

<div class="form-group">
    <label for="exampleFormControlPassword3">New Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
</div>
@error('password')
    <span class="text-danger">{{$message}}</span>
@enderror

<div class="form-group">
    <label for="exampleFormControlPassword3">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password"
    >
</div>
@error('password_confirmation')
    <span class="text-danger">{{$message}}</span>
@enderror



            


<button class="btn btn-primary btn-default" type="submit" >Save</button>







                </form>
            </div>
        </div>


@endsection