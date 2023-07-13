<x-app-layouts title="Dashboard Repository Content" page="Repository Content">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="float-left">
            <h3 class="">Tambah Isi Repository</h3>
          </div>
          <div class="float-right">
            <a href="{{ route('dashboard.repository.index') }}" class="btn btn-warning">Kembali</a>
          </div>
        </div>
        <div class="card-body">
          <form action="{{ route('dashboard.repository.content.store', $repository->slug) }}" method="POST" enctype="multipart/form-data" autocomplete="off"  onkeypress="return event.keyCode != 13">
            @csrf
          <div class="form-group row align-items-center">
            <input type="hidden" name="repository_id" value="{{ $repository->id }}" readonly>

            <label class="col-sm-3 col-form-label text-label my-3">Nama Repository</label>
            <div class="col-sm-9 my-3">
              <div class="input-group input-danger">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                  value="{{ old('name') }}" required>
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
                  name="time" value="{{ old('time') }}" style="width: 300; !important" required>
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
                  value="{{ old('link') }}" style="width: 200; !important">
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
    </div>


    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <div class="float-left">
            <h3 class="">Data Repository Content</h3>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table-data table-repository-contents cell-border display">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



  </div>




  {{-- START TABLE Kategori --}}
  <script type="text/javascript">
    $(function () { 
          var table = $('.table-repository-contents').DataTable({
            processing      : true,
            serverSide      : true,
            scrollY         : 500,
            scrollX         : true,
            scrollCollapse  : true,
            createdRow: function (row, data, dataIndex) {
              $(row).addClass(`Row${dataIndex}`);
            },
            ajax: "{{ route('dashboard.repository.content.table', $repository->slug) }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
              {data: 'name', name: 'name'},
              {
                data: 'time', 
                name: 'time',
                render: function(data, type, full, meta) {
                  var date = new Date(data);
                  var month = date.toLocaleString('default', { month: 'long' });
                  var year = date.getFullYear();
                  return month + ' ' + year;
                }
              },
              {
                data: 'action',
                name: 'action', 
                orderable: true, 
                searchable: true
              },
            ]
          });
        });



     // {{-- ============================================================== --}}
    //  {{-- Date Picker --}}
  //    {{-- ============================================================== --}}

    $('.date-own').datepicker({
      minViewMode: 2,
      format: 'yyyy-mm',
      startView: "months",
      minViewMode: "months",
    });

  </script>
  {{-- END TABLE Kategori --}}
</x-app-layouts>