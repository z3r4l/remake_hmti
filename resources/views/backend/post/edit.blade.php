<x-app-layouts title="Edit Postingan" page="Edit Postingan">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Postingan</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.posts.update', $posts->slug) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        @include('backend.post.__form');
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>