<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


// to enforce this policy to the desired controller methods you need to authorizeResource(User::class, 'user') the second argument is api route without the api in the controller class
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user hasPermissionTo view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        // dd($user->hasPermissionTo('user_index'));
        return $user->hasPermissionTo('user_index');
    }

    /**
     * Determine whether the user hasPermissionTo view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        //
        // dd($user->hasPermissionTo('user_show'));
        return ($user->hasPermissionTo('user_show')) && ($user->id === $model->id);
    }

    /**
     * Determine whether the user hasPermissionTo create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        // dd($user->hasPermissionTo('user_store'));
        return $user->hasPermissionTo('user_store');
    }

    /**
     * Determine whether the user hasPermissionTo update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        //
        // dd($user->hasPermissionTo('user_update'));

        // user can update themself only
        if ($user->id !== $model->id) {
            // admin can overwrite
            if ($user->hasRole('admin')) {
                return true;
            }
            return false;
        }
        return $user->hasPermissionTo('user_update');
    }

    /**
     * Determine whether the user hasPermissionTo delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        //
        // dd($user->hasPermissionTo('user_destroy'));
        return $user->hasPermissionTo('user_destroy');
    }

    /**
     * Determine whether the user hasPermissionTo restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user hasPermissionTo permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
