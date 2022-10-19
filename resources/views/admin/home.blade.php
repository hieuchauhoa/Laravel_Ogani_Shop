@extends('admin.main')
@section('content')
    <span class="username">
                    <?php
                    $username = Session::get('admin_name');
                    if($username){
                        echo 'Xin chào '.$username;
                    }
                    ?>
                </span>
    </a>
@endsection
