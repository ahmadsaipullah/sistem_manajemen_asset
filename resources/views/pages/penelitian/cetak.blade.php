<!DOCTYPE html>
<html>
<head>
    <title>Data Penelitian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <h2>Data Penelitian</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Nama Publikasi</th>
                <th>SK Kegiatan</th>
                <th>Tanggal SK Kegiatan</th>
                <th>Jumlah SKS</th>
                <th>Status</th>
                <th>Dokumen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penelitians as $penelitian)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $penelitian->user->name }}</td>
                <td>{{ $penelitian->nama_publikasi }}</td>
                <td>{{ $penelitian->sk_kegiatan }}</td>
                <td>{{ $penelitian->tanggal_sk_kegiatan }}</td>
                <td>{{ $penelitian->jumlah_sks }}</td>
                <td>{{ $penelitian->status }}</td>
                <td><a href="{{ Storage::url($penelitian->dokumen) }}" target="_blank">View Dokumen</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
