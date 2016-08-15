@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>List Of All tasks</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="cart-table cart-table-full table-responsive">
						@if(empty($tasks))
							No task is available!
						@else
							<table class='table'>
								<thead>
									<tr>
										<th class='col-product-name'>ID</th>
										<th class='col-product-price'>Title</th>
										<th class='col-product-quantity'>Edit</th>
										<th class='col-product-equal'>Delete</th>
									</tr>
								</thead>
								<tbody>
									@foreach($tasks as $index=>$task)
										<tr>
											<td>
												<a href="{{ url('task/detail/'.$task['id']) }}" class="link__order-detail"> {{$task->id}} </a>
											</td>
											<td> {{$task['title']}} </td>
											<td> <a href="{{ url('task/edit/'.$task['id']) }}" class="link__order-detail"> Edit </a> </td>
											<td> <a href="{{ url('task/delete/'.$task['id']) }}" class="link__order-detail"> Delete </a></td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@endif	
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection