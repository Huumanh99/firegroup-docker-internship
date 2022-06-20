@extends('layouts.master')

@section('title', 'List of Users')
@section('styles')

@stop

@section('content')

<h2>List of Users</h2>
<p><a href="/users/create" class="btn btn-primary">Create new user</a></p>
<div class="box-search" style="display: flex">
  <form action="/users" method="get" id="seachForm">
    <div class="autocomplete" style="width:300px;">
      <input type="text" name="name" id="searchName" list="search" placeholder="Tim theo tieu de name..."
        value="{{ $name }}" />
      <div class="autocomplete-items"></div>
    </div>
    <button type="submit">Tìm kiếm</button>
  </form>
</div>
<div>
  <form action="report" method="GET">
    <div class="input-group mb-3" style="display: flex;
    margin: 10px 0;">
      <input type="date" class="form-control" id="fromdate" name="date">
      <input type="date" class="form-control" id="todate" name="todate">
      <button class="btn btn-primary" type="submit">GET</button>
    </div>
  </form>
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col"><a href="/users?sortName={{ $sortName }}">Name</a></th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Birth_date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ $user->id }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->address }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->birth_date }}</td>
      <td><a href="/users/edit/{{ $user->id }}">Edit</a> | <a href="/users/delete/{{ $user->id }}">Delete</a> |
        <a href="/users/detail/{{ $user->id }}">View</a>
      </td>
    </tr>
    @endforeach
</table>

@stop