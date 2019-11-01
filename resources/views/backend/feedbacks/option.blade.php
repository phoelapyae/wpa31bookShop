<form method="post" action="{{route('feedback.destroy',$feedback->id)}}">
	@method('delete')
	@csrf
	<button type="submit" class="btn btn-default dropdown-item delete-btn">
		<i class="far fa-trash-alt"></i>
	</button>
</form>
