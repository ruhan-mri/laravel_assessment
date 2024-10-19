<?php

namespace App\Services;

use App\Models\LaravelUser;
use App\Models\Address;
use App\Events\UserSaved;

class UserService implements UserServiceInterface
{
    public function listUsers()
    {
        return LaravelUser::all();
    }

    public function createUser($data)
    {
        if (isset($data['image'])) {
            $extension = $data['image']->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $data['image'] = $data['image']->storeAs('images', $fileName, 'public');
        }
        return LaravelUser::create($data);
    }

    public function findUser($id)
    {
        return LaravelUser::with('addresses')->findOrFail($id);
    }

    public function updateUser($data, $id)
    {
        $user = LaravelUser::findOrFail($id);
        $user->name = $data['name'];
        $user->age = $data['age'];
        $user->email = $data['email'];
        $user->address = $data['address'];

        if (isset($data['image'])) {
            $extension = $data['image']->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $user->image = $data['image']->storeAs('images', $fileName, 'public');
        }
        $user->save();
        return $user;
    }

    public function softDeleteUser($id)
    {
        return LaravelUser::findOrFail($id)->delete();
    }

    public function listTrashedUsers()
    {
        return LaravelUser::onlyTrashed()->get();
    }

    public function restoreUser($id)
    {
        return LaravelUser::onlyTrashed()->findOrFail($id)->restore();
    }

    public function forceDeleteUser($id)
    {
        return LaravelUser::onlyTrashed()->findOrFail($id)->forceDelete();
    }

    
    public function findAddress($addressId)
    {
        return Address::findOrFail($addressId);
    }

    public function storeAddress($userId, $addressData)
    {
        $user = $this->findUser($userId);

        return $user->addresses()->create([
            'address_line' => $addressData['address'],
        ]);
    }

    public function updateAddress($addressId, $addressData)
    {
        $address = Address::findOrFail($addressId);
        return $address->update([
            'address_line' => $addressData['address'],
        ]);
    }


    public function deleteAddress($addressId)
    {
        $address = $this->findAddress($addressId);
        return $address->delete();
    }

    public function trashedAddresses($userId)
    {
        $user = $this->findUser($userId);
        return $user->addresses()->onlyTrashed()->get();
    }

    public function restoreAddress($addressId)
    {
        $address = Address::onlyTrashed()->findOrFail($addressId);
        $address->restore();
    }

    public function forceDeleteAddress($addressId)
    {
        $address = Address::onlyTrashed()->findOrFail($addressId);
        $address->forceDelete();
    }
}
