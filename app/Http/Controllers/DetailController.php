<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use Illuminate\Support\Facades\Auth;


class DetailController extends Controller
{
    
    public function getDetails () {
        return Detail::where("user_id", Auth::id())->get();
    }
    public function createDetail(Request $request) {
        $detail = new Detail();
        $detail->user_id = Auth::id();
        $detail->name = $request->name;
        $detail->working_status = $request->working_status === 'true' ? 1 : 0;
        $detail->stand_id = $request->stand_id ?: null;
        $detail->delivery_id = $request->delivery_id;
        $detail->position_x = 0;
        $detail->position_y = 0;
        $detail->save();
        return $this->getDetails();
    }
    public function deleteDetail(Request $request) {
        $laboratory = Detail::find($request->id);
        $laboratory->delete();
        return $this->getDetails($request);
        // return $request->id;
    }
}
