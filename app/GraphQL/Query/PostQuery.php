<?php

namespace App\GraphQL\Query;

use App\Model\Post;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class PostQuery extends Query
{
    protected $attributes = [
        'name' => 'Posts query',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('post'));
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields)
    {
        $with = $fields->getRelations();

        if (isset($args['id'])) {
            return Post::with($with)->where('id', $args['id'])->get();
        } else {
            return Post::with($with)->get();
        }
    }
}
