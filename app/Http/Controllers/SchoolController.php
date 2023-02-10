<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SchoolCollection;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(School::class, 'school');
    }

    public function index()
    {
        return new SchoolCollection(School::orderBy('id')->get());
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
            'code' => ['required'],
        ]);
        $school=School::create([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'code' => $request->code,
            'description'=>$request->description,
            'created_by'=>Auth::user()->id,
        ]);
        return [
            'message'=> 'Create School successfully ',
            'snackColor'=> 'success',
        ];
    }

    public function update(Request $request, School $school)
    {
        $validated=$request->validate([
            'name_en' => ['required'],
            'name_kh' => ['required'],
            'code' => ['required'],
        ]);
        $school->update([
            'name_en' => $request->name_en,
            'name_kh' => $request->name_kh,
            'code' => $request->code,
            'description'=>$request->description,
        ]);
        return [
            'message'=> 'Update School successfully ',
            'snackColor'=> 'success',
        ];
    }

    public function destroy(School $school)
    {
        if($school->branches){
            return [
                'message'=> 'Update School error, there are branches exist in this school ',
                'snackColor'=> 'error',
            ];
        }
        $school->update([
            'deleted_by' => Auth::user()->id,
        ]);
        $school->delete();
        return [
            'message'=> 'Delete School successfully ',
            'snackColor'=> 'success',
        ];
    }
}
