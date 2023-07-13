<x-app-layouts title="Buat Divisi" page="Buat Divisi">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Buat Divisi</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.divisi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('backend.divisi.__form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>