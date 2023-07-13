<x-app-layouts title="Buat Repository" page="Buat Repository">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Buat Repository</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.repository.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        @include('backend.repository.__form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>