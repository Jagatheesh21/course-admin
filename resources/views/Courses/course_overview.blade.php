   @section('pagespecificscripts')
<script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/form_validation.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/validation/additional_methods.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/picker_date.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/form_select2.js')}}"></script>


<script type="text/javascript">
	$(document).ready(function() {

		$('.add_new_module').click(function() {
			$('#storeModuleModal').modal('show');
		});
    $('.add_new_section').click(function() {
			$('#storeSectionModal').modal('show');
		});

		$(".add_new_slot").click(function(){
			$('#storeSlotModal').modal('show');
		});


	});
</script>
@stop
@include('layouts.header')
<!-- Main content -->
		<div class="content-wrapper">
			@if (\Session::has('message'))
			<div class="alert bg-success text-white alert-styled-left alert-dismissible mx-2 my-2">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
				<span class="font-weight-semibold">Done ! </span> {!! \Session::get('message') !!}.
			</div>
			@endif
			@if (\Session::has('error'))
			<div class="alert bg-danger text-white alert-styled-left alert-dismissible mx-2 my-2">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
				<span class="font-weight-semibold">Oops!</span> {!! \Session::get('error') !!}..
			</div>

			@endif
			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				<div class="page-header page-header-light">
					<!-- <div class="page-header-content header-elements-lg-inline">
						<div class="page-title d-flex">
							<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Course</span> - Detailed</h4>
							<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
						</div>

						 <div class="header-elements d-none">
							<div class="d-flex justify-content-center">
								<a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float text-body"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float text-body"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div> -->

					<div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
						<!-- <div class="d-flex">
							<div class="breadcrumb">
								<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
								<a href="learning_detailed.html" class="breadcrumb-item">Course</a>
								<span class="breadcrumb-item active">Overview</span>
							</div>

							<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
						</div> -->

						<!-- <div class="header-elements d-none">
							<div class="breadcrumb justify-content-center">
								<a href="#" class="breadcrumb-elements-item">
									<i class="icon-comment-discussion mr-2"></i>
									Support
								</a>

								<div class="breadcrumb-elements-item dropdown p-0">
									<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
										<i class="icon-gear mr-2"></i>
										Settings
									</a>

									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
										<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
										<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
				<!-- /page header -->

				<!-- Module Store modal -->

				<div id="storeModuleModal" class="modal fade" tabindex="-1">

					<div class="modal-dialog">

						<div class="modal-content">

							<div class="modal-header">

								<h5 class="modal-title">Add New Module</h5>

								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>

							<div class="modal-body">

								<form action="{{route('store-module')}}" method="post" enctype="multipart/form-data"
									class="form-validate-jquery">
									@csrf
									<input type="hidden" name="category_id" value="{{$course->category_id}}">
									<input type="hidden" name="course_id" value="{{$course->id}}">
									<fieldset>

										<div class="form-group row">

											<label class="col-lg-4 col-form-label">Module Name</label>

											<div class="col-lg-8">

												<input type="text" class="form-control required" name="name"
													placeholder="Enter Module Name">

											</div>

										</div>
										<div class="form-group row">

											<label class="col-lg-4 col-form-label">Module Description</label>

											<div class="col-lg-8">

												<textarea name="description" class="form-control required" rows="8" cols="80"></textarea>

											</div>

										</div>


							</div>

							</fieldset>

							<div class="modal-footer">

								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

								<button type="submit" class="btn bg-primary">Save Module</button>

							</div>

							</form>

						</div>

					</div>

				</div>

				<!-- /Module Store modal -->
        <!-- Section Store modal -->

        <div id="storeSectionModal" class="modal fade" tabindex="-1">

          <div class="modal-dialog">

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title">Add New Section</h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>

              </div>

              <div class="modal-body">

                <form action="{{route('store-section')}}" method="post" enctype="multipart/form-data"
                  class="form-validate-jquery">
                  @csrf
                  <input type="hidden" name="category_id" value="{{$course->category_id}}">
                  <input type="hidden" name="course_id" value="{{$course->id}}">
                  <fieldset>

                    <div class="form-group row">

                      <label class="col-lg-4 col-form-label">Module Name</label>

                      <div class="col-lg-8">

                        <input type="text" class="form-control required" name="name"
                          placeholder="Enter Module Name">

                      </div>

                    </div>
                    <div class="form-group row">

                      <label class="col-lg-4 col-form-label">Module Description</label>

                      <div class="col-lg-8">

                        <textarea name="description" class="form-control required" rows="8" cols="80"></textarea>

                      </div>

                    </div>


              </div>

              </fieldset>

              <div class="modal-footer">

                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

                <button type="submit" class="btn bg-primary">Save Section</button>

              </div>

              </form>

            </div>

          </div>

        </div>

        <!-- /Section Store modal -->

				<!-- Module Store modal -->

				<div id="updateModuleModal" class="modal fade" tabindex="-1">

					<div class="modal-dialog">

						<div class="modal-content">

							<div class="modal-header">

								<h5 class="modal-title">Update Module</h5>

								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>

							<div class="modal-body">

								<form action="{{route('update-module')}}" method="post" enctype="multipart/form-data"
									class="form-validate-jquery">
									@csrf
									<input type="hidden" id="module_category_id" name="category_id" value=""">
									<input type="hidden" id="module_course_id" name="course_id" value="">
									<input type="hidden" id="module_id" name="id" value="">
									<fieldset>

										<div class="form-group row">

											<label class="col-lg-4 col-form-label">Module Name</label>

											<div class="col-lg-8">

												<input type="text" class="form-control required" name="name"
													placeholder="Enter Module Name" id="module_name" value="">

											</div>

										</div>
										<div class="form-group row">

											<label class="col-lg-4 col-form-label">Module Description</label>

											<div class="col-lg-8">

												<textarea name="description" id="module_description" class="form-control required" rows="8" cols="80"></textarea>

											</div>

										</div>


							</div>

							</fieldset>

							<div class="modal-footer">

								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

								<button type="submit" class="btn bg-primary">Save Module</button>

							</div>

							</form>

						</div>

					</div>

				</div>

				<!-- /Module Store modal -->


				<!-- Slot Store modal -->

				<div id="storeSlotModal" class="modal fade" tabindex="-1">

					<div class="modal-dialog">

						<div class="modal-content">

							<div class="modal-header">

								<h5 class="modal-title">Add New Slot</h5>

								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>

							<div class="modal-body">

								<form action="{{route('store-slot')}}"  method="post" enctype="multipart/form-data"
									class="form-validate-jquery">
									@csrf
									<input type="hidden" name="category_id" value="{{$course->category_id}}">
									<input type="hidden" name="course_id" value="{{$course->id}}">
									<fieldset>

										<div class="form-group row">

											<label class="col-lg-4 col-form-label">Module </label>

											<div class="col-lg-8">

											<select class="form-control" name="module_id" id="slot_module_id">
												<option value="">Select Module</option>
												@foreach($modules as $module_name)
												<option value="{{$module_name->id}}">{{$module_name->name}}</option>
												@endforeach
											</select>

											</div>

										</div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label">Skill Level </label>
                        <div class="col-lg-8">
                          <select class="form-control" required name="skill_level_id">
                            <option value="">Select Skill Level</option>
                            @forelse($skill_levels as $skill_level)
                            <option value="{{$skill_level->id}}">{{$skill_level->name}}</option>
                            @empty
                            @endforelse
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label">Language </label>
                        <div class="col-lg-8">
                          <select class="form-control" required name="language_id">
        										<option value="">Select Language</option>
        										@forelse($languages as $language)
        										<option value="{{$language->id}}">{{$language->name}}</option>
        										@empty
        										@endforelse
        									</select>
                        </div>
                      </div>


										<div class="form-group row">
											<label for="" class="col-lg-4 col-form-label">Slot Name</label>
											<div class="col-lg-8">
												<input type="text" name="name" class="form-control required" >
											</div>
										</div>
										<div class="form-group row">

											<label class="col-lg-4 col-form-label">Slot Description</label>

											<div class="col-lg-8">

												<textarea name="description" class="form-control required" rows="8" cols="80"></textarea>

											</div>

										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="mb-4">
													<h6 class="font-weight-semibold">Seats</h6>

													<div class="input-group">
														<input type="text" name="seats" class="form-control required">
													</div>
												</div>

											</div>
											<div class="col-md-6">
												<div class="mb-4">
													<h6 class="font-weight-semibold">Slot Price</h6>

													<div class="input-group">
														<input type="text" name="price" class="form-control required">
													</div>
												</div>

											</div>
										</div>
										<div class="mb-4">
											<h6 class="font-weight-semibold">Slot Time Period</h6>

											<div class="row">
												<div class="col-md-6">
													<p><input type="text" class="form-control required" id="rangeDemoStart" name="start" placeholder="Start date"></p>
												</div>

												<div class="col-md-6">
													<p><input type="text" class="form-control required" id="rangeDemoFinish" name="end" placeholder="Finish date" disabled></p>
												</div>
											</div>

											<input type="button" id="rangeDemoToday" class="btn btn-primary" value="today">
											<input type="button" id="rangeDemoClear" class="btn btn-light" value="clear">
										</div>


							</div>

							</fieldset>

							<div class="modal-footer">

								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

								<button type="submit" class="btn bg-primary">Save Slot</button>

							</div>

							</form>

						</div>

					</div>

				</div>

				<!-- /Slot Store modal -->
				<!-- Slot Update modal -->

				<div id="updateSlotModal" class="modal fade" tabindex="-1">

					<div class="modal-dialog">

						<div class="modal-content">

							<div class="modal-header">

								<h5 class="modal-title">Update Slot</h5>

								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>

							<div class="update_slot_div">

							</div>
						</form>

						</div>

					</div>

				</div>

				<!-- /Slot Store modal -->

        <!-- Section Update modal -->

				<div id="updateSectionModal" class="modal fade" tabindex="-1">

					<div class="modal-dialog">

						<div class="modal-content">

							<div class="modal-header">

								<h5 class="modal-title">Update Section</h5>

								<button type="button" class="close" data-dismiss="modal">&times;</button>

							</div>

							<div class="update_section_div">

							</div>
						</form>

						</div>

					</div>

				</div>

				<!-- /Slot Store modal -->

				<!-- Content area -->
				<div class="content">

					<!-- Course overview -->

					<div class="card">

						<div class="card-header header-elements-lg-inline">
							<h5 class="card-title">{{$course->name}}</h5>

							<div class="header-elements">
								<ul class="list-inline list-inline-dotted mb-0 mt-2 mt-lg-0">
									<li class="list-inline-item">Rating: <span class="font-weight-semibold">4.85</span></li>
									<li class="list-inline-item">
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<i class="icon-star-full2 font-size-base text-warning"></i>
										<span class="text-muted ml-1">(439)</span>
									</li>
								</ul>
		                	</div>
						</div>

						<div class="nav-tabs-responsive bg-light border-top">
							<ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
								<li class="nav-item"><a href="#course-overview" class="nav-link active" data-toggle="tab"><i class="icon-menu7 mr-2"></i> Overview</a></li>
								<li class="nav-item"><a href="#course-attendees" class="nav-link" data-toggle="tab"><i class="icon-people mr-2"></i>Students</a></li>
								<li class="nav-item"><a href="#course-schedule" class="nav-link" data-toggle="tab"><i class="icon-calendar3 mr-2"></i> Bookings</a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div class="tab-pane fade show active" id="course-overview">
								<div class="card-body">


									<h6 class="font-weight-semibold">What you will learn</h6>
									<p class="mb-3">{{$course->description}}</p>

									<div class="col-md-4">
										<img src="../{{$course->course_picture}}"  class="card-img">
									</div>

				          <!-- <h6 class="font-weight-semibold">Course program</h6>
									So slit more darn hey well wore submissive savage this shark aardvark fumed thoughtfully much drank when angelfish so outgrew some alas vigorously therefore warthog superb less oh groundhog less alas gibbered barked some hey despicably with aesthetic hamster jay by luckily. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame -->

								</div>
								<div class="dropdown-divider"></div>

								<div class="card-header header-elements-lg-inline">
									<h5 class="card-title">Manage Modules</h5>
									<div class="text-center">
										<button type="button"  class="btn btn-primary add_new_module"><i class="icon-plus22 mr-1"></i> Add New Module </button>
									</div>

								</div>
								<div class="dropdown-divider"></div>
								<div class="table-responsive">

									<table class="table table-striped">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Name</th>
												<th>Description</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											@forelse($modules as $module)
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{$module->name}}</td>
												<td>{{$module->description}}</td>
												<td class="text-center">
													<div class="list-icons">
														<div class="dropdown position-static">
															<a href="#" class="list-icons-item" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>

															<div class="dropdown-menu dropdown-menu-right" style="">

                  <a  class="dropdown-item" data-toggle="collapse" data-target="#module{{$module->id}}"><i class="icon-info22"></i> View Sections</a>

																<a  class="dropdown-item" onclick="EditModule({{$module->id}})"><i class="icon-pencil"></i> Edit</a>
																<a href="{{route('delete-module',['id' => $module->id])}}"
																	class="dropdown-item" onclick="return confirm('Are you sure?');">
																	<i class="icon-trash"></i> Delete Module</a>

															</div>
														</div>
													</div>
												</td>

											</tr>

                      <!-- Section Area Starts Here -->
											<tr class="collapse table-success" id="module{{$module->id}}" >
                        <td colspan="4">
                          <div class="card-header header-elements-lg-inline">
                            <h5 class="card-title">Manage Sections</h5>
                          	<div class="text-center">
                              <a href="{{route('add-section',['slug' => $module->slug])}}" class="btn btn-primary">Add Section</a>
                          	</div>
                          </div>
                          <div class="dropdown-divider"></div>
                          <div class="table-responsive">
                            <table class="table table-hover table-striped">
                              <thead class="bg-primary text-white">
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Duration</th>
                                <th>Action</th>
                              </thead>
                              <tbody>

                                @forelse($module->sections as $section)
                                <tr class="table-success">
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$section->name}}</td>
                                  <td>{{$section->duration}}</td>
                                  <td><div class="list-icons">
						                		<a href="javascript:void(0)" class="list-icons-item text-primary" OnClick="EditSection({{$section->id}})" data-popup="tooltip" title="" data-container="body" data-original-title="Edit">
						                			<i class="icon-pencil7"></i>

					                			</a>

                                <a href="{{route('delete-section',['id' => $section->id])}}"
                                  class="list-icons-item text-danger" onclick="return confirm('Are you sure?');">
                                  <i class="icon-trash"></i></a>
						                	</div></td>
                                </tr>
                                @empty
                                <tr>
                                  <td colspan="4">
              											<h6 class="title">No Sections Yet!</h6>
              											</td>
                                </tr>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                        </td>
											</tr>
                      <!-- Section Area Ends Here -->
											@empty
											<tr>
												<td colspan="3" class="text-align:center">No Modules Yet!</td>
											</tr>
											@endforelse

										</tbody>

									</table>

								</div>
								<!-- SLOT OVERVIEW -->
								<div class="card-body">
									<div class="card-header header-elements-lg-inline">
										<h5 class="card-title">Manage Slots</h5>

										<button type="button" class="btn btn-primary add_new_slot"  name="button"><i class="icon-plus22 mr-1"></i>Add New Slot</button>

									</div>
									<div class="dropdown-divider"></div>

									<div class="row">
											@forelse($slots as $slot)
										<div class="col-xl-3 col-lg-6">
											<div class="card card-body">
												<div class="media">
													<div class="mr-3">
														<!-- <a href="#">
															<img src="{{asset('global_assets/images/demo/users/face11.jpg')}}" class="rounded-circle" width="42" height="42" alt="">
														</a> -->
													</div>

													<div class="media-body">
														<h6 class="mb-0">{{$slot->name}} - {{$slot->descrpition}}</h6>
														<span class="text-muted">From {{$slot->start_date}} To {{$slot->end_date}}</span>
														<div class="dropdown-divider"></div>
														<span class="badge bg-pink-400 badge-pill ml-md-1 mr-md-auto">Available Seats : {{$slot->seats}}</span>
														<span class="badge bg-green-400 badge-pill ml-md-3 mr-md-auto">Price : {{$slot->price}}</span>
													</div>

													<div class="ml-3 align-self-center">
														<div class="list-icons">
					                    	<div class="dropdown">
						                    	<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
						                    	<div class="dropdown-menu dropdown-menu-right">
																		<a  class="dropdown-item edit_slot" Onclick="EditSlot({{$slot->id}})"><i class="icon-pencil"></i> Edit</a>
																		<a href="{{route('delete-slot',['id' => $slot->id])}}"
																			class="dropdown-item" onclick="return confirm('Are you sure?');">
																			<i class="icon-trash"></i> Delete</a>
																		<a href="#" class="dropdown-item"><i class="icon-mail5"></i> View Bookings</a>
																	</div>
					                    	</div>
								             </div>
													</div>
												</div>
											</div>
										</div>
										@empty
										<div class="col-xl-3 col-lg-12">
											<div class="card card-body">
												<div class="media">
													<div class="mr-3">
														<h6 class="title">No Slots Yet!</h6>
													</div>
												</div>
											</div>
										</div>

										@endforelse

									</div>



								</div>
								<!-- SLOT OVERVIEW -->
							</div>




						</div>
					</div>
					<!-- /course overview -->
					<div class="card">

					</div>



		</div>
		<!-- /main content -->
@include('layouts.footer')
<script type="text/javascript">

function EditModule(id)
{
	$.ajax({
		url:"{{route('edit-modules')}}/"+id,
		type:"GET",
		success:function(response)
		{
			$("#module_category_id").val(response.category_id);
			$("#module_course_id").val(response.course_id);
			$("#module_id").val(response.id);
			$("#module_name").val(response.name);
			$("#module_description").val(response.description);
			$("#updateModuleModal").modal('show');
		}
	});
}
function EditSlot(id)
{

$.ajax({
	url:"{{route('edit-slot')}}/"+id,
	type:"GET",
	success:function(response)
	{
		$(".update_slot_div").html(response.html);
		$("#updateSlotModal").modal('show');
	}
});
}
function EditSection(id)
{
  $.ajax({
  	url:"{{route('edit-module-section')}}/"+id,
  	type:"GET",
  	success:function(response)
  	{
      console.log(response);
  		$(".update_section_div").html(response.html);
  		$("#updateSectionModal").modal('show');
  	}
  });
}
</script>
