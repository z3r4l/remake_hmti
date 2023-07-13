<x-app-layouts title="Dashboard Repository" page="Repository">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="float-left">
                    <h3 class="">Data Repository</h3>
                </div>
                <div class="float-right ">
                    <a href="{{ route('dashboard.repository.create') }}"
                        class="btn btn-sm btn-primary btn-rounded btn-ft ">Buat Repository</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-repository cell-border display" style="max-width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Isi</th>
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
          
          var table = $('.table-repository').DataTable({
            processing: true,
            serverSide: true,
            createdRow: function (row, data, dataIndex) {
              $(row).addClass(`Row${data.id}`);
            },
            ajax: "{{ route('dashboard.repository.index') }}",
            columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {
                data: 'repositoryContents',
                name: 'repositoryContents', 
                orderable: true, 
                searchable: true
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
      </script>
    {{-- END TABLE Kategori --}}
</x-app-layouts>