@extends('adminlte::page')
@section('title', 'Master Tabel Jabatan')
@section('content_header')
<nav aria-label="breadcrumb">
 <ol class="breadcrumb">
 <li class="breadcrumb-item"><a href="/home">Home</a></li>
 <li class="breadcrumb-item"><a href="/jabatan">Master Tabel Jabatan</a></li>
 <li class="breadcrumb-item active" aria-current="page">Ubah</li>
 </ol>
 </nav>
@stop
@section('content')
 <section class="content container-fluid">
 <div class="">
 <div class="col-md-12">
 @includeif('partials.errors')
 <div class="card card-default">
 <div class="card-header">
 <span class="card-title">
 <h3> Mengubah Data Master Tabel Jabatan </h3></span>
 </div>
 <div class="card-body">
 <form method="POST" action="{{ route('jabatan.update',
 $jabatan->id) }}"
 role="form" enctype="multipart/form-data">
 {{ method_field('PATCH') }}
 @csrf
 @include('jabatan.form')
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