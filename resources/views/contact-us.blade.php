@extends('layouts.new-master')

@section('title', __('contact-us'))

@section('content')

<section class="py-5 text-center container">
<h2>@lang('main.contact_us')</h2>
    <div class="contact-us">
    <div class="contact-us__content">
        <h4 class="address-us__title">Наш адрес:</h4>
        <p>г.Кропивницкий,ул.Большая Перспективная 23</p>
        <h4 class="email-us__title">Email:</h4>
        <p>admin@example.com</p>
        {{-- <ul class="contact-us__tabs">
            <li class="contact-us__tab active" data-tab="call">Позвоните</li>
            <li class="contact-us__tab" data-tab="write">Напишите</li>
            </ul> --}}
            <div class="contact-us__tab-content call-us active" data-tab="call">

                <div class="call-us__contact-row">
                <h4 class="call-us__title">Консультации по телефонам</h4>
                <div class="call-us__contact-row">
                <h5 class="call-us__row-title">Бесплатно в Украине:</h5>
                <div class="call-us__contacts-wrapper">
                    <div class="call-us__contact">
                    <span class="call-us__phone">(0-800) 300-100</span>
                    <a class="call-us__phone-button" href="tel:0800300100"></a>
                    </div>
                    <div class="call-us__contact">
                    <span class="call-us__phone">(0-800) 200-100</span>
                    <a class="call-us__phone-button" href="tel:0800200100"></a>
                    </div>
                </div>
                </div>
                <div class="call-us__contact-row">
                <h5 class="call-us__row-title">Согласно тарифа оператора:</h5>
                <div class="call-us__contacts-wrapper">
                    <div class="call-us__contact">
                    <span class="call-us__phone">(056) 790-12-34</span>
                    <a class="call-us__phone-button" href="tel:0567901234"></a>
                    </div>
                    <div class="call-us__contact">
                    <span class="call-us__phone">(056) 797-63-23</span>
                    <a class="call-us__phone-button" href="tel:0567976323"></a>
                    </div>
                </div>
                </div>
                <div class="call-us__schedule-row">
                <h5 class="call-us__row-title">График работы контакт-центра:</h5>
                <div class="call-us__schedule">
                    <span class="call-us__schedule-time">Ежедневно</span>
                </div>
                </div>
                <div class="call-us__map-row">
                <div class="call-us__map">
                    <span class="call-us__map-label">Перейти на карту адреса магазина</span>
                    <a href="" titlte="Перейти на карту адреса магазина" class="call-us__map-link"></a>
                    {{-- <img class="aligncenter size-full wp-image-3119" src="/wp-content/uploads/2017/02/contacts.jpg" alt="contacts" width="775"> --}}
                </div>
                </div>
                <a href="" target="_blank" title="Оцените работу нашего сервиса" class="call-us__service">
                <img src="" alt="Оцените работу нашего сервиса" class="call-us__service-image">
                </a>
            </div>
            <div class="contact-us__tab-content write-us" data-tab="write">
            <div id="feedback-widget">
            <script type="text/javascript">
                window.feedbackWidgetConfig = {"store":3,"subject_items":[{"id":"1","label":"\u0412\u044b\u0431\u0435\u0440\u0438\u0442\u0435 \u0442\u0435\u043c\u0443 \u0441\u043e\u043e\u0431\u0449\u0435\u043d\u0438\u044f"},{"id":"2","label":"\u041f\u0438\u0442\u0430\u043d\u043d\u044f \u0437\u0430 \u0441\u0442\u0430\u043d\u043e\u043c \u0437\u0430\u043c\u043e\u0432\u043b\u0435\u043d\u043d\u044f","fields":[{"id":"1","label":"\u041d\u043e\u043c\u0435\u0440 \u0437\u0430\u043a\u0430\u0437\u0430"}]},{"id":"3","label":"\u041f\u0438\u0442\u0430\u043d\u043d\u044f \u043f\u043e \u0441\u0435\u0440\u0432\u0456\u0441\u0443 \u0442\u0430 \u0440\u0435\u043c\u043e\u043d\u0442\u0443","fields":[{"id":"2","label":"\u041d\u043e\u043c\u0435\u0440 \u0437\u0430\u043a\u0430\u0437\u0430"},{"id":"3","label":"\u041d\u043e\u043c\u0435\u0440 \u0437\u0430\u044f\u0432\u043a\u0438 \u043d\u0430 \u0440\u0435\u043c\u043e\u043d\u0442","mask":"9999-999999"}]},{"id":"4","label":"\u0425\u043e\u0447\u0443 \u043f\u043e\u0432\u0435\u0440\u043d\u0443\u0442\u0438 \u0430\u0431\u043e \u043e\u0431\u043c\u0456\u043d\u044f\u0442\u0438 \u0442\u043e\u0432\u0430\u0440","fields":[{"id":"4","label":"\u041d\u043e\u043c\u0435\u0440 \u0437\u0430\u043a\u0430\u0437\u0430"}]},{"id":"5","label":"\u041f\u0438\u0442\u0430\u043d\u043d\u044f \u043f\u043e \u041a\u0440\u0435\u0434\u0438\u0442\u0443"},{"id":"6","label":"\u041f\u0438\u0442\u0430\u043d\u043d\u044f \u0437\u0430 \u0431\u0435\u0437\u0433\u043e\u0442\u0456\u0432\u043a\u043e\u0432\u0438\u043c\u0438 \u0437\u0430\u043c\u043e\u0432\u043b\u0435\u043d\u043d\u044f\u043c\u0438","fields":[{"id":"5","label":"\u041d\u043e\u043c\u0435\u0440 \u0437\u0430\u043a\u0430\u0437\u0430"},{"id":"6","label":"\u0418\u043c\u044f"},{"id":"7","label":"\u0422\u0435\u043b\u0435\u0444\u043e\u043d"}]},{"id":"7","label":"\u041f\u0438\u0442\u0430\u043d\u043d\u044f \u0449\u043e\u0434\u043e \u0430\u043a\u0446\u0456\u0439"},{"id":"8","label":"\u0421\u043a\u0430\u0440\u0433\u0430 \u0430\u0431\u043e \u043f\u0440\u043e\u043f\u043e\u0437\u0438\u0446\u0456\u0457"},{"id":"9","label":"\u0406\u043d\u0448\u0456 \u043f\u0438\u0442\u0430\u043d\u043d\u044f"},{"id":"10","label":"\u041f\u0438\u0442\u0430\u043d\u043d\u044f \u043f\u0440\u043e \u0441\u043f\u0456\u0432\u043f\u0440\u0430\u0446\u044e"},{"id":"11","label":"\u041f\u043e\u0432\u0456\u0434\u043e\u043c\u0438\u0442\u0438 \u043f\u0440\u043e \u043f\u043e\u043c\u0438\u043b\u043a\u0443"}],"translations":{"write_and_we_are_contacting_you":"\u041d\u0430\u043f\u0438\u0448\u0456\u0442\u044c \u0456 \u043c\u0438 \u0437\u0432\u02bc\u044f\u0436\u0435\u043c\u043e\u0441\u044f \u0437 \u0432\u0430\u043c\u0438","user_name":"\u0406\u043c'\u044f","email_or_phone":"\u0415\u043b. \u043f\u043e\u0448\u0442\u0430 \u0430\u0431\u043e \u0442\u0435\u043b\u0435\u0444\u043e\u043d","email":"\u041f\u043e\u0448\u0442\u0430","phone":"\u0422\u0435\u043b\u0435\u0444\u043e\u043d","message_subject":"\u0422\u0435\u043c\u0430 \u043f\u043e\u0432\u0456\u0434\u043e\u043c\u043b\u0435\u043d\u043d\u044f","feedback_select_the_subject_of_the_message":"\u0412\u0438\u0431\u0435\u0440\u0456\u0442\u044c \u0442\u0435\u043c\u0443 \u043f\u043e\u0432\u0456\u0434\u043e\u043c\u043b\u0435\u043d\u043d\u044f","order_number":"\u041d\u043e\u043c\u0435\u0440 \u0437\u0430\u043c\u043e\u0432\u043b\u0435\u043d\u043d\u044f","repair_request_number":"\u041d\u043e\u043c\u0435\u0440 \u0437\u0430\u044f\u0432\u043a\u0438 \u043d\u0430 \u0440\u0435\u043c\u043e\u043d\u0442","message":"\u041f\u043e\u0432\u0456\u0434\u043e\u043c\u043b\u0435\u043d\u043d\u044f","send":"\u041d\u0430\u0434\u0456\u0441\u043b\u0430\u0442\u0438","required":"\u0411\u0443\u0434\u044c-\u043b\u0430\u0441\u043a\u0430, \u0432\u0432\u0435\u0434\u0456\u0442\u044c \u0441\u0432\u043e\u0454 \u043f\u043e\u0432\u0456\u0434\u043e\u043c\u043b\u0435\u043d\u043d\u044f."}};
            </script>
            </div>
            </div>
            </div>
            </div>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                Введите свои данные и отправьте нам сообщение
            </div>
            <div class="card-body">
                {{-- @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif --}}
                <form method="POST" action="{{ route('contact.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- <label for="name">Имя</label>
                        <input type="text" name="имя" class="form-control"/> --}}
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" name="phone">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- <label for="phone">Телефон</label>
                        <input type="text" name="телефон" class="form-control"/> --}}
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        {{-- <label for="email">Email</label>
                        <input type="text" name="email" class="form-control"/> --}}
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control textarea @error('message') is-invalid @enderror" placeholder="Message" name="message"></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        {{-- <label for="message">Сообщение</label>
                        <textarea name="message" id="message" class="form-control"></textarea> --}}
                        {{-- <input type="text" name="сообщение" class="form-control" required/> --}}
                    </div>
                    <div class="row">
                            <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Send</button>
                            </div>
                        </div>
                    {{-- <input type="submit" class="btn btn-primary float-right"/> --}}
                </form>
                {{-- @if($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                    @endforeach
                </div>
                @endif --}}
                {{-- @if(session()->has("message"))
                <div class="alert alert-success">
                    {{ session()->get("message") }}
                </div>
                @endif --}}
            </div>
        </div>
    </div>
</div>
</section>
@endsection
