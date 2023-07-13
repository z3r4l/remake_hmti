<x-app-layouts title="Buat Kategori" page="Buat Kategori">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Buat Kategori</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('backend.category.__form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>