<?php

namespace App\GraphQL\Type;

use App\Model\Post as PostModel;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Post',
        'description' => 'A post',
        'model' => PostModel::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The ID of the post',
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'The post title',
            ],
            'content' => [
                'type' => Type::string(),
                'description' => 'The post content',
            ],
        ];
    }
}
