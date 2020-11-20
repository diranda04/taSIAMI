@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="jumbotron">
  <h1 class="display-4">Selamat Datang!</h1>
  <p class="lead">Sistem Informasi Audit Mutu Internal Universitas Andalas</p>
  <hr class="my-4">
  <p>Anda adalah <strong>{{auth()->user()->role->name}}</strong></p>
  <a class="btn btn-danger btn-lg" href="{{ route('penempatan.print') }}" role="button">PENGUMUMAN PENEMPATAN AUDITOR</a>
</div>

@endsection
