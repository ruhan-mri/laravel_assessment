<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Services\UserService;

class AddressController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index($userId)
    {
        $user = $this->userService->findUser($userId);
        return view('addresses', compact('user'));
    }

    public function edit($addressId)
    {
        $address = $this->userService->findAddress($addressId);
        return view('editAddress', compact('address'));
    }

    public function update(StoreAddressRequest $request, $addressId)
    {
        $user = $this->userService->findAddress($addressId);
        $this->userService->updateAddress($addressId, $request->validated());
        return redirect()->route('show', $user->user_id)->with('success', 'Address updated successfully');
    }

    public function destroy($addressId)
    {
        $this->userService->deleteAddress($addressId);
        return redirect()->back()->with('success', 'Address deleted successfully');
    }

    public function trashedAddresses($userId)
    {
        $user = $this->userService->findUser($userId);
        $trashedAddresses = $this->userService->trashedAddresses($userId);
        return view('addressTrash', compact('user', 'trashedAddresses'));
    }

    public function restoreAddress($addressId)
    {
        $this->userService->restoreAddress($addressId);
        return redirect()->back()->with('status', 'Address restored successfully');
    }

    public function forceDeleteAddress($addressId)
    {
        $this->userService->forceDeleteAddress($addressId);
        return redirect()->back()->with('status', 'Address permanently deleted successfully');
    }
}
