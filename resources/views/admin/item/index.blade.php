@extends('layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h2>Items @isset($category) in $category->title @endisset</h2><a href="{{route('admin.item.create')}}" class="btn">Create new item</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($items as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->category->title}}</td>
                            <td>


                                <form onsubmit="if(confirm('Delete?')){return true}else{return false}" action="{{route('admin.item.destroy', $item)}}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}
                                    <a  href="{{route('admin.item.edit', $item)}}"><i class="fa fa-edit"></i></a>
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