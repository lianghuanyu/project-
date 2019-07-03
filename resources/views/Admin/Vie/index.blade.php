<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>模板</title>
</head>
<body>
<h2>这是模板</h2>
<h2>{{$a}}</h2>
<h2>显示HTML代码{!!$c!!}</h2>
<h2>函数解析{{time()}}</h2>
<h2>设置默认值{{$username or 'hahaha'}}</h2>
<h3>流程控制</h3>
@if($c==10)
车晓
@elseif($c>10)
胡歌
@else
迪丽热巴
@endif

<h4>循环控制</h4>
@for($i=1;$i<=100;$i++)
{{$i}}
@endfor

<h1>一维数组的获取</h1>
{{$arr1['name']}}{{$arr1['age']}}
<h2>二维数组的遍历</h2>
<table border="1px" width="400px">
	<tr>
		<th>名字</th>
		<th>年龄</th>

	</tr>
	@foreach($arr2 as $row)
	<tr>
		<td>{{$row['name']}}</td>
		<td>{{$row['age']}}</td>

	</tr>
	@endforeach
</table>
</body>
</html>