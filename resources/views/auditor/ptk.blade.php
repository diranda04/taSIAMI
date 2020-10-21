@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i>Permintaan Tindakan Koreksi</div>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Keadaan Menyimpang</th>
                                        <th class="text-center">Akar Penyebab</th>
                                        <th class="text-center">Rencana Perbaikan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $no = 0;?>
                                @foreach ($correction_forms as $correction_form)
                                <?php $no++ ;?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$correction_form->devience}}</td>
                                        <td>{{$correction_form->causes}}</td>
                                        <td>{{$correction_form->plan}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</div>
</div>

@section('javascript')

@endsection
