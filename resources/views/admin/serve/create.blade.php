@extends('admin.admin_master')	 
                @section('admin')
                

                <div class="col-lg-20">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Create Home Services</h2>
										</div>
										<div class="card-body">
                                        <form action="{{ route('store.services')}}"  method="POST">
                                        @csrf
												<div class="form-group">
													<label for="exampleFormControlInput1">Service Title
                                                    </label>
													<input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter title">
													
												</div>
												
												<div class="form-group">
													<label for="exampleFormControlTextarea1">Sub Title</label>
													<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sub_title"></textarea>
												</div>
                                               
												<div class="form-footer pt-4 mt-4 border-top">
													<button type="submit" class="btn btn-primary btn-default">Submit</button>
													
												</div>
											</form>
										</div>
									</div>

									
								</div>




                @endsection