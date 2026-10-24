@include('admin.layout.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Pengaduan</h4>
            </div>
            <div class="card-body">  

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Kategori</th>
                                <th>Deskripsi Singkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduan as $key => $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->user->name }}</td>
                                <td>{{ $k->kategori->nama_kategori }}</td>
                                <td>{{ Str::limit($k->isi, 50) }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-primary btn-sm" href="{{ route('pengaduan.show', $k->id) }}">
                                            Detail
                                        </a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('pengaduan.edit', $k->id) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('pengaduan.destroy', $k->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                        </form>
                                    </div>
                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@include('admin.layout.footer')