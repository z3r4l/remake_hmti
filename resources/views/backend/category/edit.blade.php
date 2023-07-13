<x-app-layouts title="Edit Kategori" page="Edit Kategori">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Kategori</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.category.update', $category->slug) }}" method="post">
                        @method('put')
                        @csrf
                        @include('backend.category.__form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>