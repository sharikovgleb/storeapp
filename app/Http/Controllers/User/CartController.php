<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('cart.index', [
            'user' => $user,
            'basket' => $user->basket,
        ]);
    }

    public function add($item_id, $quantity = 1)
    {
        $user = Auth::user();

        if(!$user->itemInBasket($item_id)){
            $user->basket()->attach($item_id, ['quantity' => $quantity]);
            $user->save();
        }

        return back();
    }

    public function delete($item_id)
    {
        $user = Auth::user();

        if($user->itemInBasket($item_id)){
            $user->basket()->detach($item_id);
            $user->save();
        }

        return redirect()->route('cart.index');
    }

    public function setItemQuantity($item_id, $quantity)
    {
        $user = Auth::user();

        if($user->itemInBasket($item_id)){
            $user->setBasketItemQuantity($item_id, $quantity);
            $user->save();
        }


    }

    public function increase($item_id)
    {
        $user = Auth::user();
        $current = $user->getBasketItemQuantity($item_id);
        $user->setBasketItemQuantity($item_id, ($current + 1));

        return redirect()->route('cart.index');
    }

    public function decrease($item_id)
    {
        $user = Auth::user();
        $current = $user->getBasketItemQuantity($item_id);

        if($current > 1)
            $user->setBasketItemQuantity($item_id, ($current - 1));
        else
            $this->delete($item_id);

        return redirect()->route('cart.index');
    }
}
