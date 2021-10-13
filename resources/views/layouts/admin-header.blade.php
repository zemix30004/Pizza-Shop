<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a class="nav-link px-2 text-secondary" href="{{ route('admin.index') }}">Админ</a></li>
                                <li><a class="nav-link px-2 text-white" href="{{ route('index') }}">Главная</a></li>
                <li><a class="nav-link px-2 text-white" href="{{ route('admin.categories.index') }}">Категории</a></li>
                <li><a class="nav-link px-2 text-white" href="{{ route('admin.products.index') }}">Продукты</a></li>
                <li><a class="nav-link px-2 text-white" href="{{ route('admin.orders.index') }}">Заказы</a></li>
                <li><a class="nav-link px-2 text-white" href="{{ route('admin.users.index') }}">Пользователи</a></li>
                <li><a class="nav-link px-2 text-white" href="{{ route('contacts') }}" >Контакты</a></li>
                <li><a class="nav-link px-2 text-white" href="{{ route('admin.contact') }}" >Контакт</a></li>
                <li><a class="nav-link px-2 text-white" href="{{ route('admin.review') }}" >Отзывы</a></li>
                @guest
                @else
                <li><a class="btn btn-outline-light me-2" href="{{ route('get-logout') }}">@lang('main.logout')</a></li>
                @endguest
            </ul>
            </div>
        </div>
</header>
