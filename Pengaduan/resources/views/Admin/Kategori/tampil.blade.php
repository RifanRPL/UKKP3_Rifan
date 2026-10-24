@include('admin.layout.header')
<div class="row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kategori</h4>
                <a class="btn btn-primary" href="{{ route('kategori_pengaduan.create') }}">Tambah Kategori</a>
            </div>
            <div class="card-body">  
                <div class="table-responsive">
                    <table class="table mb-0"> <!-- table mb-0-->

                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allKategori as $key => $k)
                            <tr>
                                <th scope="row">{{ $k->id }}</th>
                                <td>{{ $k->nama_kategori }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-warning btn-sm" href="{{ route('kategori_pengaduan.edit', $k->id) }}">Edit</a>
                                        <form action="{{ route('kategori_pengaduan.destroy', $k->id) }}" method="post">
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
@include('admin.layout.footer')