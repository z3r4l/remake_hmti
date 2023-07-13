<div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Nama</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Nama Divisi" aria-describedby="name" name="name" value="{{ $divisi->name ?? old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Foto Divisi</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="file" class="form-control" id="image" aria-describedby="image" name="image" onchange="previewImage()" 
                {{ ($divisi->image == null) ? 'required' : ''   }}>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group row align-items-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <img 
            class="img-preview col-sm-5 d-block text-center rounded" 
            src="{{ ($divisi->image == null) ? '' : asset('storage/divisi/' . $divisi->image)   }}" 
            alt="{{ $divisi->image }}">     
        </div>
    </div>
    

    <div class="form-group row">
        <label class="col-sm-3 col-form-label text-label">Definisi</label>
        <div class="col-sm-9">
            <div class="input-group">
                <textarea class="form-control @error('definisi') is-invalid @enderror" id="definisi" name="definisi" rows="6" required>{{ (!$divisi->definisi == null) ? $divisi->definisi ?? old('definisi') : '' }}</textarea>
                @error('definisi')
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