<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function index()
    {

        $todo = Todo::all();
        $user = User::where('id',Auth::user()->id)->first();
        foreach($todo as $Item){
            $day = Carbon::parse($Item->Endofdate)->diffInDays(Carbon::now());
            if($day <= '1'){
                Mail::raw("This is automatically generated Hourly Update", function($message) use ($user)
                {
                    $message->from('hassankhalid2227@gmail.com');
                    $message->to($user->email)->subject('Task will be Expired soon!!');
                });
            }
        }
     
        return view('Todolist.todolist', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $todo = new Todo();
        $todo->Title = $req->Title;
        $todo->Startofdate = $req->Startofdate;
        $todo->Endofdate = $req->Endofdate;
        $todo->Status = $req->Status;
        $todo->save();
        return redirect('/todolist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::where('id', $id)->first();
        return view('Todolist.edittodo', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $todo = Todo::where('id', $id)->first();
        $todo->Title = $request->Title;
        $todo->Startofdate = $request->Startofdate;
        $todo->Endofdate = $request->Endofdate;
        $todo->Status = $request->Status;
        $todo->update();
        return redirect('/todolist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::find($id)->delete();
        return redirect()->back();

    }
  


}
