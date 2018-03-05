@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <form class="form-horizontal" method="post" action="{{route('admin.item.store')}}" >
            @include('admin.item.form')
        </form>
    </div>
@endsection