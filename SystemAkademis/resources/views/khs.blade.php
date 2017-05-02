@extends('layouts.master')

@section('content')
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
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Kartu Hasil Studi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">


                      <div class="panel">
                              <!-- foreach panel(bagian abu abunya) -->
                        @foreach ($term as $semester)
                          <a class="panel-heading" role="tab" id="heading" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$semester->id}}" aria-expanded="true" aria-controls="collapse{{$semester->id}}">
                            <h4 class="panel-title"> {{$semester->term}}</h4>
                          </a>
                          <div id="collapse{{$semester->id}}" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="heading{{$semester->id}}">
                            <div class="panel-body">
                              <table class="table table-bordered">
                                <thead>
                                  <tr>

                                    <th>Kode Mata Kuliah</th>
                                    <th>Nama Mata Kuliah</th>
                                    <th>Dosen Pengajar</th>
                               <th>SKS</th>
                                <th>Nilai</th>
                               <th>Nilai Huruf</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <!-- foreach matkul table -->
                                  @foreach ($nilai as $value)
                                    @if ($value->term == $semester->term)
                                      <tr>
                                        <td>{{$value->kodeMK}}</td>{{--kodeMK--}}
                                        <td>{{$value->namaMK}}</td>{{--namaMK--}}
                                        <td>{{$value->dosen}}</td>{{--dosen--}}
                                        <td>{{$value->sks}}</td>{{--sks--}}
                                        <td>{{$value->nilai}}</td>{{--nilai--}}
                                        <td>{{$value->nilai}}</td>{{--nilaihuruf--}}
                                      </tr>
                                    @endif
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>



                        @endforeach
                  </div>
                  <!-- end of accordion -->
                </div>
              </div>



            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
