@extends('layouts.new-master')

@section('title', __('viewproduct'))

@section('content')
<div role="tabpanel" class="tab-pane fade" id="profile">
<h2>Reviews</h2>
@foreach($reviews as $data)
<div class="panel panel-default">
    <div class="panel-body">
        <h4>{{ $data->user['name'] }}</h4>
        <p>{{ $data->ulasan }}</p>
        <h3>{{ $data->rating }}</h3>
    </div>
</div>
@endforeach
@if(Auth::user() && Auth::user()->id == $show->order['user_id'])
@if($errors->any())
<div class="alert alert-warning">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
//form for review (I cut the code)
@endif
</div>
{{-- @if($product->currentUserHasSubmittedReview() == false)

 <!-- REVIEW CODE -->

@endif --}}
@endsection

