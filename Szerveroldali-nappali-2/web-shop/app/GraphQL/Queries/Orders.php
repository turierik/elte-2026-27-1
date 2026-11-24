<?php declare(strict_types=1);

namespace App\GraphQL\Queries;
use App\Models\Order;

final readonly class Orders
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        return Order::all();
    }
}
