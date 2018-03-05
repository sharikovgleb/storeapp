@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Your orders</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Status</th>
                <th scope="col">Total price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->status}}</td>
                    <td>
                        <?php
                        $total = 0;

                        foreach($order->items as $item)
                        {
                            $total += $item->price * $item->pivot->quantity;
                        }
                                echo $total;
                        ?>
                    </td>
                    <td>
                        <form onsubmit="if(confirm('Delete?')){return true}else{return false}"
                              action="{{route('admin.order.destroy', $order)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>

            @empty

            @endforelse

            </tbody>
        </table>

    </div>
@endsection