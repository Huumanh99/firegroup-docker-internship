@extends('layouts.master')

@section('title', 'List of Users')

@section('content')

<h2>User detail</h2>
<ul>
  <li>ID: {{ $user[0]->id }}</li>
  <li>Name: {{ $user[0]->name }}</li>
  <li>Address: {{ $user[0]->address }}</li>
  <li>Phone: {{ $user[0]->phone }}</li>
  <li>Birth_date: {{$user[0]->birth_date }}</li>
</ul>

@stop
