@extends('layouts.master')

@section('content')
<div class="container">
  <!-- page content -->
  <div class="right_col" role="main">
      <!-- top tiles -->
      <div class="row tile_count">
          <div class="col-md-4 col-sm-6 col-xs-8 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Nama</span>
              <div class="count">{{ $biodata[0]->nama }}</div>

          </div>
          <div class="col-md-4 col-sm-6 col-xs-8 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> NIM</span>
              <div class="count">{{ $biodata[0]->nim }}</div>

          </div>
          <div class="col-md-2 col-sm-2 col-xs-2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Program Studi</span>
              <div class="count green">{{ $biodata[0]->program_studi }}</div>

          </div>
          <div class="col-md-2 col-sm-2 col-xs-2 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> IPK</span>
              <div class="count">{{ $biodata[0]->ipk }}</div>

          </div>

      </div>
      <!-- /top tiles -->

      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">


                  <div class="clearfix"></div>
              </div>
          </div>

      </div>
      <br />
      <form  action="/submitcreatebiodata" method="post">
        {{csrf_field()}}
      <input type="submit" class="btn btn-success" value="Submit">




      <div class="x_content">
          <table class="table table-hover">
              <tbody>

                  <tr>
                      <th>Nama</th>
                      <td><div class="form-group">
                          <input type="text" name='nama'   class="form-control" >
                        </div>
                      </td>
                  </tr>


                  <tr>
                      <th>NIM</th>
                      <td><div class="form-group">
                        <input type="text" name='nim'   class="form-control" >
                      </div>
                    </td>
                  </tr>


                  <tr>
                      <th>Program Studi</th>
                      <td><div class="form-group">
                        <input type="text" name='program_studi'   class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>Angkatan</th>
                      <td><div class="form-group">
                        <input type="text" name='angkatan'   class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>Email</th>
                      <td><div class="form-group">
                        <input type="text" name='email'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                      <th>password</th>
                      <td><div class="form-group">
                        <input type="password" name='password'   class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>nomor Telepon</th>
                      <td><div class="form-group">
                        <input type="text" name='no_telephone'   class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>Agama</th>
                      <td><div class="form-group">
                        <input type="text" name='agama'   class="form-control" >
                      </div>
                    </td>
                  </tr
                  <tr>

                      <th>Tempat Lahir</th>
                      <td><div class="form-group">
                        <input type="text" name='tempat_lahir'   class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>Jenis Kelamin</th>
                      <td><div class="form-group">
                        <select name="jenis_kelamin">
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Nama Ibu</th>
                      <td><div class="form-group">
                        <input type="text" name='nama_ibu'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Nama Ayah</th>
                      <td><div class="form-group">
                        <input type="text" name='nama_ayah'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Tanggal Lahir</th>
                      <td><div class="form-group">
                        <input type="text" name='tanggal_lahir'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>NISN</th>
                      <td><div class="form-group">
                        <input type="text" name='nisn'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>NIK</th>
                      <td><div class="form-group">
                        <input type="text" name='nik'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>NPWP</th>
                      <td><div class="form-group">
                        <input type="text" name='npwp'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Kewarganegaraan</th>
                      <td><div class="form-group">
                        <input type="text" name='kewarganegaraan'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Jalan</th>
                      <td><div class="form-group">
                        <input type="text" name='jalan'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Dusun</th>
                      <td><div class="form-group">
                        <input type="text" name='dusun'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>RT</th>
                      <td><div class="form-group">
                        <input type="text" name='rt'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>RW</th>
                      <td><div class="form-group">
                        <input type="text" name='rw'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Kodepos</th>
                      <td><div class="form-group">
                        <input type="text" name='kodepos'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Keluarahan</th>
                      <td><div class="form-group">
                        <input type="text" name='kelurahan'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Kecamatan</th>
                      <td><div class="form-group">
                        <input type="text" name='kecamatan'   class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>Jenis Tinggal</th>
                      <td><div class="form-group">
                        <input type="text" name='jenis_tinggal'   class="form-control" >
                      </div></td>
                  </tr>
                  <tr>

                      <th>Transportasi</th>
                      <td><div class="form-group">
                        <input type="text" name='transportasi'   class="form-control" >
                      </div></td>
                  </tr>
                </form>

              </tbody>
          </table>

      </div>



  </div>
</div>
</div>
<!-- /page content -->
</div>

@endsection
