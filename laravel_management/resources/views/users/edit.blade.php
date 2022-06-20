@extends('layouts.master')

@section('title', 'Edit user')

@section('content')

<h2>Edit user</h2>
<form action="/users/update/{{ $user[0]->id }}" method="post" id="editform" enctype="multipart/form-data"
  class="form-horizontal">
  {{ csrf_field()}}
  <div class="form-group">
    <label class="control-label col-sm-2" for="Name">Name (*):</label>
    <div class="col-sm-6">
      <input type="text" name="name" id="name" class="form-control" value="{{ $user[0]->name }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Address(*)</label>
    <div class="col-sm-6">
      <input type="text" name="address" id="address" class="form-control" value="{{ $user[0]->address }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone">Phone:</label>
    <div class="col-sm-6">
      <input type="number" class="form-control" id="phone" name="phone" value="{{ $user[0]->phone }}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="birth_date">Birth_date:</label>
    <div class="col-sm-6">
      <input type="date" id="birth_date" name="birth_date" value="{{ $user[0]->birth_date }}" min="2000-01-01"
        max="2022-12-31">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save user</button>
    </div>
  </div>
</form>
<script>
  $("#editform").validate({
        rules: {
            name: {
                required: true,
                maxlength: 20
            },
            address: {
                required: true,
                maxlength: 20
            },
            phone: {
                required: true,
                maxlength: 20
            },

        },
        messages: {

            name: {
                required: "Name is required",
            },
            address: {
                required: "address is required",
            },
            phone: {
                required: "phone is required",
            },
        }
    });
</script>

@stop