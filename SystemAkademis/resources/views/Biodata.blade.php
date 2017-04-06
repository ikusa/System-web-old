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




                <div class="x_content">
                  <div class="x_panel">

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>Nama</th>
                                <td>{{ $biodata[0]->nama }}</td>
                            </tr>


                            <tr>
                                <th>2</th>
                                <th>NIM</th>
                                <td>{{ $biodata[0]->nim }}</td>

                            </tr>

                            <tr>
                                <th>3</th>
                                <th>Program Studi</th>
                                <td>{{ $biodata[0]->program_studi }}</td>

                            </tr>
                            <tr>
                                <th>4</th>
                                <th>Angkatan</th>
                                <td>{{ $biodata[0]->Angkatan }}</td>

                            </tr>
                            <tr>
                                <th>5</th>
                                <th>Email</th>
                                <td>{{ $biodata[0]->email }}</td>

                            </tr>
                            <tr>
                                <th>6</th>
                                <th>nomor Telepon</th>
                                <td>{{ $biodata[0]->no_telephone }}</td>

                            </tr>
                            <tr>
                                <th>7</th>
                                <th>Agama</th>
                                <td>{{ $biodata[0]->agama }}</td>
                            </tr>
                            <tr>
                                <th>8</th>
                                <th>Tempat Lahir</th>
                                <td>{{ $biodata[0]->tempat_lahir }}</td>

                            </tr>
                            <tr>
                                <th>9</th>
                                <th>Jenis Kelamin</th>
                                <td>{{ $biodata[0]->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>10</th>
                                <th>Nama Ibu</th>
                                <td>{{ $biodata[0]->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <th>11</th>
                                <th>Nama Ayah</th>
                                <td>{{ $biodata[0]->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <th>12</th>
                                <th>Tanggal Lahir</th>
                                <td>{{ $biodata[0]->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>13</th>
                                <th>NISN</th>
                                <td>{{ $biodata[0]->nisn }}</td>
                            </tr>
                            <tr>
                                <th>14</th>
                                <th>NIK</th>
                                <td>{{ $biodata[0]->nik }}</td>
                            </tr>
                            <tr>
                                <th>15</th>
                                <th>NPWP</th>
                                <td>{{ $biodata[0]->npwp }}</td>
                            </tr>
                            <tr>
                                <th>16</th>
                                <th>Kewarganegaraan</th>
                                <td>{{ $biodata[0]->kewarganegaraan }}</td>
                            </tr>
                            <tr>
                                <th>17</th>
                                <th>Jalan</th>
                                <td>{{ $biodata[0]->jalan }}</td>
                            </tr>
                            <tr>
                                <th>18</th>
                                <th>Dusun</th>
                                <td>{{ $biodata[0]->dusun }}</td>
                            </tr>
                            <tr>
                                <th>19</th>
                                <th>RT</th>
                                <td>{{ $biodata[0]->rt }}</td>
                            </tr>
                            <tr>
                                <th>20</th>
                                <th>RW</th>
                                <td>{{ $biodata[0]->rw }}</td>
                            </tr>
                            <tr>
                                <th>21</th>
                                <th>Kodepos</th>
                                <td>{{ $biodata[0]->kodepos }}</td>
                            </tr>
                            <tr>
                                <th>22</th>
                                <th>Keluarahan</th>
                                <td>{{ $biodata[0]->kelurahan }}</td>
                            </tr>
                            <tr>
                                <th>23</th>
                                <th>Kecamatan</th>
                                <td>{{ $biodata[0]->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>24</th>
                                <th>Jenis Tinggal</th>
                                <td>{{ $biodata[0]->jenis_tinggal }}</td>
                            </tr>
                            <tr>
                                <th>25</th>
                                <th>Transportasi</th>
                                <td>{{ $biodata[0]->transportasi }}</td>
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
