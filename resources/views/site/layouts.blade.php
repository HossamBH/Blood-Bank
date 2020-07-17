<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
    integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

   <!-- custom CSS -->
   <link rel="stylesheet" href="{{asset('site/css/owl.carousel.min.css')}}">
   <link rel=stylesheet href="{{asset('site/css/owl.theme.default.min.css')}}">
   <link rel="stylesheet" href="{{asset('site/css/hover-min.css')}}">
       <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
     <!-- custom font -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet"> 

    <title>@yield('page_title')</title>
  </head>
  <body id="body-bg">
     <!-- top nav section -->
    <section id="top-nav">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
           <div class="social-media">

              <a href="https://www.facebook.com"><i class="fab fa-facebook-f" style="color:white"></i></a>
              <a href="https://www.twitter.com"><i class="fab fa-twitter" style="color:lightblue"></i></a>

           </div>

          </div>
          <div class="col-md-4">
              <div class="contact">
                  
                  <p class="email">{{isset($setting->email) ? $setting->email : null}}</p>
               
                  <i class="fas fa-envelope-square email "></i>
                  <p class="phone "> {{isset($setting->phone) ? $setting->phone : null}}
                    </p>
                    <i class="fas fa-phone-volume phone hvr-buzz"></i>
                </div>  
            
            </div>
        </div>

      </div>
    </section>
     <!-- oradaniry nav section -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="nav-logo " href= "{{url('/')}}" ><img class="logo" src="{{asset('site/imgs/logo.png')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
         
              <a class="nav-link " href="{{url('/')}}">الرئيسية   </a>
              <span class="test"></span>

            </li>
            <li class="nav-item">
              <a class="nav-link border-left" href="{{url('user/articles')}}">المقالات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-left" href="{{url('user/donations')}}">طلبات التبرع</a>
              </li>
            <li class="nav-item">
                    <a class="nav-link border-left" href="{{url('user/donation-create')}}">تبرع جديد</a>
                  </li>
              <li class="nav-item">
                  <a class="nav-link border-left" href="{{url('user/how-we-are')}}">من نحن</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link border-left" href="{{url('user/contact-us')}}">اتصل بنا </a>
                  </li>

                <li class="nav-item">
                    <a class="nav-link border-left" href="{{url('user/change-password')}}">اتغيير كلمة المرور</a>
                  </li>
          </ul>
          <span class="navbar-text">
           <a  class="new-account"href="{{url('user/signup')}}">انشاء حــساب جديد</a>

          @if(auth()->user())
              <a href="{{ url('user/login') }}" class="btn btn-default btn-flat">خروج</a>
          @else
              <a href="{{url('user/login')}}"><button class="btn login-btn">دخول</button></a>
          @endif
            
          </span>
        </div>
      </nav>

     <!-- breedcrumb-->
 
          @yield('content')

    <!--  FOOTER -->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img class="footer-logo" src="{{asset('site/imgs/logo.png')}}">
        <p class="footer-text">بنك الدم هذا النص هو مثال لنص يمكن ان يستبدل فى نفس المساحه, لقد تم توليد هذا النص من مولد النص العربى حيث يمكنك توليد مثل هذا النص أو العديد من النصوص الاخرى إضافة الى زيادة عدد الحروف التى يولدها التطبيق يطلع على صوره حقيقية للتصميم</p>
      </div>
        <div class="col-md-4 change-position">
        
          </div>

    </div>
  </div>

</footer>
<section id="last-footer">
  <div class="col-md-8">
    <p class="copys"> جميع الحقوق محفوظ ل <span id="website-name">بنك الدم </span> &copy;2020 </p>
  </div>
</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
  
    <script src="{{asset('site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('site/js/main.js')}}"></script>
    @stack('scripts')


      <script>
        function toggleFavourite(heart) {
          var post_id = heart.id;
          $.ajax({
            url : '{{url(route('toggle-favourite'))}}',
            type : 'post',
            data : {_token:"{{csrf_token()}}", post_id:post_id},
            success : function(data){
              if(data.status == 1)
              {
                var currentClass = $(heart).attr('class');
                if (currentClass.includes('first')) {
                    $(heart).removeClass('first-heart').addClass('second-heart');
                } else {
                    $(heart).removeClass('second-heart').addClass('first-heart');
                }
              }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                  alert(errorMessage);
            }
        });
      }
      </script>
    
  </body>
</html>

