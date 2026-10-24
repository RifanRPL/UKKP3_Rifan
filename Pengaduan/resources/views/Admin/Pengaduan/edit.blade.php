@include('admin.layout.header')
        <h2>Pengaduan</h2>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Form Pengaduan</h4>
                <p class="card-title-desc">Silakan perbarui data keluhan atau masalah di bawah ini.</p>
            </div>
            <div class="card-body">
                
                <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        <label for="kategori_id" class="col-md-2 col-form-label">Kategori Pengaduan</label>
                        <div class="col-md-10">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id" required>
                                <option value="" disabled>-- Pilih Kategori --</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" {{ old('kategori_id', $pengaduan->kategori_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-md-2 col-form-label">Deskripsi</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="isi" id="deskripsi" rows="5" placeholder="Jelaskan secara detail masalah yang Anda alami..." required>{{ old('isi', $pengaduan->isi) }}</textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="lampiran" class="col-md-2 col-form-label">Lampiran (Foto/Bukti)</label>
                        <div class="col-md-10">
                            @if ($pengaduan->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Bukti" class="img-thumbnail" width="120">
                                    <p class="text-muted small mb-1">Foto saat ini</p>
                                </div>
                            @endif

                            <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto" id="foto" accept="image/*,.pdf">
                            <small class="text-muted">*Biarkan kosong jika tidak ingin mengubah foto. Format: JPG, PNG, PDF (Maksimal 2MB)</small>
                            @error('foto')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 offset-md-2">
                            <button class="btn btn-primary" type="submit">
                                Selesai
                            </button>
                            <a href="{{ route('pengaduan_customer.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>

@include('admin.layout.footer')