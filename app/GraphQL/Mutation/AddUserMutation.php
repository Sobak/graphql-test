<?php

namespace App\GraphQL\Mutation;

use App\Model\User;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class AddUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'addUser',
        'description' => 'Mutation to add single user',
    ];

    public function args()
    {
        return [
            'name' => ['type' => Type::nonNull(Type::string())],
            'email' => ['type' => Type::nonNull(Type::string())],
            'password' => ['type' => Type::nonNull(Type::string())],
        ];
    }

    public function type()
    {
        return GraphQL::type('user');
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        return User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => $args['password'],
        ]);
    }
}
