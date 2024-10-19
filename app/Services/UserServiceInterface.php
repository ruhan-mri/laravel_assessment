<?php

namespace App\Services;

interface UserServiceInterface
{
    public function listUsers();
    public function createUser($data);
    public function findUser($id);
    public function updateUser($data, $id);
    public function softDeleteUser($id);
    public function listTrashedUsers();
    public function restoreUser($id);
    public function forceDeleteUser($id);
    public function findAddress($addressId);
    public function storeAddress($id, $addressData);
    public function updateAddress($addressId, $addressData);
    public function deleteAddress($addressId);
}
