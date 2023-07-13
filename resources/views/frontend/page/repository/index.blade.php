<x-client-layouts title="Repository" titleartikel="Repository HMTI" descartikel="HMTI Memiliki beberapa kegiatan yang di simpan di repository">
    <div class="container mt-5">
        <div class="row d-flex justify-content-start">
           @foreach ($repository as $item)
           <div class="col-lg-2 col-6 mt-4 d-flex">
            <a href="{{ route('repository.content', $item->slug) }}" class="text-decoration-none">
                    <div class=" ms-5">
                        <img class="image-repository" src="/frontend/img/icon/file.png" alt=""><br>
                       <div class="ms-2 text-dark">
                         <p class="fw-bold text-capitalize">{{ $item->name }}</p>
                        {{-- <p class="text-capitalize">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->time)->format('M Y')}}</p> --}}
                       </div>
                    </div>
                </a>
            </div>
           @endforeach
        </div>
    </div>
</x-client-layouts>