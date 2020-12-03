<html>

<head>
    <title> Temuan Audit </title>
</head>

<body bgcolor="white">
    <img style="width:100%" src="{{ ('assets/img/headerfinding.jpg') }}">
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
    <table style="width:100%">
        <tr>
            <td>Teraudit</td>
            <td>:</td>
            <td>{{$auditees->name}}</td>

        </tr>
        @php $no=1; @endphp
        @foreach($auditors as $auditor)
        <tr>
            <td>Auditor {{$no++}}</td>
            <td>:</td>
            <td>{{$auditor->name}}</td>
            @endforeach
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?php echo date("d M Y");?></td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td><?php date_default_timezone_set("Asia/Jakarta"); echo date("G:i");?> WIB </td>
        </tr>
        <tr>
            <td>Lingkup Audit</td>
            <td>:</td>
            <td>Audit Mutu Internal</td>
        </tr>
    </table>
<br>
    <table style="width:100%">
        <thead >
            <tr>
                <th>No</th>
                <th>Pernyataan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;?>
            @foreach ($audit_findings as $audit_finding)
            <?php $no++ ;?>
            <tr>
                <td>{{$no}}</td>
                <td>{{$audit_finding->desc}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
