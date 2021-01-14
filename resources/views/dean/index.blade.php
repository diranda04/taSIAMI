@extends('layouts.app')

@section('content')

<div>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                    <h5><div class="card-header"><i class="fa fa-align-justify"></i>DAFTAR DEKAN</div></h5>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th class="align-middle border-right">Nama Dekan</th>
                                        <th class="align-middle border-right">Fakultas</th>
                                        <th class="align-middle border-right">Mulai Menjabat</th>
                                        <th class="align-middle border-right">Akhir Menjabat</th>
                                        <th class="align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">

                                    @foreach ($deans as $dean)
                                    <tr>
                                        <td class="border-right">{{$dean->user->name}}</td>
                                        <td class="border-right">{{$dean->faculty->name}}</td>
                                        <td class="border-right">{{$dean->start_at}}</td>
                                        <td class="border-right">{{$dean->end_at}}</td>
                                        <td>
                                        <a href="" class="btn btn-behance"  id="editButton" data-toggle="modal"
                                                data-target="#editDean"
                                                data-id_dean="{{$dean->id_dean}}"
                                                data-user_id="{{$dean->user_id}}"
                                                data-faculty_id="{{$dean->faculty_id}}"
                                                data-start_at="{{$dean->start_at}}"
                                                data-end_at="{{$dean->end_at}}"
                                                >
                                                <span class="cil-pencil btn-icon mr-2"></span>Edit
                                        </a>
                                        <br>
                                            <form action="{{ route('dean.destroy',[$dean->id_dean]) }}" method="post"
                                                onclick="return confirm('Anda yakin menghapus data ?')"
                                                class="d-inline" >
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
                <div class="col-sm-4">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>Tambah Dekan</div></h5>
                        <div class="card-body">
                            <form action="{{route('dean.post')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nama</label>
                                    <select name="userSelect" class="form-control" id="exampleFormControlSelect1" required>
                                    <option selected disabled value=""></option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Fakultas</label>
                                    <select name="facultySelect" class="form-control" id="exampleFormControlSelect2" required>
                                    <option selected disabled value=""></option>
                                        @foreach ($faculties as $faculty)
                                        <option value="{{$faculty->id_faculty}}" >{{$faculty->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Awal Menjabat</label>
                                    <input type="text" class="form-control-file" id="start_at" name="start_at" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Akhir Menjabat</label>
                                    <input type="text" class="form-control-file" id="end_at" name="end_at" required>
                                </div>
                                <button type="submit" class="btn btn-primary"><span class="cil-save btn-icon mr-2"></span>Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</div>
</div>

<!-- Modal Edit Dekan-->
<div class="modal" id="editDean" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Keterangan Dekan</h5>
                <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form action="{{route('dean.edit')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" class="form-control-file" id="edit_id_dean" name="id_dean">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <select class="form-control" id="edit_user_id" name="userSelect" >
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Fakultas</label>
                        <select class="form-control" id="edit_faculty" name="facultySelect">
                            @foreach ($faculties as $faculty)
                            <option value="{{$faculty->id_faculty}}" >{{$faculty->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Awal Menjabat</label>
                        <input type="text" class="form-control-file" id="edit_start_at" name="start_at">
                    </div>
                    <div class="form-group">
                        <label for="">Akhir Menjabat</label>
                        <input type="text" class="form-control-file" id="edit_end_at" name="end_at">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tutup_modal" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>


@section('javascript')
<script>
    $(document).ready(function () {
        $(document).on("click", "#editButton", function () {
            var id_dean = $(this).data("id_dean");
            var user_id = $(this).data("user_id");
            var faculty_id = $(this).data("faculty_id");
            var start_at = $(this).data("start_at");
            var end_at = $(this).data("end_at");
            $("#edit_id_dean").val(id_dean);
            // $("#edit_user_id").val(userSelect);
            // $("#edit_faculty").val(facultySelect);
            $("#edit_start_at").val(start_at);
            $("#edit_end_at").val(end_at);
            console.log(id_dean);

            $("#edit_user_id > option").each(function(){
                if(this.value == user_id)
                {
                    $(this).attr("selected","selected");
                }
            });

            $("#edit_faculty > option").each(function(){
                if(this.value == faculty_id)
                {
                    $(this).attr("selected","selected");
                }
            });
        })

        $(document).on("click",".close_modal", function(){
            $("#edit_user_id > option").each(function(){
                if($(this).attr("selected") == "selected")
                {
                    $(this).removeAttr("selected");
                }
            });

            $("#edit_faculty > option").each(function(){
                if($(this).attr("selected") == "selected")
                {
                    $(this).removeAttr("selected");
                }
            })
        })

        $(document).on("click",".tutup_modal",function(){
            $("#edit_user_id > option").each(function(){
                if($(this).attr("selected") == "selected")
                {
                    $(this).removeAttr("selected");
                }
            });

            $("#edit_faculty > option").each(function(){
                if($(this).attr("selected") == "selected")
                {
                    $(this).removeAttr("selected");
                }
            })
        })

    })

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
