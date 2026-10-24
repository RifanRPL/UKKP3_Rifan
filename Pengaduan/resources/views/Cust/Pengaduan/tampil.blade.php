@include('cust.layout.header')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Pengaduan</h4>
                <a class="btn btn-primary" href="{{ route('pengaduan_customer.create') }}">Tambah Pengaduan</a>
            </div>
            <div class="card-body">  

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Deskripsi Singkat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduan as $key => $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($k->isi, 50) }}</td>
                                <td class="text-center">
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-primary btn-sm" href="{{ route('pengaduan_customer.show', $k->id) }}">
                                            Detail
                                        </a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('pengaduan_customer.edit', $k->id) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('pengaduan_customer.destroy', $k->id) }}" method="post">
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
@include('cust.layout.footer')