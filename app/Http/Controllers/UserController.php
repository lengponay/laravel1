<?php

namespace App\Http\Controllers;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function list()
    {
        $users = User::get();
        return view('users.list',['users'=> $users]);
        //  (folder1.function[name], ['variable' dak oy vea jol in $users])
    }   // folder tmey ng located in users

//  public function list2(){
//      $users = User::get();
//      return view('users.list2',['users'=> $users]);
//      //  (folder1.function[name], ['variable' dak oy vea jol in $users])
//  }// folder tmey ng located in users

    //1. create and store 
    /* */
    public function create()
    {
        return view('users.create');
        //           folder. filename
    }
    public function store(Request $request)
    {
        //dd($request->all()); 
        //request jenh pi form,form muy muy mean name=""
        //pel reqeust all vea ng display every field we have 
        //to test when we submit our data 

        //to pjol data we have to create object muy 
        $user = new User;
        $user->name = $request->name;
        //   [table_name]     [name in form]
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect('list')->with('success', "success");
    }

    //2. update
    public function edit($id){
       $user = User::findOrFail($id);
       return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        
        return redirect('list')->with('success', "success");
    }
        
        //NOTEEE
//create and update mean routes 2 
//get and post and update tv tam id (cus its unique and PK)

//ber id ot use auto increment yg ot use method save() te ber vea update yg use method update()
//ber nv knong create yg ot use save dea ber id not auto increment yg use create()

//!!!!!!try and catch to get rud of an error message 


    public function destroy(Request $request, $id)
    {
        // dd($request->all());
        $user = User::findorfail($id);
        $user->delete();
        //we use method delete
        return redirect('/list')->with('success', 'Post deleted.');
    }

    
}
