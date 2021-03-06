<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function getAllUsers(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    public function getActives(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function show(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function addUserView(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }
    public function store(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateView(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }
    public function update(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deactivate(User $user)
    {
        return $user->role === 'admin' ? Response::allow() : Response::deny('You are not allowed to perform this task');
    }

}
