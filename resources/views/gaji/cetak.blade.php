@extends('adminlte::page')
@section('title', 'Riwayat Pangkat Pegawai')
@section('content_header')
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
{{-- <li class="breadcrumb-item"><a href="/home">Home</a></li>
<li class="breadcrumb-item"><a href="/riwayat-pangkat">Pegawai</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$peg->nama}}</li> --}}
</ol>
</nav>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between;align-items: center;">
                        <span id="card_title">
                            <h3>Gaji Pegawai</h3>
                        </span>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <font size="4" face="Arial" >
            <table style="width:100%; background-color:#ffa;">
                <tr>
                    {{-- <td>NIP </td><td> : {{ $peg->id }} </td> --}}
                    <td>NIP </td><td> :  </td>
                </tr>
                <tr>
                    <td>Nama </td><td> :  </td>
                </tr>
                <tr>
                    <td>Pangkat/Golongan Terakhir </td><td> :  </td>
                </tr>
            </table>
            </font>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tbody>
                        @php $i=0 @endphp
                        @foreach ($gaji as $peg)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>Gaji</td>
                                <td></td>
                                {{-- <td>{{ ++$i }}</td>
                                <td>{{ $peg->tanggal_tmt_pangkat }}</td>
                                <td>{{ $peg->no_sk_pangkat }}</td> --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection