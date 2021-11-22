@extends('adminlte::page')
@section('title', 'Master Tabel Jabatan')
@section('content_header')
<nav aria-label="breadcrumb">
 <ol class="breadcrumb">
 <li class="breadcrumb-item"><a href="/home">Home</a></li>
 <li class="breadcrumb-item">
 <a href="/jabatan">Master tabel Jabatan</a>
 </li>
 <li class="breadcrumb-item active" aria-current="page">Lihat Ditail</li>
 </ol>
</nav>
@stop @section('content')
<section class="content container-fluid">
 <div class="row">
 <div class="col-md-12">
 <div class="card">
 <div class="card-header">
 <div class="float-left">
 <span class="card-title">
 <h3>Lihat Datail Jabatan</h3></span>
 </div>
 <div class="float-right">
 <a class="btn btn-primary"
 href="{{ route('jabatan.edit',$jabatan->id) }}"
 >Ubah</a>
 </div>
 </div>
 <div class="card-body">
 <table class="table table-borderless">
 <tr>
 <td><strong>Nama Jabatan</strong></td>
 <td>{{ $jabatan->nama_jabatan }}</td>
 </tr>
 <tr>
 <td><strong>Tunjangan</strong></td>
 <td>Rp{{number_format($jabatan->tunjangan , 0, '.', '.') }}</td>
 </tr>
 </table>
 </div>
 </div>
 </div>
 </div>
</section>
@endsection