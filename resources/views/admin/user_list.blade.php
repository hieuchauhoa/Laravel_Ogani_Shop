@extends('admin.main')

@section('content')
    <div>
        <form class="form-inline">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Active</th>
            <th>Level</th>
            <th>Update</th>
            <th style="width:20px;"></th>
            <th style="width:20px;"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{!! \App\Helpers\Helper::active($user->status) !!}</td>
                <td>{!! \App\Helpers\Helper::level($user->level) !!}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="user_edit/{{ $user->id }}"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a class="btn btn-danger btn-sm" href="" onclick="removeRow( {{$user->id }}, 'user_destroy')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
