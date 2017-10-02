@extends('layouts.master')
@section('scripts')
  <script type="text/javascript">
    $(document).ready(function () {
      // Need better empty string handling obviously...
      // $("td").each(function(i){
      //   if ($(this).text() == "") {
      //     $(this).text("-");
      //   }
      // });
    });
  </script>
@endsection

@section('content')

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="dashboard_graph">


                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
                <br />

                <div class="x_content">
                  <div class="x_panel">
                    <table class="table table-hover">
                        <tbody>
                            <!--  -->
                            <tr>
                                <th>1</th>
                                <th>Nama</th>
                                <td>{{ $biodata->nama }}</td>
                            </tr>

                            <tr>
                                <th>2</th>
                                <th>NIM</th>
                                <td>{{ $biodata->nim }}</td>

                            </tr>

                            <tr>
                                <th>3</th>
                                <th>Program Studi</th>
                                <td>{{ $biodata->program_studi }}</td>

                            </tr>
                            <tr>
                                <th>4</th>
                                <th>Angkatan</th>
                                <td>{{ $biodata->angkatan }}</td>

                            </tr>
                            <tr>
                                <th>5</th>
                                <th>Email</th>
                                <td>{{ $biodata->email }}</td>

                            </tr>
                            <tr>
                                <th>6</th>
                                <th>Nomor Telepon</th>
                                <td>{{ $biodata->no_telephone }}</td>

                            </tr>
                            <tr>
                                <th>7</th>
                                <th>Agama</th>
                                <td>{{ ucfirst(strtolower($biodata->agama)) }}</td>
                            </tr>
                            <tr>
                                <th>8</th>
                                <th>Tempat Lahir</th>
                                <td>{{ ($biodata->tempat_lahir=='') ? '-' : $biodata->tempat_lahir }}</td>

                            </tr>
                            <tr>
                                <th>9</th>
                                <th>Jenis Kelamin</th>
                                <td>{{ ucfirst(strtolower($biodata->jenis_kelamin)) }}</td>
                            </tr>
                            <tr>
                                <th>10</th>
                                <th>Nama Ibu</th>
                                <td>{{ $biodata->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <th>Nama Ayah</th>
                                <td>{{ $biodata->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <th>12</th>
                                <th>Tanggal Lahir</th>
                                <td>{{ $biodata->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>13</th>
                                <th>NISN</th>
                                <td>{{ ($biodata->nisn=='') ? '-' : $biodata->nisn }}</td>
                            </tr>
                            <tr>
                                <th>14</th>
                                <th>NIK</th>
                                <td>{{ ($biodata->nik=='') ? '-' : $biodata->nik }}</td>
                            </tr>
                            <tr>
                                <th>15</th>
                                <th>NPWP</th>
                                <td>{{ ($biodata->npwp=='') ? '-' : $biodata->npwp }}</td>
                            </tr>
                            <tr>
                                <th>16</th>
                                <th>Kewarganegaraan</th>
                                <td>{{ ucfirst(strtolower($biodata->kewarganegaraan)) }}</td>
                            </tr>
                            <tr>
                                <th>17</th>
                                <th>Alamat</th>
                                <td>{{ ($biodata->jalan=='') ? '-' : $biodata->jalan }}</td>
                            </tr>
                            <tr>
                                <th>18</th>
                                <th>Dusun</th>
                                <td>{{ ($biodata->dusun=='') ? '-' : $biodata->dusun }}</td>
                            </tr>
                            <tr>
                                <th>19</th>
                                <th>RT</th>
                                <td>{{ ($biodata->rt=='') ? '-' : $biodata->rt }}</td>
                            </tr>
                            <tr>
                                <th>20</th>
                                <th>RW</th>
                                <td>{{ ($biodata->rw=='') ? '-' : $biodata->rw }}</td>
                            </tr>
                            <tr>
                                <th>21</th>
                                <th>Kode Pos</th>
                                <td>{{ ($biodata->kodepos=='') ? '-' : $biodata->kodepos }}</td>
                            </tr>
                            <tr>
                                <th>22</th>
                                <th>Kelurahan</th>
                                <td>{{ ($biodata->kelurahan=='') ? '-' : $biodata->kelurahan }}</td>
                            </tr>
                            <tr>
                                <th>23</th>
                                <th>Kecamatan</th>
                                <td>{{ ($biodata->kecamatan=='') ? '-' : $biodata->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>24</th>
                                <th>Jenis Tinggal</th>
                                <td>{{ ($biodata->jenis_tinggal=='') ? '-' : $biodata->jenis_tinggal }}</td>
                            </tr>
                            <tr>
                                <th>25</th>
                                <th>Transportasi</th>
                                <td>{{ ($biodata->transportasi=='') ? '-' : $biodata->transportasi }}</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>

                </div>



            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
