<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Log;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Http\Requests;
use App\Models\Import;
use App\Models\Payment;

class HomeController extends Controller
{
    /**
     * Returns view of main page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// Timestamp of most recent import
    	$last_import = Import::all()
    						->sortByDesc('id')
    						->first();
    	$updated = $last_import->created_at;

    	// Table columns to display
    	$columns = array(
			 'physician_profile_id' => 'Physician ID',
			 'total_amount_of_payment_usdollars' => 'Total Amount',
			 'nature_of_payment_or_transfer_of_value' => 'Nature of Payment',
			 'date_of_payment' => 'Payment Date',
    	);

       	return view('home', [
       		'columns' => $columns,
       		'updated' => $updated->diffForHumans()
       	]);
    }

    /**
     * Refresh database from data from remote source
     *
     * @return \Redirect
     */
    public function refresh()
    {
    	// Send GET request to datasource
	    $api_endpoint = "https://openpaymentsdata.cms.gov/resource/v3nw-usd7.json";
		$params = array(
			"\$query" => "SELECT * WHERE nature_of_payment_or_transfer_of_value = 'Gift' AND total_amount_of_payment_usdollars > 10",
		);

		$curl = $this->create_curl_handle($api_endpoint, $params);

		$start_time = microtime(true);

	    $response = curl_exec($curl);
	    
	    $end_time = microtime(true);
	    $exec_time = ($end_time - $start_time) / 1000;

	    $response_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		// If bad response from server, write response to log and redirect to error page
	    if($response_code != "200") {
			$response = json_decode($response, true);
			$message = isset($response['message']) ? $response['message'] : 'Unknown';
	       	Log::error('Error refreshing data from remote "'. $api_endpoint .'". Response: '. $message);

	        return Redirect::to('/')->with('messages', array(
		    	array(
		    		'type' => 'danger',
		    		'icon' => 'warning',
		    		'text' => 'Refresh unsuccessful. Check logs for details.'
		    	)
		    ));
	    }

	    // If response is OK, create new Import record with details
	    $records = json_decode($response, true);

	    $import = new Import;
	    $import->total_records = count($records);
	    $import->execution_time = $exec_time;
	    $import->save();

	    // Update payment records table
	    Payment::truncate();
	    foreach ($records as $record) {
	    	$payment = new Payment;
	    	$import->payments()->save($payment);
	    	foreach (array_keys($record) as $key) {
	    		$payment[substr($key, 0, 64)] = $record[$key];
	    	}
	    	$payment->save();
	    }

	    // Redirect to home page with success message
	    return Redirect::to('/')->with('messages', array(
	    	array(
	    		'type' => 'success',
	    		'icon' => 'check',
	    		'text' => 'Data successfully refreshed!'
	    	)
	    ));
    }

    /**
     * Generate Excel file of all payment records
     * and serve file to browser
     *
     * @return \Redirect
     */
    public function download()
    {
		$payments = Payment::select('*')->get();

		Excel::create('export', function ($excel) use ($payments) {
		    $excel->sheet('2014 Reporting Year', function($sheet) use($payments) {
		        $sheet->fromArray($payments);
		    });
		})->export('xls');
    }

	// create query URL based on parameters
	private function create_query_url($path, $params = array()) {
		$full_url = $path;

	    // Build up array of parameters
	    $parameters = array();
	    foreach($params as $key => $value) {
	      array_push($parameters, urlencode($key) . "=" . urlencode($value));
	    }
	    if(count($parameters) > 0) {
	      $full_url .= "?" . implode("&", $parameters);
	    }

	    return $full_url;
	}

	// create cURL handle
	private function create_curl_handle($path, $params = array()) {
		$full_url = $this->create_query_url($path, $params);

		// Build up the headers we'll need to pass
		$headers = array(
		  'Accept: application/json',
		  'Content-type: application/json',
		  'Cache-Control: no-cache',
		  "X-App-Token: yD8NbQAYEBSZ1P9ll5tdpvyJw"
		);

    	$handle = curl_init();
		curl_setopt_array($handle, array(
		  CURLOPT_URL => $full_url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTPHEADER => $headers,
		));

		return $handle;
	}
}
