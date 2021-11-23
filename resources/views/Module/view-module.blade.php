@section('pagespecificscripts')
<script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/form_validation.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('.link').click(function() {

			var id = $(this).attr('data-id');

			$.ajax({
                      url: "{{url('/link-section')}}" , 
                      type: 'get',
                      data: {
                        _token: "{{ csrf_token() }}",
                            id: id,
                    },
                    success: function (response){

                        if(response.status=="success"){
                        	console.log(response);
                        	$('#sec_title').html(response.section['sec_name']);
                        	$('#sec_link').val(response.section['url']);
                        	$('#sec_id').val(response.section['id']);

                            $('#linkModal').modal('show');
 
                        } else {
                             
                                  
                        } 

                    }

                });

			
		});

		$('.update').click(function() {

			var id = $(this).attr('data-id');

			$.ajax({
                      url: "{{url('/link-section')}}" , 
                      type: 'get',
                      data: {
                        _token: "{{ csrf_token() }}",
                            id: id,
                    },
                    success: function (response){

                        if(response.status=="success"){
                        	console.log(response);
                        	$('#sec_title2').html(response.section['sec_name']);
                        	$('#sec_1').val(response.section['sec_name']);
                        	$('#sec_desc_1').val(response.section['sec_desc']);
                        	$('#sec_id2').val(response.section['id']);

                            $('#updateModal').modal('show');
 
                        } else {
                             
                                  
                        } 

                    }

                });

			
		});
	});
</script>

@stop
@include('layouts.header')



<div id="updateModal" class="modal fade" tabindex="-1">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title" id="sec_title2"></h4>

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>

			<div class="modal-body">

			<form action="{{route('update-section')}}" id="updateForm" method="post" enctype="multipart/form-data" class="form-validate-jquery">
					@csrf

					<fieldset>

						<div class="form-group row">

							<label class="col-lg-3 col-form-label">Section Name:</label>

							<div class="col-lg-9">

								<input type="text" class="form-control required" id="sec_1" name="sec_name" placeholder="Enter Section Name">
								<input type="hidden" id="sec_id2" name="section_id" value="">
								

							</div>

						</div>

						<div class="form-group row">

							<label class="col-lg-3 col-form-label">Section Description:</label>

							<div class="col-lg-9">

								<textarea rows="5" id="sec_desc_1" name="sec_desc" cols="5" class="form-control required"
											placeholder="Enter Section Description"></textarea>

							</div>

						</div>



			</div>



			</fieldset>
			<div class="modal-footer">

				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

				<button type="submit" class="btn bg-primary">Update Section</button>

			</div>

			

		</form>

		</div>

	</div>

</div>

<div id="linkModal" class="modal fade" tabindex="-1">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title" id="sec_title"></h4>

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>

			<div class="modal-body">

			<form action="{{route('store-link')}}" id="linkForm" method="post" enctype="multipart/form-data"
					class="form-validate-jquery">
					@csrf

					<fieldset>

						<div class="form-group row">

							<label class="col-lg-3 col-form-label">Zoom Link</label>

							<div class="col-lg-9">

								<input type="text" class="form-control required" id="sec_link" name="link" placeholder="Enter Link">
								<input type="hidden" id="sec_id" name="section_id" value="">

							</div>

						</div>



			</div>

			</fieldset>

			<div class="modal-footer">

				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

				<button type="submit" class="btn bg-primary">Send Link</button>

			</div>

		</form>

		</div>

	</div>

</div>

<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Modules
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
					<h5 class="card-title">{{$name}}</h5>
					<div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
						<div class="btn-group">
							<a href="{{route('add-module',['id' => $id])}}" class="btn bg-indigo-400 legitRipple" id="category"><i class="icon-stack2 mr-2"></i> Add
								Module</a>
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
								<th>Module</th>
								<th>Description</th>
								<th>Category</th>
								<th class="text-center">Actions</th>
								<th class="text-center">View More</th>
								<th class="text-center">Section</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>
							<?php if (sizeOf($modules)>0) {
    $i=1; ?>
							@foreach($modules as $module)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$module->m_name}}</td>
								<td>{{$module->m_desc}}</td>
								<td>{{$module->m_cat}}</td>
								<td class="text-center">
									<div class="list-icons">
										<div class="list-icons-item dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu7"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												

												<a href="{{route('delete-module',['id' => $module->id])}}"
													class="dropdown-item" onclick="return confirm('Are you sure?');">
													Delete</a>

											</div>
										</div>
									</div>
								</td>

								<td data-toggle="collapse" data-target="#demo{{$i-1}}" class="accordion-toggle text-center"><i style="cursor: pointer;" class="icon-eye8"></i></td>
								<td class="text-center">
									<div class="btn-group">
							          <a href="{{route('add-section',['id' => $module->id])}}" class="btn btn-sm bg-teal-400 legitRipple" id="category"><i class="icon-plus2 mr-1"></i> Add Section</a>
						           </div>
						       </td>
						       <td class="pl-0"></td>
								
							</tr>
							<tr>
                                <td style="border-top: 1px solid #dddddd38 !important; background:#f3f3f3;" colspan="12" class="hiddenRow">
							        <div class="accordian-body collapse" id="demo{{$i-1}}"> 
                                        <table class="table">
                                            <thead>
                                                <tr class="info">
													<th>Section</th>
													<th>Description</th>
													<th class="text-center">Action</th>	

												</tr>
											</thead>	
								  		
											<tbody>

                                                <?php if (sizeOf($module->sections)>0) {?>
												@foreach($module->sections as $section)
												
                                                <tr data-toggle="collapse"  class="accordion-toggle" data-target="#demo10">
													<td>{{$section->sec_name}}</td>
													<td>{{$section->sec_desc}}</td>													
													<td class="text-center">
														<div class="list-icons">
															<div class="list-icons-item dropdown">
																<a href="#" class="list-icons-item" data-toggle="dropdown">
																	<i class="icon-menu7"></i>
																</a>

																<div class="dropdown-menu dropdown-menu-right">
																	<a href="#" data-id="{{$section->id}}"
																		class="dropdown-item update">
																		Edit</a>
																	<a href="#" data-id="{{$section->id}}"
																		class="dropdown-item link">
																		Sent URL</a>
																	<a href="{{route('delete-section',['id' => $section->id])}}"
																		class="dropdown-item" onclick="return confirm('Are you sure?');">
																		 Upload Video</a>

																	<a href="{{route('delete-section',['id' => $section->id])}}"
																		class="dropdown-item" onclick="return confirm('Are you sure?');">
																		Delete</a>

																</div>
															</div>
														</div>
													</td>
												</tr>
												@endforeach
												<?php
					                                 } else {?>
												<tr>
													<td colspan="3" class="text-center">No Sections Found</td>
												</tr>
												<?php }?>
											</tbody>
										</table>
									</div>
								</td>
							</tr>
							@endforeach
							<?php
} else {?>
							<tr>
								<td colspan="8" class="text-center">No Modules Found</td>
							</tr>
							<?php }?>



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