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
      <form  action="/course/create/submit" method="post">
        {{csrf_field()}}
      <input type="submit" class="btn btn-success" value="Submit">



      <div class="x_panel">
      <div class="x_content">
          <table class="table table-hover">
              <tbody>

                  <tr>
                      <th>Kode MK</th>
                      <td><div class="form-group">
                          <input type="text" name='kodeMK'   class="form-control" >
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <th>Nama MK</th>
                      <td><div class="form-group">
                          <input type="text" name='namaMK'   class="form-control" >
                        </div>
                      </td>
                  </tr>
                  <tr>
                      <th>SKS</th>
                      <td><div class="form-group">
                          <input type="number" name='sks'   class="form-control" >
                        </div>
                      </td>
                  </tr>

                </form>

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
