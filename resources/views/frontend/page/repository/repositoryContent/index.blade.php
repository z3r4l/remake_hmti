<x-client-layouts title="Repository Content" titleartikel="Repository HMTI" descartikel="HMTI Memiliki beberapa kegiatan yang di simpan di repository">
    <div class="container mt-5">
        <div class="row d-flex justify-content-start">
           @foreach ($repositoryContent as $item)
           <div class="col-lg-2 col-6 mt-4 d-flex">
            <a href="{{ $item->link }}" class="text-decoration-none" target="blank">
                    <div class=" ms-5">
                        <img class="image-repository" src="/frontend/img/icon/file.png" alt=""><br>
                       <div class="ms-2 text-dark">
                         <p class="fw-bold text-capitalize" style="margin-bottom: -0.5px;">{{ $item->name }}</p>
                         <p class="text-capitalize">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->time)->format('M Y')}}</p>
                       </div>
                    </div>
                </a>
            </div>
           @endforeach
        </div>
    </div>
</x-client-layouts>