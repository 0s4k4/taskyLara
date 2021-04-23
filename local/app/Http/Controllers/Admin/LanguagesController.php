<?php

namespace Responsive\Http\Controllers\Admin;
use Responsive\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Responsive\Language;

class LanguagesController extends Controller
{
	public function create()
	{
		$languages=Language::get();
		return view('admin.language')->with('languages',$languages);
	}
	public function store(Request $request)
	{
		$language = new Language();
       	$language->name = $request['name'];
        $language->symbol = $request['symbol'];
        $language->save();
        return redirect()->route('language.create');
	}
	public function edit($id)
	{
		$language=Language::where('id',$id)->first();
		return view('admin.edit-language')->with('language',$language);
	}
	public function update(Request $request,$id)
	{
		$language = Language::find($id);
        $language->name =  $request->get('name');
        $language->symbol = $request->get('symbol');
        $language->save();
        return redirect()->route('language.create');
        
		// return back()->with('success', 'Language has been updated');
	}
	public function destroy($id)
	{
		$language = Language::find($id);
        $language->delete();
        return redirect()->route('language.create');
	}

}
