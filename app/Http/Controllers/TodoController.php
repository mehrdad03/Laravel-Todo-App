<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Eloquent ORM
        $todos=Todo::query()
            ->where('user_id',Auth::user()->id)
            ->get();

        return view('todos.index',['todos'=>$todos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'nullable|string|max:255',
        ],[
            'title.required'=>'عنوان الزامی است.',
            'title.max'=>'حداکثر کارکترهای مجاز : 10',
        ]);


       // dd(Auth::user());


        //Eloquent ORM
        Todo::query()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>Auth::user()->id

        ]);

        //Query Builder
        /*DB::table('todos')->insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'created_at'=>now(),
            'updated_at'=>now(),

        ]);*/

        return back()->with('success','operation successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo=Todo::query()->where('id',$id)->first();
        return view('todos.edit',['todo'=>$todo]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        //$todo=Todo::query()->where('id',$id)->first();
        //$todo->update($request->all());

        Todo::query()->where([
            'id'=>$id,
            'user_id'=>Auth::user()->id
        ])->update([
            'title'=>$request->title,
            'description'=>$request->description,

        ]);

        return redirect()->route('index')->with('success','operation successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo=Todo::query()->where([
            'id'=>$id,
            'user_id'=>Auth::user()->id
        ])->first();
        if ($todo){
            Todo::query()->where('id',$id)->delete();
            return back()->with('success','operation successfully');
        }else{
            return back()->with('failed','Id invalid!');
        }


    }
}
