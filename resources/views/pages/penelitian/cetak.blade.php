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
                <td>
                    <a href="{{ url(Storage::url($penelitian->dokumen)) }}" target="_blank" id="print-pdf-{{ $penelitian->id }}">View & Print Dokumen</a>
                </td>

                <script>
                    document.getElementById('print-pdf-{{ $penelitian->id }}').addEventListener('click', function(e) {
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
