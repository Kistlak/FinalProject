<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Input;

class AdminPanelController extends Controller
{
    
    public function __construct()
{
    $this->middleware('auth');
}
    
    public function index()
    {
      $data = User::all();
      //$data = login::orderBy('created_at', 'desc')->get();
      return view('AdminPanel.AdminPanel', compact('data'));
    }
 
public function adinsert(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email'
        ]);
        
        if(Input::hasFile('file_img')){
            
            $file = Input::file('file_img');
            
            $rules = array(
                'file_img' => 'required|max:10000|mimes:jpeg,png,jpg'
            );
            
            $validator = Validator::make(Input::all(), $rules);
            
            if  ($validator->fails()) {
                
                $request->session()->flash('OnlyImg', 'You Can Only Upload Images !!');
                return redirect('AdminPanel');
            }
            
            else if ($validator->passes()) {
                
                $fileimg = $file->getClientOriginalName();
                $destinationPath = 'img/Admins/';
                $filemove = $file->move($destinationPath, $fileimg);
                
                User::create([
                'username' => request('username'),
                'email' => request('email'),
                'password' => request('password'),
                'fileimg' => $fileimg,
                'filemove' => $filemove
                ]);
                
                $request->session()->flash('Msg', 'Successfully Inserted !!');
                
                return redirect('AdminPanel');
            }
        }
        
        else
        {
            
            User::create(request(['username','email','password']));
            
            $request->session()->flash('Msg', 'Successfully Inserted !!');
            
            return redirect('AdminPanel');
        }
        
    }  
    
    public function edit(User $edd)
{
      return view('AdminPanel.AdminUpdate', compact('edd'));

}
    
    public function adminedit(Request $request, $id)
{
    // Add Validation

    $users = User::find($id);
    $users->username = $request->get('username');
    $users->email = $request->get('email');
     
    $this->validate($request, [
            'email' => "required|email|unique:users,email,$id"
        ]);
    
    if(Input::hasFile('file_img')){
            
            $file = Input::file('file_img');
            
            $rules = array(
                'file_img' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
            );
            
            $validator = Validator::make(Input::all(), $rules);
            
            if ($validator->fails()) {
                
                $request->session()->flash('OnlyImg', 'You Can Only Upload Images !!');
                return redirect('AdminUpdate');
                
            }
            
            else if ($validator->passes()) {
                
                $fileimg = $file->getClientOriginalName();
                $destinationPath = 'img/Admins/';
                $filemove = $file->move($destinationPath, $fileimg);
                
                $users->fileimg = $fileimg;
                $users->filemove = $filemove;
                
                $users->update();
                
                $request->session()->flash('Msg', 'Successfully Updated !!');
                
                return redirect('AdminPanel');
                
            }
        }
        
        else
        {
            
             $users->update();

             $request->session()->flash('Msg', 'Successfully Updated !!');
             
             return redirect('AdminPanel');
        }
    
    
   
}
    
    public function DeleteUser(Request $request, $id)
    {
        $del = User::where('id', $id);
        
        $files_to_delete = $del->pluck('filemove')->toArray(); //keeping the result in a php
        $del->delete(); //now deleting
        \File::delete($files_to_delete);

        $request->session()->flash('Msg', 'Successfully Deleted !!');
        
        return redirect('AdminPanel');
    }
    
}
