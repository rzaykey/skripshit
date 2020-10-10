<html>
<head>
	<title>Laporan Kategori</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
	<div class="container">
		<center>
			<h4>Laporan Kategori</h4>
		</center>
		
		<a href="/category/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
		
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Kategori</th>
                    <th>Sub-Kategori</th>
                    <th>Created At</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($category as $s)
				<tr>
					<td>{{ $i++ }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->created_at->format('d-m-Y') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
 
</body>
</html>