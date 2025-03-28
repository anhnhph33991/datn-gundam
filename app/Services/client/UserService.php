<?php

namespace App\Services\Client;

use App\Models\User;
use App\Repositories\Modules\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserService
{


    public function storeUserService($data)
    {
        return User::query()->create($data);
    }

    // public function updateUser($id, $data)
    // {
    //     try {
    //         $user = $this->userRepository->findByIdUserRepository($id);

    //         $data['type_user'] = $data['type_user'] ?? 0;

    //         $data['password'] = empty($data['password']) ? $user->password : $data['password'];

    //         if (!empty($data['avatar']) && Storage::exists($user['avatar'])) {
    //             Storage::delete($user['avatar']);
    //         }
    //         if (!empty($data['avatar'])) {
    //             $data['avatar'] = Storage::put('avatar', $data['avatar']);
    //         }

    //         $user->update($data);

    //         return $user;
    //     } catch (\Throwable $th) {
    //         Log::error($th->getMessage());
    //     }
    // }

    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }
}
