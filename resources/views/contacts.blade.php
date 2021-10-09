@extends('layouts.new-master')

@section('title', __('contacts'))

@section('content')

<section class="py-5 text-center container">
<h2>@lang('main.contacts')</h2>
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


<form method="POST" class="feedback"><h3 class="feedback__title">
Напишите нам и мы с вами свяжемся
</h3> <div class="feedback__row"><div class="modal-input feedback__input">
    <label for="feedback-name" class="require-field">Имя</label>
    <div class="v_input_field"><input id="feedback-name" data-input="name" name="name" placeholder="" title="Имя" spellcheck="false" type="text" class="input-text"></div> <!----></div></div>
    <div class="feedback__row"></label> <div class="feedback__phone-email"><div class="feedback__phone-email-select"><span class="feedback__phone-email-name"><br></ul></div>
        <div class="modal-input feedback__phone-email-component feedback__email"><label for="feedback-email" class="require-field">Почта</label> <div class="v_input_field"><input id="feedback-email" data-input="email" name="email" placeholder="example@example.com" title="Почта" spellcheck="false" type="text" class="input-text"></div> <!----></div></div></div><br>
        <div class="feedback__row"><div class="feedback__subject"><span class="feedback__subject-name"><h3>Выберите тему сообщения</h3>
  </span> <ul data-subject-list="" class="feedback__subject-list"><li data-subjec-id="2" class="feedback__subject-item">Вопрос о заказе</li><li data-subjec-id="3" class="feedback__subject-item">Вопрос о сервисе</li><li data-subjec-id="4" class="feedback__subject-item">Хочу обменять товар</li><li data-subjec-id="5" class="feedback__subject-item">Вопрос по кредитам</li><li data-subjec-id="6" class="feedback__subject-item">Вопрос о безналичном расчете</li><li data-subjec-id="7" class="feedback__subject-item">Вопрос по поводу акций</li><li data-subjec-id="8" class="feedback__subject-item">Жалобы и предложения</li><li data-subjec-id="9" class="feedback__subject-item">Другие вопросы</li><li data-subjec-id="10" class="feedback__subject-item">Вопрос о сотрудничестве</li><li data-subjec-id="11" class="feedback__subject-item">Сообщить об ошибке</li></ul></div></div> <!----> <div class="feedback__row"><div class="modal-input feedback__message"><label for="feedback-message" class="require-field">Сообщения</label> <div class="v_input_field"><textarea id="feedback-message" data-input="message" name="message" title="Повідомлення" spellcheck="false" class="textarea-text"></textarea></div> <!----></div></div> <button type="submit" data-feedback-submit="" class="feedback__submit-button">
Прислать
</button>
</form>
</div>
</section>

@endsection
