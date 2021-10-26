<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('index') }}" class="nav-link px-2 text-secondary">Главная</a></li>
                <li><a href="{{ route('index') }}" class="nav-link px-2 text-white">Все продукты</a></li>
                <li><a href="{{ route('categories') }}" class="nav-link px-2 text-white">Категории</a></li>
                <li><a href="{{ route('cart') }}" class="nav-link px-2 text-white">Корзина</a></li>
                <li><a href="{{ route('cart-place') }}" class="nav-link px-2 text-white">Подтверждение заказа</a></li>
                {{-- <li><a href="{{ route('contacts') }}" class="nav-link px-2 text-white">Контакты</a></li> --}}
                <li><a href="{{ route('contact-us') }}" class="nav-link px-2 text-white">Обратная связь</a></li>
                <li><a href="{{ route('sendmail') }}" class="nav-link px-2 text-white">Отправка письма</a></li>
                {{-- <li><a href="{{ route('review') }}" class="nav-link px-2 text-white">Отзывы</a></li> --}}
                {{-- <li><a href="{{ route('contact') }}" class="nav-link px-2 text-white">Контакт</a></li> --}}
            </ul>
                {{-- <li class="dropdown">
                    <a href="#" class=" nav-link px-2 text-white dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ App\Services\CurrencyConversion::getCurrencySymbol() }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach (App\Services\CurrencyConversion::getCurrencies() as $currency)
                            <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a></li>
                        @endforeach
                    </ul>
                </li> --}}
                {{-- <div class="p-3 bg-dark text-white dropdown">
                    <button class="nav-link px-2 text-white btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Выберите валюту
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">₴</a></li>
                      <li><a class="dropdown-item" href="#">$</a></li>
                      <li><a class="dropdown-item" href="#">€</a></li>
                    </ul>
                  </div>
            </ul> --}}

            <div class="text-end">
                @guest
                    <a class="btn btn-outline-light me-2" href="{{ route('login') }}">@lang('main.login')</a>
                @else
                    <a class="btn btn-outline-light me-2" href="{{ route('get-logout') }}">@lang('main.logout')</a>
                @endguest
                    @auth
                        @admin
                        {{-- (Auth::user()->isAdmin()){{ Auth::user()->name }} --}}
                            <a class="btn btn-outline-light me-2" href="{{ route('admin.index') }}">@lang('main.admin_panel')</a>
                        @endadmin
                    @else
{{--                        <a href="{{ route('person.orders.index') }}">@lang('main.my_orders')</a>--}}
                    @endauth
                    @guest
                        <a class="btn btn-outline-light me-2" href="{{ route('register') }}">@lang('main.register')</a>
                    @endguest
            </div>
        </div>
    </div>
    <div class="col-md-12">
     <form method="get" action="{{ route('search')}}">
        <div class="form-row">
            <div class="form-group col-md-10">
                <input type="text" class="form-control form-control-dark" id="s" name="s" value="{{request()->s}}" placeholder="Поиск по сайту..." aria-label="Search"></div>
                <div class="form-group col-md-2">
                <button type="submit" class="btn btn-secondary btn-block" value="Найти">Найти</p>
                </div>
            </form>
        </div>
    </div>
</header>
