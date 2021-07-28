<?php

namespace App\Http\GraphQL\Queries;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use App\Exceptions\NotFoundException;

class UserQuery
{
    public function getSingleUser($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = User::where('id', $args['id'])->first();
        if (!$user) {
            throw new NotFoundException(
                'Page Not Found',
                'The user with this id does not exist.'
            );
        }
        return $user;
    }
}
