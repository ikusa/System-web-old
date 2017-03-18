@extends('layouts.master')

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
      <form  action="/submitterm" method="post">
        {{csrf_field()}}
      <input type="submit" class="btn btn-success" value="Submit">




      <div class="x_content">
          <table class="table table-hover">
              <tbody>

                  <tr>
                      <th>Term ex:2014/2015-genap</th>
                      <td><div class="form-group">
                          <input type="text" name='term'   class="form-control" >
                        </div>
                      </td>
                  </tr>


                  <tr>
                      <th>kode dikti</th>
                      <td><div class="form-group">
                        <input type="text" name='kode_dikti'   class="form-control" >
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
<!-- /page content -->
</div>

@endsection
