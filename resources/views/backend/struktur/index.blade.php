<x-app-layouts title="Dashboard struktur Anggota" page="struktur anggota">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="float-left">
                    <h4 class="card-title">Data Anggota</h4>
                </div>
                <div class="float-right ">
                    <a href="{{ route('dashboard.struktur.create') }}" class="btn btn-sm btn-primary btn-rounded btn-ft ">Tambah Data Anggota</a>
                </div>
            </div>
         
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-data cell-border table-struktur" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Divisi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"></tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

     {{-- START TABLE Struktur --}}
     <script type="text/javascript">
        $(function () {
          
          var table = $('.table-struktur').DataTable({
              processing: true,
              serverSide: true,
              createdRow: function (row, data, dataIndex)
                {
                  $(row).addClass(`Row${data.id}`);
                },
              ajax: "{{ route('dashboard.struktur.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'jabatan', name: 'jabatan'},
                  {data: 'divisi', name: 'divisi'},
                  {data: 'action', name: 'action', 
                    orderable: true, 
                    searchable: true},
              ]
          });
          
        });
      </script>
    {{-- END TABLE struktur --}}
</x-app-layouts>