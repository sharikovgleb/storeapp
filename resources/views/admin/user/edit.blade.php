@extends('layouts.app_admin')

@section('content')
    <form class="form-horizontal" method="post" action="{{route('admin.category.update', $category)}}" >
        <input type="hidden" name="_method" value="put">
        @include('admin.category.form')
    </form>
@endsection