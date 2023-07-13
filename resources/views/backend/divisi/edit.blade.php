<x-app-layouts title="Edit Divisi" page="Edit Divisi">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Divisi</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.divisi.update', $divisi->slug) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        @include('backend.divisi.__form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>