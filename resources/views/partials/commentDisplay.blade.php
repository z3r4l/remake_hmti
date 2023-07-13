@foreach($comments as $comment)
<div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <div class="row  d-flex justify-content-center my-2">
        <div class="col-lg-12">
            <div class="card p-3">
                <small class="d-flex justify-content-end">{{ $item->created_at->diffForHumans() }}</small>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center">
                        {{-- <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> --}}
                        <span><p class="fw-semibold text-dark text-uppercase fs-6">{{ $comment->user->name }}</p> <small
                                class="font-weight-bold">{{ $comment->body }}</small></span>
                    </div>
                    
                </div>
                <div class="action d-flex justify-content-between mt-2 align-items-center">
                    <div class="reply ">
                        <a href="" class="text-decoration-none text-danger"><small>Hapus</small></a>
                        
                        {{-- <span class="dots"></span>
                        <small>Reply</small>
                        <span class="dots"></span>
                        <small>Translate</small> --}}
                    </div>
                    {{-- <div class="icons align-items-center">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-check-circle-o check-icon"></i>
                    </div> --}}
                   
                </div>
            </div>
        </div>
    </div>
    {{-- <a href="" id="reply"></a> --}}
    {{-- <form method="post" action="{{ route('comments.store') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="body" class="form-control" />
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group d-flex float-right">
            <input type="submit" class="btn btn-warning my-2 " value="Reply" />
        </div>
    </form> --}}
    @include('partials.commentDisplay', ['comments' => $comment->replies])
</div>
@endforeach