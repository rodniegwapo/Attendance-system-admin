<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('auth-token')->plainTextToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->noContent(200);
    }

    public function register(Request $request)
    {
        $user = User::create(['email' => $request->email, 'password' => bcrypt($request->password), 'name' => $request->name]);

        return response()->noContent(200);
    }

    public function generateQRCode(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'string|nullable',
            'suffix' => 'string|nullable',
            'year_level_id' => 'required',
        ]);

        $find = $this->findStudent($request->all());

        if ($find) {
            return response()->json(['student' => $find]);
        }

        $student = Student::create($data);

        return response()->json(['student' => $student]);
    }

    public function findStudent($student)
    {
        $find = Student::where('first_name', $student['first_name'])
            ->where('middle_name', $student['middle_name'])
            ->where('last_name', $student['last_name'])
            ->first();

        if ($find) {
            return $find;
        }

        return false;
    }
}
