<x-app-layouts title="Edit Repository" page="Edit Repository">
    <div class="col-12">
        <div class="card forms-card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Repository</h4>
                <div class="basic-form">
                    <form action="{{ route('dashboard.repository.update', $repository->slug) }}" method="post">
                        @method('put')
                        @csrf
                        @include('backend.repository.__form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layouts>