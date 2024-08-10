<!DOCTYPE html>
<html>
<head>
    <title>Data Aika</title>
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

    <h2>Data Aika</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>NBM</th>
                <th>Nama Kegiatan</th>
                <th>Lokasi Kegiatan</th>
                <th>SK Kegiatan</th>
                <th>Tanggal SK Kegiatan</th>
                <th>Jumlah SKS</th>
                <th>Status</th>
                <th>Dokumen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aikas as $aika)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $aika->user->name }}</td>
                <td>{{ $aika->nbm }}</td>
                <td>{{ $aika->nama_kegiatan }}</td>
                <td>{{ $aika->lokasi_kegiatan }}</td>
                <td>{{ $aika->sk_kegiatan }}</td>
                <td>{{ $aika->tanggal_sk_kegiatan }}</td>
                <td>{{ $aika->jumlah_sks }}</td>
                <td>{{ $aika->status }}</td>
                <td><a href="{{ Storage::url($aika->dokumen) }}" target="_blank">View Dokumen</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
