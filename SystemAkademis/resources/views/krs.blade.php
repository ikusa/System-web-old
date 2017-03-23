<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Surya University </title>

    <!-- Bootstrap -->
    <link href="{{ url('../vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('../vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('../vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('../vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ url('../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ url('../vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ url('../vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ url('../build/css/custom.min.css') }}" rel="stylesheet">
    <style>
    #logout:hover {
    background-color: #f2f2f2;"
    }
</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>Surya University</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ $biodata[0]->nama }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu Utama</h3>
                <ul class="nav side-menu">
                  <li><a href="{{env('URL_HOME')}}"><i class="fa fa-home"></i> Home </a>

                  </li>
                  <li><a href="{{env('URL_PENGUMUMAN')}}"><i class="fa fa-newspaper-o"></i> PENGUMUMAN </a>

                  </li>
                  <li><a href="{{env('URL_KHS')}}"><i class="fa fa-edit"></i> KHS </a>

                  </li>
                  <li><a href="{{env('URL_KRS')}}"><i class="fa fa-desktop"></i> KRS </a>

                  </li>
                  <li><a href="{{env('URL_BIODATA')}}"><i class="fa fa-table"></i> BIODATA </a>

                  </li>


              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="{{env('URL_HOME')}}" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">{{ $biodata[0]->nama }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li>
                      <a href="{{env('URL_SETTING')}}">

                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="{{env('URL_HELP')}}">Help</a></li>
                    <li>
                    <form id="myForm" action="/logout" method="post">
                      {{ csrf_field() }}
                    <div id="logout" align="center" style="cursor: pointer;"   onclick="myForm.submit();">
                    <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                  </form>
                  </li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

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
		  <a href="{{env('URL_TAMBAH_KRS')}}" class="btn btn-info btn-lg btn-block"><i class="fa fa-pencil"></i>Tambah Matakuliah</a>
          <div class="">


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kartu Rencana Studi</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Pastikan mata kuliah yang dipilih sudah benar lalu tekan tombol submit</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 20%">Kode Mata Kuliah</th>
                          <th>Nama Mata Kuliah</th>
                          <th>SKS</th>
                          <th>Pengajar</th>
                          <th>Status</th>
                          <th style="width: 10%">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
					            @foreach ($course as $kuliah)
                        <tr>
                          <td>{{$kuliah->kodeMK}}</td>
                          <td>
                            <a>{{$kuliah->namaMK}}</a>
                            <br />

                          </td>
                          <td>
                            <a>{{$kuliah->sks}}</a>
                          </td>
                          <td class="project_progress">
                            <a>{{$kuliah->dosen}}</a>
                          </td>
						              <td class="project_progress">
                            <a>{{$kuliah->status_terbuka}}</a>
                          </td>
                          <td>
                            <button type="button" class="btn btn-warning btn-xs">Menunggu Submit</button>
                          </td>
                          <td>
                            <form action="/delete" method="post">
                              {{ csrf_field() }}
                             <button class="btn btn-danger btn-xs" name="subject" type="submit" value="{{$kuliah->id}}">
                            <i class="fa fa-trash-o"></i> Delete
                          </button>
                          </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- end project list -->
                  </div>
                </div>
              </div>
            </div>

			<form method='post'>
				<input type='submit' class="btn btn-success btn-lg" name='submit' value='Submit' onclick="return confirm('Mata kuliah yang sudah disubmit tidak bisa diubah.\nApakah anda yakin ingin submit mata kuliah?')"/>
			</form>

          </div>









            </div>
          </div>
        </div>

        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            {{env('COPYRIGHT')}}
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
