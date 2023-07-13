<x-app-layouts title="Buat Struktur" page="Buat Struktur">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Buat struktur</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.struktur.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('backend.struktur.__form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>