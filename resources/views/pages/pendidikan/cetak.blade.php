<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendidikan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Pendidikan</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Nama Kegiatan</th>
                <th>Lokasi Kegiatan</th>
                <th>SK Kegiatan</th>
                <th>Tanggal SK Kegiatan</th>
                <th>Jumlah SKS</th>
                <th>Pertemuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendidikans as $pendidikan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pendidikan->user->name }}</td>
                <td>{{ $pendidikan->nama_kegiatan }}</td>
                <td>{{ $pendidikan->lokasi_kegiatan }}</td>
                <td>{{ $pendidikan->sk_kegiatan }}</td>
                <td>{{ $pendidikan->tanggal_sk_kegiatan }}</td>
                <td>{{ $pendidikan->jumlah_sks }}</td>
                <td>{{ $pendidikan->pertemuan }}</td>
                <td>{{ $pendidikan->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
