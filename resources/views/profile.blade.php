@extends('layouts.app')

@section('content')

<div class="container">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message')}}
                </div>
                @endif
                <div class="card">
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>USER PROFILE</div>
                    </h5>
                    <div class="card-body">
                        <table style="width:100%" style="border-bottom: 1px solid #ddd">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{auth()->user()->name}}</td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td>{{auth()->user()->id}}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>{{auth()->user()->username}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{auth()->user()->email}}</td>
                            </tr>
                            <br>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{auth()->user()->role->name}}</td>
                            </tr>
                            <tr>
                        </table>
                        <br>
                        <a href="{{route('view.changePassword')}}" class="btn btn-behance" >
                          <span class="cil-pencil btn-icon mr-2"></span>Change Password
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection
