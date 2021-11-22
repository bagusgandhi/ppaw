@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
Maukan Nilai Segi Empat

@stop

@section('content')
    
@if (count( $errors ) > 0)
    <div class="alert alert-danger">
        <strong>Terdapat beberapa kesalahan harus diperbaiki:</strong><br>
        {!! Html::ul($errors->all()) !!}
    </div>
@endif
    {!! Form::open(array('url' => 'segi-empat/hasil')) !!}
    <div class="form-group">
        {!! Form::label('panjang', 'Panjang') !!}
        {!! Form::text('panjang',null,
        array('class' => 'form-control')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('lebar', 'Lebar') !!}
        {!! Form::text('lebar',null,
        array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Proses',
        array('class' => 'btn btn-primary')) !!}
    {!! Form::close() !!}
@stop

@section('css')
    
@stop

@section('js')
    
@stop
