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




  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Pengumuman </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              <ul class="list-unstyled timeline widget">
                @foreach ($pengumuman as $info)
                  <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>{{ $info->judul }}</a>
                                    </h2>
                      <div class="byline">
                        <span>{{ $info->date }}</span> by <a>{{ $info->id }}</a>
                      </div>
                      <p class="excerpt">{{ $info->isi }}
                      </p>
                    </div>
                  </div>
                </li>
                @endforeach
          </ul>
            </li>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="dashboard-widget-content">


            </ul>
          </div>
        </div>
      </div>
    </div>



    </div>
  </div>
</div>
<!-- /page content -->
@endsection
