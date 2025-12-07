<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Tipe Jam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">Tipe Jam</h2>
        <a href="{{ route('tipe-jam.create') }}" class="btn btn-primary mb-3">+ Tambah Tipe Jam</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>User</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipeJams as $tipeJam)
                <tr>
                    <td>{{ $tipeJam->nama }}</td>
                    <td>{{ $tipeJam->note }}</td>
                    <td>
                        {{ $tipeJam->user->name }}
                    </td>
                    <td>
                        <a href="{{ route('tipe-jam.edit', $tipeJam) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tipe-jam.destroy', $tipeJam) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
