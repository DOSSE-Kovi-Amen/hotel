@extends('layouts.site')

@section('content')
<style>
    #article p::first-letter{
  font-size: 200%;
  color: #8A2BE2;
}
</style>
<section class="bg-light" id="article">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="my-3">{{ $article->title }} ({{'le'. $article->updated_at->format('d/m/Y') }})</h2>

            <img style="object-fit: cover; height:400px; width:100%;"
            src="{{ asset(Voyager::image($article->image)) }}" class="img-fluid"
            alt="{{ $article->title }}" />

            <div class="text-justify p-5 bg-white">
                <p class="paragraph">
                    {!! $article->body !!}
                </p>
            </div>
        </div>
        <div class="col-md-4 p-4 mt-5">
            <h3>Dernier posts</h3>
            @foreach ($last_posts as $post)
                <a href="{{ url('blog/article/' . $post->category?->slug . '/' . $post->slug) }}">{{ $post->title }}</a>
            <hr>
            @endforeach
        </div>
    </div>
</div>
</section>


@endsection
