<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Resources\ReligionCollection;
use Illuminate\Support\Facades\Auth;

class ReligionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Religion::class, 'religion');
    }

    public function index()
    {
        return new ReligionCollection(Religion::orderBy('id')->get());
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
        ]);
        $religion=Religion::create([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'created_by' => Auth::user()->id,
        ]);
        return [
            'message'=> 'Create Religion successfully ',
            'snackColor'=> 'success',
        ];
    }

    public function update(Request $request, Religion $religion)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
        ]);
        $religion->update([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
        ]);
        return [
            'message'=> 'Update Religion successfully ',
            'snackColor'=> 'success',
        ];
    }

    public function destroy(Religion $religion)
    {
       
        $religion->update([
            'deleted_by' => Auth::user()->id,
        ]);
        $religion->delete();
        return [
            'message'=> 'Delete Religion successfully ',
            'snackColor'=> 'success',
        ];
    }
}
