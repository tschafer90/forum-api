<?php

namespace App\Transformers;

use App\Models\Thread;
use League\Fractal\TransformerAbstract as BaseTransformer;
use Carbon\Carbon;

class ThreadTransformer extends BaseTransformer
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'user',
        'category',
        'comments',
        'mostRecentComment',
    ];
    
    /**
     * @var array
     */
    protected $defaultIncludes = [];
    
    /**
     * @param Thread $thread
     *
     * @return array
     */
    public function transform(Thread $thread)
    {
        $return = [
            'id' => (int) $thread->id,
            'user_id' => (int) $thread->user_id,
            'category_id' => (int) $thread->category_id,
            'title' => (string) $thread->title,
            'body' => (string) $thread->body,
            'created_at' => Carbon::parse($thread->created_at)->toAtomString(),
            'updated_at' => Carbon::parse($thread->updated_at)->toAtomString(),
            'comment_count' => (int) $thread->commentCount,
            'date_diff' => (string) $thread->dateDiff
        ];
        
        return $return;
    }
    
    /**
     * @param Thread $thread
     *
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeUser(Thread $thread)
    {
        return (is_null($thread->user)) ? null : $this->item($thread->user, new UserTransformer);
    }
    
    /**
     * @param Thread $thread
     *
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeCategory(Thread $thread)
    {
        return (is_null($thread->category)) ? null : $this->item($thread->category, new CategoryTransformer);
    }
    
    /**
     * @param Thread $thread
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeComments(Thread $thread)
    {
        return $this->collection($thread->comments, new CommentTransformer);
    }
    
    public function includeMostRecentComment(Thread $thread)
    {
        return (is_null($thread->comments)) ? null : $this->item($thread->comments->sortByDesc('created_at')->first(), new CommentTransformer);
    }
}