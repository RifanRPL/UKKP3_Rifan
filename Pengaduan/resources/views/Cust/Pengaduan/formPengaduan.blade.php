@include('cust.layout.header')
        <h2>Pengaduan</h2>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Pengaduan</h4>
                <p class="card-title-desc">Sampaikan keluhan atau masalah yang Anda alami di bawah ini.</p>
            </div>
            <div class="card-body">
                
                <form action="{{ route('pengaduan_customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="mb-3 row">
                        <label for="kategori_id" class="col-md-2 col-form-label">Kategori Pengaduan</label>
                        <div class="col-md-10">
                            <select class="form-select @error('kategori_id') is-invalid @enderror" id="kategori_id" name="kategori_id" required>
                                <option value="" selected disabled>-- Pilih Kategori --</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">
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
                        <label for="deskripsi" class="col-md-2 col-form-label">Isi</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="isi" id="deskripsi" rows="5" placeholder="Jelaskan secara detail masalah yang Anda alami..." required></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="lampiran" class="col-md-2 col-form-label">Lampiran (Foto/Bukti)</label>
                        <div class="col-md-10">
                            <input class="form-control @error('lampiran') is-invalid @enderror" type="file" name="foto" id="foto" accept="image/*,.pdf">
                            <small class="text-muted">*Format yang diizinkan: JPG, PNG, PDF (Maksimal 2MB)</small>
                            @error('foto')
                            <div class="text-danger text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 offset-md-2">
                            <button class="btn btn-primary" type="submit">
                                Kirim Keluhan
                            </button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

@include('cust.layout.footer')