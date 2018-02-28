@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h2>Categories</h2><a href="{{route('admin.category.create')}}" class="btn">Create new category</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Item count</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->title}}</td>
                            <td>{{count($category->items)}}</td>
                            <td>


                                <form onsubmit="if(confirm('Delete?')){return true}else{return false}" action="{{route('admin.category.destroy', $category)}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}
                                    <a  href="{{route('admin.category.edit', $category)}}"><i class="fa fa-edit"></i></a>
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