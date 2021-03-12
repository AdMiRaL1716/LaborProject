<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ElementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allElements()
    {
        $elements = Element::all();
        return view('elements/elements', ['elements' => $elements]);
    }

    public function addElement()
    {
        return view('elements/addElement');
    }

    public function editElement($id)
    {
        $element = Element::find($id);
        return view('elements/editElement', ['element' => $element]);
    }

    public function deleteElement($id)
    {
        $element = Element::find($id);
        return view('elements/deleteElement', ['element' => $element]);
    }

    public function create(Request $request){
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'symbol' => ['required', 'string', 'max:255', 'unique:elements'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('add-element')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $element = new Element();
                $element -> title = $data['title'];
                $element -> symbol = $data['symbol'];
                $element->save();
                return redirect('add-element')->with('status',"Insert successfully");
            }
            catch(Exception $e){
                return redirect('add-element')->with('failed',"operation failed");
            }
        }
    }

    public function edit(Request $request, $id){
        $element = Element::find($id);
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'symbol' => ['required', 'string', 'max:255', 'unique:elements'],
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect('edit-element/'.$id.'')
                ->withInput()
                ->withErrors($validator);
        }
        else{
            $data = $request->input();
            try{
                $element -> title = $data['title'];
                $element -> symbol = $data['symbol'];
                $element->save();
                return redirect('edit-element/'.$id.'')->with('status',"Update successfully");
            }
            catch(Exception $e){
                return redirect('edit-element/'.$id.'')->with('failed',"operation failed");
            }
        }
    }

    public function delete($id) {
        $element = Element::find($id);
        try {
            $element->delete();
            return redirect('elements')->with('status',"Delete successfully");
        }
        catch(Exception $e){
            return redirect('elements')->with('failed',"operation failed");
        }
    }
}
