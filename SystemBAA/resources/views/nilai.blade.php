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
            <h3 class="text-center">Search Mata Kuliah</h3>
            <div class="container">
            <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <form action="/nilai" method="get" id="searchForm" class="input-group">

                    <div class="input-group-btn search-panel">
                        <select name="search_param" id="search_param" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <option value="namaMK">Nama Mata Kuliah</option>
                            <option value="kodeMK">Kode Mata Kuliah</option>
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
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Semester</th>
                  <th>Dosen</th>
                  <th>SKS</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($table as $key)
                  <tr>
                    <td>{{$key->kodeMK}}</td>
                    <td>{{$key->namaMK}}</td>
                    <td>{{$key->term}}</td>
                    <td>{{$key->namaDosen}}</td>
                    <td>{{$key->sks}}</td>
                    <td> <button class="btn btn-success" onclick=" window.open('{{env('URL_KHS')}}/input?id={{$key->id}}','_blank')"> More</button></td>
                  </tr>
                @endforeach

              </tbody>
            </table>
            <!-- table -->
        </div>
        @endif



      </div>




      </div>
    </div>
  </div>
  <!-- /page content -->
</div>

@endsection
