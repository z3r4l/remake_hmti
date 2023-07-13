<x-app-layouts title="Edit Struktur" page="Edit Struktur">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit struktur</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.struktur.update', $struktur->slug) }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        @include('backend.struktur.__form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>