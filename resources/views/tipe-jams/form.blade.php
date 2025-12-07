<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tipe Jam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">{{ isset($tipeJam) ? 'Edit Tipe Jam' : 'Tambah Tipe Jam' }}</h2>
        <form method="POST" action="{{ isset($tipeJam) ? route('tipe-jams.update', $tipeJam) : route('tipe-jams.store') }}">
            @csrf
            @if(isset($tipeJam))
            @method('PUT')
            @endif

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tipe Jam</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $tipeJam->nama ?? '') }}">
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="note" class="form-label">Deskripsi Tipe Jam</label>
                <input type="text" name="note" id="note"
                    class="form-control @error('note') is-invalid @enderror"
                    value="{{ old('note', $tipeJam->note ?? '') }}">
                @error('note')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('tipe-jams.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>
