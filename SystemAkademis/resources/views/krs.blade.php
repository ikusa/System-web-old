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
          @if ($biodata->status_krs==1)
            <a href="{{env('URL_TAMBAH_KRS')}}" class="btn btn-info btn-lg btn-block"><i class="fa fa-pencil"></i> Tambah Matakuliah</a>

          @endif
          <div class="">


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kartu Rencana Studi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if ($biodata->status_krs==1)
                    <p>Pastikan mata kuliah yang dipilih sudah benar lalu tekan tombol submit</p>
                    @endif


                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%">Kode Mata Kuliah</th>
                          <th>Nama Mata Kuliah</th>
                          <th>SKS</th>
                          <th>Pengajar</th>
                          <th>Status</th>
                          @if ($biodata->status_krs==1)
                          <th style="width: 10%">Delete</th>
                          @endif

                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($classesTaken as $class)
                        <tr>
                          <td>{{ $class->kodeMK }}</td>
                          <td>
                            <a>{{ $class->namaMK }}</a>
                            <br />

                          </td>
                          <td>
                            <a>{{ $class->sks }}</a>
                          </td>
                          <td class="project_progress">
                            <a>{{ $class->namaDosen }}</a>
                          </td>
						              <td class="project_progress">
                            <a>{{ $class->status_terbuka }}</a>
                          </td>

                          <td>
                            @if ($biodata->status_krs==1)
                              <form action="/delete" method="post">
                                {{ csrf_field() }}
                               <button class="btn btn-danger btn-xs" name="subject" type="submit">
                              <i class="fa fa-trash-o"></i> Delete
                            </button>
                            </form>
                            @endif

                          </tr>
                          </td>
                      @endforeach
                      </tbody>
                    </table>
                    <!-- end project list -->
                  </div>
                </div>
              </div>
            </div>

        @if ($biodata->status_krs==1)
          <input type='submit' class="btn btn-success btn-lg" name='submit' value='Submit' onclick="press()"/>

        @endif
        @if ($biodata->status_krs==0)

          <button class="btn btn-success btn-lg" name='print' value='print' onclick="location.href='/print_krs'"> PRINT</button>

        @endif


          </div>
            </div>
          </div>
        </div>

        <!-- /page content -->

@endsection
@section('script')
<script>
var id_krs = []

function press(){
  var r =  confirm('Mata kuliah yang sudah disubmit tidak bisa diubah.\nApakah anda yakin ingin submit mata kuliah?');
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  if(r==true){  $.ajax({
      url: '/final',
      type: 'POST',
      data: {_token: CSRF_TOKEN,data: id_krs},
      dataType: 'JSON',
      success: function (data) {
          console.log(data);
          location.reload();
      }
  });}


}
</script>
@endsection
