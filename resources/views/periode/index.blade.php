@extends('layouts.app')

@section('content')


<div class="container">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>PERIODE AMI</div>
                    </h5>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th class="border-right">No</th>
                                    <th class="border-right">Instrumen yang Dipakai</th>
                                    <th class="border-right">Mulai Audit</th>
                                    <th class="border-right">Akhir Audit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($periodes as $periode)
                                <tr>
                                    <th class="border-right" scope="row">{{$loop->iteration}}.</th>
                                    <td class="border-right">{{$periode->book->book_name}}</td>
                                    <td class="border-right">{{$periode->audit_start_at}}</td>
                                    <td class="border-right">{{$periode->audit_end_at}}</td>
                                    <td>
                                        <form action="{{ route('periode.destroy',[$periode->id_periode]) }}"
                                            method="post" onclick="return confirm('Anda yakin menghapus data ?')"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-youtube">
                                                <span class="cil-trash btn-icon mr-2"></span>Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $periodes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5>
                        <div class="card-header"><i class="fa fa-align-justify"></i>Tambah Periode AMI</div>
                    </h5>
                    <div class="card-body">
                        <form action="{{route('periode.post')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Instrumen yang digunakan</label>
                                <select name="bookSelect" class="form-control" id="exampleFormControlSelect1">
                                <option selected disabled value=""></option>
                                    @foreach ($books as $book)
                                    <option value="{{$book->id_book}}">{{$book->book_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id='datepicker'>
                                <label for="exampleFormControlFile1">Mulai Audit</label>
                                <input type="text" class="datepicker-here form-control" data-language='en'
                                    id="audit_start_at" name="audit_start_at">
                            </div>
                            <div class="form-group" id='datepicker'>
                                <label for="exampleFormControlFile1">Akhir Audit</label>
                                <input type="text" class="datepicker-here form-control" id="audit_end_at"
                                    name="audit_end_at">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary"><span
                                        class="cil-save btn-icon mr-2"></span>Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
</div>
</div>
</div>

@section('javascript')
<script>
    $('.datepicker').datepicker({
        language: 'en',
        format: 'dd mmmm yyyy',
        autoclose: true,
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        var flash = "{{ Session::has('sukses') }}";
        if (flash) {
            var pesan = "{{ Session::get('sukses') }}"
            alert(pesan);
        }
    })

</script>
@endsection
