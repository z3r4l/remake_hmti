<div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Title</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Title" aria-describedby="title" name="title" value="{{ $posts->title ?? old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Kategori</label>
        <div class="col-lg-9">
            <select class="form-control" name="category_id">
                <option class="text-muted" disabled selected style="display: none">--Pilih Kategori--</option>
                @foreach ($category as $item)
                 <option value="{{ $item->id }}"{{ old('category_id', $posts->category_id) == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>    
             @endforeach
             
            
            </select>
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Link Youtube</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Link Youtube" aria-describedby="link" name="link" value="{{ $posts->link ?? old('link') }}">
                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>  
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group row align-items-center">
        <label class="col-sm-3 col-form-label text-label">Post Image</label>
        <div class="col-sm-9">
            <div class="input-group">
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" aria-describedby="inputGroupPrepend2" name="image" onchange="previewImage()">
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
            class="img-preview img-fluid col-sm-5 d-block text-center rounded" 
            src="{{ ($posts->image == null) ? '' : asset('storage/posts/' . $posts->image)   }}" 
            alt="{{ $posts->image }}">     
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 col-form-label text-label">Body</label>
        <div class="col-sm-9">
            <div class="input-group">
                <textarea class="form-control tinymice_editor  @error('body') is-invalid @enderror" id="body" name="body" rows="15">{{ (!$posts->body == null) ? $posts->body : old('body') }}</textarea>
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