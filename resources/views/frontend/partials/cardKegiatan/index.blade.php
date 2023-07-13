@foreach ($posts as $p)
<div class="col-lg-4 col-12 mt-4 d-flex">
    <a href="/posts/{{ $p->slug }}" class="text-decoration-none text-dark">
    <div class="card card-kegiatan shadow-sm h-100">
        <div class="card-image-kegiatan">
            <div class="hover-text">
                <img src="{{ asset('storage/posts/'.$p->image) }}" class="img-post card-img-top" alt="...">
            </div>
        </div>

        <div class="card-body">
            <h3 class="card-title ">{{ Str::limit($p->title,60) }}</h3>
            <div class="text-left">
                <div class="badge background-color card-category"><a href="/categories/{{ $p->category_slug }}"
                        class="text-decoration-none text-white">{{$p->category_name}}</a></div>
            </div>
            <hr>
            <p class="card-text mt-1 content-post">{!!Str::limit( $p->body , 150)!!}</p>
        </div>

        <div class="card-footer py-3 background-color">
            <div class="card-footer-info">
                <span class="read-more">
                    <a class="text-white text-decoration-none read-more-1" href="/posts/{{ $p->slug }}">Lihat
                        Selengkapnya <i class="bi bi-arrow-right ms-2"></i> </a>
                </span>
            </div>
        </div>
    </div>
</a>
</div>
<script>
    $(document).ready(function(){
    $('.card').lazyload();
    });
</script>
@endforeach