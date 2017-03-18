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
      <form  action="/submitbiodata" method="post">
        {{csrf_field()}}
      <button type="button" class="btn btn-info" onclick='$("input").prop("disabled", false);'>Edit</button>

      <input type="submit" class="btn btn-success" value="Submit">
      <input type="hidden" name="id" value="{{$biodata[0]->id}}">




      <div class="x_content">
          <table class="table table-hover">
              <tbody>

                  <tr>
                      <th>1</th>
                      <th>Nama</th>
                      <td><div class="form-group">
                          <input type="text" name='nama' value='{{ $biodata[0]->nama }}' disabled  class="form-control" >
                        </div>
                      </td>
                  </tr>


                  <tr>
                      <th>2</th>
                      <th>NIM</th>
                      <td><div class="form-group">
                        <input type="text" name='nim' value='{{ $biodata[0]->nim }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>


                  <tr>
                      <th>3</th>
                      <th>Program Studi</th>
                      <td><div class="form-group">
                        <input type="text" name='program_studi' value='{{ $biodata[0]->program_studi }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>4</th>
                      <th>Angkatan</th>
                      <td><div class="form-group">
                        <input type="text" name='angkatan' value='{{ $biodata[0]->angkatan }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>5</th>
                      <th>Email</th>
                      <td><div class="form-group">
                        <input type="text" name='email' value='{{ $biodata[0]->email }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>6</th>
                      <th>nomor Telepon</th>
                      <td><div class="form-group">
                        <input type="text" name='no_telephone' value='{{ $biodata[0]->no_telephone }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>7</th>
                      <th>Agama</th>
                      <td><div class="form-group">
                        <input type="text" name='agama' value='{{ $biodata[0]->agama }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr
                  <tr>

                      <th>8</th>
                      <th>Tempat Lahir</th>
                      <td><div class="form-group">
                        <input type="text" name='tempat_lahir' value='{{ $biodata[0]->tempat_lahir }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>

                  <tr>
                      <th>9</th>
                      <th>Jenis Kelamin</th>
                      <td><div class="form-group">
                        <input type="text" name='jenis_kelamin' value='{{ $biodata[0]->jenis_kelamin }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>10</th>
                      <th>Nama Ibu</th>
                      <td><div class="form-group">
                        <input type="text" name='nama_ibu' value='{{ $biodata[0]->nama_ibu }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>11</th>
                      <th>Nama Ayah</th>
                      <td><div class="form-group">
                        <input type="text" name='nama_ayah' value='{{ $biodata[0]->nama_ayah }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>12</th>
                      <th>Tanggal Lahir</th>
                      <td><div class="form-group">
                        <input type="text" name='tanggal_lahir' value='{{ $biodata[0]->tanggal_lahir }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>13</th>
                      <th>NISN</th>
                      <td><div class="form-group">
                        <input type="text" name='nisn' value='{{ $biodata[0]->nisn }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>14</th>
                      <th>NIK</th>
                      <td><div class="form-group">
                        <input type="text" name='nik' value='{{ $biodata[0]->nik }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>15</th>
                      <th>NPWP</th>
                      <td><div class="form-group">
                        <input type="text" name='npwp' value='{{ $biodata[0]->npwp }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>16</th>
                      <th>Kewarganegaraan</th>
                      <td><div class="form-group">
                        <input type="text" name='kewarganegaraan' value='{{ $biodata[0]->kewarganegaraan }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>17</th>
                      <th>Jalan</th>
                      <td><div class="form-group">
                        <input type="text" name='jalan' value='{{ $biodata[0]->jalan }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>18</th>
                      <th>Dusun</th>
                      <td><div class="form-group">
                        <input type="text" name='dusun' value='{{ $biodata[0]->dusun }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>19</th>
                      <th>RT</th>
                      <td><div class="form-group">
                        <input type="text" name='rt' value='{{ $biodata[0]->rt }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>20</th>
                      <th>RW</th>
                      <td><div class="form-group">
                        <input type="text" name='rw' value='{{ $biodata[0]->rw }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>21</th>
                      <th>Kodepos</th>
                      <td><div class="form-group">
                        <input type="text" name='kodepos' value='{{ $biodata[0]->kodepos }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>22</th>
                      <th>Keluarahan</th>
                      <td><div class="form-group">
                        <input type="text" name='kelurahan' value='{{ $biodata[0]->kelurahan }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>

                      <th>23</th>
                      <th>Kecamatan</th>
                      <td><div class="form-group">
                        <input type="text" name='kecamatan' value='{{ $biodata[0]->kecamatan }}' disabled  class="form-control" >
                      </div>
                    </td>
                  </tr>
                  <tr>
                      <th>24</th>
                      <th>Jenis Tinggal</th>
                      <td><div class="form-group">
                        <input type="text" name='jenis_tinggal' value='{{ $biodata[0]->jenis_tinggal }}' disabled  class="form-control" >
                      </div></td>
                  </tr>
                  <tr>
                      <th>25</th>
                      <th>Transportasi</th>
                      <td><div class="form-group">
                        <input type="text" name='transportasi' value='{{ $biodata[0]->transportasi }}' disabled  class="form-control" >
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
