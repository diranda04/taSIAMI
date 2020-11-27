@extends('layouts.app')

@section('content')

<div>
    <div class="container">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>VERSI INSTRUMEN AMI</div></h5>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="border-right">No</th>
                                        <th class="border-right">Versi Instrumen AMI</th>
                                        <th class="border-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($books as $book)
                                    <tr>
                                        <th class="border-right" scope="row">{{$loop->iteration}}.</th>
                                        <td class="border-right">{{$book->book_name}}</td>
                                        <td>
                                        <a href="{{ route('instrument.index',[$book->id_book]) }}"
                                                class="btn btn-success"><span class="cil-education btn-icon mr-2"></span>Daftar Isi</a>
                                            </a>
                                        <form action="{{ route('book.destroy',[$book->id_book]) }}" method="post" onclick="return confirm('Anda yakin menghapus data ?')" class="d-inline">
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
                        </div>
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
          <h5><div class="card-header"><i class="fa fa-align-justify"></i>Tambah Versi Instrumen AMI</div></h5>
            <div class="card-body">
              <form action="{{route('book.post')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlFile1">Tambahkan Versi AMI</label>
                  <input type="text" class="form-control-file" id="book_name" name="book_name" placeholder="  judul instrumen . . ">
                </div>
                <button type="submit" class="btn btn-primary"><span class="cil-save btn-icon mr-2"></span>Simpan</button>
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

<script type="text/javascript">
    $(document).ready(function(){
        var flash = "{{ Session::has('sukses') }}";
        if(flash){
            var pesan = "{{ Session::get('sukses') }}"
            alert(pesan);
        }
    })
</script>
@endsection
