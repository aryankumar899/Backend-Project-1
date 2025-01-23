@extends('admin.admin_master')	 
                @section('admin')
                

                <div class="col-lg-20">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create Slider</h2>
										</div>
										<div class="card-body">
                                        <form action="{{ route('store.slider')  }}"  method="POST"  enctype="multipart/form-data">
                                        @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">Slider Title
                                                    </label>
													<input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter title">
													<span class="mt-2 d-block">We'll never share your email with anyone else.</span>
												</div>
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Slider Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="discription"></textarea>
												</div>
												<div class="form-group">
													<label for="exampleFormControlFile1">Slider file input</label>
													<input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
												</div>
												<div class="form-footer pt-4 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
													
												</div>
											</form>
										</div>
									</div>

									
								</div>




                @endsection