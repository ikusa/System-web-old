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
                    <h2>Tambah Mata Kuliah</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Pilih semua mata kuliah yang ingin diambil lalu klik tombol ambil matakuliah
                    </p>
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>

							 <th>Add</th>

                          <th>Kode</th>
                          <th>Nama</th>
                          <th>SKS</th>
                          <th>angkatan</th>
                          <th>Semester</th>
                          <th>Dosen</th>
                          <th>Prodi</th>
                          <th>Ruang</th>
                          <th>Hari</th>
                          <th>Jam</th>
                        </tr>
                      </thead>


                      <tbody>
					  <form action = "/submit" method = "post">
					   {{ csrf_field() }}

					  @foreach ($course as $pelajaran)
                        <tr>
                          <td>

							 <input type="checkbox"  name="checkbox[]" value="{{ $pelajaran->id }}">
							 <span ><i ></i></span>
						  </td>
                          <td>{{ $pelajaran->kodeMK }}</td>
                          <td>{{ $pelajaran->namaMK }}</td>
                          <td>{{ $pelajaran->sks }}</td>
                          <td>{{ $pelajaran->angkatan }}</td>
                          <td>{{ $pelajaran->term }}</td>
                          <td>{{ $pelajaran->dosen }}</td>
                          <td>{{ $pelajaran->program_studi }}</td>
                          <td>{{ $pelajaran->ruang }}</td>
                          <td>{{ $pelajaran->hari }}</td>
                          <td>{{ $pelajaran->jam }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
				<input type = "submit" class="btn btn-primary btn-block" value = "Ambil Matakuliah" />
                  </form>



            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection
