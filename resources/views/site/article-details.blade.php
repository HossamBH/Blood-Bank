@extends('site.layouts')
@section('page_title')
    {{$article->title}} 
@endsection
@section('content')    
  <div class="row">
      <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">الرئيسية</li>
              <li class="breadcrumb-item">المقالات</li>
              <li class="breadcrumb-item">{{$article->category->name}}</li>
            </ol>
          </nav>
      </div>
  </div>
  <div class="row">
  <div class="col-md-12">
    <div>
      <div class="artilce-head">
        <p class="article-name">{{$article->title}}</p>
      </div>
    <div>
      <div style= "width: 1000px;" class="article-content">
        {{$article->content}}
      </div>

      <img style= "width: 540px; height: auto;" class="article-img shadow p-3 mb-5"src="{{asset($article->image)}}">  
    </div>
    </div>     
   </div>
  <br> 
  </div>
  <div class="row">
    <div class="col-md-12">
      <section id="articles">
        <h2 class="articles-relative">مقالات ذات صلة  </h2>
        <div class="container custom" style="direction: ltr">
          <div class="owl-carousel owl-theme" id="owl-articles">
            <div class="item">
            @foreach($posts as $post)
              <div class="card" style="width: 22rem;">
                <i id="{{$post->id}}" onclick="toggleFavourite(this)"  class="fab fa-gratipay {{$post->is_favourite ? 'second-heart' : 'first-heart'}}"></i>
                <img class="card-img-top" src="{{asset($post->image)}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <a href="{{url('user/article-details/' . $post->id)}}"><button class="btn details-btn">التفاصيل </button></a>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        
        </div>
        </section>
    </div>
  </div>

@endsection