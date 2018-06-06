<?php

namespace App\GraphQL\Type;

use App\Model\User as UserModel;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => UserModel::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The ID of the user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The display name of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of the user',
            ],
            'foo' => [
                'type' => Type::string(),
                'description' => 'Test',
                'selectable' => false,
            ],
        ];
    }

    protected function resolveFooField($root, $args)
    {
        return 'bar';
    }
}
