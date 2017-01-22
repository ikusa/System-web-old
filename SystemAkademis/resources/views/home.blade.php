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
      <a href="#">Pengumuman</a>
    </li>
    <li >
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
            <td id='Nama'>

            </td>
          </tr>
          <tr >
            <td>
              NIM
            </td>
            <td id='NIM'>

            </td>
          </tr>
          <tr >
            <td>
              Program Studi
            </td>
            <td id='ProgramStudi'>

            </td>
          </tr>
          <tr >
            <td>
              IPK
            </td>
            <td>
              UnderConstrutction
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
    UnderConstruction
  </p>
  <p>
    <a class="btn" href="#">View details »</a>
  </p>
</div>
</div>
</div>
</div>
</div>
<script>
  $(document).ready(function(){
    console.log($('#Email').html())
    $.get("http://" + window.location.host + "/data?email="+$('#Email').html(),
    function(data, status) {
            $("#Nama").html(data[0].nama);
            $("#NIM").html(data[0].program_studi);
            $("#ProgramStudi").html(data[0].nim);
    });



    });

</script>
@endsection
