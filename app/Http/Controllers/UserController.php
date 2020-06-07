<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\LaboratoryController;



class UserController extends Controller
{
    //
    public function getUser() {
        return Auth::id();
    }
    public function createUser(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $lab= new LaboratoryController();
        $lab->createBaseLaboratory($user->id);
        return $user;
    }
}
