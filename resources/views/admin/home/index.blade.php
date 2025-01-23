@extends('admin.admin_master')	 
                @section('admin')
                



    <div class="py-12">
        <div class="container">
            <div class="row">

            
                        
                <h4>Home About</h4>
                <a href="{{ route('add.home') }}" class="inset-y-0 left-0"><button class="btn btn-info ">Add About</button></a>
                <br><br>
              
                <div class="col-md-12">
                    <div class="card">
               <!-- Alert after Add Category -->
             @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">Brand Category</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL No</th>
                                    <th scope="col" width="15%">Home Title</th>
                                    <th scope="col" width="15%">Short Description</th>
                                    <th scope="col" width="15%">Long Description</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($homeabout as $home)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $home->title }}</td>
                                        <td>{{ $home->short_dis }}</td>
                                        <td>{{ $home->long_dis }}</td>
                                       
                                        <td>
                                            <a href="{{ url('about/edit/' . $home->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('about/delete/' . $home->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
              
                    </div>
                </div>

             
            </div>
        </div>
    </div>

@endsection