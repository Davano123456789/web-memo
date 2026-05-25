<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Surat Pengantar Muat</title>
    <style>
        @page {
            size: A4;
            margin: 25mm 20mm 20mm 20mm;
        }
        body {
            font-family: "Times-Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #000000;
        }
        .text-center {
            text-align: center;
        }
        .font-bold {
            font-weight: bold;
        }
        .uppercase {
            text-transform: uppercase;
        }
        .underline {
            text-decoration: underline;
        }
        .header-title {
            font-size: 14pt;
            letter-spacing: 1px;
            margin-bottom: 40px;
        }
        .info-table {
            width: 100%;
            margin-bottom: 25px;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 2px 0;
            vertical-align: top;
        }
        .info-table td.label {
            width: 80px;
        }
        .info-table td.colon {
            width: 15px;
        }
        .content-body {
            text-align: justify;
            margin-bottom: 50px;
            text-indent: 0;
        }
        .signature-container {
            float: left;
            width: 250px;
            text-align: left;
            margin-top: 20px;
        }
        .signature-date {
            margin-bottom: 10px;
        }
        .stamp-box {
            height: 105px;
            margin-bottom: 10px;
            position: relative;
        }
        .stamp-img {
            max-height: 100px;
            max-width: 220px;
            display: block;
        }
        .signee-name {
            font-family: "Times-Roman", Times, serif;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div class="text-center uppercase font-bold header-title">
        SURAT PENGANTAR MUAT
    </div>

    <div style="margin-bottom: 10px;">
        Mohon truk kami :
    </div>

    <table class="info-table">
        <tr>
            <td class="label">No Pol</td>
            <td class="colon">:</td>
            <td>{{ $no_pol }}</td>
        </tr>
        <tr>
            <td class="label">Sopir</td>
            <td class="colon">:</td>
            <td>{{ $sopir }}</td>
        </tr>
    </table>

    <div class="content-body">
        Untuk di muat {{ $muatan }} dari {{ $asal }} tujuan {{ $tujuan }} pada {{ $tanggal_muat }}. Terimakasih
    </div>

    <div class="signature-container">
        <div class="signature-date">
            {{ $kota_tanda_tangan }}, {{ $tanggal_tanda_tangan }}
        </div>
        <div class="stamp-box">
            @if(!empty($stamp_base64))
                <img src="{{ $stamp_base64 }}" class="stamp-img" alt="Stempel/Tanda Tangan">
            @elseif(file_exists(public_path('stempel.png')))
                <img src="{{ public_path('stempel.png') }}" class="stamp-img" alt="Stempel/Tanda Tangan">
            @endif
        </div>
        <div class="signee-name">
            {{ $nama_penandatangan }}
        </div>
    </div>

</body>
</html>
