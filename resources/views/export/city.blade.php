<html>
<head>
	<title>Laporan Kota</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
	<div class="container">
		<center>
			<h4>Laporan Kota</h4>
		</center>
		
		<a href="/city/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
		
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>					
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Jenis</th>
                    <th>Kode Pos</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($city as $s)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$s->name}}</td>
					<td>{{$s->province->name}}</td>
                    <td>{{$s->type}}</td>
                    <td>{{ $s->postal_code }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
 
</body>
</html>