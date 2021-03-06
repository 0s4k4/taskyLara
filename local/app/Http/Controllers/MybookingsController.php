<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Mail;
use Auth;
use PDF;

class MybookingsController extends Controller
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
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	
	public function sangvish_released($release,$id,$shop_id)
	{
		
		$customer_id = Auth::user()->id;
		
		$book_id = base64_decode($id);
		
		
		$booking_well = DB::table('booking')
              
			   ->where('book_id', '=', $book_id)
			   ->where('status', '=', 'paid')
                ->get();
				
				
		$vendor_amount = $booking_well[0]->total_amt - $booking_well[0]->admin_commission;
				
			$count_shop = DB::table('shop')
              
						->where('id', '=', $shop_id)
			   
						->count();		
			if(!empty($count_shop))
			{
				$get_shop = DB::table('shop')
              
						->where('id', '=', $shop_id)
			   
						->get();
				$vendor_id = $get_shop[0]->user_id;	

                
                $userwives = DB::table('users')
              
			               ->where('id', '=', $vendor_id)
			   
                           ->get();
				$wallet_amount = $userwives[0]->wallet;

                $fin_amount = 	$wallet_amount + $vendor_amount;
				
				
				$userupdate = DB::table('users')
						->where('id', '=', $vendor_id)
						->update(['wallet' => $fin_amount]);
				
			}	
	DB::update('update booking set service_complete="2" where book_id = ?', [$book_id]);
	
	
	$check_dispute = DB::table('dispute')
              
						->where('booking_id', '=', $book_id)
			            ->where('customer_id', '=', $customer_id)
						->count();
	if(!empty($check_dispute))
	{
		
		DB::delete('delete from dispute where customer_id="'.$customer_id.'" and booking_id = ?',[$book_id]);
	}
	
	return back();
	
	
	}
	
	
	
	
	public function sangvish_cancel_booking($cancel,$id)
	{
		
		$customer_id = Auth::user()->id;
		
		$book_id = base64_decode($id);
		
		
		$view_list = DB::table('booking')
					 ->where('book_id', '=', $book_id)
					 ->get();
					 
		$credit_amt = $view_list[0]->total_amt;
		$refund_amt = $view_list[0]->subtotal_amt + $view_list[0]->tax_amt;

        $check_customer = DB::table('users')
					      ->where('id', '=', $customer_id)
					      ->get();
		
        $customer_final_amount = $check_customer[0]->wallet + $credit_amt;
        
        DB::update('update users set wallet="'.$customer_final_amount.'" where id = ?', [$customer_id]);		
		
      	$shop_id = $view_list[0]->shop_id;	
		
		$view_shop = DB::table('shop')
					 ->where('id', '=', $shop_id)
					 ->get();
					 
		$vendor_id = $view_shop[0]->user_id;

        $check_vendor = DB::table('users')
					   ->where('id', '=', $vendor_id)
					   ->get();
		
        $vendor_final_amount = $check_vendor[0]->wallet - $refund_amt;

        DB::update('update users set wallet="'.$vendor_final_amount.'" where id = ?', [$vendor_id]);
         		
		DB::update('update booking set status="refund",reject="cancelled by customer" where book_id = ?', [$book_id]);			 
		
		return back();
		
		
	}
	
	
	
	
	
	
	
	public function sangvish_showpage() {
		
		 $email = Auth::user()->email;
		 
		 
		 $set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		
        $booking = DB::table('booking')
		          ->leftJoin('shop', 'shop.id', '=', 'booking.shop_id')
				   
				   
				  ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
				 ->where('booking.user_email', '=', $email)
				 ->where('shop.status', '=', 'approved')
				  ->whereIn('booking.status', array('paid','refund'))
				  
				  
				  ->orderBy('booking.book_id', 'desc')
				  /*->groupBy('booking.shop_id')*/
				  ->paginate(3);
				 
		$count = DB::table('booking')
		          ->leftJoin('shop', 'shop.id', '=', 'booking.shop_id')
				   
				   
				  ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
				 ->where('booking.user_email', '=', $email)
				  ->where('shop.status', '=', 'approved')
				  ->whereIn('booking.status', array('paid','refund'))
				  ->orderBy('booking.book_id', 'desc')
				  ->groupBy('booking.shop_id')
				 ->count();
				 
				 
		$data=array('booking' => $booking, 'count' => $count, 'setting' => $setting, 'email' => $email);
		 
		 
		
		
		
		
		
	 
	  
      return view('my_bookings')->with($data);
   }
   
   public function generatePDF($id)

    {
		 $email= Auth::user()->email;
		 $book_id = base64_decode($id); 
		 
		 $set_id=1;
		 $setting=DB::table('settings')
					  ->where('id','=',$set_id)
					  ->get();
		 $booking = DB::table('booking')
		          ->leftJoin('shop', 'shop.id', '=', 'booking.shop_id')
				  ->leftJoin('users', 'users.email', '=', 'shop.seller_email')
				  ->where('booking.user_email', '=', $email)
				  ->where('shop.status', '=', 'approved')
				  ->where('booking.book_id', '=',$book_id)
				  ->where('booking.status','=','paid')
				  ->orderBy('booking.book_id', 'desc')
				  ->get();
			//echo'<pre>';print_r($booking);exit;
		$site_logo=$setting[0]->site_logo;
		$booking_date=$booking[0]->booking_date;
		$booking_time=$booking[0]->booking_time;
		$shop_id=$booking[0]->shop_id;					 
				 if($booking_time>12)
				{
					$final_time=$booking_time-12;
					$final_time=$final_time."PM";
				}
				else
				{
					$final_time=$booking_time."AM";
				}	
				
		$shop_name			=$booking[0]->shop_name;
		$address  			=$booking[0]->address;
        $shop_phone_no		=$booking[0]->shop_phone_no; 
		$amount				=$booking[0]->subtotal_amt;
        $admin_commission	=$booking[0]->admin_commission;
        $total_amt			=$booking[0]->total_amt;
		$currency			=$setting[0]->site_currency;
		
		$services_id		=explode(',',$booking[0]->services_id);
		
		$subservices = DB::table('subservices')
						->leftJoin('services', 'services.id', '=', 'subservices.service')
						->leftJoin('seller_services', 'seller_services.subservice_id', '=', 'subservices.subid')
						->whereIn('subservices.subid', $services_id)
						->where('seller_services.shop_id', '=',$shop_id)
						->whereIn('seller_services.subservice_id',$services_id)
						->groupBy('subservices.subid')
						->get();
						
						
		$user_details	=DB::table('users')
							->where('id','=',$booking[0]->user_id)
							->get();
		$user_name	=$user_details[0]->name;
		$user_email =$user_details[0]->email;
		$mobile		=$user_details[0]->phone;
		//echo'<pre>';print_r($subservices);exit;
		$title='Invoice';
        $data = ['title' =>$title,'site_logo'=>$site_logo,'booking_date'=>$booking_date,'final_time'=>$final_time,
		'shop_name'=>$shop_name,'address'=>$address,'shop_phone_no'=>$shop_phone_no,'book_id'=>$book_id,
		'amount'=>$amount,'admin_commission'=>$admin_commission,'total_amt'=>$total_amt,'currency'=>$currency,
		'subservices'=>$subservices,'user_name'=>$user_name,'user_email'=>$user_email,'mobile'=>$mobile];
		//return view('myPDF',$data);
        $pdf = PDF::loadView('myPDF', $data);

  
		
       return $pdf->download('bookingInvoice.pdf');

    }
   
   
   public function sangvish_disputedata(Request $request)
   {
	   $data = $request->all();
	   
	   $book_id = $data['book_id'];
	   $customer_id  = $data['customer_id'];
	   $shop_id = $data['shop_id'];
	   $subject = $data['subject'];
	   $message = $data['message'];
	   $today_date = date("Y-m-d");
	   
	   
	   $userwives = DB::table('shop')
                    ->where('id', '=', $shop_id)
					->get();
	   
	   $vendor_id = $userwives[0]->user_id;
	   
	   $customer_details = DB::table('users')
							->where('id', '=', $customer_id)
							->get();
	   
	   $customer_name = $customer_details[0]->name;
	   
	   
	   $vendor_details = DB::table('users')
							->where('id', '=', $vendor_id)
							->get();
	   
	   $vendor_name = $vendor_details[0]->name;
	   
	   $booking_details = DB::table('booking')
                          ->where('book_id', '=', $book_id)
						  ->where('status', '=', 'paid')
						  ->where('service_complete', '!=', 2)
						  ->where('reject','=','')
						  ->get();
						$booking_date = $booking_details[0]->booking_date;  
	   
	   $vendor_amount = $booking_details[0]->total_amt - $booking_details[0]->admin_commission;
	   
	   
	   $check_dispute = DB::table('dispute')
                          ->where('booking_id', '=', $book_id)
						  ->where('customer_id', '=', $customer_id)
						  ->where('vendor_id', '=', $vendor_id)
						  ->count();
	   if($check_dispute==0)
	   {
		   DB::insert('insert into dispute (booking_id,booking_date,dispute_date,customer_name,customer_id,vendor_name,vendor_id,payment,subject,message) values (?, ?,?, ?,?,?, ?,?,?, ?)', [$book_id,$booking_date,$today_date,$customer_name,$customer_id,$vendor_name,$vendor_id,$vendor_amount,$subject,$message]);
		   return redirect('my_bookings')->with('success', 'Your dispute message sent successfully');
	   }
	   else
	   {
		   return redirect('my_bookings')->with('error', 'Your dispute message already sent');
	   }
	   
	   
	   
   }
   
   
   
   
   
   
   public function sangvish_savedata(Request $request)
   {
	   $data = $request->all();
	   
	   $comment=$data['comment'];
    if(!empty($data['rating']))
	{		
	$rating=$data['rating'];		
	}
	else
	{
		$rating="";
	}
	$shop_id=$data['shop_id'];
	$rate_id=$data['rate_id'];
	$email = Auth::user()->email;
	
	
	
	$rating_count = DB::table('rating')
	          ->where('rshop_id', '=', $shop_id)
			  ->where('email', '=', $email)
			  ->count();
			  if($rating_count==0)
			  {
				  DB::insert('insert into rating (rating,email,rshop_id,comment) values (?, ?, ?, ?)', [$rating,$email,$shop_id,$comment]);
				  return redirect()->back()->with('message', 'Your Comments Added Successfully.');
			  }
			  else
			  {
				  if($rate_id!="")
				  {
				  DB::update('update rating set rating="'.$rating.'",comment="'.$comment.'" where rid = ?', [$rate_id]);
				  return redirect()->back()->with('message', 'Your Comments Updated Successfully.');
				  }
				  
			  }
			  
			  
	   return redirect('my_bookings');
	   
	   
   }
   
   
   
   
  public function destroy($id) {
		
		
	  
      DB::delete('delete from booking where book_id = ?',[$id]);
	   
      return back();
      
   }
	
	
	
	
	
	
	
	
	
	
}
