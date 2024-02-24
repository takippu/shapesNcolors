<?php

namespace App\Http\Controllers;

use App\Models\ShapeAndColor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Pages extends Controller
{
    public function addNewPage(){ //this is for add new page view

        return view('pages.add-new')->with('user', auth()->user());;
    }

    public function managePage(){ //this is for manage/dashboard page view

        $shapesAndColors = ShapeAndColor::all();
        return view('dashboard', [
            'shapesAndColors' => $shapesAndColors,
        ])->with('user', auth()->user());
    }

    public function editPage($id){ //this is for edit page view

        try {

            $shapesAndColors = ShapeAndColor::findOrFail($id);

            return view('pages.edit', [
                'shapesAndColors' => $shapesAndColors,
            ])->with('user', auth()->user());

        } catch (ModelNotFoundException $e) {
            // Handle the exception (e.g., show an error message, redirect, etc.)
            // For example:
            abort(404, 'Model not found');
        }

    }

    public function viewPage(){ //this is for manage/dashboard page view

        $shapesAndColors = ShapeAndColor::all();
        return view('pages.view', [
            'shapesAndColors' => $shapesAndColors,
        ])->with('user', auth()->user());
    }
}
