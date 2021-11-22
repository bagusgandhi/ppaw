@extends('adminlte::page')
@section('title', 'Mst Pangkat')
@section('content_header')
<nav aria-label="breadcrumb">
 <ol class="breadcrumb">
 <li class="breadcrumb-item"><a href="/home">Home</a></li>
 <li class="breadcrumb-item"><a href="/mst-pangkat">
 Master tabel Pangkat</a></li>
 <li class="breadcrumb-item active" aria-current="page">Lihat</li>
</ol>
</nav>
@stop
@section('content')
 <section class="content container-fluid">
 <div class="row">
 <div class="col-md-12">
 <div class="card">
 <div class="card-header">
 <div class="float-left">
 <span class="card-title">
 <h3>Lihat Detail Pangkat</h3>
 </span>
 </div>
<div class="float-right">
 <a class="btn btn-primary"
 href="{{ route('mst-pangkat.index') }}">
 Kembali</a>
 </div>
 </div>
 <div class="card-body">

<div class="form-group">
 <strong>Nama Pangkat:</strong>
 {{ $mstPangkat->nama_pangkat }}
 </div>
<div class="form-group">
 <strong>Pangkat Gol:</strong>
 {{ $mstPangkat->pangkat_gol }}
 </div>
 </div>
 </div>
 </div>
 </div>
 </section>
@endsection