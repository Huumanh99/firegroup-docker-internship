@extends('layouts.master')

@section('title', 'List of Users')

@section('content')

<h2>Create user</h2>
<form action="/users/create-user" method="post" enctype="multipart/form-data" class="form-horizontal" id="createForm">
  {{ csrf_field()}}
  <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name <span class="text-danger">(*)</span>:</label>
    <div class="col-sm-6">
      <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Address <span class="text-danger">(*)</span>:</label>
    <div class="col-sm-6">
      <input type="text" name="address" class="form-control" id="address" placeholder="Enter address">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone">Phone <span class="text-danger">(*)</span>:</label>
    <div class="col-sm-6">
      <input type="number" id="phone" name="phone" class="form-control"
        placeholder="Enter phone">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="birth_date">Birth_Date <span class="text-danger">(*)</span>:</label>
    <div class="col-sm-6">
      <input type="date" id="birth_date" name="birth_date"
       value="2022-07-22"
       min="2000-01-01" max="2022-12-31">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Create user</button>
    </div>
  </div>
</form>
@stop