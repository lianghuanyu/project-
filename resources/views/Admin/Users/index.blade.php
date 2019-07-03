@extends("Admin.AdminPublic.publics");
@section("main")
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8">  
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>搜索: <input type="text" aria-controls="DataTables_Table_1" name="keyword" value="{{$request['keyword'] or ''}}"/>邮箱:<input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}"/></label>
		<input type="submit" class="btn btn-success" value="搜索">
     </div>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 141px;">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 192px;">名字</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 178px;">邮箱</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 120px;">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 87px;">电话</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 87px;">创建时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 87px;">更新时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 87px;">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      	@foreach ($data as $row )
       <tr class="odd"> 
        <td id="sx" class="  sorting_1">{{$row->id}}</td> 
        <td id="sx" class=" ">{{$row->username}}</td> 
        <td id="sx" class=" ">{{$row->email}}</td> 
        <td id="sx" class=" ">{{$row->status}}</td> 
        <td id="sx" class=" ">{{$row->phone}}</td> 
        <td id="sx" class=" ">{{$row->created_at}}</td> 
        <td id="sx" class=" ">{{$row->updated_at}}</td> 
        <td id="sx" class=" ">
	        <form action="adminusers/{{$row->id}}" method="post">
	        	<button type="submit" class="btn btn-success" onclick="del()">删除</button>
	        	{{method_field("DELETE")}}
	        	{{csrf_field()}}
	        </form>
	        <a href="/adminusers/{{$row->id}}/edit" class="btn btn-success">修改</a>
          <a href="/adminusers/{{$row->id}}" class="btn btn-success">会员详情</a>
          <a href="/adminaddress/{{$row->id}}" class="btn btn-success">会员收货地址</a>
    	</td> 
       </tr>
       @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="pages">
      {{$data->appends($request)->render()}}
     </div>
    </div> 
   </div> 
  </div>
 </body>
 <script type="text/javascript">
//     var ajax =  new  XMLHttpRequest();
//   ajax.open('get','./ajax.php',true);
//   ajax.send();
//   ajax.onreadystatechange = function(){
//    if(ajax.readyState==4 && ajax.status  == 200){
//      var result = ajax.responseText;
//      alert(result);
//    }
// }
  function del(){
    // alert(1);
    var sx=document.ElementById("sx");
    alert(sx);
  }
 </script>
</html>
@endsection
@section("title","用户列表")