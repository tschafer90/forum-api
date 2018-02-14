<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract as BaseTransformer;
use Carbon\Carbon;

class UserTransformer extends BaseTransformer
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'threads',
        'comments',
    ];
    
    /**
     * @var array
     */
    protected $defaultIncludes = [];
    
    public function transform(User $user)
    {
        $return = [
            'id' => (int) $user->id,
            'name' => (string) $user->name,
            'email' => (string) $user->email,
            'password' => (string) $user->password,
            'avatar' => (string) $user->avatar,
            'remember_token' => (string) $user->remember_token,
            'created_at' => Carbon::parse($user->created_at)->toAtomString(),
            'updated_at' => Carbon::parse($user->updated_at)->toAtomString(),
        ];
        
        return $return;
    }
    
    /**
     * @param User $user
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeThreads(User $user)
    {
        return $this->collection($user->threads, new ThreadTransformer);
    }
    
    /**
     * @param User $user
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeComments(User $user)
    {
        return $this->collection($user->comments, new CommentTransformer);
    }
}