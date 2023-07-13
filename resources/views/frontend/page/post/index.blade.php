<x-client-layouts title="Postingan {{ $post->title }}" titleartikel="{{ $post->title }}" descartikel="{!!Str::limit( strip_tags($post->body) , 160)!!}">
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h2 class="mt-4 text-uppercase col-lg-10 post-title">{{ $post->title }}</h2>

        <ol class="breadcrumb category-post">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">Beranda</a>
            </li>
            <li class="breadcrumb-item active">{{ $post->category->name }}</li>
        </ol>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8 post">
                <hr>

                <!-- Date/Time -->
                <p class="date-post">Postingan Hari {{ $post->created_at->isoFormat('dddd, D MMMM Y | hh:mm:ss')}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="mt-2 img-postingan rounded img-fluid" src="{{ asset('storage/posts/'.$post->image) }}"
                    alt="">

                <!-- Post Content -->
                <article class="my-3">
                    <p class="content-post">{!! $post->body !!}</p>
                </article>

                <hr style=" border: 2px dashed  var(--blue);">
                {{-- Latest Post --}}
                <h4 class="text-decoration-underline fw-bold">Kegiatan Terbaru</h4>
                <div class="row my-3">
                    @foreach ($posts as $item)
                    <div class="col-lg-6 col-6">
                        <a href="/posts/{{ $item->slug }}" class="text-decoration-none text-dark">
                        <div class="card card-new-post mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img src="{{ asset('/storage/posts/'. $item->image) }}" class="img-new-posts rounded-start" alt="{{ $item->image }}">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title"><strong>{{ Str::limit($item->title,75) }}</strong></h5>
                                  {{-- <p class="card-text">{!!Str::limit( $item->body , 100)!!}</p> --}}
                                  <p class="card-text"><small class="text-body-secondary">{{ $item->created_at->diffForHumans() }}</small></p>
                                </div>
                              </div>
                            </div>
                        </div>
                    </a>
                    </div>
                    @endforeach

                    
                </div>
                {{-- COMMENTS --}}
                <hr style=" border: 2px dashed  var(--blue);">
                @include('partials.commentDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                <h4>Komentar</h4>
                <form method="post" action="{{ route('comments.store'   ) }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control border border-dark" name="body" rows="6"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn button-color text-light mt-3" value="Kirim" />
                    </div>
                </form>
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-lg-4 col-12">

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header text-center background-color text-light">Kategori Kegiatan</h5>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($category as $row)
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li class="mt-2">
                                        <a class="text-decoration-none text-header"
                                            href="/categories/{{ $row->slug }}">{{
                                            $row->name }}</a>
                                    </li>
                                </ul>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4 border border-0">
                    <h5 class="card-header text-center background-color text-light ">Video Dokumentasi</h5>
                        <div class="video-card">
                            <iframe allowfullscreen="" class="YOUTUBE-iframe-video video-card-top"
                                data-thumbnail-src="https://i.ytimg.com/vi/{{ $post->link }}/0.jpg" frameborder="0"
                                src="https://{{ $post->link }}?autoplay=1&mute=1">
                            </iframe>
                        </div>            
                </div>

            </div>
            <!-- /.row -->

        </div>
</x-client-layouts>