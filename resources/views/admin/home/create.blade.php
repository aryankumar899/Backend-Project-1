@extends('admin.admin_master')	 
                @section('admin')
                

                <div class="col-lg-20">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create HomeAbout</h2>
										</div>
										<div class="card-body">
                                        <form action="{{ route('store.about')  }}"  method="POST"  enctype="multipart/form-data">
                                        @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">About Title
                                                    </label>
													<input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter title">
													
												</div>
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Short Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="short_dis"></textarea>
												</div>
                                                <div class="form-group">
													<label for="exampleFormControlTextarea1">Long Description</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="long_dis"></textarea>
												</div>
												
												<div class="form-footer pt-4 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
													
												</div>
											</form>
										</div>
									</div>

									
								</div>




                @endsection