<html>
 <head>
  <title> Permintaan Tindakan Koreksi </title>
 </head>
 <body bgcolor="white">
        <img style="width:100%" src="{{ ('assets/img/test.jpg') }}">
  <br>
  <?php
function Tanggal($date) {
    $date = date('Y-m-d',strtotime($date));
    if($date == '0000-00-00')
        return 'Tanggal Kosong';

    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);

    switch ($bln)
        {case 1 : { $bln = 'Januari';}break;
        case 2 : {$bln = 'Februari';}break;
        case 3 : {$bln = 'Maret';}break;
        case 4 : {$bln = 'April';}break;
        case 5 : {$bln = 'Mei';}break;
        case 6 : {$bln = "Juni";}break;
        case 7 : {$bln = 'Juli';}break;
        case 8 : {$bln = 'Agustus';}break;
        case 9 : {$bln = 'September';}break;
        case 10 : {$bln = 'Oktober';}break;
        case 11 : {$bln = 'November';}break;
        case 12 : {$bln = 'Desember';}break;
        default: {$bln = 'UnKnown';}break;
    }

    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 0 : {$hari = 'Minggu';}break;
        case 1 : {$hari = 'Senin';}break;
        case 2 : {$hari = 'Selasa';}break;
        case 3 : {$hari = 'Rabu';}break;
        case 4 : {$hari = 'Kamis';}break;
        case 5 : {$hari = "Jum'at";}break;
        case 6 : {$hari = 'Sabtu';}break;
        default: {$hari = 'UnKnown';}break;
    }
    $tanggal = "hari ini ".$hari." tanggal ".$tgl . " bulan " . $bln . " tahun " . $thn;
    return $tanggal;
}
?>
  <p>
    Pada <?= Tanggal(date('Y-m-d')) ?> yang bertanda tangan dibawah ini ;
  </p>
  <table style="width:100%">
    <tr>
      <td style="width:5%">1.</td>
      <td style="width:10%">Nama</td>
      <td style="width:5%">:</td>
      <td style="width:80%">{{auth()->user()->name}}</td>
    </tr>
    <tr>
      <td></td>
      <td>NIP</td>
      <td>:</td>
      <td>{{auth()->user()->id}}</td>
    </tr>
    <tr>
      <td></td>
      <td>Jabatan</td>
      <td>:</td>
      <td>Ketua Jurusan {{ $auditee->department->department_name }}</td>
    </tr>
    <tr>
      <td></td>
      <td colspan="3">Selanjutnya disebut sebagai <strong>PIHAK PERTAMA</strong></td>
    </tr>
  </table>

  <table style="width:100%">
  @php $no=2; @endphp
@foreach($auditors as $auditor)
    <tr>
      <td style="width:5%"> {{$no++}}</td>
      <td style="width:10%">Nama</td>
      <td style="width:5%">:</td>
      <td style="width:80%">{{$auditor->name}}</td>
    </tr>
    <tr>
      <td></td>
      <td>NIP</td>
      <td>:</td>
      <td>{{$auditor->id}}</td>
    </tr>
    @endforeach
    <tr>
      <td></td>
      <br>
      <td>Jabatan</td>
      <td>:</td>
      <td>Auditor </td>
    </tr>
    <tr>
      <td></td>
      <td colspan="3">Selanjutnya disebut sebagai <strong>PIHAK KEDUA</strong></td>
    </tr>
  </table>

  <p align="left"><font face="Arial">
    <strong>PIHAK PERTAMA</strong>  dan <strong>PIHAK KEDUA</strong>  secara bersama sama telah menyetujui hasil Audit Mutu Internal (AMI).
    Program Studi S1 {{ $auditee->department->department_name }} Universitas Andalas tahun <?php echo date("Y");?>.
  </font></p>

  <p align="left"><font face="Arial">
    Demikianlah Berita Acara dibuat, untuk dapat dipergunakan sebagai mana mestinya.
  </font></p>

  <table style="width:100%">
    <tr align="center">
      <th style="padding: 15px" colspan="2">PIHAK KEDUA</th>
      <th>PIHAK PERTAMA</th>
    </tr>
    <tr align="center" >
      <td>Auditor I</td>
      <td>Auditor II</td>
      <td>Ketua Prodi</td>
    </tr>
    <tr align="center">
      <td style="padding: 30px"></td>
      <td style="padding: 30px"></td>
      <td style="padding: 30px"></td>
      <td style="padding: 30px"></td>
    </tr>
    <tr align="center">
    @foreach($auditors as $auditor)
      <td>{{$auditor->name}}</td>
    @endforeach
      <td>{{auth()->user()->name}}</td>
    </tr>
    <tr align="center">
    @foreach($auditors as $auditor)
      <td>NIP.{{$auditor->id}}</td>
    @endforeach
      <td>NIP.{{auth()->user()->id}}</td>
    </tr>
    <tr align="center">
      <td style="padding: 10px"></td>
      <td style="padding: 10px"></td>
      <td style="padding: 10px"></td>
      <td style="padding: 10px"></td>
    </tr>
  </table>

  <table style="width:100%">
    <tr align="center">
      <th>Diketahui Oleh</th>
    </tr>
    <tr align="center" >
      <td>Dekan {{ $auditee->department->faculty->name }} Universitas Andalas</td>
    </tr>
    <tr align="center">
      <td style="padding: 30px"></td>
    </tr>
    <tr align="center">
      <td>{{ $Deans->name }}</td>
    </tr>
    <tr align="center">
      <td>NIP.{{ $Deans->id}}</td>
    </tr>
  </table>
        </div>

    </div>
</div>
