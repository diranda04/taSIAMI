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
                                    <td class="border-right">{{$periode->instrument->instrument_name}}</td>
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
                                <select name="instrumentSelect" class="form-control" id="exampleFormControlSelect1" required>
                                <option selected disabled value=""></option>
                                    @foreach ($instruments as $instrument)
                                    <option value="{{$instrument->id_instrument}}">{{$instrument->instrument_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label for="from">Awal Audit </label>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-calendar"></use>
                                        </svg>
                                    </span>
                                </div>
                                <input class="form-control" type="text" id="from" name="audit_start_at" required>
                            </div>

                            <label for="to">Akhir Audit </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <svg class="c-icon">
                                            <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-calendar"></use>
                                        </svg>
                                    </span>
                                </div>
                                <input class="form-control" type="text" id="to" name="audit_end_at" required>
                            </div>

                            <br>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );
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
