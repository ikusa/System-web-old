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
    <li class="active">
      <a href="#">Home</a>
    </li>
    <li>
      <a href="#">Biodata</a>
    </li>
    <li >
      <a href="#">Nilai</a>
    </li>

  </ul>
</div>
</div>
<div class="row">
<div class="col-md-8">
  <div class="row " >
    <div class="col-md-3">
      <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/">
    </div>
    <div class="col-md-9">
      <table class="table">

        <tbody>
          <tr>
            <td>
              Nama
            </td>
            <td>
              01/04/2012
            </td>
          </tr>
          <tr >
            <td>
              NIM
            </td>
            <td>
              01/04/2012
            </td>
          </tr>
          <tr >
            <td>
              Program Studi
            </td>
            <td>
              02/04/2012
            </td>
          </tr>
          <tr >
            <td>
              IPK
            </td>
            <td>
              03/04/2012
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="col-md-4">
  <h2>
    Pertemuan Mahasiswa
  </h2>
  <p>
    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
  </p>
  <p>
    <a class="btn" href="#">View details »</a>
  </p>
</div>
</div>
</div>
</div>
</div>
@endsection
