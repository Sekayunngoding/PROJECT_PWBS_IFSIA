@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
		    <h1>
		        Daftar Kategori
		    </h1>
		    <small>Daftar ini digunakan untuk mengkategorikan produk</small>
		    <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		        <li><a href="#">Other</a></li>
		        <li class="active">Kategori</li>
		    </ol>
		</div>
	</div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            	<div class="panel-heading">Data Kategori</div><br>
            	<div class="box-tools pull-right" style="padding-right: 10px">
            		<a href="{{ url('category/create') }}"> <button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Tambah Kategori</button></a>
            	</div><br>
            	<div class="panel-body">
            		@include('inventory/notification')
            		<table class="table table-hover">
			        	<thead>
			        		<tr>
			        			<th>No</th>
			            		<th>Kategori</th>
			            		<th>Action</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        		<?php $no=1; ?>
			        		@foreach($categories as $categories)
			        		<tr>
			        			<td>{{ $no++ }}</td>
			        			<td>{{ $categories->kategori}}</td>
			        			<td>
			        				<a href="category/{{$categories->id_category}}/edit"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
			        				<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
			        			</td>	
		        				<!-- <td>	
		        				<form action="/category/{{$categories->id_category}}" method="post">
									<input class="btn btn-danger btn-sm" type="submit" name="submit" value="Delete">
									{{csrf_field()}}
									<input type="hidden" name="_method" value="DELETE">
								</form>
			        			</td>
			        		</tr> -->
			        		@endforeach
			        	</tbody>
					</table>
            	</div>
            </div>
        </div>
	</div>
</div>

<!-- modal -->
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color: rgb(200, 200, 200)">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span>	
				</button>
				<h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
			</div>
			<form action="/category/{{$categories->id_category}}" method="post">
				{{csrf_field()}}
				<div class="modal-body" style="background-color: rgb(230, 230, 230)">
					<p class="text-center">Apakah anda yakin akan menghapus ini?</p>
					<input type="hidden" name="_method" value="DELETE">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak, kembali</button>
					<button type="submit" class="btn btn-danger">Ya, hapus ini</button>
				</div>
			</form>
		</div>
	</div>	
</div>

@endsection