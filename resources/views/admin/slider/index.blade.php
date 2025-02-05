@extends('admin.admin_master')	 
                @section('admin')
                



    <div class="py-12">
        <div class="container">
            <div class="row">

            
                        
                <h4>Home Slider</h4>
                <a href="{{ route('add.slider') }}" class="inset-y-0 left-0"><button class="btn btn-info ">Add Slider</button></a>
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
                                    <th scope="col" width="15%">Slider Title</th>
                                    <th scope="col" width="15%">Discription</th>
                                    <th scope="col" width="15%">Image</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->discription }}</td>
                                        <td><img src="{{asset($slider->image)}}" style="height:40px; width:70px;" ></td>
                                        <td>
                                            <a href="{{ url('slider/edit/' . $slider->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('slider/delete/' . $slider->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</a>
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