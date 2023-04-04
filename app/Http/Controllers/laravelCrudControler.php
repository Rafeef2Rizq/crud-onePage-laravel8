<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Models\User;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class laravelCrudControler extends Controller
{
    public function index()
    {
        $data = Crud::all();
        return view('crud.index')->with('data', $data);
    }
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'email' => 'required|email|unique:cruds',
            'image' => 'image',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = $file->store('/', 'public');
        }
        $query = DB::table('cruds')->insert([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'email' => $request->input('email'),
            'image' => $image ?? '',

        ]);
        if ($query) {
            return back()->with('success', 'Data has been successfuly inserted');
        } else {
            return back()->with('fail', 'Oooops,Something Error!');
        }
        //    $request->merge([
        //     'image'=>$image,
        // ]);
        //  dd(Crud::create($request->all()));

    }
    public function edit($id)
    {
        $data = DB::table('cruds')->where('id', $id)->first();
        return view('crud.edit')->with([
            'data' => $data,
            'title' => 'Edit'
        ]);
    }
    public function update(Request $request, $id)
    {
        $crud = Crud::findOrFail($id);
        $data = $request->all();
        $previous = false;
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'email' => 'required', 'string', 'email,',
            'image' => 'image',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $file->store('/', [
                'disk' => 'public'
            ]);
        }
        $previous = $crud->image;
        if ($previous) {
            $crud->deleteIamges();
        }
        Crud::find($id)->update($data);
        //    Crud::where('id',$request->input('cid'))->update($request->all());
        return redirect()->route('index.crud',)

            ->with('success', 'Data has been successfuly inserted');
    }
    public function destroy($id)
    {
        $crud = Crud::findOrFail($id);
        $crud->delete();

        if ($crud->image) {
            $crud->deleteIamges();
        }
        return redirect()->route('index.crud')->with('success', 'Data deleted successfuly');
    }
}
