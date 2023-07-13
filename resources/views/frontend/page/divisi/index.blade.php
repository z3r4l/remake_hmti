<x-client-layouts title="{{ $namaDivisi }}" titleartikel="{{ $namaDivisi }}" descartikel="{!! Str::limit(strip_tags($descDivisi), 160) !!}">
    <div class="container">
        <div class="row ">
            @foreach ($divisis as $row)
            <img src="{{ asset('storage/divisi/' . $row->image) }}" class="rounded-5 card-img-top img-divisi" alt="...">
            <h3 class="text-uppercase about-divisi">Apa Itu Divisi {{ $row->name }} <span>
                    <h1 class="d-inline text-header ">?</h1>
                </span></h3>
            <article class="divisi-content">
                <p class="mt-3">{!! $row->definisi !!}</p>
            </article>

        </div>
        @endforeach

        <h3 class="text-center text-judul"><span class="text-header d-block text-uppercase">STRUKTUR DIVISI {{
                $row->name
                }} </span>HMTI
            UNIVERSITAS IBNU SINA
        </h3>
        <div class="row">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    @foreach ($struktur as $row)
                    <div class="col-md-3 col-6 mt-4 ">
                        <div class="card border-0 text-bg-dark body-struktur ">
                            <img src="{{ asset('storage/struktur/' . $row->image) }}" class="person-img img-fluid" alt="...">
                            <div class="card-struktur">
                                <div class=" person-info background-color">
                                    <h5 class="text-white text-uppercase text-center">{{ $row->name }}</h5>
                                    <p class="card-text text-white text-uppercase text-center">{{ $row->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-client-layouts>