@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!<br>
					<a href="pokerhand">View Pokerhands</a><br>
					<a href="pokerhand/create">Add new poker hand</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
