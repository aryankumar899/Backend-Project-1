@extends('admin.admin_master')	 
                @section('admin')
                



    <div class="py-12">
        <div class="container">
            <div class="row">

                                  
                <h4>Home Services</h4>
                <a href="{{ route('add.service') }}" class="inset-y-0 left-0"><button class="btn btn-info ">Add Service</button></a>
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

                        <div class="card-header">Home Services Category</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SL no</th>
                                    <th scope="col">Service Title</th>
                                    <th scope="col">Service Sub-title</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($services as $serve)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{ $serve->title }}</td>
                                        <td>{{ $serve->sub_title }}</td>
                                        
                                        <td>
                                            @if($serve->created_at == NULL)
                                                <span class="text-danger">No Date Set</span>
                                            @else
                                                {{ $serve->created_at->diffForHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('service/edit/' . $serve->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('service/delete/' . $serve->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
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