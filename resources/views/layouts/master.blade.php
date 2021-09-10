
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pizza-Shop:@yield('title')</title>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <link rel="stylesheet" href="{{ '/css/starter-template.css' }}" type="text/css">
    <link rel="stylesheet" href="{{ '/css/bootstrap.min.css' }}" type="text/css"
    <link rel="stylesheet" href="{{ '/js/bootstrap.min.js' }}" type="text/js">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <script src="/js/bootstrap.min.js"></script>
    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('index') }}">Pizza-Shop</a>
        </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li @routeactive('index')><a href="{{ route('index') }}">@lang('main.all_products')</a></li>
                    <li @routeactive('categor*')><a href="{{ route('categories') }}">@lang('main.categories')</a>
                    </li>
                    <li @routeactive('cart*')><a href="{{ route('cart') }}">@lang('main.cart')</a></li>
                    <li><a href="{{ route('reset') }}">@lang('main.reset_project')</a></li>
                    <li><a href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a></li>
                </ul></div>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    {{ \App\Services\CurrencyConversion::getCurrencySymbol() }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach (\App\Services\CurrencyConversion::getCurrencies() as $currency)
                            <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                    @guest
                    <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
                    @endguest
                    @auth
                        @admin
                        {{-- (Auth::user()->isAdmin()){{ Auth::user()->name }} --}}
                                <li><a href="{{ route('home') }}">@lang('main.admin_panel')</a></li>
                        @else
                                <li><a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a></li>
                        @endadmin
                        <li><a href="{{ route('get-logout') }}">@lang('main.logout')</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
    <div class="container">
        <div class="starter-template">
            @if (session()->has('success'))
                <p class="alert alert-success">{{ session()->get('success') }}</p>
            @endif
            @if (session()->has('warning'))
                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
            @endif
        @yield('content')
        </div>
</body>
</html>
{{-- <footer id="footer">
    <div class="container footer-content">
        <div class="footer-info">
                <a href="/pomichna/info"> О нас</a>
                <a href="/pomichna/offer">Публичная оферта</a>
                <a href="/pomichna/privacy-policy">Политика конфиденциальности</a>-
        </div>
        <div class="address-items">
            <div style="color: white; font-size: 20px;" class="pull-right">
                <div class="address-phone">
                    <a href="tel:0800757737" class="phone-number-white">0800 000-000</a>
                    <span style="color: grey; font-size: 12px;">
                    Звонок бесплатный                            </span>
                </div>
                <a href="mailto:pizza-shop@gmail.com" class="about-email" target="_self" itemprop="email">pizza-shop@gmail.com </a>
            </div>
        </div>
                        <div><div class="address-btn"><a href="" target="_blank" class="btn btn-info">ул. Победы, 92-б <i class="fa fa-map-marker"></i></a>
<a href="" target="_blank" class="btn btn-info">ул.Вокзальная, 12 <i class="fa fa-map-marker"></i></a>
</div></div>

        <div class="footer-icons">
            <div class="social-networks">
                <a href="" class="soc-icons"><i class="fa fa-instagram"></i></a>
                <a href="" class="soc-icons"><i class="fa fa-facebook-square"></i></a>
            </div>
            <div class="payment-systems">
                <svg xmlns="" x="0px" y="0px" width="2.5em" height="1.2em" viewBox="23 12 5 24" fill="#FFFFFF" style="margin-right: 5px;"><path d="M44.688,16.814h-3.004c-0.933,0-1.627,0.254-2.037,1.184l-5.773,13.074h4.083c0,0,0.666-1.758,0.817-2.143 c0.447,0,4.414,0.006,4.979,0.006c0.116,0.498,0.474,2.137,0.474,2.137h3.607L44.688,16.814z M39.893,26.01 c0.32-0.819,1.549-3.987,1.549-3.987c-0.021,0.039,0.317-0.825,0.518-1.362l0.262,1.23c0,0,0.745,3.406,0.901,4.119H39.893z M34.146,26.404c-0.028,2.963-2.684,4.875-6.771,4.875c-1.743-0.018-3.422-0.361-4.332-0.76l0.547-3.193l0.501,0.228 c1.277,0.532,2.104,0.747,3.661,0.747c1.117,0,2.313-0.438,2.325-1.393c0.007-0.625-0.501-1.07-2.016-1.77 c-1.476-0.683-3.43-1.827-3.405-3.876c0.021-2.773,2.729-4.708,6.571-4.708c1.506,0,2.713,0.31,3.483,0.599l-0.526,3.092 l-0.351-0.165c-0.716-0.288-1.638-0.566-2.91-0.546c-1.522,0-2.228,0.634-2.228,1.227c-0.008,0.668,0.824,1.108,2.184,1.77 C33.126,23.546,34.163,24.783,34.146,26.404z M0,16.962l0.05-0.286h6.028c0.813,0.031,1.468,0.29,1.694,1.159l1.311,6.304 C7.795,20.842,4.691,18.099,0,16.962z M17.581,16.812l-6.123,14.239l-4.114,0.007L3.862,19.161 c2.503,1.602,4.635,4.144,5.386,5.914l0.406,1.469l3.808-9.729L17.581,16.812L17.581,16.812z M19.153,16.8h3.89L20.61,31.066 h-3.888L19.153,16.8z"></path></svg>
                <svg width="2.5em" height="1.7em" viewBox="0 0 256 199" version="1.1" xmlns="" preserveAspectRatio="xMidYMid"><g><path d="M46.5392504,198.011312 L46.5392504,184.839826 C46.5392504,179.790757 43.4659038,176.497885 38.1973096,176.497885 C35.5630125,176.497885 32.7091906,177.375984 30.7334678,180.229806 C29.1967945,177.815034 27.0015469,176.497885 23.7086756,176.497885 C21.513428,176.497885 19.3181804,177.15646 17.5619824,179.571233 L17.5619824,176.936935 L12.9519625,176.936935 L12.9519625,198.011312 L17.5619824,198.011312 L17.5619824,186.3765 C17.5619824,182.644579 19.5377052,180.888381 22.6110518,180.888381 C25.6843984,180.888381 27.2210717,182.864103 27.2210717,186.3765 L27.2210717,198.011312 L31.8310916,198.011312 L31.8310916,186.3765 C31.8310916,182.644579 34.0263392,180.888381 36.880161,180.888381 C39.9535076,180.888381 41.490181,182.864103 41.490181,186.3765 L41.490181,198.011312 L46.5392504,198.011312 L46.5392504,198.011312 Z M114.81145,176.936935 L107.347608,176.936935 L107.347608,170.570717 L102.737589,170.570717 L102.737589,176.936935 L98.566618,176.936935 L98.566618,181.107905 L102.737589,181.107905 L102.737589,190.766995 C102.737589,195.59654 104.713311,198.450362 109.981906,198.450362 C111.957628,198.450362 114.152876,197.791787 115.689549,196.913688 L114.372401,192.962243 C113.055252,193.840341 111.518579,194.059866 110.420955,194.059866 C108.225708,194.059866 107.347608,192.742718 107.347608,190.54747 L107.347608,181.107905 L114.81145,181.107905 L114.81145,176.936935 L114.81145,176.936935 Z M153.886857,176.497885 C151.25256,176.497885 149.496362,177.815034 148.398738,179.571233 L148.398738,176.936935 L143.788718,176.936935 L143.788718,198.011312 L148.398738,198.011312 L148.398738,186.156975 C148.398738,182.644579 149.935411,180.668856 152.789233,180.668856 C153.667332,180.668856 154.764956,180.888381 155.643055,181.107905 L156.960204,176.71741 C156.082105,176.497885 154.764956,176.497885 153.886857,176.497885 L153.886857,176.497885 L153.886857,176.497885 Z M94.834697,178.693133 C92.6394495,177.15646 89.566103,176.497885 86.2732315,176.497885 C81.0046375,176.497885 77.492241,179.132183 77.492241,183.303153 C77.492241,186.81555 80.1265385,188.791272 84.736558,189.449847 L86.931806,189.669371 C89.346578,190.10842 90.6637265,190.766995 90.6637265,191.864619 C90.6637265,193.401292 88.9075285,194.498916 85.834182,194.498916 C82.7608355,194.498916 80.346063,193.401292 78.8093895,192.303668 L76.614142,195.816065 C79.0289145,197.572262 82.321786,198.450362 85.614657,198.450362 C91.7613505,198.450362 95.2737465,195.59654 95.2737465,191.645094 C95.2737465,187.913173 92.4199245,185.937451 88.0294295,185.278876 L85.834182,185.059351 C83.858459,184.839826 82.321786,184.400777 82.321786,183.083629 C82.321786,181.546955 83.858459,180.668856 86.2732315,180.668856 C88.9075285,180.668856 91.5418255,181.76648 92.858974,182.425054 L94.834697,178.693133 L94.834697,178.693133 Z M217.329512,176.497885 C214.695215,176.497885 212.939017,177.815034 211.841393,179.571233 L211.841393,176.936935 L207.231373,176.936935 L207.231373,198.011312 L211.841393,198.011312 L211.841393,186.156975 C211.841393,182.644579 213.378066,180.668856 216.231888,180.668856 C217.109987,180.668856 218.207611,180.888381 219.08571,181.107905 L220.402859,176.71741 C219.52476,176.497885 218.207611,176.497885 217.329512,176.497885 L217.329512,176.497885 L217.329512,176.497885 Z M158.496877,187.474123 C158.496877,193.840341 162.887372,198.450362 169.69264,198.450362 C172.765986,198.450362 174.961234,197.791787 177.156481,196.035589 L174.961234,192.303668 C173.205036,193.620817 171.448838,194.279391 169.473115,194.279391 C165.741194,194.279391 163.106897,191.645094 163.106897,187.474123 C163.106897,183.522678 165.741194,180.888381 169.473115,180.668856 C171.448838,180.668856 173.205036,181.32743 174.961234,182.644579 L177.156481,178.912658 C174.961234,177.15646 172.765986,176.497885 169.69264,176.497885 C162.887372,176.497885 158.496877,181.107905 158.496877,187.474123 L158.496877,187.474123 L158.496877,187.474123 Z M201.08468,187.474123 L201.08468,176.936935 L196.47466,176.936935 L196.47466,179.571233 C194.937987,177.595509 192.742739,176.497885 189.888917,176.497885 C183.961749,176.497885 179.351729,181.107905 179.351729,187.474123 C179.351729,193.840341 183.961749,198.450362 189.888917,198.450362 C192.962264,198.450362 195.157512,197.352737 196.47466,195.377015 L196.47466,198.011312 L201.08468,198.011312 L201.08468,187.474123 Z M184.181274,187.474123 C184.181274,183.742202 186.596046,180.668856 190.547492,180.668856 C194.279413,180.668856 196.91371,183.522678 196.91371,187.474123 C196.91371,191.206044 194.279413,194.279391 190.547492,194.279391 C186.596046,194.059866 184.181274,191.206044 184.181274,187.474123 L184.181274,187.474123 Z M129.080559,176.497885 C122.933866,176.497885 118.543371,180.888381 118.543371,187.474123 C118.543371,194.059866 122.933866,198.450362 129.300084,198.450362 C132.373431,198.450362 135.446777,197.572262 137.861549,195.59654 L135.666302,192.303668 C133.910104,193.620817 131.714856,194.498916 129.519609,194.498916 C126.665787,194.498916 123.811965,193.181768 123.153391,189.449847 L138.739648,189.449847 L138.739648,187.693648 C138.959173,180.888381 135.007727,176.497885 129.080559,176.497885 L129.080559,176.497885 L129.080559,176.497885 Z M129.080559,180.449331 C131.934381,180.449331 133.910104,182.20553 134.349153,185.498401 L123.372916,185.498401 C123.811965,182.644579 125.787688,180.449331 129.080559,180.449331 L129.080559,180.449331 Z M243.452958,187.474123 L243.452958,168.594995 L238.842938,168.594995 L238.842938,179.571233 C237.306265,177.595509 235.111017,176.497885 232.257196,176.497885 C226.330027,176.497885 221.720007,181.107905 221.720007,187.474123 C221.720007,193.840341 226.330027,198.450362 232.257196,198.450362 C235.330542,198.450362 237.52579,197.352737 238.842938,195.377015 L238.842938,198.011312 L243.452958,198.011312 L243.452958,187.474123 Z M226.549552,187.474123 C226.549552,183.742202 228.964324,180.668856 232.91577,180.668856 C236.647691,180.668856 239.281988,183.522678 239.281988,187.474123 C239.281988,191.206044 236.647691,194.279391 232.91577,194.279391 C228.964324,194.059866 226.549552,191.206044 226.549552,187.474123 L226.549552,187.474123 Z M72.443172,187.474123 L72.443172,176.936935 L67.833152,176.936935 L67.833152,179.571233 C66.2964785,177.595509 64.101231,176.497885 61.247409,176.497885 C55.3202405,176.497885 50.7102205,181.107905 50.7102205,187.474123 C50.7102205,193.840341 55.3202405,198.450362 61.247409,198.450362 C64.3207555,198.450362 66.5160035,197.352737 67.833152,195.377015 L67.833152,198.011312 L72.443172,198.011312 L72.443172,187.474123 Z M55.3202405,187.474123 C55.3202405,183.742202 57.735013,180.668856 61.6864585,180.668856 C65.4183795,180.668856 68.0526765,183.522678 68.0526765,187.474123 C68.0526765,191.206044 65.4183795,194.279391 61.6864585,194.279391 C57.735013,194.059866 55.3202405,191.206044 55.3202405,187.474123 Z" fill="#fff"></path><rect fill="#FF5F00" x="93.2980455" y="16.9034088" width="69.1502985" height="124.251009"></rect><path d="M97.688519,79.0288935 C97.688519,53.783546 109.542856,31.3920209 127.763411,16.9033869 C114.3724,6.3661985 97.468994,-1.94737475e-05 79.0289145,-1.94737475e-05 C35.3434877,-1.94737475e-05 1.7258174e-06,35.3434665 1.7258174e-06,79.0288935 C1.7258174e-06,122.71432 35.3434877,158.057806 79.0289145,158.057806 C97.468994,158.057806 114.3724,151.691588 127.763411,141.1544 C109.542856,126.88529 97.688519,104.274241 97.688519,79.0288935 Z" fill="#EB001B"></path><path d="M255.746345,79.0288935 C255.746345,122.71432 220.402859,158.057806 176.717432,158.057806 C158.277352,158.057806 141.373945,151.691588 127.982936,141.1544 C146.423015,126.665766 158.057827,104.274241 158.057827,79.0288935 C158.057827,53.783546 146.20349,31.3920209 127.982936,16.9033869 C141.373945,6.3661985 158.277352,-1.94737475e-05 176.717432,-1.94737475e-05 C220.402859,-1.94737475e-05 255.746345,35.5629913 255.746345,79.0288935 Z" fill="#F79E1B"></path></g></svg>
            </div>
        </div>
    </div>
    <div class="container footer-content">
        <p class="copyright">©Pizza-Shop 2021</p>
    </div>
</footer> --}}
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Album example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">



    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


  </head>
  <body>

<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white">Follow on Twitter</a></li>
            <li><a href="#" class="text-white">Like on Facebook</a></li>
            <li><a href="#" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>


    {{-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


  </body>
</html>
