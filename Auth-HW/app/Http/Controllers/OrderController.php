<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $this->authorize('create', Order::class);
        return "You can create the order";
    }
    public function edit(Request $request, Order $order)
    {
        Gate::authorize('update', $order);
        return "You can edit the order";
    }
    public function delete(Request $request, Order $order)
    {
        Gate::authorize('delete', $order);
        return "You can delete the order";
    }
}
