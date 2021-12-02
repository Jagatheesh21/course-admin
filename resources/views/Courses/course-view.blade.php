@section('pagespecificscripts')
<script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/form_validation.js')}}"></script>

@stop
@include('layouts.header')

<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">List of Course
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
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Courses</h5>
					<div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
						<div class="btn-group">
							<a href="{{route('add-course')}}" class="btn bg-indigo-400 legitRipple" id="category"><i class="icon-stack2 mr-2"></i> Add
								Course</a>
						</div>
					</div>
					<!-- <div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div> -->
				</div>

				<div class="card-body table-responsive">


					<table class="table text-nowrap table-customers">
						<thead>
							<tr>
								<th>S.N</th>
								<th>Category</th>
								<th>Course</th>
								<th>Skill Level</th>
								<th>Language</th>
								<th>Author</th>
								<!-- <th>Start Date</th>
								<th>End Date</th> -->
								<th>Actions</th>

								<!-- <th class="text-center">Module</th> -->
								<th></th>

							</tr>
						</thead>
						<tbody>

							@forelse($courses as $course)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$course->category->cat_name}}</td>
								<td>{{$course->name}}</td>
								<td>{{$course->skill_level->name}}</td>
								<td>{{$course->language->name}}</td>
								<td>{{$course->author->name}}</td>
								<!-- <td>{{$course->start_date}}</td>
								<td>{{$course->end_date}}</td> -->


								<td class="text-center">
									<div class="list-icons">
										<div class="list-icons-item dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu7"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<!-- <a href="{{route('view-modules',['id' => $course->id])}}"
													class="dropdown-item">
													View Modules</a>

											    <a href="{{route('add-slot',['id' => $course->id])}}"
													class="dropdown-item">
													Add Slot</a> -->

													<a href="{{route('overview_course',['id' => $course->slug])}}"
														class="dropdown-item">
														View Info</a>
												<a href="{{route('delete-course',['id' => $course->id])}}"
													class="dropdown-item" onclick="return confirm('Are you sure?');">
													Delete</a>
													<a href="{{route('edit-course',['id' => $course->id])}}"
													class="dropdown-item">
													Edit</a>

											</div>
										</div>
									</div>
								</td>

								<!-- <td class="text-center">
									<div class="btn-group">
							          <a href="{{route('add-module',['id' => $course->id])}}" class="btn btn-sm bg-teal-400 legitRipple" id="category"><i class="icon-plus2 mr-1"></i> Add Module</a>
						           </div>
						       </td> -->
						       <td class="pl-0"></td>

							</tr>
							@empty
							<tr>
								<td colspan="8" class="text-center">No Courses Found</td>
							</tr>
							@endforelse

						</tbody>
					</table>


				</div>
			</div>
			<!-- /simple list -->

		</div>

	</div>
	<!-- /simple lists -->




</div>
<!-- /content area -->
@include('layouts.footer')
