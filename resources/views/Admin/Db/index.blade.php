<table border="1px" width="400px">
	<tr>
		<th>ID</th>
		<th>名字</th>
		<th>年龄</th>
		<th>班级</th>


	</tr>
	@foreach($page as $row)
	<tr>
		<td>{{$row->id}}</td>
		<td>{{$row->name}}</td>
		<td>{{$row->age}}</td>
		<td>{{$row->class}}</td>

	</tr>
	@endforeach


</table>
{{$page->render()}}