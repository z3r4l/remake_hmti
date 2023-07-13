<x-app-layouts title="Dashboard User" page="User">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="float-left">
                    <h3 class="">Data user</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-user cell-border display" style="max-width: 100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Admin</th>
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



    {{-- START TABLE user --}}
    <script type="text/javascript">
        $(function () {
          
          var table = $('.table-user').DataTable({
              processing: true,
              serverSide: false,
              createdRow: function (row, data, dataIndex)
                {
                  $(row).addClass(`Row${data.id}`);
                },
              ajax: "{{ route('dashboard.user.index') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                  {data: 'name', name: 'name'},
                  {data: 'email', name: 'email'},
                  {data: 'changeJob', name: 'changeJob'},
                  {data: 'delete', name: 'delete',
                    orderable: true, 
                    searchable: true},
              ]
          });
          
        });


        function makeAdmin(userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'User akan dijadikan admin',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, jadikan admin!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('make-admin-form-' + userId).submit();
            }
        })
    }
      </script>
    {{-- END TABLE user --}}
</x-app-layouts>