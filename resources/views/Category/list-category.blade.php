@section('pagespecificscripts')
<script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js')}}"></script>
<script src="{{ asset('global_assets/js/demo_pages/form_validation.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$('#category').click(function() {

			$('#expanseModal').modal('show');
		});

	});
</script>
@stop
@include('layouts.header')
<!-- Basic modal -->

<div id="expanseModal" class="modal fade" tabindex="-1">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title">Add New Category</h5>

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>

			<div class="modal-body">

				<form action="{{route('store-category')}}" method="post" enctype="multipart/form-data"
					class="form-validate-jquery">
					@csrf

					<fieldset>

						<div class="form-group row">

							<label class="col-lg-4 col-form-label">Category Name</label>

							<div class="col-lg-8">

								<input type="text" class="form-control required" name="category"
									placeholder="Enter Category Name">

							</div>

						</div>
						<div class="form-group row">

							<label class="col-lg-4 col-form-label">Priority</label>

							<div class="col-lg-8">

								<select class="form-control" name="priority" >
									<option value="">Select Prioity</option>
									@for($i=1;$i<=8;$i++)
									<option value="{{$i}}">{{$i}}</option>
									@endfor()
								</select>

							</div>

						</div>



			</div>

			</fieldset>

			<div class="modal-footer">

				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

				<button type="submit" class="btn bg-primary">Add Category</button>

			</div>

			</form>

		</div>

	</div>

</div>

<!-- /basic modal -->
<!-- Edit modal -->

<div id="editCategoryModal" class="modal fade" tabindex="-1">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h5 class="modal-title">Update Category</h5>

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>

			<div class="modal-body">

				<form action="{{route('update-category')}}" method="post" enctype="multipart/form-data"
					class="form-validate-jquery">
					@csrf
					<input type="hidden" name="category_id" value="" id="edit_category_id">
					<fieldset>

						<div class="form-group row">

							<label class="col-lg-4 col-form-label required">Category Name</label>

							<div class="col-lg-8">

								<input type="text" class="form-control required edit_category_name" name="category"
									placeholder="Enter Category Name">

							</div>

						</div>



			</div>

			</fieldset>

			<div class="modal-footer">

				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

				<button type="submit" class="btn bg-primary">Update Category</button>

			</div>

			</form>

		</div>

	</div>

</div>

<!-- Edit modal -->
<!-- Page header -->
<div class="page-header page-header-light">
	<div class="page-header-content header-elements-md-inline">
		<div class="page-title d-flex">
			<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Categories
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
					<h5 class="card-title">List of Categories</h5>
					<div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
						<div class="btn-group">
							<a style="cursor:pointer;" class="btn bg-indigo-400 legitRipple" id="category"><i class="icon-stack2 mr-2"></i> Add
								Category</a>
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
								<th class="text-center">Actions</th>
								<th></th>
							</tr>
						</thead>
						<tbody>

							@forelse($categories as $category)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$category->cat_name}}</td>

								<td class="text-center">
									<div class="list-icons">
										<div class="list-icons-item dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu7"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{route('delete-category',['id' => $category->id])}}"
													class="dropdown-item" onclick="return confirm('Are you sure?');">
													Delete</a>
													<a
														class="dropdown-item" onclick="editCategory({{$category->id}});">
														Edit <i class="fa fa-pencil"></i></a>
											</div>
										</div>
									</div>
								</td>
								<td class="pl-0"></td>
							</tr>
							@empty
							<tr>
								<td colspan="7" class="text-center">No Categories Found</td>
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
<script type="text/javascript">
function editCategory(category_id)
{
	$.ajax({
		url:"{{route('edit-category')}}/"+category_id,
		type:"GET",
		success:function(response)
		{
			$("#edit_category_id").val(response.id);
			$(".edit_category_name").val(response.cat_name);
			$('#editCategoryModal').modal('show');
		}
	});
}
</script>
