<x-app-layouts title="Dashboard Post" page="Post">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="float-left">
                    <h4 class="card-title">Data Postingan</h4>
                </div>
                <div class="float-right ">
                    <a href="{{ route('dashboard.posts.create') }}" class="btn btn-sm btn-primary btn-rounded btn-ft ">Tambah Data Postingan</a>
                </div>
            </div>
         
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-data cell-border table-post" style="width: 100% !important">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Kategori</th>
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
          
          var table = $('.table-post').DataTable({
              processing: true,
              serverSide: true,
              createdRow: function (row, data, dataIndex)
                {
                  $(row).addClass(`Row${data.id}`);
                },
              ajax: "{{ route('dashboard.posts.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                  {data: 'title', name: 'title'},
                  {data: 'category_name', name: 'category_name'},
                  {data: 'action', name: 'action', 
                    orderable: true, 
                    searchable: true},
              ]
          });
          
        });
      </script>
    {{-- END TABLE struktur --}}
</x-app-layouts>