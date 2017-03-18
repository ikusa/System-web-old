@extends('layouts.master')

@section('content')
<div class="container">
  <!-- page content -->
  <div class="right_col" role="main">


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">


          <div class="clearfix"></div>
        </div>
      </div>

    </div>
    <br />



    <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <!-- searchbox -->
            <div class="col-md-9 col-md-push-1">
            <h3 class="text-center">Search Biodata</h3>
            <div class="container">
            <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <form action="/krs" method="get" id="searchForm" class="input-group">

                    <div class="input-group-btn search-panel">
                        <select name="search_param" id="search_param" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <option value="nama">Nama</option>
                            <option value="nim">NIM</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="x" placeholder="Search term...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                           <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </form><!-- end form -->
            </div><!-- end col-xs-8 -->
            </div><!-- end row -->
            </div><!-- end container -->
            </div><!-- end col-md-9 -->
            <!-- searchbox -->
        </div>
        @if ($table != null)
          <div class="x_panel">
            <!-- table -->
            <table class="table">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIM</th>
                  <th>Program Studi</th>
                  <th>Email</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($table as $key)
                  <tr>
                    <td>{{$key->nama}}</td>
                    <td>{{$key->nim}}</td>
                    <td>{{$key->program_studi}}</td>
                    <td>{{$key->email}}</td>
                    <td> <button class="btn btn-success" onclick=" window.open('{{env('URL_BIODATA')}}?id={{$key->id}}','_blank')"> More</button></td>
                  </tr>
                @endforeach

              </tbody>
            </table>
            <!-- table -->
        </div>
        @endif



      </div>
      <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <!-- searchbox -->
              <div class="col-md-9 col-md-push-1">
              <h3 class="text-center">Control Panel</h3>
              <div class="container">
              <div class="row">
              <div class="col-xs-8 col-xs-offset-2">

                <a href="/createbiodata" class="btn btn-info" role="button">New Biodata Mahasiswa</a>
                <a href="/createbiodatadosen" class="btn btn-info" role="button">New Biodata Dosen</a>
                <a href="/createterm" class="btn btn-info" role="button">New Term</a>
              </div><!-- end col-xs-8 -->
              </div><!-- end row -->
              </div><!-- end container -->
              </div><!-- end col-md-9 -->
              <!-- searchbox -->
          </div>




        </div>



      </div>
    </div>
  </div>
  <!-- /page content -->
</div>
<script>
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});
</script>
@endsection
