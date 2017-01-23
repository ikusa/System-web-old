@extends('layouts.app')

@section('content')
<style>
  body {
      background: #ccffff;
  }
</style>
<div class="container-fluid">
<div class="panel panel-default">
<div class="panel-body">
<div class="row">
<div class="col-md-12">
  <ul class="nav nav-tabs">
    <li >
      <a href="#">Home</a>
    </li>
    <li>
      <a href="#">Pengumuman</a>
    </li>
    <li class="active">
      <a href="#">Biodata</a>
    </li>
    <li>
      <a href="#">Nilai</a>
    </li>
    <li>
      <a href="#">KRS</a>
    </li>

  </ul>
</div>
</div>
<div class="row">
  <form class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="pwd" placeholder="Enter password">
        </div>
      </div>
</div>

</div>
</div>
</div>
</div>

@endsection
