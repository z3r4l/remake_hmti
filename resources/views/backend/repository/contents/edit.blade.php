<x-app-layouts title="Edit Repository Content" page="Repository Content">
    <div class="card">
        <div class="card-header pb-0">
          <div class="float-left">
            <h3 class="">Edit Isi Repository</h3>
          </div>
          <div class="float-right">
            <a href="{{ route('dashboard.repository.index') }}" class="btn btn-warning">Kembali</a>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('dashboard.repository.content.update', [$repositoryContent->slug, $repository->slug]) }}" method="POST" enctype="multipart/form-data" autocomplete="off"  onkeypress="return event.keyCode != 13">
            @method('put')
            @csrf
          <div class="form-group row align-items-center">
            <input type="hidden" name="repository_id" value="{{ $repositoryContent->repository_id }}" readonly>

            <label class="col-sm-3 col-form-label text-label my-3">Nama Repository</label>
            <div class="col-sm-9 my-3">
              <div class="input-group input-danger">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                  value="{{ old('name') ?? $repositoryContent->name  }}" required>
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

            <label class="col-sm-3 col-form-label text-label my-3">Tanggal Repository</label>
            <div class="col-sm-9 my-3">
              <div class="input-group input-danger">
                <input type="text" class="date-own form-control @error('time') is-invalid @enderror" id="time"
                  name="time" value="{{  \Carbon\Carbon::createFromFormat('Y-m-d', $repositoryContent->time)->format('Y-m') ?? old('time') }}" style="width: 300; !important" required>
                @error('time')
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

            <label class="col-sm-3 col-form-label text-label my-3">Links Repository</label>
            <div class="col-sm-9 my-3">
              <div class="input-group input-danger">
                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link"
                  value="{{ $repositoryContent->link ?? old('link') }}" style="width: 200; !important">
                @error('link')
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

          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-ft btn-success btn-rounded">Simpan</button>
          </div>
          </form>
        </div>

      </div>

        {{-- ============================================================== --}}
        {{-- Date Picker --}}
        {{-- ============================================================== --}}
        <script>
            $('.date-own').datepicker({
            minViewMode: 2,
            format: 'yyyy-mm',
            startView: "months",
            minViewMode: "months",
            });
        </script>
</x-app-layouts>