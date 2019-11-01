
<form method="post" action="{{route('customer.destroy',$customer->id)}}">
	@method('delete')
	@csrf
	<button type="submit" class="btn btn-danger delete-btn">Reject</button>
</form>
	