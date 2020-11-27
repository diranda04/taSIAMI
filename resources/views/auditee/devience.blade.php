@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <h5><div class="card-header"><i class="fa fa-align-justify"></i>Permintaan Tindakan Koreksi</div></h5>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th class="border-right">No</th>
                                        <th class="border-right">Keadaan Menyimpang</th>
                                        <th class="border-right">Akar Penyebab</th>
                                        <th class="border-right">Rencana Perbaikan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($correction_forms as $correction_form)
                                    <tr class="text-center">
                                        <td class="border-right">{{$loop->iteration}}</td>
                                        <td class="border-right">{{$correction_form->devience}}</td>
                                        <td class="border-right">{{$correction_form->causes}}</td>
                                        <td class="border-right">{{$correction_form->plan}}</td>
                                        <td class="text-center">
                                        <a href="" class="btn btn-primary" id="editButton" data-toggle="modal" data-target="#editPTK" data-id_correction_form="{{$correction_form->id_correction_form}}"
                                            data-devience="{{$correction_form->devience}}" data-causes="{{$correction_form->causes}}" data-plan="{{$correction_form->plan}}">
                                            <span class="cil-pencil btn-icon mr-2"></span>PTK-Akar Penyebab & Rencana Perbaikan
                                        </a>
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
@endsection
</div>
</div>
<!-- Modal PTK -->
<div class="modal fade" id="editPTK" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lengkapi Permintaan Tindakan Koreksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('ptk.edit',[$id_audit])}}" method="POST">
      @csrf
      @method('PATCH')
        <input type="hidden" class="form-control-file" id="edit_id" name="id_correction_form">
      <div class="form-group">
        <label for="exampleFormControlFile1">Temuan</label>
        <textarea disabled type="text" class="form-control-file" id="edit_devience" name="devience" cols="30" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Akar Penyebab</label>
        <textarea type="text" class="form-control-file" id="edit_causes" name="causes" cols="30" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Rencana Perbaikan</label>
        <textarea type="text" class="form-control-file" id="edit_plan" name="plan" cols="30" rows="3"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@section('javascript')
<script>
  $(document).ready(function(){

    $(document).on("click","#editButton", function(){
      var id_correction_form=$(this).data("id_correction_form");
      var devience=$(this).data("devience");
      var causes=$(this).data("causes");
      var plan=$(this).data("plan");
      $("#edit_id").val(id_correction_form);
      $("#edit_devience").val(devience);
      $("#edit_causes").val(causes);
      $("#edit_plan").val(plan);
      console.log(id_correction_form);
    })

  })
</script>
@endsection
