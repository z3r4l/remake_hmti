<div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Nama</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Nama struktur" aria-describedby="name" name="name" value="{{ $struktur->name ?? old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Jabatan</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control  @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="Jabatan" aria-describedby="jabatan" name="jabatan" value="{{ $struktur->jabatan ?? old('jabatan') }}" required>
                @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Divisi</label>
        <div class="col-lg-9">
            <select class="form-control" name="divisi_id">
                <option class="text-muted" disabled selected style="display: none">--Pilih Divisi--</option>
                @foreach ($divisi as $item)
                 <option value="{{ $item->id }}" {{  isset($struktur->divisi->id) ? ($struktur->divisi->id == $struktur->divisi->id) ? 'selected' : '' : '' , old('divisi_id') == $item->id ? ' selected' : ''}} >{{ $item->name }}</option>    
             @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <img 
            class="img-preview col-sm-5 d-block text-center rounded" 
            src="{{ ($struktur->image == null) ? '' : asset('storage/struktur/' . $struktur->image)   }}" 
            alt="{{ $struktur->image }}">     
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Foto</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="file" class="form-control" id="image" aria-describedby="image" name="image" onchange="previewImage()" 
                {{ ($struktur->image == null) ? 'required' : ''   }}>
                @error('image')
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