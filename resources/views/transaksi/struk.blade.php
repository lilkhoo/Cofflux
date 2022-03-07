<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            max-width: 36rem
                /* 576px */
            ;
            margin-left: auto;
            margin-right: auto;
            padding-left: 2rem
                /* 32px */
            ;
            padding-right: 2rem
                /* 32px */
            ;
            margin-top: calc(1.5rem * calc(1 - 0));
            margin-bottom: calc(1.5rem * 0);
        }

        .heading {
            font-weight: 900;
            color: rgb(31 41 55 / 1);
            font-size: 2.25rem
                /* 36px */
            ;
            line-height: 2.5rem
                /* 40px */
            ;
        }

        table {
            width: 100%;
        }

        th {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1 class="heading">Struk Pembelian</h1>
        <table>
            <tr>
                <th>Id Transaksi</th>
                <td>:</td>
                <td>{{ $transaksi->id }}</td>
            </tr>
            <tr>
                <th>Nama Menu</th>
                <td>:</td>
                <td>{{ $transaksi->menu->namamenu }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>:</td>
                <td>{{ $transaksi->jumlah }}</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>:</td>
                <td>{{ $transaksi->total }}</td>
            </tr>
            {{-- Lanjutin terus tampilin semua data --}}
        </table>
    </div>
</body>

</html>
