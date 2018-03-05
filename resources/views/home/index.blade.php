@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Categories</h2>

            <ul>
            @forelse($categories as $category)
            <li><a href="{{route('home.showInCategory', $category)}}">{{$category->title}}</a></li>
            @empty
                there is no categories
            @endforelse
            </ul>

        <hr/>
        <h2>Items @isset($current_category) in {{$current_category->title}} @endisset</h2>
        <table class="table table-striped">
            <tbody>
            @forelse($items as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->category->title or ""}}</td>
                    <td>
                        <a href="{{route('cart.add', ['item_id'=>$item->id, 'quantity'=>1])}}"> <i class="fa fa-plus-square"></i> Add to card </a>
                    </td>
                </tr>

            @empty

            @endforelse

            </tbody>
        </table>

    </div>
@endsection