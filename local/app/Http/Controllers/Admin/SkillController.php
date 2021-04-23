<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SkillController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
	
        $skills = DB::table('skills')
		             ->orderBy('id','desc')
					->get();

        return view('admin.skill', ['skills' => $skills]);
    }
	
	public function formview()

    {

        return view('admin.addSkill');

    }
	
	
	
	
	
	 public function addskilldata(Request $request)
    {
        
		
		 $this->validate($request, [

        		'skill' => 'required'

        		
				
				

        	]);
         
		 
				
		$input['skill'] = Input::get('skill');
       
		
		$rules = array(
		'skill' => 'required|unique:skills,skill', 
		
		
		
		);
		
		$messages = array(
            
            
			
        );
		

		
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		}
		else
		{ 
		
		
		 
		
		
		  $data = $request->all();

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$name=$data['skill'];
		
		
		
		
		
		DB::insert('insert into skills (skill) values (?)', [$name]);
		
		
			return back()->with('success', 'Skill has been created');
      
		
    }
	
	
	}	
	
	
	public function sangvish_editdata($id)
    {
        		$skill = DB::select('select * from skills where id = ?',[$id]);
      return view('admin.editSkill',['skill'=>$skill]);
			
	}
	
	
	 protected function sangvish_savedata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'skill' => 'required'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['skill'] = Input::get('skill');
       
		
		$rules = array(
		
		'skill'=>'required|unique:skills,skill,'.$id,
		
		
		);
		
		
		$messages = array(
            
            
			
        );

		
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			return back()->withErrors($validator);
		}
		else
		{ 
		
	

			
		$name=$data['skill'];
		
		
		
		
		
		DB::update('update skills set skill="'.$name.'" where id = ?', [$id]);
		
			return back()->with('success', 'Skill has been updated');
        }
		
		
		
		
    }
	
	
	
	
	
	
	public function sangvish_destroy($id) {
		
		
      DB::delete('delete from skills where id = ?',[$id]);
	   
      return back();
      
   }
	
}