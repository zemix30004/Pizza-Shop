@extends('layouts.new-master')

@section('title', __('review'))

@section('content')
<h2>Оставьте отзыв к товару</h2>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('review.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
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
                    <div class="form-group">
                        <label for="user_id">User_id</label>
                        <input type="text" class="form-control @error('user_id') is-invalid @enderror" placeholder="User_id" name="user_id">
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_id">Product_id</label>
                        <input type="text" class="form-control @error('product_id') is-invalid @enderror" placeholder="Product_id" name="product_id">
                        @error('product_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                            <label for="rating">Rating</label>
                            <input type="text" class="form-control @error('rating') is-invalid @enderror" placeholder="Rating" name="rating">
                            @error('rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dignity">Dignity</label>
                            <input type="text" class="form-control @error('dignity') is-invalid @enderror" placeholder="Dignity" name="dignity">
                            @error('dignity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="flaw">Flaw</label>
                            <input type="text" class="form-control @error('flaw') is-invalid @enderror" placeholder="Flaw" name="flaw">
                            @error('flaw')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control textarea @error('comment') is-invalid @enderror" placeholder="Comment" name="comment"></textarea>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">Подтвердите отзыв</button>
                            </div>
                        </div>
                    {{-- <input type="submit" class="btn btn-primary float-right"/> --}}

                    {{-- <div class="form__row"><label class="form__label" for="dostoinstva"> Достоинства </label>
                        <input _size_medium="" formcontrolname="dignity" id="dostoinstva" name="dignity" type="text" class="ng-pristine ng-valid ng-touched"></div>
                    <div class="form__row"><label class="form__label" for="nedostatki"> Недостатки </label>
                        <input _size_medium="" formcontrolname="shortcomings" id="nedostatki" name="shortcomings" type="text" class="ng-untouched ng-pristine ng-valid"></div>
                        <div class="form__row"><label class="form__label" for="comment-text"> Комментарий </label><br>
                            <textarea formcontrolname="text" id="comment-text" name="text" required="" rows="5" class="ng-untouched ng-pristine ng-invalid"></textarea><!----></div>
                            <button type="submit" class="btn btn-primary">Подтвердите отзыв</button>
                    </div> --}}

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
                </form>
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
