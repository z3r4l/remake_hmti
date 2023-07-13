<x-app-layouts title="Buat Postingan" page="Buat Postingan">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Buat Postingan</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('backend.post.__form');
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>