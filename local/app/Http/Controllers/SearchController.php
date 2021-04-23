<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function sangvish_view()

	{
		
		$viewservices= DB::table('subservices')->orderBy('subname','asc')->get();
      
		$newsearches=DB::table('shop')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->where('shop.status', 'approved')->orderBy('shop.id','desc')
		->groupBy('shop.id')
		->paginate(3);
		
		$newsearches_count=DB::table('shop')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->where('shop.status', 'approved')->orderBy('shop.id','desc')
		->groupBy('shop.id')
		->get();
		
		
		
		
		
		
		$data = array('viewservices' => $viewservices,'newsearches' => $newsearches,'count'=>$newsearches_count);
		return view('search')->with($data);
	}
	
	
	public function sangvish_homeindex($id)
	{
		
		$subview=strtolower($id);
			$results = preg_replace('/-+/', ' ', $subview); 
		
		
		
		 $services = DB::table('subservices')->where('subname', $results)->get();
		 $services_count = DB::table('subservices')->where('subname', $results)->count();
		 if($services_count>0){
			 $sub_id=$services[0]->subid;
			 }else{
			 $sub_id="";
		 }
		 
		$newsearches=DB::table('shop')
						 ->leftJoin('rating','rating.rshop_id','=','shop.id')
						 ->leftJoin('users','users.id','=','shop.user_id')
						 ->leftJoin('seller_services','seller_services.shop_id','=','shop.id')
						 
						 ->groupBy('shop.id');	
		$newsearches->where('seller_services.subservice_id',$sub_id);
		$newsearches->where('shop.status','=','approved');
		
		
		$lang_Opts=array('0'=>$sub_id);
		
	
		 $newserches_details=$newsearches->get();
		 $newsearches=$newsearches->paginate(4);
		 
		 $newsearches_count=$newsearches->count();
		
		
		$star_rate="";
		$city="";
		$selservice	=$lang_Opts;
		$viewservices= DB::table('subservices')->orderBy('subname','asc')->get();
		
		
		
		$data = array('viewservices' => $viewservices,  'newsearches' => $newsearches,
		 'count' => $newsearches_count,'selservice'=>$selservice,'city'=>$city,'star_rate'=>$star_rate);
	
		 
		 
		 
		 
		 
		
		 
            return view('shopsearch')->with($data);
		
	}
	
    public function sangvish_index(Request $request)
    {
		
       
		$datas = $request->all();
          
		  $search_text=$datas['search_text'];
		  $count= DB::table('subservices')->where('subname', $search_text)->count();
		  
		  if(!empty($count))
		  {
		  $services = DB::table('subservices')->where('subname', $search_text)->get();
		  
		   $subsearches = DB::table('shop')
		->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		->where('shop.status', '=', 'approved')
		->where('seller_services.subservice_id', '=', $services[0]->subid)
		->orderBy('shop.id','desc')
		->groupBy('shop.id')
		->paginate(3);
		  }
		 if(empty($count))
		  {
			  $services = "";
			   $subsearches = "";
		  }
		  
		  $viewservices= DB::table('subservices')->orderBy('subname','asc')->get();
		  
		  $shopview=DB::table('shop')
		         ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		         ->where('shop.status', '=', 'approved')
				 ->orderBy('shop.id','desc')->paginate(3);
		  
		  
		  $sub_value="";
		 
      
		
		$data = array('services' => $services, 'viewservices' => $viewservices, 'shopview' => $shopview, 'subsearches' => $subsearches, 'count' => $count,
		'search_text' => $search_text, 'sub_value' => $sub_value);
            return view('search')->with($data);
    }
	
	public function sangvish_search(Request $request)
	{
		
		
		
		
		
		 $viewservices= DB::table('subservices')->orderBy('subname','asc')->get();
		 
		
		
		
		
		
		 /*$shopview=DB::table('shop')
		 ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		 ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		 ->where('shop.status', 'approved')->orderBy('shop.id','desc')->get();
		
		 $viewservices= DB::table('subservices')->orderBy('subname','asc')->get();
		 
		 $datas = $request->all();
		 
		 
		 
		 
		 
		 
		 if(!empty($datas["langOpt"])){ $category = $datas["langOpt"]; }
		 if(!empty($datas['city'])) { $city = $datas['city']; }
		 if(!empty($datas['star_rate'])){ $star_rate = $datas['star_rate']; }
		 
		 $approved='approved';
		 
		 
		 if(!empty($category))
		 {
		 
		 $langOpt=$datas["langOpt"];
		 $newlang="";
		 $vvnew="";
		 $views="";
		 foreach($langOpt as $langs)
		 {
			 $viewname= DB::table('subservices')->where("subid", "=" , $langs)->get();
			 $views .=$viewname[0]->subname.",";
			 $newlang .=$langs.",";
			 $vvnew .="'".$langs."',";
		 }
		 $viewnames =rtrim($views,",");
		 $selservice =rtrim($newlang,",");
		 $welservice =rtrim($vvnew,",");
		 
		 
		 
		 $count = DB::table('shop')
		->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		
		->whereRaw('FIND_IN_SET(seller_services.subservice_id,"'.$selservice.'")')
		
		->where('shop.status', '=', "approved")
		
		 ->groupBy('seller_services.shop_id')
		 
         ->count();
		 
		 
		$return = 1;
		 
		 $data = array('viewservices' => $viewservices,  'selservice' => $selservice, 'viewnames' => $viewnames,
		 'count' => $count, 'return' => $return, 'category' => $category);
		 }
		 
		 
		 
		 
		 
		 
		 if(!empty($city))
		 {
			   
		 
		 
		 $count = DB::table('shop')
		->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		->where('shop.status', '=', "approved")
			->where('shop.city','LIKE','%'.$city.'%')
			 ->groupBy('shop.id')
		 
         ->count();
		 
		 
		 $viewnames =$datas['city'];
		 
		  $return = 2;
		 
			$data = array('viewservices' => $viewservices, 'viewnames' => $viewnames, 'count' => $count, 'return' => $return, 'city' => $city);
		  
		  
		 }
		 
		 
		 
		 if(!empty($star_rate))
		 {
			 
			  
		 
		 
		 $count = DB::table('shop')
		->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		->where('shop.status', '=', "approved")
			
			->where('rating.rating','=', $datas['star_rate'])
			 ->groupBy('seller_services.shop_id')
		 
         ->count();
		 
		 
		 $viewnames =$datas['city'];
		 
		 $return = 3;
		 
		 
	$data = array('viewservices' => $viewservices,  'viewnames' => $viewnames, 'count' => $count, 'return' => $return, 'star_rate' => $star_rate);
	
	 } 
		 
	
	
	if(!empty($city) && !empty($star_rate))
		{
			
			
			$count = DB::table('shop')
		->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		
		
		->where('shop.city','LIKE','%'.$city.'%')
		->where('rating.rating','=', $star_rate)
		->where('shop.status', '=', "approved")
		
		 ->groupBy('shop.id')
		 
         ->count();
		 
		 
		$return = 4;
		 
		 $data = array('viewservices' => $viewservices,  'viewnames' => $viewnames,
		 'count' => $count, 'return' => $return, 'city' => $city, 'star_rate' => $star_rate);
		}
	
	
	
	
	if(!empty($category) && !empty($star_rate) && !empty($city))
		 {
		     $langOpt=$datas["langOpt"];
		 $newlang="";
		 $vvnew="";
		 $views="";
		 foreach($langOpt as $langs)
		 {
			 $viewname= DB::table('subservices')->where("subid", "=" , $langs)->get();
			 $views .=$viewname[0]->subname.",";
			 $newlang .=$langs.",";
			 $vvnew .="'".$langs."',";
		 }
		 $viewnames =rtrim($views,",");
		 $selservice =rtrim($newlang,",");
		 $welservice =rtrim($vvnew,",");
		 
		 
		 
		 $count = DB::table('shop')
		->join('seller_services', 'seller_services.shop_id', '=', 'shop.id')
		->join('rating', 'rating.rshop_id', '=', 'shop.id')
		->join('users', 'users.email', '=', 'shop.seller_email')
		
		->whereRaw('FIND_IN_SET(seller_services.subservice_id,"'.$selservice.'")')
		->where('shop.city', '=', "Madurai")
		->where('rating.rating','=', $star_rate)
		
		
		->where('shop.status', '=', "approved")
		
		 ->groupBy('shop.id')
		 
         ->count();
		 
		 
		
		 
		 $data = array('viewservices' => $viewservices,  'selservice' => $selservice, 'viewnames' => $viewnames,
		 'count' => $count, 'return' => $return, 'category' => $category, 'star_rate' => $star_rate, 'city' => $city);

		 
		 }
		 
	
	
	if(!empty($category) && !empty($city) && empty($star_rate))
		 {
		     $langOpt=$datas["langOpt"];
		 $newlang="";
		 $vvnew="";
		 $views="";
		 foreach($langOpt as $langs)
		 {
			 $viewname= DB::table('subservices')->where("subid", "=" , $langs)->get();
			 $views .=$viewname[0]->subname.",";
			 $newlang .=$langs.",";
			 $vvnew .="'".$langs."',";
		 }
		 $viewnames =rtrim($views,",");
		 $selservice =rtrim($newlang,",");
		 $welservice =rtrim($vvnew,",");
		 
		 
		 
		 $count = DB::table('shop')
		->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		
		->whereRaw('FIND_IN_SET(seller_services.subservice_id,"'.$selservice.'")')
		->where('shop.city','LIKE','%'.$city.'%')
		
		->where('shop.status', '=', "approved")
		
		 ->groupBy('seller_services.shop_id')
		 
         ->count();
		 
		 
		$return = 6;
		 
		 $data = array('viewservices' => $viewservices,  'selservice' => $selservice, 'viewnames' => $viewnames,
		 'count' => $count, 'return' => $return, 'category' => $category, 'city' => $city);

		 
		 }
		 
		 
		 
		 if(!empty($category) && !empty($star_rate) && empty($city))
		 {
		     $langOpt=$datas["langOpt"];
		 $newlang="";
		 $vvnew="";
		 $views="";
		 foreach($langOpt as $langs)
		 {
			 $viewname= DB::table('subservices')->where("subid", "=" , $langs)->get();
			 $views .=$viewname[0]->subname.",";
			 $newlang .=$langs.",";
			 $vvnew .="'".$langs."',";
		 }
		 $viewnames =rtrim($views,",");
		 $selservice =rtrim($newlang,",");
		 $welservice =rtrim($vvnew,",");
		 
		 
		 
		 $count = DB::table('shop')
		->leftJoin('seller_services', 'seller_services.shop_id', '=', 'shop.id')
		->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		
		->whereRaw('FIND_IN_SET(seller_services.subservice_id,"'.$selservice.'")')
		->where('rating.rating','=', $star_rate)
		
		->where('shop.status', '=', "approved")
		
		 ->groupBy('seller_services.shop_id')
		 
         ->count();
		 
		 
		$return = 7;
		 
		 $data = array('viewservices' => $viewservices,  'selservice' => $selservice, 'viewnames' => $viewnames,
		 'count' => $count, 'return' => $return, 'category' => $category, 'star_rate' => $star_rate);

		 
		 }
		 
		 
	if(empty($category) && empty($city) && empty($star_rate)) { 
	
	$count=DB::table('shop')
		 ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
		 ->leftJoin('rating', 'rating.rshop_id', '=', 'shop.id')
		 ->where('shop.status', 'approved')->orderBy('shop.id','desc')->groupBy('shop.id')->count();
	$viewnames = "";
	$return = 8;  */
	
	
	
	$datas=$request->all();
		$data=array();
		
		//print_r($datas);exit;
		
		$city="";
		$star_rate="";
		$lang_Opts="";
		
		if(isset($datas['search_text']) && $datas['search_text'] !="")
		{
		 $search_text=$datas['search_text'];
		 
		 
		}
		if(isset($datas['langOpt']) && $datas['langOpt']!="")
		{
		$lang_Opts=$datas['langOpt'];
			$services_name=DB::table('subservices')
									->whereIn('subid',$lang_Opts)
									->get();
									
				foreach($services_name as $key=> $services)
				{
				$services_names[$key]=$services->subname;	
					
				}	
				
			$str = implode (", ", $services_names);	
         $data['str']=$str;			
		}
		
		
			
		if(isset($datas['city']) && $datas['city']!="")
		{
		$city = $datas['city'];
		$data['city']=$city;
		}
		
		if(isset($datas['star_rate'])&& $datas['star_rate']!="")
		{
		$star_rate=$datas['star_rate'];	
		}
		
        
		$approved="'approved'";
		
		$newsearches=DB::table('shop')
						 ->leftJoin('rating','rating.rshop_id','=','shop.id')
						 ->leftJoin('users','users.id','=','shop.user_id')
						 ->leftJoin('seller_services','seller_services.shop_id','=','shop.id')
						 
						 ->groupBy('shop.id');	
		
		//indival search
		
		if(isset($star_rate) && !empty($star_rate))
		{
		 $newsearches->where('rating.rating','=',$star_rate);
		 $newsearches->where('shop.status','=','approved');
		}
		if(isset($city) && !empty($city))
		{
		$newsearches->where('shop.address', 'like', '%' . $city . '%');	
		$newsearches->orWhere('shop.city', 'like', '%' . $city .'%');
		$newsearches->orWhere('shop.country', 'like', '%' . $city . '%');	
		$newsearches->orWhere('shop.state', 'like', '%' . $city . '%');
		//$newsearches->whereRaw("FIND_IN_SET($city, shop.address) > 0");
		//$newsearches->where('shop.status','=','approved');
		}
		if(isset($lang_Opts) && !empty($lang_Opts))
		{
		  $newsearches->whereIn('seller_services.subservice_id',$lang_Opts);
		  $newsearches->where('shop.status','=','approved');
      	}
		
		if(isset($search_text) && !empty($search_text))
		{
		   $services = DB::table('subservices')->where('subname', $search_text)->get();
		   $service_count=DB::table('subservices')->where('subname', $search_text)->count();
		   if($service_count >0){
			    $sub_id=$services[0]->subid;
		   }else{
			   $sub_id="";
		   }
		  $lang_Opts=array('0'=>$sub_id);
		  $newsearches->where('seller_services.subservice_id',$sub_id);
		  $newsearches->where('shop.status','=','approved');
      	}
		
		
		$newsearches->where('shop.status','=','approved');
		 $newserches_details=$newsearches->get();
		 $newsearches=$newsearches->paginate(4);
		 
		 $newsearches_count=$newsearches->count();
		
		
		
		$selservice	=$lang_Opts;
		
		
	
	$data = array('viewservices' => $viewservices,  'newsearches' => $newsearches,
		 'count' => $newsearches_count,'selservice'=>$selservice,'city'=>$city,'star_rate'=>$star_rate);
	
		 
		 
		 
		 
		 
		
		 
            return view('shopsearch')->with($data);
	}
	
	
	
	
	
	
	
	
	
	
	
}
