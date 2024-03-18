<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(Customer $customer): Response
    {
        return $customer->creditLimit < 10000
                ? Response::allow()
                : Response::deny('Your credit limit is very high');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Customer $customer, Order $order): Response
    {
        return $customer->country === 'USA'
        ? Response::allow()
        : Response::deny('You are not from USA');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Customer $customer, Order $order): Response
    {
        return $customer->country === 'USA'
        ? Response::allow()
        : Response::deny('You are not from USA');
    }
}
