@extends('layouts.app_admin')

@section('content')
    <div class="container">
        <h3>Edit order number  {{$order->id}}</h3>
        <form method="post" action="{{route('admin.order.update', $order)}}" >
            <div class="form-group">
                @csrf
                <input type="hidden" name="_method" value="put">
                <label for="status"> Status</label>
                <select name="status" class="form-control" required>
                    <option value="closed">Closed</option>
                    <option value="canceled">Canceled</option>
                    <option value="active">Active</option>
                </select>
            </div>

            <input type="submit" class="btn btn-primary" value = "Submit">
        </form>
    </div>
@endsection