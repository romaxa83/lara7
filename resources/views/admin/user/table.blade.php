<table class="table table-head-fixed">
    <thead>
    <tr>
        <th>ID</th>
        <th>Full name</th>
        <th>Email</th>
        <th>Last Login</th>
        <th>Created</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->full_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>
                {{$user->last_login_at->diffForHumans()}}
                <span class="text-xs text-gray-400">
                    ({{ $user->last_login_ip_address }})
                </span>
            </td>
            <td>
{{--                <a href="{{route('admin.user.edit',['id' => $user->id])}}"><i class="fas fa-user-edit"></i></a>--}}
{{--                <a href="{{route('admin.user',['id' => $user->id])}}"><i class="far fa-eye"></i></a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
