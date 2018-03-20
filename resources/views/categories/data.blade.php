			<div class="data">
				<h1>Categories</h1>
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>