<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        table {
            width: 80%;
            margin: auto;
            margin-top: 50px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            background-color: #73a6ff;
            color: white;
        }
    </style>

    <title>Document</title>
</head>

<body>
    {{-- @if ($question->isNotEmpty())
    @foreach ($question as $item)
    <ul>
        <li>{{ $item }}</li>
    </ul>
    @endforeach
    @endif --}}
    <table>
        <thead>
            <tr>
                <th>Nama Instansi</th>
                <th>Nomor Tiket</th>
                <th>Masalah</th>
                <th>Tanggal Lapor</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $tiket->no_ticket }}</td>
                <td>{{ $tiket->problem }}</td>
                <td>{{ $tiket->created_at->toDateString()}}</td>
                @if($tiket->ticket_status_id == 3)
                <td>{{ $tiket->updated_at->toDateString()}}</td>
                @else
                <td>Sedang diproses</td>
                @endif
                @foreach($status as $tiket_status)
                @if ($tiket_status->id == $tiket->ticket_status_id )
                <td>{{$tiket_status->t_status}}</td>
                @endif
                @endforeach
            </tr>
        </tbody>
    </table>
</body>

</html>