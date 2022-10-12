@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width:20px;"></th>
            <th style="width:20px;"></th>
        </tr>
        </thead>
        <tbody>
        {!! \App\Helpers\Helper::product($products) !!}
        </tbody>
    </table>
@endsection
