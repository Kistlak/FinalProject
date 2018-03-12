<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MoviePosters;
use Validator;
use Illuminate\Support\Facades\Input;

class MoviePostersController extends Controller
{
    
    public function __construct()
{
    $this->middleware('auth');
}
    
    public function index()
    {
      $data = MoviePosters::all();
      //$data = login::orderBy('created_at', 'desc')->get();
      return view('AdminPanel.MoviePosters', ['data' => $data]);
    }

public function posterinsert(Request $request)
    {

        $mname = $request->input('mname');
        $fshow = $request->input('fshow');
        $sshow = $request->input('sshow');
        
        $user = new MoviePosters();
        $user->mname = $mname;
        $user->fshow = $fshow;
        $user->sshow = $sshow;
        
        $this->validate($request, [
            'mname' => 'required'
        ]);
        
        if(Input::hasFile('file_img')){
            
            $file = Input::file('file_img');
            
            $rules = array(
                'file_img' => 'required|max:10000|mimes:jpeg,png,jpg'
            );
            
            $validator = Validator::make(Input::all(), $rules);
            
            if ($validator->fails()) {
                
                // redirect our user back with error messages
                
                // send back to the page with the input data and errors
                
                $request->session()->flash('OnlyImg', 'You Can Only Upload Images !!');
                return redirect('MoviePosters');
                
            }
            
            else if ($validator->passes()) {
                
                $fileimg = $file->getClientOriginalName();
                $destinationPath = 'img/Posters/';
                $filemove = $file->move($destinationPath, $fileimg);
                
                $user->fileimg = $fileimg;
                $user->filemove = $filemove;
                
                $user->save();
                
                $request->session()->flash('Msg', 'Successfully Inserted !!');
                
                return redirect('MoviePosters');
                
            }
        }
        
        else
        {
            
            $user->save();
            
            $request->session()->flash('Msg', 'Successfully Inserted !!');
            
            return redirect('MoviePosters');
        }
  
    }  
    
    public function postershowedit($id)
    {
        $edd = MoviePosters::find($id);
        //dd($edd);
        return view('AdminPanel.MoviePostersUpdate', ['edd' => $edd]);

    }
    
    public function posteredit(Request $request, $id)
{
    // Add Validation

    $users = MoviePosters::find($id);
    $users->mname = $request->get('mname');
    $users->fshow = $request->get('fshow');
    $users->sshow = $request->get('sshow');
        
    if(Input::hasFile('file_img')){
            
            $file = Input::file('file_img');
            
            $rules = array(
                'file_img' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
            );
            
            $validator = Validator::make(Input::all(), $rules);
            
            if ($validator->fails()) {
                
                $request->session()->flash('OnlyImg', 'You Can Only Upload Images !!');
                return redirect('MoviePostersUpdate');
                
            }
            
            else if ($validator->passes()) {
                
                $fileimg = $file->getClientOriginalName();
                $destinationPath = 'img/Posters/';
                $filemove = $file->move($destinationPath, $fileimg);
                
                $users->fileimg = $fileimg;
                $users->filemove = $filemove;
                
                $users->update();
                
                $request->session()->flash('Msg', 'Successfully Updated !!');
                
                return redirect('MoviePosters');
                
            }
        }
        
        else
        {
            
             $users->update();

             $request->session()->flash('Msg', 'Successfully Updated !!');
             
             return redirect('MoviePosters');
        }
    
    
   
}
    
    public function DeletePoster(Request $request, $id)
    {
        $del = MoviePosters::where('id', $id);
        
        $files_to_delete = $del->pluck('filemove')->toArray(); //keeping the result in a php
        $del->delete(); //now deleting
        \File::delete($files_to_delete);

        $request->session()->flash('Msg', 'Successfully Deleted !!');
        
        return redirect('MoviePosters');
    }
    
}
