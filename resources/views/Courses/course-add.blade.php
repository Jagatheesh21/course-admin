@section('pagespecificscripts')

<script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/form_validation.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/validation/additional_methods.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/picker_date.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/anytime.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/tags/tagsinput.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/tags/tokenfield.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/form_tags_input.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){

        $( "#date" ).pickadate({  min: true });
        $( "#end_date" ).pickadate({  min: true });
	});
</script>

@stop
@include('layouts.header')
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create New Course
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

	<!-- Simple lists -->
	<div class="row">
		<div class="col-md-12">

			<!-- Simple list -->
			<div class="card">
					<h5 class="card-title">Create new Course</h5>

					<!-- <div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div> -->
				
				<div class="card-header header-elements-inline">
					<div class="card-body mt-1">
						<form action="{{route('store-course')}}" method="post" class="form-validate-jquery" enctype="multipart/form-data">
							@csrf
							<fieldset>

								<div class="collapse show" id="demo1" style="">

									<div class="mt-5 form-group row">
										<label class="col-lg-3 col-form-label">Course Category:</label>
										<div class="col-lg-9">
											<select class="form-control required" id="category" name="category_id">

						                        <option value="">Choose Course Category</option>
						                        @foreach($categories as $category)
						                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
						                        @endforeach

								                </select>
										</div>
								    </div>


								    <div class="mt-5 form-group row">
										<label class="col-lg-3 col-form-label">Skill Levels:</label>
										<div class="col-lg-9">
											<select class="form-control required" id="skill_level_id" name="skill_level_id">

						                        <option value="">Choose Skill Level</option>
						                        @foreach($skill_levels as $skill_level)
						                        <option value="{{$skill_level->id}}">{{$skill_level->name}}</option>
						                        @endforeach

								                </select>
										</div>
								    </div>

								    <div class="mt-5 form-group row">
										<label class="col-lg-3 col-form-label">Languages:</label>
										<div class="col-lg-9">
											<select class="form-control required" id="language_id" name="language_id">

						                        <option value="">Choose Language</option>
						                        @foreach($languages as $language)
						                        <option value="{{$language->id}}">{{$language->name}}</option>
						                        @endforeach

								                </select>
										</div>
								    </div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Course Name:</label>
										<div class="col-lg-9">
											<input type="text" name="name" class="form-control required"
												value="{{old('name')}}" placeholder="Your Course Name">
										</div>
									</div>


									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Course Description:</label>
										<div class="col-lg-9">
											<textarea rows="5" name="description" cols="5" class="form-control required"
												placeholder="Enter Course Description">{{old('desc')}}</textarea>
										</div>
								    </div>


								<!-- Inside form group with addon -->
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Tags</label>
										<div class="col-lg-9">
											<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text"><i class="icon-price-tags"></i></span>
											</span>
											<input type="text" class="form-control tokenfield" name="tags" data-fouc required="" placeholder="Type Here ..">
										</div>
										</div>
										
									</div>
									<!-- /inside form group with addon -->

									<div class="form-group row">
										<label class="col-form-label col-lg-3 required">Course Image</label>
										<div class="col-lg-9">
											<div class="custom-file">
												<input type="file" name="file" accept="image/*" class="custom-file-input" id="customFile" required="">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
									</div>

									<!-- <div class="form-group row">
										<label class="col-lg-3 col-form-label">Course Start Date :</label>
										<div class="col-lg-9">
											<div class="input-group">
											<span class="input-group-prepend">

													<span class="input-group-text"><i class="icon-calendar22"></i></span>

													</span>

													<input type="text required" name="date" id="date" class="form-control required" value="">
										</div>
										</div>
									</div> -->

									<!-- <div class="form-group row">
										<label class="col-lg-3 col-form-label">Course End Date :</label>
										<div class="col-lg-9">
											<div class="input-group">

													<span class="input-group-prepend">

													<span class="input-group-text"><i class="icon-calendar22"></i></span>

													</span>

													<input type="text required" name="end_date" id="end_date" class="form-control required" value="">

											</div>

										</div>
									</div> -->

									<input type="hidden" name="author_id" value="{{auth()->user()->id}}" class="form-control required"
										placeholder="Course Author Name">
									<div class="mt-5 form-group row">
										<label class="col-lg-3 col-form-label">Course Author :</label>
										<div class="col-lg-9">
											<input type="text" name="author" value="{{auth()->user()->name}}" readonly class="form-control">

										</div>
									</div>

								</div>

							</fieldset>

							<div class="text-right">
								<button type="submit" class="btn btn-primary legitRipple">Create Course <i
										class="icon-paperplane ml-2"></i></button>
							</div>
						</form>

					</div>
				</div>
				<!-- /simple list -->

			</div>

		</div>
	<!-- /simple lists -->

	</div>
<!-- /content area -->
</div>
@include('layouts.footer')
