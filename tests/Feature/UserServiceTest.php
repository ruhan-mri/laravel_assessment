<?php

namespace Tests\Feature;

use App\Services\UserService;
use App\Models\LaravelUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->userService = new UserService();
});

test('it can list users', function () {
    LaravelUser::factory()->count(3)->create();
    $users = $this->userService->listUsers();
    expect($users)->toHaveCount(3);
});

test('it can create a user', function () {
    $data = [
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'john@example.com',
        'address' => '123 Main St',
    ];
    $user = $this->userService->createUser($data);
    expect($user->name)->toBe('John Doe');
});

test('it can find a user by id', function () {
    $user = LaravelUser::factory()->create();
    $foundUser = $this->userService->findUser($user->id);
    expect($foundUser->id)->toBe($user->id);
});

test('it can update a user', function () {
    $user = LaravelUser::factory()->create();
    $data = [
        'name' => 'Jane Doe',
        'age' => 28,
        'email' => 'jane@example.com',
        'address' => '456 Elm St',
    ];
    $updatedUser = $this->userService->updateUser($data, $user->id);
    expect($updatedUser->name)->toBe('Jane Doe');
});

test('it can soft delete a user', function () {
    $user = LaravelUser::factory()->create();
    $this->userService->softDeleteUser($user->id);
    $trashedUser = LaravelUser::withTrashed()->find($user->id);
    expect($trashedUser->trashed())->toBeTrue();
});

test('it can list trashed users', function () {
    LaravelUser::factory()->count(3)->create();
    LaravelUser::first()->delete();
    $trashedUsers = $this->userService->listTrashedUsers();
    expect($trashedUsers)->toHaveCount(1);
});

test('it can restore a soft deleted user', function () {
    $user = LaravelUser::factory()->create();
    $user->delete();
    $this->userService->restoreUser($user->id);
    $restoredUser = LaravelUser::find($user->id);
    expect($restoredUser)->not->toBeNull();
});

test('it can force delete a user', function () {
    $user = LaravelUser::factory()->create();
    $user->delete();
    $this->userService->forceDeleteUser($user->id);
    $deletedUser = LaravelUser::withTrashed()->find($user->id);
    expect($deletedUser)->toBeNull();
});


test('it cannot create a user with duplicate email', function () {
    $data1 = [
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'john@example.com',
        'address' => '123 Main St',
    ];
    $data2 = [
        'name' => 'Jane Doe',
        'age' => 28,
        'email' => 'john@example.com', // duplicate
        'address' => '456 Elm St',
    ];
    
    $this->userService->createUser($data1);

    $this->expectException(\Illuminate\Database\QueryException::class);
    $this->userService->createUser($data2);
});

test('it throws an exception if user is not found', function () {
    $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);
    $this->userService->findUser(999);
});



test('it can create a user with an image', function () {
    Storage::fake('public');

    $data = [
        'name' => 'John Doe',
        'age' => 30,
        'email' => 'john@example.com',
        'address' => '123 Main St',
        'image' => UploadedFile::fake()->image('avatar.jpg')
    ];
    
    $user = $this->userService->createUser($data);
    
    expect($user->image)->not->toBeNull();
    Storage::disk('public')->exists('images/' . $user->image);
});


test('it can restore multiple soft deleted users', function () {
    $users = LaravelUser::factory()->count(3)->create();
    $users->each->delete();

    $this->userService->restoreUser($users[0]->id);
    $this->userService->restoreUser($users[1]->id);

    $restoredUsers = LaravelUser::whereIn('id', [$users[0]->id, $users[1]->id])->get();
    expect($restoredUsers)->toHaveCount(2);
});


test('it force deletes a user after soft deleting', function () {
    $user = LaravelUser::factory()->create();
    $user->delete();

    $this->userService->forceDeleteUser($user->id);
 
    $deletedUser = LaravelUser::withTrashed()->find($user->id);
    expect($deletedUser)->toBeNull();
});


test('it returns empty if no trashed users', function () {
    $trashedUsers = $this->userService->listTrashedUsers();
    expect($trashedUsers)->toHaveCount(0);
});


test('it lists only active users', function () {
    LaravelUser::factory()->count(3)->create();
    $userToDelete = LaravelUser::first();
    $userToDelete->delete();

    $users = $this->userService->listUsers();
    
    expect($users)->toHaveCount(2);
});


