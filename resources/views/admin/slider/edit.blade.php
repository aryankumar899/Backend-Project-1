@extends('admin.admin_master')	 
                @section('admin')
    
    <!-- Alert after Add Category -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
    @endif


    <div class="py-12">
     <div class="container">
        <div class="row">

    

      <div class="col-md-4">
        <div class="card">
           
      
          <div class="card-header">Edit Slider</div>
          <div class="card-body">

          <form action=""  method="POST"  enctype="multipart/form-data">
            @csrf
  <div class="mb-4">
   
    <label for="exampleInputEmail1" class="form-label"> Update Slider title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$slider->title}}" >
    @error('title')
    <span class="text-danger">{{$message}}</span>
    @enderror

    <label for="exampleInputEmail1" class="form-label"> Update Slider Description</label>
    <textarea type="text" name="discription" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$slider->discription}}" ></textarea>
    @error('discription')

<span class="text-danger">{{$message}}</span>
    @enderror
  </div>
  



  <div class="mb-4">
    <label for="exampleInputEmail1" class="form-label"> Update Slider Image</label>
    <input type="file" name="image" rows="3" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$slider->image}}" >
    @error('image')

<span class="text-danger">{{$message}}</span>
    @enderror
  </div>

     <div class="form-group">
         <img src="{{asset($slider->image)}}" style="height:200px; width: 300px;">
</div>
  
  <button type="submit" class="btn btn-primary mt-2">Edit Slider</button>
</form>
</div>
          </div>
      </div>


     </div>
</div> 
    </div>
@endsection
