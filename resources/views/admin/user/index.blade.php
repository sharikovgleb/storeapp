@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <h2>Users</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Order count</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>is_active</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td>{{$user->is_active}}</td>
                            <td>
                                <form onsubmit="if(confirm('Delete?')){return true}else{return false}"
                                      action="{{route('admin.user.destroy', $user)}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}
                                    <a  href="{{route('admin.user.edit', $user)}}"><i class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection