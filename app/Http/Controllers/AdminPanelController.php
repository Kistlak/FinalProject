<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Input;

class AdminPanelController extends Controller
{
    public function index()
    {
      $data = User::all();
      //$data = login::orderBy('created_at', 'desc')->get();
      return view('AdminPanel', ['data' => $data]);
    }
 
public function adinsert(Request $request)
    {

        $username = $request->input('username');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        //$passen = bcrypt($password);
        
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        
        $this->validate($request, [
            'email' => 'required'
        ]);
        
        if(Input::hasFile('file_img')){
            
            $file = Input::file('file_img');
            
            $rules = array(
                'file_img' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
            );
            
            $validator = Validator::make(Input::all(), $rules);
            
            if ($validator->fails()) {
                
                // redirect our user back with error messages
                
                // send back to the page with the input data and errors
                
                $request->session()->flash('OnlyImg', 'You Can Only Upload Images !!');
                return redirect('AdminPanel');
                
            }
            
            else if ($validator->passes()) {
                
                $fileimg = $file->getClientOriginalName();
                $destinationPath = 'img/Admins/';
                $filemove = $file->move($destinationPath, $fileimg);
                
                $user->fileimg = $fileimg;
                $user->filemove = $filemove;
                
                $user->save();
                
                $request->session()->flash('Msg', 'Successfully Inserted !!');
                
                return redirect('AdminPanel');
                
            }
        }
        
        else
        {
            
            $user->save();
            
            $request->session()->flash('Msg', 'Successfully Inserted !!');
            
            return redirect('AdminPanel');
        }
  
    }  
    
    public function edit($id)
{
$edd = User::find($id);
//dd($edd);
      return view('AdminUpdate', ['edd' => $edd]);

}
    
    public function adminedit(Request $request, $id)
{
    // Add Validation

    $users = User::find($id);
    $users->username = $request->get('username');
    $users->email = $request->get('email');
        
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
