@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="jumbotron">
  <h1 class="display-4">Selamat Datang!</h1>
  <p class="lead">Sistem Informasi Audit Mutu Internal Universitas Andalas</p>
  <hr class="my-4">
  <h5>Anda adalah <strong>{{auth()->user()->role->name}}</strong></h5>
  <br>
  <a class="btn btn-youtube btn-lg" href="{{ route('penempatan.print') }}" role="button">PENGUMUMAN PENEMPATAN AUDITOR</a>

</div>

@endsection
