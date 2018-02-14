<?php

namespace App\Transformers;

use App\Models\Comment;
use League\Fractal\TransformerAbstract as BaseTransformer;
use Carbon\Carbon;

class CommentTransformer extends BaseTransformer
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'thread',
        'user',
    ];
    
    /**
     * @var array
     */
    protected $defaultIncludes = [];
    
    public function transform(Comment $comment)
    {
        $return = [
            'id' => (int) $comment->id,
            'thread_id' => (int) $comment->thread_id,
            'user_id' => (int) $comment->user_id,
            'body' => (string) $comment->body,
            'created_at' => Carbon::parse($comment->created_at)->toAtomString(),
            'updated_at' => Carbon::parse($comment->updated_at)->toAtomString(),
            'date_diff' => (string) $comment->dateDiff,
        ];
        
        return $return;
    }
    
    /**
     * @param Comment $comment
     *
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeThread(Comment $comment)
    {
        return (is_null($comment->thread)) ? null : $this->item($comment->thread, new ThreadTransformer);
    }
    
    /**
     * @param Comment $comment
     *
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeUser(Comment $comment)
    {
        return (is_null($comment->user)) ? null : $this->item($comment->user, new UserTransformer);
    }
}