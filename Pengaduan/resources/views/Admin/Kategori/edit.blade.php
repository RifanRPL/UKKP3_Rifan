@include('admin.layout.header')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body">
            <form action="{{ route('kategori_pengaduan.update', $kategori_pengaduan->id) }}" method="post">
            @csrf
            @method('PUT')
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="nama_kategori" value="{{ $kategori_pengaduan->nama_kategori }}" id="example-text-input">
                    </div>
                </div>
                <button class="btn btn-success" type="submit">Selesai</button>
                <a class="btn btn-primary" href="{{ route('kategori_pengaduan.index') }}">Batal</a>
            </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@include('admin.layout.footer')