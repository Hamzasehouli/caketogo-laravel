<?php

namespace App\Policies;

use App\Models\Cake;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CakePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function index(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Cake $cake)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Cake $cake)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Cake $cake)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Cake $cake)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Cake $cake)
    {

    }
}
