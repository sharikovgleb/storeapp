@extends('layouts.app_admin')

@section('content')
   <div class="container">
       <form class="form-horizontal" method="post" action="{{route('admin.item.update', $item)}}" >
           <input type="hidden" name="_method" value="put">
           @include('admin.item.form')
       </form>
   </div>
@endsection