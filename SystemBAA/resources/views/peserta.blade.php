@extends('layouts.master')

@section('scripts')
  <script type="text/javascript">
  $(document).ready(function () {

        $(".my_select_box").chosen({
          no_results_text: "Oops, nothing found!",
          width: "95%"
        });
  });

  function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
   var id = getParameterByName('id');
   $('#edit').click(function() {
      window.open('{{env('URL_KELAS')}}/peserta?id={{getParameterByName('id')}}')
   });
}
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
      <br>
      <form  action="/nilai/submit" method="post">
        {{csrf_field()}}
      <button type="button" class="btn btn-info" id="edit">Edit</button>
      <input type="submit" class="btn btn-success" value="Submit">


      <div class="x_panel">
      <div class="x_content">
          <table class="table table-hover">
              <tbody>

                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                @if ($table != null)
                @foreach ($table as $key)
                  <tr>

                    <td>{{$key->nim}}</td>
                    <td>{{$key->nama}}</td>
                    <td>{{$key->program_studi}}</td>
                  </tr>
                @endforeach
                @endif

              </tbody>
          </table>
      </form>
      </div>
    </div>


  </div>
</div>
</div>
<!-- /page content -->
</div>

@endsection
