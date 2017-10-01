@extends('layouts.master')
@section('scripts')

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
                    <button id="tombol" background-color="red">Click him</button>

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
                                <td>{{ $biodata->agama }}</td>
                            </tr>
                            <tr>
                                <th>8</th>
                                <th>Tempat Lahir</th>
                                <td>{{ $biodata->tempat_lahir }}</td>

                            </tr>
                            <tr>
                                <th>9</th>
                                <th>Jenis Kelamin</th>
                                <td>{{ $biodata->jenis_kelamin }}</td>
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
                                <td>{{ $biodata->nisn }}</td>
                            </tr>
                            <tr>
                                <th>14</th>
                                <th>NIK</th>
                                <td>{{ $biodata->nik }}</td>
                            </tr>
                            <tr>
                                <th>15</th>
                                <th>NPWP</th>
                                <td>{{ $biodata->npwp }}</td>
                            </tr>
                            <tr>
                                <th>16</th>
                                <th>Kewarganegaraan</th>
                                <td>{{ $biodata->kewarganegaraan }}</td>
                            </tr>
                            <tr>
                                <th>17</th>
                                <th>Alamat</th>
                                <td>{{ $biodata->jalan }}</td>
                            </tr>
                            <tr>
                                <th>18</th>
                                <th>Dusun</th>
                                <td>{{ $biodata->dusun }}</td>
                            </tr>
                            <tr>
                                <th>19</th>
                                <th>RT</th>
                                <td>{{ $biodata->rt }}</td>
                            </tr>
                            <tr>
                                <th>20</th>
                                <th>RW</th>
                                <td>{{ $biodata->rw }}</td>
                            </tr>
                            <tr>
                                <th>21</th>
                                <th>Kode pos</th>
                                <td>{{ $biodata->kodepos }}</td>
                            </tr>
                            <tr>
                                <th>22</th>
                                <th>Kelurahan</th>
                                <td>{{ $biodata->kelurahan }}</td>
                            </tr>
                            <tr>
                                <th>23</th>
                                <th>Kecamatan</th>
                                <td>{{ $biodata->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>24</th>
                                <th>Jenis Tinggal</th>
                                <td>{{ $biodata->jenis_tinggal }}</td>
                            </tr>
                            <tr>
                                <th>25</th>
                                <th>Transportasi</th>
                                <td>{{ $biodata->transportasi }}</td>
                            </tr>
                        </tbody>
                    </table>
                  </div>

                </div>



            </div>
        </div>
    </div>
    <script
			  src="https://code.jquery.com/jquery-1.12.4.min.js"
			  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
			  crossorigin="anonymous">
                  function () {
                    $('#tombol').click(function() {
                      alert("Hai");
                    });
        $(document).ready(

            $('button').click(function() {
              console.log("Hai");
            });

            $("td").each(function(i){
              console.log(this.text());
              if (this.text() == "INDONESIA") {
                this.text("MALAYSIA");
              }
          });
        });

    </script>
    <!-- /page content -->
@endsection
