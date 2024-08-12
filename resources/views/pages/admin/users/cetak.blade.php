<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen</title>
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
        .badge {
            padding: 5px;
            color: #fff;
            border-radius: 5px;
        }
        .badge-danger {
            background-color: #dc3545;
        }
        .badge-success {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <h2>Data Admin</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Fakultas</th>
                <th>Prodi</th>
                <th>Status Dosen</th>
                <th>Jabatan Fungsional</th>
                <th>Jabatan</th>
                <th>Status Serdos</th>
                <th>No HP</th>
                <th>Dokumen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $admin->nip }}</td>
                <td>{{ $admin->nidn }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->Level->level }}</td>
                <td>
                    @if($admin->status_keaktifan == 'Non Active')
                        <span class="badge badge-danger">{{ $admin->status_keaktifan }}</span>
                    @else
                        <span class="badge badge-success">{{ $admin->status_keaktifan }}</span>
                    @endif
                </td>
                <td>{{ $admin->fakultas }}</td>
                <td>{{ $admin->prodi }}</td>
                <td>{{ $admin->status_dosen }}</td>
                <td>{{ $admin->jabatan_fungsional }}</td>
                <td>{{ $admin->jabatan }}</td>
                <td>{{ $admin->status_serdos }}</td>
                <td>{{ $admin->no_hp }}</td>
                <td>
                    <a href="{{ url(Storage::url($admin->dokumen)) }}" target="_blank" id="print-pdf-{{ $admin->id }}">View & Print Dokumen</a>
                </td>

                <script>
                    document.getElementById('print-pdf-{{ $admin->id }}').addEventListener('click', function(e) {
                        e.preventDefault();
                        var pdfUrl = this.href;
                        var win = window.open(pdfUrl, '_blank');
                        win.focus();
                        win.onload = function() {
                            win.print();
                        };
                    });
                </script>


            </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
