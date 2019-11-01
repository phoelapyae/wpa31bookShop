<div class="btn-group text-center" >
	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
		<i class="fas fa-cogs icon icon-danger"></i> <span class="caret bg-danger"></span>
	</button>
	<ul class="dropdown-menu" role="menu">
		<li>
			<a href="" class="btn btn-default dropdown-item ">
				<i class="far fa-edit"></i> edit
			</a>
		</li>
		<li>
			<form method="post" action="{{route('orders.destroy', $order->id)}}">
				@method('delete')
				@csrf
				<button type="submit" class="btn btn-default dropdown-item delete-btn">
					<i class="far fa-trash-alt"></i> Reject Order
				</button>
			</form>
		</li>
	</ul>
</div>