@extends('adminlte::page')
@section('title', 'Master Tabel Pegawai')
@section('content_header')
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item"><a href="/riwayat-pangkat">Pegawai</a></li>
<li class="breadcrumb-item"><a href="/riwayat-pangkat/proses/{{ $peg->id
}}">{{$peg->nama }}</a></li>
<li class="breadcrumb-item active" aria-current="page">Ubah</li>
</ol>
@stop
@section('content')
<section class="content container-fluid">
<div class="row">
<div class="col-md-12">
@includeif('partials.errors')
<div class="card card-default">
<div class="card-header">
<span class="card-title"><h3>Tambah Kanaikan
Pangkat</h3></span>
</div>
<div class="card-body">
<form method="POST" action="{{ route('riwayat-pangkat.store')
}}"
role="form" enctype="multipart/form-data">
@csrf
@include('riwayat-pangkat.form')
</form>
</div>
</div>
</div>
</div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
<script> console.log('Hi!'); </script>
@stop
