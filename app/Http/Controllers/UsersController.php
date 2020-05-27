<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UsersController
{
    public function index()
    {
        /** @var Collection $users */
        $users = User::query()->get();

        return $users;
    }

    public function show(int $userId)
    {

        $responseObject = response();

        /** @var User $user */
        $user = User::query()
            ->where('id', '=', $userId)
            ->first();

        if (!$user) {
            return $responseObject
                ->json(
                    [
                        'status' => false,
                        'message' => "User with ID: $userId not found!"
                    ], Response::HTTP_NOT_FOUND
                );
        }

        return $responseObject->json([
            'status' => true,
            'user' =>  $user
        ], Response::HTTP_OK);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        return User::query()->create($data);

        /**
        $user = new User();
        $user->name = $request->input('name', "Anon");
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->remember_token = $request->input('remember_token');
        $user->save();


        return response()->json([
            'status' => true,
            'user' =>  $user
        ], Response::HTTP_OK);
         * */
    }

    public function update()
    {
        die(__METHOD__);
    }

    public function destroy()
    {
        die(__METHOD__);
    }
}