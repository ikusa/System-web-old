@extends('layouts.master')

@section('scripts')
  <script type="text/javascript">
  $(document).ready(function () {

        $(".my_select_box").chosen({
          no_results_text: "Oops, nothing found!",
          width: "95%"
        });
  });
</script>
@endsection

@section('content')
<div class="container">
  <!-- page content -->
  <div class="right_col" role="main">
      <!-- top tiles -->

      <!-- /top tiles -->

      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">


                  <div class="clearfix"></div>
              </div>
          </div>

      </div>
      <br />
      <form  action="/kelas/edit/submit" method="post">
        {{csrf_field()}}
      <input type="submit" class="btn btn-success" value="Submit">
      <input type="hidden" name='id' value='{{$table[0]->id }}'  class="form-control" >
      <div class="x_panel">
      <div class="x_content">
        <table class="table table-hover">
            <tbody>

              <th>NIM</th>
              <th>Nama</th>
              <th>Program Studi</th>
              @foreach ($table as $key)
                <tr>
                  <input type="hidden" name="id[]" value="{{$key->id}}">
                  <td>{{$key->nim}}</td>
                  <td>{{$key->nama}}</td>
                  <td>{{$key->program_studi}}</td>
                </tr>
              @endforeach
              <tr>
                <td><div class="form-group" >
                  <select name="id_mahasiswa[]" class="my_select_box">
                    @foreach ($mahasiswa as $data)
                      <option value="{{$data['id']}}" @if (in_array($data['id'],$table[0]->mahasiswa))
                        selected
                      @endif>{{$data['nim']}}</option>
                    @endforeach

                  </select>
                </div>
              </td>

            </tbody>
        </table>

      </div>


    </div>
  </div>
</div>
</div>
<!-- /page content -->
</div>

@endsection
