<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengabdian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Pengabdian</h2>
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
                <th>Status</th>
                <th>Dokumen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengabdians as $pengabdian)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pengabdian->user->name }}</td>
                    <td>{{ $pengabdian->nama_kegiatan }}</td>
                    <td>{{ $pengabdian->lokasi_kegiatan }}</td>
                    <td>{{ $pengabdian->sk_kegiatan }}</td>
                    <td>{{ $pengabdian->tanggal_sk_kegiatan }}</td>
                    <td>{{ $pengabdian->jumlah_sks }}</td>
                    <td>{{ $pengabdian->status }}</td>
                    <td>
                        <a href="{{ url(Storage::url($pengabdian->dokumen)) }}" target="_blank" id="print-pdf-{{ $pengabdian->id }}">View & Print Dokumen</a>
                    </td>

                    <script>
                        document.getElementById('print-pdf-{{ $pengabdian->id }}').addEventListener('click', function(e) {
                            e.preventDefault();
                            var pdfUrl = this.href;
                            var win = window.open(pdfUrl, '_blank');
                            win.focus();
                            win.print();
                        });
                    </script>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
