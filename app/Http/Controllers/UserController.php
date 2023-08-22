<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    const DEFAULT_LIMIT = 10;
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware(['auth', 'checkAdmin'], ['only' => ['index', 'create', 'store']]);
        $this->userRepo = $userRepository;
    }

    public function index(Request $request)
    {
        $page = $request->input('page');
        $users = $this->userRepo->getAllWithOrderAndPaginate('created_at', config('app.pagination.per_page'), $page);

        return view('users.index')->with('users', $users);
    }

    public function showUserProducts(Request $request, User $user)
    {
        $page = $request->input('page');
        $user->load('products');
        $products = $this->userRepo->getProductOfUser($user, $user->role, 'desc');
        $results = (new Collection($products))
            ->paginate(config('app.pagination.per_page'), $products->count(), $page ?? 1);

        return view('users.products')->with('products', $results);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $validated['is_active'] = true;
        $this->userRepo->create($validated);

        return redirect()->route('users.index')->with('success', trans('user.store.success'));
    }

    public function show(User $user)
    {
        $user->load('contacts');

        return view('users.show')->with('user', $user);
    }

    public function edit(User $user)
    {
        return view('users.edit')->with('user', $user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $this->userRepo->update($user->id, $validated);

        return redirect()->route('users.show', ['user' => $user->id])->with('success', trans('user.update.success'));
    }

    public function destroy(DeleteUserRequest $request, User $user)
    {
        $this->userRepo->delete($user);

        return redirect()->route('users.index')->with('success', trans('user.destroy.success'));
    }
}
