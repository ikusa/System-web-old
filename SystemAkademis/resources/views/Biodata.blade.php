@extends('layouts.app') @section('content')
<style>
    body {
        background: #ccffff;
    }
</style>
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Pengumuman</a>
                        </li>
                        <li class="active">
                            <a href="#">Biodata</a>
                        </li>
                        <li>
                            <a href="#">Nilai</a>
                        </li>
                        <li>
                            <a href="#">KRS</a>
                        </li>

                    </ul>
                </div>
            </div>


            <div class="row">
                <form id="table" class="form-horizontal">

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        console.log($('#Email').html())
        $.get("http://" + window.location.host + "/coloumn?email=" + $('#Email').html(),
            function(data, status) {
              var y =""
                for (var k in data[0]) {
                    if (data[0].hasOwnProperty(k)) {
                        k=(k.replace(/_/g, ' '));
                        y = y+'<div class="form-group">\
                              <label class="control-label col-sm-2" >'+k+':</label>\
                                <div class="col-sm-10">\
                                  <input  class="form-control"  value="'+data[0][k]+'">\
                                </div>\
                              </div>'


                    }
                }

                $("#table").html(y);
                $("input").prop('disabled', true);
            }

            //$("#Nama").html(data[0].nama);
            //$("#NIM").html(data[0].program_studi);
            //$("#ProgramStudi").html(data[0].nim);
        )
    });
</script>

@endsection
