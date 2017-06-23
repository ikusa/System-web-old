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
  // Probably not needed, will be removed later.
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
         html.push("<tr><td id='peserta", count, "'>"
          + "<input type='text' id='nim", count, "' name='nim", count, "'></td>"
          + "<td name='nama", count, "' id='nama", count, "'></td>"
          + "<td name='prodi", count, "' id='prodi", count, "'></td></tr>");
      }

		$('#peserta').append(html.join(''));
  }

  // Send ajax request to check nim from input in table mahasiswa
  // and return necessary info.
  $('#cek').click(function( event ) {

    $.ajax({
        url: '/kelas/peserta/cek',
        type: 'post',
        data: $('#daftarPeserta').serialize(),
        dataType: 'json',

        success: function( response ){

           var totalPeserta = document.getElementById("totalPesertaBaru").value;
           // Loop for each nim inputted.
           for (var count = 0; count < totalPeserta; count++) {
             // Get each input field id to change color based on response
             var inputField = 'nim'+count;

             // Still need error checking for input field.
             if (response.result[count].doesExist == true) {
                // Change input field background color to greenish color when found.
                document.getElementById(inputField).style.backgroundColor = "#a9ff52";
                // Set the necessary info for each column on the table.
                $('#nama'+count).text(response.result[count].nama);
                $('#prodi'+count).text(response.result[count].program_studi);
             } else {
                // Set pink color on input field when input wasn't found on the DB.
                document.getElementById(inputField).style.backgroundColor = "#f67da7";
                $('#nama'+count).text("[ Student not found ]");
                $('#prodi'+count).text("");

             }
           }

        },
        error: function( response ){
           // Do error handling later....
           alert("Error while checking data.");
        }
    });

  });


</script>
@endsection

@section('content')

<style>
// Ugly hax to keep consistent column size when the table is empty.
// Still not working, later.
th {
   min-width: 25%;
   max-width: 33%;
   }
td {
   min-width: 25%;
   max-width: 33%;
   }
</style>

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
