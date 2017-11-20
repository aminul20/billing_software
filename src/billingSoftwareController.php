<?php

namespace arman\billing_software;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class billingSoftwareController extends Controller
{

    public function bill(){
		return view('calculator::bill');
	}


    public function generate(Request $request){

		$data =  $request->input();
		$price_value = array();
		$discount_value = array();
		$tax_value = array();
		$subdiscount_value = array();

		foreach ($data as $key => $value) {
			if(preg_match("/^price/",$key)){
				$price_value[] = $request->input($key);
			}

			if(preg_match("/^discount/",$key)){
				$discount_value[] = $request->input($key);
			}

			if(preg_match("/^tax/",$key)){
				$tax_value[] = $request->input($key);
			}

			if(preg_match("/^subdiscount/",$key)){
				$subdiscount_value[] = $request->input($key);
			}

		}
		$discount_value = array_sum($discount_value);
		$price_value = array_sum($price_value);
		$tax_value = array_sum($tax_value);
		$subdiscount_value = array_sum($subdiscount_value);
		$main_price_tax = $price_value + ($price_value*$tax_value)/100;
		$main_price = $main_price_tax - ($price_value*$discount_value)/100;

		$main_price_dis = $main_price - ($main_price*$subdiscount_value)/100;

		return view('calculator::bill',compact('main_price_dis','tax_value','discount_value','subdiscount_value'));
	}

}