<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        App Limbah
    </title>
    <!--     Fonts and icons     -->
    <!-- CSS Files -->
    {{-- <link id="pagestyle" href="{{asset('/assets/css/soft-ui-dashboard.css?v=1.0.7')}}" rel="stylesheet" /> --}}

    <!-- Nepcha Analytics (nepcha.com) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #customers {
            border-collapse: collapse;
        }

        #customers td,
        #customers th {
            padding: 4px;
            font-size: 13px;
        }


        #customers th {
            padding-top: 4px;
            padding-bottom: 4px;
            text-align: left;
        }

        #coba td {
            height: -5px;
        }

        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            padding: 8px 8px;
            border: 1px solid #000000;
            text-align: center;
        }

        .table td {
            padding: 3px 3px;
            border: 1px solid #000000;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    {{-- Sidebar --}}

    <table width="60%">
        <tr>
            <td width="49%">
                <div>
                    <table width="100%">
                        <tr>
                            <td width="30%" align="right" class="title">
                                <img src="https://muhamad-iqbal.skripsiit2023.online/assets/img/logo.png"
                                    style="width: 100%; max-width: 90px; padding-right:10px;" />
                            </td>
                            <td align="left" >
                                <div style="padding-top:5px; width:80%">
                                    <b style="font-size:14px;">CV. Izhar Cahaya Mandiri</b><br>
                                    Jl. Peta Barat No.9a, RW.18, Pegadungan, Kec. Kalideres, Kota Jakarta Barat,
                                    Daerah Khusus Ibukota Jakarta 11830

                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
    <hr>
    <div class="container">
        <h3 class="text-center">LAPORAN {{ app('request')->input('type') == 'transaksi' ? 'TRANSAKSI' : 'PENJEMPUTAN' }}</h3>
        <p class="text-center">{{ app('request')->input('dari') }} - {{ app('request')->input('sampai') }}</p>
    </div>
    @if(app('request')->input('type') == 'transaksi')
    <table border="1" id="customers" class="table align-items-center mt-4">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                    Barang
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Pelanggan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Harga Deal</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Status</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Type</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Tanggal</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $data)
                <tr>
                    <td align="center">
                        {{$loop->iteration}}
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            {{-- <div>
                                                    <img src="{{ $data->post->foto }}" class="avatar avatar-sm me-3"
                                                        alt="user1">
                                                </div> --}}
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $data->post->nama_barang }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            {{ $data->post->user->name }}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            Rp. {{ number_format($data->harga_deal, 0, ',', '.') }}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            {{ $data->status }}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            {{ $data->type }}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            {{ date('d-m-Y', strtotime($data->created_at)) }}</p>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <table border="1" id="customers" class="table align-items-center mt-4">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                    Barang
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Pelanggan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Patokan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Status</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Tanggal</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($penjemputan as $data)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $data->user->name }}</h6>
                            {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                        </div>
                    </div>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">
                        {{ $data->alamat->jenis_alamat }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">
                        {{ $data->alamat->patokan }}</p>
                </td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">
                        {{ $data->status }}</p>
                </td>
                
                <td>
                    <p class="text-xs font-weight-bold mb-0">
                        {{ date('d-m-Y', strtotime($data->created_at)) }}</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif


</body>

</html>
