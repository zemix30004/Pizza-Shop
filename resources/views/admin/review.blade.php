
@extends('layouts.admin')

@section('title', 'admin.review')

	@section('content')
		<div class="col-md-12">
			<h2>Все отзывы</h2>
			<table class="table">
			<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Пользователь
						</th>
						<th>
							Продукт
						</th>
						<th>
							Рейтинг
						</th>
						<th>
							Достоинства
						</th>
						<th>
							Недостатки
						</th>
                        <th>
							Комментарий
						</th>
						<th>
							Created_at
						</th>
						<th>
							Updated_at
						</th>
					</tr>
					</thead>
					@foreach($reviews as $review)
						<tr>
							<td>{{ $review->id }}</td>
							<td>{{ $review->user_id}}</td>
							<td>{{ $review->product_id}}</td>
							<td>{{ $review->rating }}</td>
                            <td>{{ $review->dignity }}</td>
                            <td>{{ $review->flaw}}</td>
                            <td>{{ $review->comment}}</td>
							<td>{{ $review->created_at }}</td>
							<td>{{ $review->updated_at }}</td>
						</tr>
					@endforeach
					</tbody>
			</table>
		</div>
        {{-- {!! $reviews->render() !!} --}}
		{{ $reviews->links() }}
	@endsection
