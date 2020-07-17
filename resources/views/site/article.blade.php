@extends('site.layouts')
@section('page_title')
    المقالات 
@endsection
@section('content')    
  <div class="row">
      <div class="col-md-12">
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">الرئيسية</li>
                      <li class="breadcrumb-item">المقالات</li>
                    </ol>
                  </nav>
      </div>
  </div>
  <div class="row">
  <div class="col-md-12">
  @foreach($posts as $post)
    <div>
      <div class="artilce-head">
        <p class="article-name">{{$post->title}}</p>
      </div>
    <div>
      <a href="{{url('user/article-details/' . $post->id)}}"><button class="btn more2-btn">التفاصيل </button></a>
      
      <img style= "width: 540px; height: auto;" class="article-img shadow p-3 mb-5"src="{{asset($post->image)}}">
    </div>
  </br>
    </div>     
   </div>
  @endforeach 
  </div>
  </div>
@endsection