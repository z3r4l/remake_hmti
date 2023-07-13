<x-app-layouts title="Show Postingan" page="Show Postingan">
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
                <img class="mt-2 rounded " src="{{ asset('storage/posts/'.$post->image) }}" alt="" width="700" height="300" style="object-fit: cover; object-position: center;">
                <!-- Post Content -->
                <article class="my-3">
                    <p class="content-post">{!! $post->body !!}</p>
                </article>
                
                <hr />
                @include('partials.commentDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
   
                <h4>Add comment</h4>
                <form method="post" action="{{ route('comments.store'   ) }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body"></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment" />
                    </div>
                </form>
            </div>
            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header text-center background-color text-light">Kategori Kegiatan</h5>
                    <div class="card-body">
                        <div class="row">
                            {{-- @foreach ($category as $row)
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li class="mt-2">
                                        <a class="text-decoration-none text-header" href="/categories/{{ $row->slug }}">{{
                                            $row->name }}</a>
                                    </li>
                                </ul>
                            </div>
                            @endforeach --}}
    
                        </div>
                    </div>
                </div>
                <div class="video-card">
                    <iframe allowfullscreen="" class="YOUTUBE-iframe-video video-card-top" data-thumbnail-src="https://i.ytimg.com/vi/{{ $post->link }}/0.jpg" frameborder="0" src="https://{{ $post->link }}">
                    </iframe>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</x-app-layouts>

