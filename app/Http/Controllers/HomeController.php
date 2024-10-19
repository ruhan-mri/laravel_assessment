<?php

namespace App\Http\Controllers;

use App\Events\UserSaved;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\LaravelUser;
use App\Services\UserService;

class HomeController extends Controller
{
    protected $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = $this->userService->listUsers();
        foreach ($users as $user) {
            $user->recentAddress = $user->addresses()->latest(column: 'id')->first();
        }
        return view('home', compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(StoreUserRequest $request)
    {

        $user = $this->userService->createUser($request->validated());

        $addressData = $request->input('address');
        // $this->userService->storeAddress($user->id, ['address' => $addressData]);
        event(new UserSaved($user, $addressData));

        return redirect()->route('home')->with('success', 'User created');
    }

    public function show($id)
    {
        $user = $this->userService->findUser($id);
        $recentAddress = $user->addresses()->latest('id')->first();
        return view('show', compact('user', 'recentAddress'));
    }


    public function edit($id)
    {
        $user = $this->userService->findUser($id);
        $user->recentAddress = $user->addresses()->latest(column: 'id')->first();
        return view('edit', compact('user'));
    }

    public function update(StoreUserRequest $request, $id)
    {

        $this->userService->updateUser($request->validated(), $id);

        if ($request->has('address')) {
            $user = $this->userService->findUser($id);

            $addressData = $request->input('address');
            $existingAddress = $user->addresses()->latest()->first();
            if ($existingAddress) {
                $this->userService->updateAddress($existingAddress->id, $request->only('address'));
            } else {
                event(new UserSaved($user, $addressData));
            }

        }

        return redirect()->route('home')->with('submit', 'User updated');
    }

    public function softDelete($id)
    {
        $this->userService->softDeleteUser($id);
        return redirect()->route('home')->with('warning', 'Deleted user');
    }

    public function trash()
    {
        $users = $this->userService->listTrashedUsers();
        return view('trash', compact('users'));
    }

    public function restore($id)
    {
        $this->userService->restoreUser($id);
        return redirect()->route('home')->with('success', 'User restored');
    }

    public function force_Delete($id)
    {
        $this->userService->forceDeleteUser($id);
        return redirect()->route('trash')->with('warning', 'Force deleted');
    }


    public function addressCreate($id)
    {
        $user = $this->userService->findUser($id);
        return view('addressCreate', compact('user'));
    }

    public function addressStore(StoreAddressRequest $request, $id)
    {
        $this->userService->storeAddress($id, $request->only('address'));
        return redirect()->route('show', $id)->with('success', 'Address added successfully');
    }


    public function updateUserAddress(StoreAddressRequest $request, $id)
    {
        $result = $this->userService->updateAddress($id, $request->only('address'));
        if ($result) {
            return redirect()->route('show', $id)->with('success', 'Address updated successfully');
        } else {
            return redirect()->route('show', $id)->with('info', 'No changes were made to the address');
        }
    }
}
