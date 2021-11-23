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



@stop
@include('layouts.header')
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create New Slot
					</span></h4>
			<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
		</div>

		<div class="header-elements d-none">
			<div class="d-flex justify-content-center">
				<a href=""
					class="btn btn-link btn-float font-size-sm font-weight-semibold text-default legitRipple">
					<i class="icon-bars-alt text-pink-300"></i>
					<span>Courses</span>
				</a>
				<a href=""
					class="btn btn-link btn-float font-size-sm font-weight-semibold text-default legitRipple">
					<i class="icon-calculator text-pink-300"></i>
					<span>Students</span>
				</a>
				<a href="#"
					class="btn btn-link btn-float font-size-sm font-weight-semibold text-default legitRipple">
					<i class="icon-calendar5 text-pink-300"></i>
					<span>Reports</span>
				</a>
			</div>
		</div>
	</div>

</div>
<!-- /page header -->

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


<!-- Content area -->
			<div class="content">


                <div class="row">
                	<div class="col-md-8">
                		<!-- Anytime picker -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">{{$course->c_name}}</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
						<form action="{{route('store-slot')}}" method="post" class="form-validate-jquery slot-add-form" enctype="multipart/form-data">
						@csrf

						<div class="row">
							<div class="col-md-12">
								<div class="mb-4">
									<h6 class="font-weight-semibold">Course Name</h6>
									<input type="hidden" name="course_id" value="{{$course->id}}">
									<div class="input-group">
										<input type="text" name="name" class="form-control"
											value="{{$course->c_name}}" readonly>
									</div>
								</div>
								<div class="mb-4">
									<h6 class="font-weight-semibold">SkillLevel</h6>
									<select class="select form-control" name="skill_level_id" id="skill_level_id">
										<option value="">Select Skill Level</option>
										@forelse($skill_levels as $skill_level)
										<option value="{{$skill_level->id}}">{{$skill_level->name}}</option>
										@empty
										@endforelse
									</select>
								</div>
								<div class="mb-4">
									<h6 class="font-weight-semibold">Language</h6>
									<select class="select form-control" name="language_id">
										<option value="">Select Language</option>
										@forelse($languages as $language)
										<option value="{{$language->id}}">{{$language->name}}</option>
										@empty
										@endforelse
									</select>
								</div>
								<div class="mb-4">
									<h6 class="font-weight-semibold">Course Description:</h6>

									<div class="input-group">
										<textarea rows="5" name="desc" cols="5" class="form-control"
											placeholder="Enter Module Description" readonly="">{{$course->c_desc}}</textarea>
									</div>
								</div>

								<div class="mb-4">
									<h6 class="font-weight-semibold">Slot Name</h6>

									<div class="input-group">
										<input type="text" name="s_name" class="form-control required">
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
								<div class="row">
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="font-weight-semibold">Seats</h6>

											<div class="input-group">
												<input type="text" name="s_seats" class="form-control required">
											</div>
										</div>

									</div>
									<div class="col-md-6">
										<div class="mb-4">
											<h6 class="font-weight-semibold">Slot Price</h6>

											<div class="input-group">
												<input type="text" name="s_price" class="form-control required">
											</div>
										</div>

									</div>
								</div>




								<div class="text-right">
									<button type="submit" class="btn btn-primary legitRipple">Create Section<i class="icon-paperplane ml-2"></i></button>
								</div>
								</form>


							</div>
						</div>
					</div>
				</div>
				<!-- /anytime picker -->

                	</div>
                	<div class="col-md-4">

			<!-- Latest updates -->
							<div class="sidebar sidebar-light sidebar-component position-static w-100 d-block mb-md-0">
									<div class="sidebar-content position-static">

										<!-- User menu -->
										<div class="card sidebar-user">
											<div class="card-body">
												<div class="media">


													<div class="media-body">
														<div class="media-title font-weight-semibold">Slots</div>

													</div>

													<div class="ml-3 align-self-center">
														<a href="#" class="text-default"><i class="icon-cog3"></i></a>
													</div>
												</div>
											</div>
										</div>
										<!-- /user menu -->


										<!-- Navigation -->
										<div class="card">
											<ul class="nav nav-sidebar" data-nav-type="collapsible">
												<li class="nav-item-header">
													<div class="text-uppercase font-size-sm line-height-sm">Available Slots</div>
												</li>
												<?php if(sizeof($slots)>0){?>
												@foreach($slots as $slot)

												<li class="nav-item nav-item-expanded nav-item-open">
													<a href="#" class="nav-link"><i class="icon-cube3"></i>{{$slot->batch_start_date}} to {{$slot->batch_end_date}}</a>


												</li>
												@endforeach
											<?php } else {?>
												<li class="nav-item">
													<a href="#" class="nav-link"><i class="icon-cube3"></i>No Slots Yet</a>
												</li>

											<?php } ?>








											</ul>
										</div>
										<!-- /navigation -->

									</div>
								</div>
							<!-- /latest updates -->


                	</div>
                </div>


			</div>
			<!-- /content area -->
@include('layouts.footer')
<script type="text/javascript">
	$(".slot-add-form").validate({
		rules:{
skill_level_id:'required'
		}
	});
</script>
