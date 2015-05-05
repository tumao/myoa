@extend('default.main')
@section('content')
<script src="/default/app/js/group.js"></script>
<div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><a href="#" onclick="User.form()"><i class="glyphicon glyphicon-plus-sign"></i>添加</a></h2>
    </div>
    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>组名称</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groups as $group)
                <tr id='row_{{$user->id}}'>
                    <td>{{$group->id}}</td>
                    <td>{{$group->name}}</td>
                    <td><span class="label-warning label label-default">{{$group->permissions}}</span></td>
                    <td class="center">
                        <a class="btn btn-warning" href="#" onclick="">
                            <i class="glyphicon glyphicon-qrcode icon-white"></i>
                            重置密码
                        </a>
                        
                        <a class="btn btn-info" href="#" onclick="">
                            <i class="glyphicon glyphicon-edit icon-white"></i>
                            编辑
                        </a>
                        <a class="btn btn-danger" href="#" onclick="">
                            <i class="glyphicon glyphicon-trash icon-white"></i>
                            删除
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop