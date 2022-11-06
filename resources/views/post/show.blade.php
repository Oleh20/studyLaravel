@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 style="opacity: 1" class="edica-page-title">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$data->format('F')}}
                , {{$data->day}}• {{$data->year}}• {{$data->format('H:i')}}, {{$post->comments->count()}} Comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto mt-5">
                        {!!$post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('storage/' . $relatedPost->main_image)}}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{$relatedPost->category->title}}</p>
                                    <h5 class="post-title">{{$relatedPost->title}}</h5>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <h2 class="section-title mb-4" data-aos="fade-up">Comments ({{$post->comments->count()}})</h2>
                    <section class="comment-list " style="margin-top: 8rem">
                    @foreach($post->comments as $comment)
                            <div class="comment-text mb-3">
                    <span class="username">
                        <div>
                                {{$comment->user->name}}
                        </div>
                      <span class="text-muted float-right">{{$comment->created_at}}</span>
                    </span><!-- /.username -->
                               {{$comment->message}}
                            </div>
                        @endforeach
                    </section>
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Comment"
                                              rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                            <input style="visibility: hidden" value="{{$post->id}}">
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <style>
        [data-aos^=fade][data-aos^=fade] {
            opacity: 1 !important;
        }
    </style>
@endsection
