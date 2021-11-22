@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
Hasil Perhitungan Segi Empat

@stop

@section('content')
    <table class="table table-striped table-bordered">
        <tr>
            <td>Panjang </td><td>{{$segiEmpat->panjang}}</td>
        </tr>
        <tr>
            <td>Lebar </td><td>{{$segiEmpat->lebar}}</td>
        </tr>
        <tr>
            <td>Luas </td><td>{{$segiEmpat->luas()}}</td>
        </tr>
    </table>

@stop

@section('css')
    
@stop

@section('js')
    
@stop
