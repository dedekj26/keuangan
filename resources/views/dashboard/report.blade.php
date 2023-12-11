<!DOCTYPE html>
<html>
    <head>
        <title>Laporan Keuangan</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>
        <style type="text/css">
            table tr td,
            table tr th {
                font-size: 9pt;
            }
        </style>

        <center>
            <h5>
                Laporan Keuangan
            </h5>
        </center>

        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Jumlah</th>
                    <th>Jenis</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($keuangan as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>Rp {{ number_format($data->jumlah) }}</td>
                        <td>
                            @if ($data->jenis)
                                Uang Keluar
                            @else
                                Uang Masuk
                            @endif
                        </td>
                        <td>{{ $data->kategori->nama }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
