@extends('layouts.app_admin')

@section('content')
    <form class="form-horizontal" method="post" action="{{route('admin.category.store')}}" >
        @include('admin.category.form')
    </form>
@endsection