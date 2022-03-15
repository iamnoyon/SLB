<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class crudController extends Controller
{
    public function showData(Request $request){
        error_log('se called');
        if($request->has('search')){

            $showData = Crud::where('title', 'like', '%'.$request->search.'%')
                            ->orWhere('isbn', 'like', '%'.$request->search.'%')
                            ->paginate(4);
        }
        else{
            $showData = Crud::paginate(4);
        }

        return view('show_data', compact('showData'));
    }

    public function addData(){
        return view('add_data');
    }

    public function storeData(Request $request){
        
        $rules = [
            "title" => "required|max:20",
            "isbn"  => "required"
        ];

        $customM = [
            'title.max' => "Title will maximum 20 characters",
            'title.required' => "Title must not be en empty string"
        ];
        
        $this->validate($request, $rules, $customM);

        $crud = new Crud();
        $crud->title = $request->title;
        $crud->isbn = $request->isbn;
        $crud->author = "a";
        $crud->page = 10;
        $crud->available = 1;
        $crud->save();
        
        Session::flash('message', 'Successfuly added!'); 
     
        return redirect()->back();
    }

    public function editData($id){
        $editData = Crud::find($id);
        return view('edit_data', compact('editData'));
    }
    
    public function updateData(Request $request, $id){
        
        $rules = [
            "title" => "required|max:20",
            "isbn"  => "required"
        ];

        $customM = [
            'title.max' => "Title maximum 20 characters",
            'title.required' => "Title must not be en empty string"
        ];
        
        $this->validate($request, $rules, $customM);

        $crud = Crud::find($id);
        $crud->title = $request->title;
        $crud->isbn = $request->isbn;
        $crud->save();
     
        return redirect('/');
    }

    public function deleteData($id){
        
        $deleteData = Crud::find($id);
        $deleteData->delete();

        return redirect('/');
    }
}
