<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PositionCollection;

class PositionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Position::class, 'position');
    }

    public function index()
    {
        return new PositionCollection(Position::orderBy('id')->get());
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
        ]);
        $position= Position::create([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'description'=>$request->description,
            'created_by'=>Auth::user()->id,
        ]);
        return [
            'message'=> 'Position has been created.',
            'snackColor'=> 'success',
        ];
    }

    public function update(Request $request, Position $position)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
        ]);
        $position->update([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'description'=>$request->description,
        ]);
        return [
            'message'=> 'Position has updated ',
            'snackColor'=> 'success',
        ];
    }

    public function destroy(Position $position)
    {
        if(!$position->users){
            return [
                'message'=> 'This position cannot deleting, it was used in user section ',
                'snackColor'=> 'error',
            ];
        }
        $position->update([
            'deleted_by' => Auth::user()->id,
        ]);
        $position->delete();
        return [
            'message'=> 'Position has been deleted. ',
            'snackColor'=> 'success',
        ];
    }
}
