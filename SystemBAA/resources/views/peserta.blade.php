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

         disableSubmit();
   });

   // Event listener for keeping value and clearing previous value
   // in input tambah when typing.
   banyakPeserta.addEventListener('focus', function () {
      banyakPeserta.setAttribute('data-value', this.value);
      this.value = '';
   });
   banyakPeserta.addEventListener('blur', function () {
      if (this.value === '')
         this.value = this.getAttribute('data-value');
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

   // Already using ajax header, probably not needed.
   function getMetaContentByName(name,content){
      var content = (content==null)?'content':content;
      return document.querySelector("meta[name='"+name+"']").getAttribute(content);
   }

   function disableSubmit() {
      document.getElementById("submitPeserta").disabled = true;
   }

   function enableSubmit() {
      document.getElementById("submitPeserta").disabled = false;
   }

   function changeBgColor(elementId, color) {
      document.getElementById(elementId).style.backgroundColor = color;
   }

   function inputChanged(elementId) {
      disableSubmit();
      changeBgColor(elementId, YELLOWISH);
   }

   // Need realtime validation later
   function banyakPesertaChanged() {
      changeBgColor("banyakPeserta", YELLOWISH);
      hideTooltip("tooltipTambah");
   }

   function showTooltip(tooltipId) {
      var tooltip = document.getElementById(tooltipId);
      tooltip.style.visibility = "visible";
      tooltip.style.opacity = "1";
   }

   function hideTooltip(tooltipId) {
      var tooltip = document.getElementById(tooltipId);
      tooltip.style.visibility = "hidden";
      tooltip.style.opacity = "0";
   }

   // Remove element based on given id...
   // Or not, just removing one row of new inputs.
   function hapus(aku) {
      console.log(aku);
      $("#"+aku).remove();
      // Need separate value for storing amount of inputed student
      //document.getElementById("inputTambah").value -= 1;
   }

   // Need to check for each class later.
   var MAX_PESERTA = 200;

   // Color
   var GREENISH = "#a9ff52",
       PINKISH = "#f5baf1",
       YELLOWISH = "#f6ff8b",
       REDDISH = "#eb4760";

   // Add new rows in peserta table based on passed number.
   function addRow(banyak) {
      var html = [];
      var oldTotalPesertaBaru = document.getElementById("inputTambah").value;
      totalPesertaBaru = Number(oldTotalPesertaBaru) + Number(banyak);
      // Need different variable for storing peserta
      // totalPesertaBaru should be used for naming the input field only
      if (totalPesertaBaru >= MAX_PESERTA) {
         alert("Class lebih dari batas maximal")
         changeBgColor("banyakPeserta", PINKISH);

      } else if (banyak > 0 && banyak <= 100) {
         changeBgColor("banyakPeserta", GREENISH);
         disableSubmit();
         document.getElementById("inputTambah").value = totalPesertaBaru;

         var count = oldTotalPesertaBaru;
         for (; count < totalPesertaBaru; count++) {
            html.push("<tr id='", count, "'><td id='peserta", count, "'>"
               + "<input type='hidden' id='id", count, "' name='id", count, "'>"
               + "<input onchange=inputChanged('nim", count,"') class='form-control checked'"
               + "type='text' id='nim", count, "' name='nim", count, "'></td>"
               + "<td name='nama", count, "' id='nama", count, "'></td>"
               + "<td name='prodi", count, "' id='prodi", count, "'></td>"
               + "<td class='action-column'><button type='button' "
               + "class='btn btn-info btn-removal' onclick=hapus('", count, "')"
               + " id='kurang'>🗙</button></td></tr>");
         }
   		$('#peserta').append(html.join(''));

      } else {
         showTooltip("tooltipTambah")
         changeBgColor("banyakPeserta", PINKISH);
      }
   }

   // Store the csrf token meta from app.blade
   // And then putting it on the master.blade
   // Need to check later
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });
   // Send ajax request to check nim from input in table mahasiswa
   // and return necessary info.
   $('#cek').click(function( event ) {
      // Still getting error 500 if using csrf on data as string
      var stolenToken = '{!! csrf_token() !!}';

      $.ajax({
      url: '/kelas/peserta/cek',
      type: 'post',
      data: $('input.checked').serialize(),
      dataType: 'json',

      success: function( response ){

         //console.log(response);

         enableSubmit();

         $.each(response.result, function(k, v) {
            //console.log("K = "+k);
            //console.log(v);

            mahasiswa = response.result[k];
            nimCell = 'nim'+k;
            nameSelector = '#nama'+k;
            prodiSelector = '#prodi'+k;
            idSelector = '#id'+k;

            if (mahasiswa.doesExist == true) {
               var nama = mahasiswa.nama,
                  prodi = mahasiswa.program_studi,
                  id = mahasiswa.id;

               // Change input field background color to greenish color when found.
               changeBgColor(nimCell, GREENISH);
               // Set the necessary info for each column on the table.
               $(nameSelector).text(nama);
               $(prodiSelector).text(prodi);
               $(idSelector).text(id);
            } else {
               // Set pinkish color on input field when input wasn't found on the DB.
               changeBgColor(nimCell, PINKISH);
               $(nameSelector).text("[ Student not found ]");
               $(prodiSelector).text("");
               disableSubmit();
            }
         });

         /* Old version
         var totalPeserta = document.getElementById("inputTambah").value;
         // Loop for each nim inputted.
         //**************
         //* Important
         //* Must be changed to $.each loop
         //* Current loop will broke if using remove, probably.
         //**************
         for (var count = 0; count < totalPeserta; count++) {
            // Get each input field id to change color based on response
            var inputField = 'nim'+count;

            // Still need error checking for input field.
            if (response.result[count].doesExist == true) {
               // Change input field background color to greenish color when found.
               changeBgColor(inputField, GREENISH);
               // Set the necessary info for each column on the table.
               $('#nama'+count).text(response.result[count].nama);
               $('#prodi'+count).text(response.result[count].program_studi);

            } else {
               // Set pinkish color on input field when input wasn't found on the DB.
               changeBgColor(inputField, PINKISH);
               $('#nama'+count).text("[ Student not found ]");
               $('#prodi'+count).text("");

               disableSubmit();
            }
         }*/
      },
         error: function( response ){
            // Do error handling later....
            console.log("Error while checking data.");

         }
      });

   });


</script>
@endsection

@section('content')

<style>
   /* Temp? fix to keep consistent column size when the table is empty. */
   th {
      padding-left: 8px !important;
      width: 25%;
      min-width: 25%;
      max-width: 30%;
      }
   td {
      vertical-align: middle !important;
      min-width: 25%;
      max-width: 30%;
      }

   .action-column {
      padding-left: 0px !important;
   }

   .btn-removal {
      background-color: #eb4760 !important;
      border-color: #fff !important;
      border-radius: 6px !important;
   }

   .form-control {
      width: 100%;
      padding: 10px;
      margin: 0px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
   }

   #banyakPeserta {
      text-align:right;
      display: inline;
      width: 15em;
      margin-right: 6px;
   }

   /* Configuring the padding inside input number.
      Webkit for any webkit based browser.
   */
   input::-webkit-outer-spin-button,
   input::-webkit-inner-spin-button { margin-left: 10px;}

   /* IDK any other method to modify that dmn spin button on firefox. */
   input[type=number] {
      -moz-appearance: textfield;
   }

   button {
      margin-left: 5px;
      display: inline;
   }

   /* Create tooltip if input outside of range. */
   .tooltip {
         position: relative;
         bottom: 4px;
         width: 210px;
         height: 32px;
         line-height: 20px;
         padding: 6px;
         font-size: 14px;
         text-align: center;
         color: rgb(255, 255, 255);
         background: rgb(0, 0, 0);
         border: 0px solid rgb(255, 255, 255);
         border-radius: 8px;
         text-shadow: rgba(0, 0, 0, 0.1) 1px 1px 1px;
         box-shadow: rgba(0, 0, 0, 0.1) 1px 1px 2px 0px;
         opacity: 0;
         visibility: hidden;
         transition: opacity 1s;
   }

   /* Little triangle below tooltip. */
   .tooltip:after {
         content: "";
         position: absolute;
         width: 0;
         height: 0;
         border-width: 10px;
         border-style: solid;
         border-color: #000 transparent transparent transparent;
         top: 32px;
         left: 95px;
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
      <form id="daftarPeserta" action="/kelas/peserta/submit" method="post">
         <div class="checked">
            {{csrf_field()}}
         </div>
      <span class="tooltip" id="tooltipTambah">Input between 1 - 100.</span>
      <input type="number" onchange="banyakPesertaChanged()"
         id="banyakPeserta" placeholder="Banyak peserta baru"
         value="1" max="99" min="1"
         class="form-control"/>

      <button type="button" class="btn btn-info" id="tambah">Tambah</button>
      <input type="hidden" value="0" name="inputTambah" id="inputTambah" class="checked">

      <button type="button" class="btn btn-info" id="cek">Cek</button>
      <div style="float:right;">
         <input type="hidden" id="idKelas" name='idKelas' value='{{$idKelas}}' class="form-control checked" >
         <input type="submit" id="submitPeserta" class="btn btn-success" value="Submit">
      </div>


      <div class="x_panel">
      <div class="x_content">
         <table class="table table-hover" id="peserta">
            <tbody>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Aksi</th>
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
