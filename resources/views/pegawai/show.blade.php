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
 <span class="cardtitle"><h3>Lihat Datail Pegawai</h3></span>
 </div>
<div class="float-right">
 <a class="btn btnprimary" href="{{ route('pegawai.index') }}"> Kembali</a>
 </div>
 </div>
<table class="table table-sm">
 <tr><td style="width: 200px;">
 <strong>Nomor Induk Pegawai (NIP)</strong></td>
 <td>: {{ $pegawai->id }}</td> </tr>
 <tr><td><strong>Nama</strong></td>
 <td>: {{ $pegawai->nama }}</td></tr>
 <tr><td><strong>Alamat</strong></td>
 <td>: {{ $pegawai->alamat }}</td></tr>
 <tr><td><strong>Email </strong></td>
 <td>: {{ $pegawai->email }}</td></tr>
 <tr><td><strong>Telepon/HP </strong></td>
 <td>: {{ $pegawai->telepon }}</td></tr>
 <tr><td><strong>Agama </strong></td><td>:
 {{ $pegawai->getAgama() }}</td></tr>
 <tr><td><strong>Jenis Kelamin </strong></td>
 <td>: {{ $pegawai->jenis_kel=="L" ?
 "Laki-laki" : "Perempuan"}}</td></tr>
 <tr><td><strong>Jabatan </strong></td>
 <td>: {{ \App\Models\Jabatan::find(
 $pegawai->jabatan_id)->nama_jabatan }}</td></tr>
 <tr><td><strong>Foto</strong></td>
 <td>: <img src="{{ URL::to('/foto/'.
 $pegawai->file_foto) }}"></td></tr>
 </table>
 </div>
 </div>
 </div>
 </div>
 </section>
@endsection