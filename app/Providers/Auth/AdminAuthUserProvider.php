<?php
/**
 * @author 迁迁
 * @E-Mail 521287718@qq.com
 * Date: 2015-07-03 14:44
 */

namespace App\Providers\Auth;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;


class AdminAuthUserProvider implements UserProvider
{


    public function __construct(HasherContract $hasher)
    {

        $this->model  = config('auth.admin');
        $this->hasher = $hasher;
    }


    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {

        return $this->createModel()->newQuery()->find($identifier);
    }


    /**
     * Create a new instance of the model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createModel()
    {

        $class = '\\'.ltrim($this->model, '\\');

        return new $class;
    }


    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string $token
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {

        $model = $this->createModel();

        return $model->newQuery()->where($model->getKeyName(), $identifier)->where($model->getRememberTokenName(),
            $token)->first();
    }


    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  string                                     $token
     *
     * @return void
     */
    public function updateRememberToken(UserContract $user, $token)
    {

        $user->setRememberToken($token);

        $user->save();
    }


    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->createModel()->newQuery();

        foreach ($credentials as $key => $value) {
            if ($key != 'admin_pass') {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }


    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array                                      $credentials
     *
     * @return bool
     */
    public function validateCredentials(UserContract $user, array $credentials)
    {

        $plain = $credentials['admin_pass'];
        return $this->hasher->check($plain, $user->getAuthPassword());
    }
}