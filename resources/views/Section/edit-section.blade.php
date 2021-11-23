<form action="{{route('update-section')}}"  method="post" enctype="multipart/form-data"
  class="form-validate-jquery">
<div class="modal-body">
    @csrf
    <input type="hidden" name="id" id="slot_id" value="{{$section->id}}">
    <input type="hidden" name="module_id" id="section_module_id" value="{{$section->module_id}}">
    <fieldset>

      <div class="form-group row">
        <label for="" class="col-lg-4 col-form-label">Section Name</label>
        <div class="col-lg-8">
          <input type="text" name="name" class="form-control required" value="{{$section->name}}">
        </div>
      </div>
      <div class="form-group row">

        <label class="col-lg-4 col-form-label">Section Duration</label>

        <div class="col-lg-8">

          <textarea name="duration" class="form-control required" rows="8" cols="80">{{$section->duration}}</textarea>

        </div>

      </div>




</div>

</fieldset>

  <div class="modal-footer">

    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

    <button type="submit" class="btn bg-primary">Update Section</button>

  </div>
