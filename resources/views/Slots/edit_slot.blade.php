<form action="{{route('update-slot')}}"  method="post" enctype="multipart/form-data"
  class="form-validate-jquery">
<div class="modal-body">
    @csrf
    <input type="hidden" name="category_id" id="slot_category_id" value="{{$slot->category_id}}">
    <input type="hidden" name="course_id" id="slot_course_id" value="{{$slot->course_id}}">
    <input type="hidden" name="id" id="slot_id" value="{{$slot->id}}">
    <fieldset>
<div class="form-group row">
  <label for="" class="col-lg-4 col-form-label">SkillLevel</label>
      <div class="col-lg-8">
        <select class="select form-control" name="skill_level_id">
          <option value="">Select Skill Level</option>
          @forelse($skill_levels as $skill_level)
          <option value="{{$skill_level->id}}" @if($skill_level->id==$slot->skill_level_id) selected @endif>{{$skill_level->name}}</option>
          @empty
          @endforelse
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-lg-4 col-form-label">Language</label>
      <div class="col-lg-8">
        <select class="select form-control" name="language_id">
          <option value="">Select Language</option>
          @forelse($languages as $language)
          <option value="{{$language->id}}" @if($language->id==$slot->language_id) selected @endif>{{$language->name}}</option>
          @empty
          @endforelse
        </select>
      </div>
    </div>
      <div class="form-group row">
        <label for="" class="col-lg-4 col-form-label">Slot Name</label>
        <div class="col-lg-8">
          <input type="text" name="name" class="form-control required" value="{{$slot->name}}">
        </div>
      </div>
      <div class="form-group row">

        <label class="col-lg-4 col-form-label">Slot Description</label>

        <div class="col-lg-8">

          <textarea name="description" class="form-control required" rows="8" cols="80">{{$slot->descrpition}}</textarea>

        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-4">
            <h6 class="font-weight-semibold">Seats</h6>

            <div class="input-group">
              <input type="text" name="seats" class="form-control required" value="{{$slot->seats}}">
            </div>
          </div>

        </div>
        <div class="col-md-6">
          <div class="mb-4">
            <h6 class="font-weight-semibold">Slot Price</h6>

            <div class="input-group">
              <input type="text" name="price" class="form-control required" value="{{$slot->price}}">
            </div>
          </div>

        </div>
      </div>
      <div class="mb-4">
        <h6 class="font-weight-semibold">Slot Time Period</h6>

        <div class="row">
          <div class="col-md-6">
            <p><input type="text" class="form-control required" id="start" name="start" placeholder="Start date" value="{{$slot->start_date}}"></p>
          </div>

          <div class="col-md-6">
            <p><input type="text" class="form-control required" id="end" name="end" placeholder="Finish date" value="{{$slot->end_date}}"></p>
          </div>
        </div>

      </div>


</div>

</fieldset>

  <div class="modal-footer">

    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>

    <button type="submit" class="btn bg-primary">Update Slot</button>

  </div>
  <script type="text/javascript">
  $( "#start" ).pickadate({  min: true });
  $( "#end" ).pickadate({  min: true });
  </script>
