@extends('adminlte::page')
@section('title', 'Master Tabel Pangkat')
@section('content_header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tabel Pangkat</li>
        </ol>
    </nav>
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <h3>Tabel Master Pangkat</h3>
                            </span>
                            <div class="float-right">
                                @include('mst-pangkat.search', ['url'=>'mst-pangkat', 'link'=>'mst-pangkat'])
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
 <tr>
 <th>No</th>
 <th>Nama Pangkat</th>
 <th>Pangkat Golongan</th>
 <th></th>
 </tr>
 </thead>
<tbody>
 @foreach ($mstPangkat as $mstPangkats)
    <tr>
        <td>{{ ++$i }}</td>
            <td>{{ $mstPangkats->nama_pangkat }}</td>
            <td>{{ $mstPangkats->pangkat_gol }}</td>
        <td>
            <form action="{{ route('mst-pangkat.destroy', $mstPangkats->id)}}" method="POST">
            <a class="btn btn-sm btn-primary " href="{{ route('mst-pangkat.show', $mstPangkats->id)}}">
            <i class="fa fa-fw fa-eye"></i> Lihat</a>
            <a class="btn btn-sm btn-success" href="{{ route('mst-pangkat.edit', $mstPangkats->id)}}">
            <i class="fa fa-fw fa-edit"></i> Ubah</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="fa fa-fw fa-trash"></i> Hapus
            </button>
            </form>
        </td>
    </tr>
 @endforeach
    </tbody>
</table>
 </div>
 </div>
 </div>
 {!! $mstPangkat->links('pagination::bootstrap-4') !!}
 </div>
 </div>
 </div>
@endsection
