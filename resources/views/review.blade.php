@extends('layouts.new-master')

@section('title', __('review'))

@section('content')
<h2>Оставьте отзыв к товару</h2>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="product-rating">
                        {{-- @php
                            $avgrating = 0;
                        @endphp --}}
                        <i class="fa fa-star" aria-bidden>Плохой</i>
                        <i class="fa fa-star" aria-bidden>Так себе</i>
                        <i class="fa fa-star" aria-bidden>Нормальный</i>
                        <i class="fa fa-star" aria-bidden>Хороший </i>
                        <i class="fa fa-star" aria-bidden>Отличный</i>
                    </div><br>
                    <div class="form__row"><label class="form__label" for="dostoinstva"> Достоинства </label>
                        <input _size_medium="" formcontrolname="dignity" id="dostoinstva" name="dignity" type="text" class="ng-pristine ng-valid ng-touched"></div>
                    <div class="form__row"><label class="form__label" for="nedostatki"> Недостатки </label>
                        <input _size_medium="" formcontrolname="shortcomings" id="nedostatki" name="shortcomings" type="text" class="ng-untouched ng-pristine ng-valid"></div>
                        <div class="form__row"><label class="form__label" for="comment-text"> Комментарий </label><br>
                            <textarea formcontrolname="text" id="comment-text" name="text" required="" rows="5" class="ng-untouched ng-pristine ng-invalid"></textarea><!----></div>
                            <button type="submit" class="btn btn-primary">Подтвердите отзыв</button>
                    </div>
                    {{-- @if ($verified_purchase->count() > 0)
                    <h4>You are writing a review for {{ $product->name }}</h4>
                    <form action="" class="" method="POST">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review" id=""></textarea>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h4>You are not eligible to review this product</h4>
                        <p>
                            For the trustworthiness of the reviews, only customers who purchased
                            the product can write a review about the product.
                        </p>
                        <a href="{{url('/') }}" class="btn btn-primary">Go to main page</a>
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <h2 class="product-name">{{ $product->name }}</h2>
<div class="short-product-desc">
    {!! $product->short_product_description !!}
</div> --}}
<div class="wrap-social">
    <a href="#" class="link-social">
        <img src="#" alt="" class="">
    </a>
</div>

{{-- <div class="form__row"><label class="form__label" for="dostoinstva"> Достоинства </label>
    <input _size_medium="" formcontrolname="dignity" id="dostoinstva" name="dignity" type="text" class="ng-pristine ng-valid ng-touched"></div>
<div class="form__row"><label class="form__label" for="nedostatki"> Недостатки </label>
    <input _size_medium="" formcontrolname="shortcomings" id="nedostatki" name="shortcomings" type="text" class="ng-untouched ng-pristine ng-valid"></div>
    <div class="form__row"><label class="form__label" for="comment-text"> Комментарий </label><br>
        <textarea formcontrolname="text" id="comment-text" name="text" required="" rows="5" class="ng-untouched ng-pristine ng-invalid"></textarea><!----></div>
        <button type="submit" class="btn btn-primary">Подтвердите отзыв</button>
</div> --}}
@endsection
