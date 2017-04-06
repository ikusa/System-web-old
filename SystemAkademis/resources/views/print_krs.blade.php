<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">




    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>

  .container{
  max-width: none !important;
  width: 595px;
}
    </style>

  </head>
  <body>

<div style="border: thin solid black" class="container">
	<div class="row">
		<div class="col-xs-3">
    <img height="70" width="120" src="{{ url('../images/logo.png') }}" >

		</div>
		<div class="col-xs-6">
		<h4 style='text-align: center;'> Kartu Rencana Studi </h4>
		<h4 style='text-align: center;'> Semester {{$term[0]->term}} </h4>
		</div>
    <div class="col-xs-3">

		</div>
	</div>



	<div class="row">
		<div class="col-xs-12">
		<table  width="100%">
					<tr>
						<td>							NIM						</td>
						<td>							:{{ $biodata[0]->nim }}						</td>
						<td>							IPS						</td>
						<td>							:3.67						</td>
					</tr>
					<tr>
						<td>							Nama						</td>
						<td>							:{{ $biodata[0]->nama }}					</td>
						<td>							IPK						</td>
						<td>							:3.67						</td>
					</tr>
					<tr>
						<td>							Fakultas						</td>
						<td>							:{{ $biodata[0]->fakultas }}						</td>
						<td>							Total SKS Kumulatif						</td>
						<td>							:18						</td>
					</tr>
					<tr>
						<td>							Prodi						</td>
						<td>							:{{ $biodata[0]->program_studi }}						</td>
						<td>							Max SKS Semester						</td>
						<td>							:22						</td>
					</tr>
					<tr>
						<td>							Dosen PA
						</td>
						<td>							:						</td>
						<td>

						</td>
						<td>

						</td>
					</tr>
			</table>

		</div>
	</div>



	<br>
	<br>

	<div class="row">
		<div class="col-xs-12">
    		<table style='font-size:12px;' cellpading="100" class="table table-bordered table-condensed" >
				<thead>
					<tr>
						<th>							<b> Hari / Jam </b>						</th>
						<th>							<b> Ruang </b>						</th>
						<th>							<b> Kelas </b>						</th>
						<th>							<b> Mata Kuliah </b>						</th>
						<th>							<b> SKS </b>						</th>
					</tr>
				</thead>
				<tbody>


            @foreach ($course as $kuliah)
              <tr>
                <td>{{$kuliah->hari}}/{{$kuliah->jam}}</td>
                <td>{{$kuliah->ruang}}</td>
                <td>{{$kuliah->program_studi}}/{{$kuliah->angkatan}}</td>
                <td>{{$kuliah->namaMK}}</td>
                <td>{{$kuliah->sks}}</td>

              </tr>
              @endforeach

				</tbody>
			</table>
			<br>


			Tangerang, ...................
		</div>
	</div>






	<div class="row">
		<div class="col-xs-3">
		Mahasiswa,
		<br>
			<br>
			<br>
		(..........................)
		</div>
		<div class="col-xs-3">
		Dosen PA,
		<br>
			<br>
			<br>
		(..........................)
		</div>
		<div class="col-xs-3">
		Kaprodi,
		<br>
			<br>
			<br>
		(..........................)
		</div>
		<div class="col-xs-3">
		BAA,
		<br>
			<br>
			<br>
		(..........................)
		</div>
		Generated at {{ Carbon\Carbon::now()}} by {{ $biodata[0]->nama }}
	</div>


	<div class="row">
		<div class="col-xs-12">
		</div>
	</div>
</div>

</body>
</html>
