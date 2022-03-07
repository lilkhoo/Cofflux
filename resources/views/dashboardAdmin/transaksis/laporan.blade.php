<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        td,
        th {
            border: 1px solid black;
            padding: 0.6rem;
        }

    </style>
</head>

<body>
    <h1 style="text-align: center;">Data Transaksi</h1>

    <table>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Pembuat</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->user->name }}</td>
                    <td>{{ $transaksi->menu->pegawai->pembuat }}</td>
                    <td>{{ $transaksi->menu->namamenu }}</td>
                    <td>{{ $transaksi->jumlah }}</td>
                    <td>{{ $transaksi->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
