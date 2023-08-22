<?php

namespace App\Repositories\User;

use App\Enums\UserRole;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getAllWithOrderAndPaginate($orderBy, $limit, $page)
    {
        return $this->model->orderBy($orderBy)
            ->paginate($limit ?? config('app.pagination.per_page'), ['*'], 'page', $page ?? 1);
    }

    public function getProductOfUser($user, $role, $order)
    {
        $user->load('products');
        if ($role === UserRole::ROLE_ADMIN) {
            $user->products()
                ->where('number_in_stock', '>', '-1')
                ->orderBy('id', $order);
        } else {
            $user->products()
                ->where('number_in_stock', '>', '-1')
                ->where('salesman_id', $user->id)
                ->orderBy('id', $order);
        }

        return $user->products;
    }

    public function delete($user)
    {
        DB::transaction(function () use ($user) {
            $user->load('products.orderItems.order');
            $user->load('products.cartItems');
            $user->load('contacts');
            $user->load('orders.orderItems');

            $user->contacts()->delete();
            foreach ($user->orders as $order) {
                $order->orderItems()->delete();
                $order->delete();
            }

            foreach ($user->products as $product) {
                foreach ($product->orderItems as $orderItem) {
                    if ($orderItem->order) {
                        $orderItem->order()->delete();
                    }
                }
                $product->categories()->detach();
                $product->orderItems()->delete();
                $product->cartItems()->delete();
            }
            $user->products()->delete();
            $user->delete();
        });
    }
}
