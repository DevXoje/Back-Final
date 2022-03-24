<?php

namespace App\Policies;

use App\Infrastructure\Persistance\Auth\AuthEloquent;
use App\Models\Cart;
use Illuminate\Auth\Access\HandlesAuthorization;

class CartPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Infrastructure\Persistance\Auth\AuthEloquent  $authEloquent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(AuthEloquent $authEloquent)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Infrastructure\Persistance\Auth\AuthEloquent  $authEloquent
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(AuthEloquent $authEloquent, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Infrastructure\Persistance\Auth\AuthEloquent  $authEloquent
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(AuthEloquent $authEloquent)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Infrastructure\Persistance\Auth\AuthEloquent  $authEloquent
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(AuthEloquent $authEloquent, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Infrastructure\Persistance\Auth\AuthEloquent  $authEloquent
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(AuthEloquent $authEloquent, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Infrastructure\Persistance\Auth\AuthEloquent  $authEloquent
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(AuthEloquent $authEloquent, Cart $cart)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Infrastructure\Persistance\Auth\AuthEloquent  $authEloquent
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(AuthEloquent $authEloquent, Cart $cart)
    {
        //
    }
}