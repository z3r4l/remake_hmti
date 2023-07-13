<x-app-layouts title="Dashboard Divisi" page="Divisi">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="float-left">
                    <h3 class="">Data Divisi</h3>
                </div>
                <div class="float-right ">
                    <a href="{{ route('dashboard.divisi.create') }}"
                        class="btn btn-sm btn-primary btn-rounded btn-ft ">Tambah Divisi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-data table-divisi cell-border display" style="width: 100% !important">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Definisi</th>
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



    {{-- START TABLE Kategori --}}
    <script type="text/javascript">
        $(function () {
          
          var table = $('.table-divisi').DataTable({
              processing: true,
              serverSide: true,
              createdRow: function (row, data, dataIndex)
                {
                  $(row).addClass(`Row${data.id}`);
                },
              ajax: "{{ route('dashboard.divisi.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'definisi', name: 'definisi'},
                  {data: 'action', name: 'action', 
                    orderable: true, 
                    searchable: true},
              ]
          });
          
        });
      </script>
    {{-- END TABLE Kategori --}}
</x-app-layouts>