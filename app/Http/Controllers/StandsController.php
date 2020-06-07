<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stand;
use App\Laboratory;
use Illuminate\Support\Facades\Auth;


class StandsController extends Controller
{
    public function getStands (Request $request) {
        return Stand::where("user_id", Auth::id())->get();
    }
    public function createStand(Request $request) {
        $stand = new Stand();
        $stand->name = $request->name;
        $stand->user_id = Auth::id();
        $stand->save();
        return $this->getStands($request);
    }
    public function deleteStand(Request $request) {
        $stand = Stand::find($request->id);
        $stand->delete();
        return $this->getStands($request);
    }
}
