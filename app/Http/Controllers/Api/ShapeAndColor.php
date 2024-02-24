<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShapeAndColor as ModelsShapeAndColor;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ShapeAndColor extends Controller
{
    //fetch all record
    public function fetchAll(){
        //get all data
        $shapesAndColors = ModelsShapeAndColor::with('user')->get();

        return response()->json(['data' => $shapesAndColors]);

    }
    //add new record
    public function insertNew(Request $request)
    {
        try {
            //validate input, check if user select or not, as it is compulsary
            $request->validate([
                'color' => 'required',
                'shape' => 'required',
            ]);
            //create a new entry
            ModelsShapeAndColor::create([
                'user_id' => $request->user_id,
                'shape' => $request->shape,
                'color' => $request->color,
            ]);

            return response()->json(['success' => 'New Entry created successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

    }
    //delete record
    public function deleteEntry($id)
    {
        try {
            //get the specific record based on id
            $entryToDelete = ModelsShapeAndColor::findOrFail($id);
            //delete it
            $entryToDelete->delete();

            return response()->json(['success' => 'Entry deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    //update record
    public function updateEntry(Request $request, $id){
        try {
            //validate user inputs as it is required
            $request->validate([
                'color' => 'required',
                'shape' => 'required',
            ]);

            // Find the entry by ID
            $entry = ModelsShapeAndColor::findOrFail($id);

            // Update the entry
            $entry->update([
                'user_id' => $request->user_id,
                'shape' => $request->shape,
                'color' => $request->color,
            ]);

            return response()->json(['success' => 'Entry updated successfully']);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Handle other exceptions (e.g., ModelNotFoundException)
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
