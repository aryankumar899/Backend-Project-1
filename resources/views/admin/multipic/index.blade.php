
@extends('admin.admin_master')	 
                @section('admin')
                

    <div class="py-8">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
               
                    <div class="card-group" style="width: 30rem;">
                    @foreach($images as $multi)
                         <div class="col-md-4 mt-3 ">
                            <div class="card">
                            <img src="{{asset($multi->image)}}" class="rounded mx-auto d-block ">      
                           </div>
                          </div>
                         @endforeach
                        
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Multi Image</div>
                        <div class="card-body">
                            <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                    <input type="file" name="image[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" multiple="">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <button type="submit" class="btn btn-primary">Add image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
