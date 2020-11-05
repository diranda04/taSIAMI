<html>
 <head>
  <title> Permintaan Tindakan Koreksi </title>
 </head>
 <body bgcolor="white">
        <img style="width:100%" src="{{ ('assets/img/headerptk.jpg') }}">
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
    $tanggal = " ".$tgl . " " . $bln . " " . $thn;
    return $tanggal;
}
?>

    <table style="width:100%" style="border-bottom: 1px solid #ddd">

        <tr>
        <td>Audit</td>
        <td>:</td>
        <td>Dokumen tentang proses pembelajaran, penelitian, dan pengabdian masyarakat</td>
        </tr>
        <tr>
        <td>PTK</td>
        <td>:</td>
        <td>Program Studi UNAND <?php echo date("Y");?></td>
        </tr>
        <tr>
        <td>Kepada</td>
        <td>:</td>
        <td>Ketua Program Studi/ Ketua Jurusan</td>
        </tr>
        <tr>
        <td>Dari</td>
        <td>:</td>
        <td>Tim Auditor LP3M Unand</td>
        </tr>
        <tr>

    </table>

    <hr>
    <p align="justify">Keadaan berikut ini diusulkan untuk dilakukan tindakan koreksi. Tunjukkan penyebab dan tindakan koreksi yang diperlukan termasuk tanggal tindakan koreksi dijadwalkan selesai. Tanda tangani dan beri tanggal ketika saudara memberi tanggapan ini kemudian serahkan kembali borang ini kepada pengirim dalam waktu satu Hari kerja.</p>
    <hr>
    <p><strong>A. Keadaan Menyimpang</strong></p>
    <table style="width:100%">
    <tbody>
    <?php $no = 0;?>
    @foreach ($correction_forms as $correction_form)
    <?php $no++ ;?>
        <tr>
            <td style="width:5%"></td>
            <td style="width:5%">{{$no}}.</td>
            <td style="width:90%">{{$correction_form->devience}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <hr>
    <p align="center"><strong>Bagian Ini Diisi Oleh Teraudit</strong></p>
    <hr>
    <p><strong>B. Akar Penyebab</strong></p>
    <table style="width:100%">
    <tbody>
    <?php $no = 0;?>
    @foreach ($correction_forms as $correction_form)
    <?php $no++ ;?>
        <tr>
            <td style="width:5%"></td>
            <td style="width:5%">{{$no}}.</td>
            <td style="width:90%">{{$correction_form->causes}}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
    <hr/>
    <p><strong>C. Rencana Perbaikan</strong></p>
    <table style="width:100%">
    <tbody>
    <?php $no = 0;?>
    @foreach ($correction_forms as $correction_form)
    <?php $no++ ;?>
        <tr>
            <td style="width:5%"></td>
            <td style="width:5%">{{$no}}.</td>
            <td style="width:90%">{{$correction_form->plan}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <p><strong>Tindakan koreksi selesai tanggal	:</strong><?= Tanggal(date('d M Y')) ?></p>

  </body>
</html>