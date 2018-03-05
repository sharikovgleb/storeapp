@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <form method="post" action="{{route('admin.user.update', $user)}}" >
            <div class="form-group">
                <input type="hidden" name="_method" value="put">
                @include('admin.user.form')
            </div>

            <input type="submit" class="btn btn-primary" value = "Submit">
        </form>
    </div>
@endsection