<x-app-layouts title="Dashboard Kategori" page="Kategori">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="float-left">
                    <h3 class="">Data Kategori</h3>
                </div>
                <div class="float-right ">
                    <a href="{{ route('dashboard.category.create') }}"
                        class="btn btn-sm btn-primary btn-rounded btn-ft ">Buat Kategori</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-kategori cell-border display" style="max-width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Slug</th>
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
          
          var table = $('.table-kategori').DataTable({
              processing: true,
              serverSide: true,
              createdRow: function (row, data, dataIndex)
                {
                  $(row).addClass(`Row${data.id}`);
                },
              ajax: "{{ route('dashboard.category.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                  {data: 'name', name: 'name'},
                  {data: 'slug', name: 'slug'},
                  {data: 'action', name: 'action', 
                    orderable: true, 
                    searchable: true},
              ]
          });
          
        });
      </script>
    {{-- END TABLE Kategori --}}
</x-app-layouts>