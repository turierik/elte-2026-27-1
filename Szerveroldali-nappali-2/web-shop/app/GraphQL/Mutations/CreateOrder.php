<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

final readonly class CreateOrder
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $validated = Validator::make([
            "user_id" => $args["input"]["user_id"],
            "status" => $args["input"]["status"]
        ], [
            "user_id" => "required|integer|exists:users,id",
            "status" => "required|string|in:created,paid,shipped,arrived"
        ]) -> validate();
        $order = Order::create($validated);
        return $order;
    }
}
