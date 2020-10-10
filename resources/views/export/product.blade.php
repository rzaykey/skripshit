<html>
<head>
	<title>Laporan Produk</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
 
	<div class="container">
		<center>
			<h4>Laporan Produk</h4>
		</center>
		
		<a href="/city/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
		
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>					
                    <th>Produk</th>				
                    <th>Kategori</th>	
                    <th>Berat</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Created At</th>
                    <th>Status</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($product as $s)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{$s->name}}</td>
					<td>{{$s->category->name}}</td>
                    <td>{{ $s->weight }} {{ $s->type_weight }}</td>
                    <td>Rp {{ number_format($s->price) }}</td>
                    <td>{{ $s->stock }}</td>
                    <td>{{ $s->created_at->format('d-m-Y') }}</td>
                    <td>{!! $s->status_label !!}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
 
</body>
</html>