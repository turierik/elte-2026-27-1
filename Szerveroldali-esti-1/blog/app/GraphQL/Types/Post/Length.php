<?php declare(strict_types=1);

namespace App\GraphQL\Types\Post;

use App\Models\Post;

final readonly class Length
{
    /** @param  array{}  $args */
    public function __invoke(Post $_, array $args)
    {
        return mb_strlen($_ -> content);
    }
}
