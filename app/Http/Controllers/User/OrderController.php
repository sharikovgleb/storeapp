<?php

namespace App\Http\Controllers\User;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->orderby('created_at', 'desc')->get();

        return view('order.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        // attach() делает обращение к базе на каждой итерации.
        // Не знаю как сделать иначе
        // чтобы сохранялось и количество товаров 8====D

        if(count($user->basket))
        {
            $order = new Order(['user_id' => $user->id, 'status' => 'active']);
            $order->save();

            foreach ($user->basket as $item)
            {
                $order->items()->attach($item, ['quantity' => $item->pivot->quantity]);
            }

            $user->basket()->detach();
        }

        return redirect()->route('order.index');
    }

    public function destroy(Order $order)
    {
        $order->items()->detach();
        $order->delete();

        return redirect()->route('admin.order.index');
    }



}
