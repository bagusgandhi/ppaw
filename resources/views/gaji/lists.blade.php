@extends('adminlte::page')
@section('title', 'Kenaikan Pangkat Pegawai')
@section('content_header')
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item"><a href="/gaji">Gaji</a></li>
{{-- <li class="breadcrumb-item active" aria-current="page">{{$peg->nama}}</li> --}}
</ol>
</nav>
@stop
@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-header">
<div style="display: flex; justify-content: space-between;
align-items: center;">
<span id="card_title">
<h3>Gaji Pegawai</h3>
</span>
<div class="float-right">
<div class="input-group custom-search-form">
{{-- <a href="{{ url('riwayat-pangkat/create')."/".$peg->id
}}" class="btn btn-primary btn-sm">
<span class="glyphicon glyphicon-plus"></span>
Tambah</a> --}}
</span>
</div>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<font size="4" face="Arial" >
<table align="center" width="60%">
<tr>
{{-- <td>NIP </td><td> : {{ $peg->id }} </td> --}}
</tr>
<tr>
{{-- <td>Nama </td><td> : {{ $peg->nama }} </td> --}}
</tr>
<tr>
<td>Tahun </td>
<td> : {{ date('Y') }}</td>
</tr>
<tr>
<td>Bulan </td>
<td> : {{ date('m') }}
</td>
</tr>
</table>
</font>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead class="thead">
<tr>
<th>No</th>
<th>NIP</th>
<th>NAMA</th>
<th>GAJI POKOK</th>
<th>TUNJANGAN</th>
<th>POTONGAN</th>
<th>TOTAL</th>
<th>AKSI</th>
</tr>
</thead>
<tbody>
@php $i=0 @endphp
@foreach ($gaji as $peg)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $peg->getPegawai->nip }}</td>
<td>{{ $peg->getPegawai->nama }}</td>
<td>{{ $peg->gaji_pokok}}
</td>
<td>{{ $peg->tunjangan}}</td>
<td>{{ $peg->potongan}}</td>
<td>{{ $peg->gaji_pokok + $peg->tunjangan - $peg->potongan}}</td>
</td>
<td> 
<p>cetak</p>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection