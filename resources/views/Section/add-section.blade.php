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
<script src="{{ asset('global_assets/js/plugins/ui/prism.min.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function(){


        var i =1;
        $(document).on('click','#add_section',function(){
        	  i++;
           $('#section').append(`<div id="sec_main_${i}"><div class="form-group row">
									<label class="col-lg-3 col-form-label">Section Name:</label>
									<div class="col-lg-9">
										<input id="sec_${i}" type="text" name="name[]" class="form-control required"
											value="{{old('sec_name')}}" placeholder="Your Section Name">
									</div>
								</div>


								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Section Duration:</label>
									<div class="col-lg-9">
										<textarea id="sec_desc_${i}" rows="5" name="duration[]" cols="5" class="form-control required"
											placeholder="Enter Section Description">{{old('duration')}}</textarea>
									</div>
							    </div>
							</div><div class="text-right mb-3">
							<a style="color: white;cursor: pointer;" data-id="${i}" class="btn btn-sm btn-warning p-1 remove"><i class="icon-point-up"></i>&nbsp;Remove Section</a>
						</div></div>`);
        });

        $(document).on('click','.remove',function(){
              var id = $(this).attr('data-id');

              $('#sec_main_'+id).remove();
              $(this).remove();
        });
	});
</script>

@stop
@include('layouts.header')
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Create New Section
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
					<h5 class="card-title">{{$module->name}} Module</h5>

					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>


				<div class="card-body mt-3">
					<form action="{{route('store-section')}}" method="post" class="form-validate-jquery" enctype="multipart/form-data">
						@csrf
						<fieldset>

							<div class="collapse show" id="demo1" style="">
                                <input type="hidden" name="module_id" value="{{$module->id}}">
								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Module Name:</label>
									<div class="col-lg-9">
										<input type="text" name="name" class="form-control"
											value="{{$module->name}}" readonly>

									</div>
								</div>


								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Module Description:</label>
									<div class="col-lg-9">
										<textarea rows="5" name="desc" cols="5" class="form-control"
											placeholder="Enter Module Description" readonly="">{{$module->description}}</textarea>
									</div>
							    </div>

                        <div id="section">
							    <div class="form-group row">
									<label class="col-lg-3 col-form-label">Section Name:</label>
									<div class="col-lg-9">
										<input type="text" id="sec_1" name="name[]" class="form-control required"
											value="{{old('name')}}" placeholder="Your Section Name">
									</div>
								</div>


								<div class="form-group row">
									<label class="col-lg-3 col-form-label">Section Duration:</label>
									<div class="col-lg-9">
										<textarea rows="5" id="sec_desc_1" name="duration[]" cols="5" class="form-control required"
											placeholder="Enter Section Duration">{{old('sec_desc')}}</textarea>
									</div>
							    </div>
							</div>

							</div>


                       <div>
							<a style="color: white;cursor: pointer;" class="btn btn-primary legitRipple" id="add_section">Add Section</a>
						</div>


						</fieldset>


						<div class="text-right">
							<button type="submit" class="btn btn-primary legitRipple">Create Section<i class="icon-paperplane ml-2"></i></button>
						</div>
					</form>

				</div>
			</div>
			<!-- /simple list -->

		</div>

		<div class="col-md-4" style="display:none;">
			<!-- Latest updates -->
							<div class="sidebar sidebar-light sidebar-component position-static w-100 d-block mb-md-0">
									<div class="sidebar-content position-static">

										<!-- User menu -->
										<div class="card sidebar-user">
											<div class="card-body">
												<div class="media">


													<div class="media-body">
														<div class="media-title font-weight-semibold">Modules</div>

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
													<div class="text-uppercase font-size-sm line-height-sm">Available Sections</div>
												</li>





												<li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">
													<a href="#" class="nav-link"><i class="icon-cube3"></i>{{$module->m_name}}</a>

													<ul class="nav nav-group-sub">
														@foreach($module->sections as $section)
														<li class="nav-item"><a href="#" class="nav-link"><i class="icon-cube3"></i>{{$section->sec_name}} </a></li>
														@endforeach
													</ul>
												</li>


											</ul>
										</div>
										<!-- /navigation -->

									</div>
								</div>
							<!-- /latest updates -->
		</div>


	</div>
	<!-- /simple lists -->





</div>
<!-- /content area -->
@include('layouts.footer')
