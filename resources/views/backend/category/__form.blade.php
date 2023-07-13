<div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Nama Kategori</label>
        <div class="col-sm-9">
            <div class="input-group input-danger">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                   name="name" value="{{ old('name') ?? $category->name  }}">
                @error('name')
                <div class="input-group-append">
                    <span class="input-group-text bg-transparent" id="inputGroupPrepend10"> <i
                            class="fa fa-times text-danger" aria-hidden="true"></i> </span>
                </div>
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="float-right">
        <button type="submit" class="btn btn-sm btn-ft btn-success btn-rounded">Simpan</button>
    </div>
</div>