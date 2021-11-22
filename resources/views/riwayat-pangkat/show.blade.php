@extends('adminlte::page')
@section('title', 'Master Tabel Pegawai')
@section('content_header')
 <nav aria-label="breadcrumb">
 <ol class="breadcrumb">
 <li class="breadcrumb-item"><a href="/home">Home</a></li>
 <li class="breadcrumb-item"><a href="/pegawai">Master tabel Pegawai</a></li>
 <li class="breadcrumb-item active" aria-current="page">Lihat Ditail</li>
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
 <span class="cardtitle"><h3>Lihat Datail Riwayat Pangkat</h3></span>
 </div>
<div class="float-right">
 <a class="btn btnprimary" href="{{ route('pegawai.index') }}"> Kembali</a>
 </div>
 </div>
<table class="table table-sm">
 <tr><td style="width: 200px;">
 <strong>Riwayat Pangkat)</strong></td>
 <tr><td><strong>No SK Jabatan</strong></td>
 <td>: {{ $rw->no_sk_jabatan }}</td></tr>
 <tr><td><strong>Gaji Pokok</strong></td>
 <td>: {{ $rw->gaji_pokok }}</td></tr>
 <tr><td><strong>Golongan</strong></td>
 <td>: {{ $peg->pGolTerahir() }}</td></tr>
 </table>
 </div>
 </div>
 </div>
 </div>
 </section>
@endsection