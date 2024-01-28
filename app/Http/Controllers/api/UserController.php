<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id_google' => 'required',
                'nama_user' => 'required',
                'email' => 'required',
                'role' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // Check if the user with the same id_google or email already exists
            $existingUser = User::where('id_google', $request->id_google)
                ->orWhere('email', $request->email)
                ->first();

            if ($existingUser) {
                $response = [
                    'error' => 'User with the same id_google or email already exists',
                ];
                return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            // If no existing user found, then create a new one
            User::create($request->all());

            $response = [
                'Success' => 'New User Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            $error = [
                'error' => $e->getMessage(),
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
