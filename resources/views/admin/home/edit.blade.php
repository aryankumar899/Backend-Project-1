@extends('admin.admin_master')	 
                @section('admin')
                

                <div class="col-lg-20">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Edit HomeAbout</h2>
										</div>
										<div class="card-body">
                                        <form action="{{url('update/homeabout/'.$homabout->id)}}"  method="POST" >
                                        @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">About Title
                                                    </label>
													<input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $homabout->title }}">
													
												</div>
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Short Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_dis" value="{{$homabout->short_dis}}"> {{$homabout->short_dis}}</textarea>
                                                   
												</div>
                                                <div class="form-group">
													<label for="exampleFormControlTextarea1">Long Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_dis" value="{{$homabout->long_dis}}"  >{{$homabout->long_dis}}</textarea>
                                                   
												</div>
												
												<div class="form-footer pt-4 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
													
												</div>
											</form>
										</div>
									</div>

									
								</div>




                @endsection