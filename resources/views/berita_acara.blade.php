@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" >
        <button type="button" class="btn btn-square btn-secondary"><span class="cil-print btn-icon mr-2"></span>Cetak Berita Acara</button>
            <div class="card">
        <img src="{{ ('assets/img/header.jpg') }}">
        <br>
        <?php
function Tanggal($date) {
    $date = date('Y-m-d',strtotime($date));
    if($date == '0000-00-00')
        return 'Tanggal Kosong';

    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);

    switch ($bln) {
        case 1 : {
                $bln = 'Januari';
            }break;
        case 2 : {
                $bln = 'Februari';
            }break;
        case 3 : {
                $bln = 'Maret';
            }break;
        case 4 : {
                $bln = 'April';
            }break;
        case 5 : {
                $bln = 'Mei';
            }break;
        case 6 : {
                $bln = "Juni";
            }break;
        case 7 : {
                $bln = 'Juli';
            }break;
        case 8 : {
                $bln = 'Agustus';
            }break;
        case 9 : {
                $bln = 'September';
            }break;
        case 10 : {
                $bln = 'Oktober';
            }break;
        case 11 : {
                $bln = 'November';
            }break;
        case 12 : {
                $bln = 'Desember';
            }break;
        default: {
                $bln = 'UnKnown';
            }break;
    }

    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 0 : {
                $hari = 'Minggu';
            }break;
        case 1 : {
                $hari = 'Senin';
            }break;
        case 2 : {
                $hari = 'Selasa';
            }break;
        case 3 : {
                $hari = 'Rabu';
            }break;
        case 4 : {
                $hari = 'Kamis';
            }break;
        case 5 : {
                $hari = "Jum'at";
            }break;
        case 6 : {
                $hari = 'Sabtu';
            }break;
        default: {
                $hari = 'UnKnown';
            }break;
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
      <td>1.</td>
      <td>Nama</td>
      <td>:</td>
      <td>{{auth()->user()->name}}</td>
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
      <td>Ketua Jurusan </td>
    </tr>
    <tr>
      <td></td>
      <td colspan="3">Selanjutnya disebut sebagai <strong>PIHAK PERTAMA</strong></td>
    </tr>
  </table>

  <table style="width:100%">
    <tr>
      <td>2.</td>
      <td>Nama</td>
      <td>:</td>
      <td>Name</td>
    </tr>
    <tr>
      <td></td>
      <td>NIP</td>
      <td>:</td>
      <td>NIP</td>
    </tr>
    <tr>
      <td></td>
      <td>Jabatan</td>
      <td>:</td>
      <td>Jabatan</td>
    </tr>
    <tr>
      <td></td>
      <td colspan="3">Selanjutnya disebut sebagai <strong>PIHAK KEDUA</strong></td>
    </tr>
  </table>
  <br>

  <p align="left"><font face="Arial">
    <strong>PIHAK PERTAMA</strong>  dan <strong>PIHAK KEDUA</strong>  secara bersama sama telah menyetujui hasil Audit Mutu Internal (AMI).
    Program Studi S1 # Universitas Andalas tahun <?php echo date("Y");?>.
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
    </tr>
    <tr align="center">
      <td>Name</td>
      <td>Name</td>
      <td>{{auth()->user()->name}}</td>
    </tr>
    <tr align="center">
      <td>NIP</td>
      <td>NIP</td>
      <td>{{auth()->user()->id}}</td>
    </tr>
    <tr align="center">
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
      <td>Dekan ## Universitas Andalas</td>
    </tr>
    <tr align="center">
      <td style="padding: 30px"></td>
    </tr>
    <tr align="center">
      <td>Name</td>
    </tr>
    <tr align="center">
      <td>NIP</td>
    </tr>
  </table>
        </div>

    </div>
</div>
@endsection