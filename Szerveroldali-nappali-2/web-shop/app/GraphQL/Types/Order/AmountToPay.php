<?php declare(strict_types=1);

namespace App\GraphQL\Types\Order;
use App\Models\Order;

final readonly class AmountToPay
{
    /** @param  array{}  $args */
    public function __invoke(Order $_, array $args)
    {
        return $_ -> products -> pluck('price') -> sum();
    }
}
