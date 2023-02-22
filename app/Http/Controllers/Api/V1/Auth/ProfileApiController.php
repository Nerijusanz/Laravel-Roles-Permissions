<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ProfileApiController extends Controller
{
    public function show(Request $request)
    {
        return response()->json($request->user()->only('name', 'email'));
    }

    
    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name'  => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(auth()->id())],
        ]);

        $request->user()->update($validatedData);
        
        return response()->json($request->user()->only('name', 'email'));
    
    }

    

}
