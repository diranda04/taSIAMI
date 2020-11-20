@extends('layouts.app')

@section('content')

<div>
<div class="container">
  <div class="fade-in">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"><i class="fa fa-align-justify"></i>Manajemen Ketua Jurusan</div>
            <div class="card-body">
              <form action="{{route('auditee.post')}}" method="POST">
              @csrf

              <div class="form-group">
                <label for="exampleFormControlSelect1">Nama</label>
                <select name = "lecturerSelect" class="form-control" id="exampleFormControlSelect1">
                    @foreach ($lecturers as $lecturer)
                    <option value="{{$lecturer->id_lecturer}}">{{$lecturer->user->name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">Jurusan</label>
                <select name = "departmentSelect" class="form-control" id="exampleFormControlSelect2">
                    @foreach ($departments as $department)
                    <option value="{{$department->id_department}}">{{$department->department_name}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Awal Menjabat</label>
                  <input type="text" class="form-control-file" id="start_at" name="start_at" required>
              </div>
              <div class="form-group" >
                  <label for="exampleFormControlFile1">Akhir Menjabat</label>
                  <input type="text" class="form-control-file" id="end_at" name="end_at" required>
              </div>
                  <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                  <button type="submit" class="btn btn-primary">Save changes</button>
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
