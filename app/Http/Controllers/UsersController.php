<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request): Collection
    {
        $queryBuilder = User::query();

        if ($request->has('q')) {
            $queryBuilder->where('email', 'LIKE', "%{$request->input('q')}%");
        }

        return $queryBuilder->get();
    }
}