@extends('admin.admin_master')	 
                @section('admin')
                

                <div class="col-lg-20">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Edit Home Services</h2>
										</div>
										<div class="card-body">
                                        <form action="{{url('update/home-services/'.$homeService->id)}}"  method="POST" >
                                        @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">Services Title
                                                    </label>
													<input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $homeService->title }}">
													
												</div>
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Services Sub-Title</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sub_title" value="{{$homeService->sub_title}}"> {{$homeService->sub_title}}</textarea>
                                                   
												</div>
                                               
												<div class="form-footer pt-4 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
													
												</div>
											</form>
										</div>
									</div>

									
								</div>




                @endsection