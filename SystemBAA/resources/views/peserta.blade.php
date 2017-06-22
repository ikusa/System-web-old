@extends('layouts.master')

@section('scripts')
  <script type="text/javascript">
  $(document).ready(function () {

        $(".my_select_box").chosen({
          no_results_text: "Oops, nothing found!",
          width: "95%"
        });

        $('#tambah').click(function() {
           addRow(document.getElementById('banyakPeserta').value)
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

   // Add new rows in peserta table based on passed number.
   function addRow(banyak) {
		var html = [];
      var oldTotalPesertaBaru = document.getElementById("totalPesertaBaru").value;

      totalPesertaBaru = Number(oldTotalPesertaBaru) + Number(banyak);
      document.getElementById("totalPesertaBaru").value = totalPesertaBaru;

      var count = oldTotalPesertaBaru;
      for (; count < totalPesertaBaru; count++) {
         html.push("<tr><td id='nim", count, "'>"
          + "<input type='text' id='nim", count, "' name='nim", count, "'></td>"
          + "<td name='nama", count, "' id='nama", count, "'>Ayy</td>"
          + "<td name='prodi", count, "' id='prodi", count, "'>LMAO</td></tr>");
      }

		$('#peserta').append(html.join(''));
  }

  $('#cek').click(function( event ) {
    event.preventDefault();
/*
    //Select all new peserta input form.
    var nims = document.querySelectorAll("#peserta input[type='text']")
     , i
     , node;

    var daftarNIM = [];

    //Testing
    console.log(daftarNIM);
    console.log(daftarNIM.length);

    //Convert NodeList to array
   for (i in nims) {
     node = nims[i].value;
     if (typeof node !== "undefined") {
        daftarNIM.push(node);
     }
   }
*/
   console.log($('#daftarPeserta').serialize());


    $.ajax({
        url: '/kelas/peserta/cek',
        type: 'post',
        data: $('#daftarPeserta').serialize(),
        dataType: 'json',
        success: function( response ){
           //console.log(response['testing']);

           if(response.length > 0) {
             console.log(response['result']);

               var trHTML = '';
               $.each(response['result'], function (key,value) {
                 trHTML +=
                    '<tr><td>' + value.nim +
                    '</td><td>' + value.nama +
                    '</td><td>' + value.program_studi +
                    '</td></tr>';
               });
               $('#peserta').append(trHTML);

           } else {
             console.log('Nothing in the DB');
           }

        },
        error: function( response ){
           alert("Fail desu");
        }
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
      <br>
      <form id="daftarPeserta" action="/nilai/submit" method="post">
        {{csrf_field()}}
      <input type="number" id="banyakPeserta"
         value=1 max=40 min=1 style="text-align:right;">
      <button type="button" class="btn btn-info" id="tambah">Tambah</button>
      <input type="hidden" value="0" name="totalPesertaBaru" id="totalPesertaBaru">

      <button type="button" class="btn btn-info" id="cek">Cek</button>
      <div style="float:right;">
         <input type="submit" class="btn btn-success" value="Submit">
      </div>


      <div class="x_panel">
      <div class="x_content">
          <table class="table table-hover" id="peserta">
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
