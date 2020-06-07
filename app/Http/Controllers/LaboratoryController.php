<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laboratory;
use Illuminate\Support\Facades\Auth;
use App\User;


class LaboratoryController extends Controller
{
    public function getLaboratories (Request $request) {
        return Laboratory::where("user_id", Auth::id())->get();
    }
    public function createBaseLaboratory($user_id) {
        $laboratory = new Laboratory();
        $laboratory->name = "Моя лабораторія";
        $laboratory->user_id = $user_id;
        $laboratory->save();
    }
    public function createLaboratory(Request $request) {
        $laboratory = new Laboratory();
        $laboratory->name = $request->name;
        $laboratory->user_id = Auth::id();
        $laboratory->save();
        return $this->getLaboratories($request);
    }
    public function deleteLaboratory(Request $request) {
        $laboratory = Laboratory::find($request->id);
        $laboratory->delete();
        return $this->getLaboratories($request);
    }
}
