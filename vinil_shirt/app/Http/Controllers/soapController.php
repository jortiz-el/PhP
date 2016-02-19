<?php namespace Vinil\Http\Controllers;

use Vinil\Http\Requests;
use Vinil\Http\Controllers\Controller;

use Artisaninweb\SoapWrapper\Facades\SoapWrapper;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Http\Request;

class soapController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		    SoapWrapper::add(function ($service) {
            $service
                ->name('geolocation')
                ->wsdl('http://www.ipswitch.com/netapps/geolocation/iplocate.asmx?WSDL')
                ->trace(true)                                                   
                ->cache(WSDL_CACHE_NONE);                                   
            });
            $ip_Array = ["206.200.251.19", "81.36.180.7", "186.67.91.98"];
            $IP = $ip_Array[array_rand($ip_Array)];
            $data = ['sIPAddress' => $IP];
            $dataLocation = null;
            
            SoapWrapper::service('geolocation', function($service) use ($data, &$dataLocation) {
                $dataLocation = $service->call('GetLocationRawOutput', [$data])->GetLocationRawOutputResult;
            });
            $region = $dataLocation->geolocation_data->region_name;
            
            //dd($region);
            
            switch ($region) {
            	case 'Region Metropolitana':
            		$citys['lat'] = -33.461722;
            		$citys['lng'] = -70.655276;
            		$citys['address'] = "San Ignacio 1215-1233";
            		break;
            	case 'Madrid':
            		$citys['lat'] = 40.4167754;
            		$citys['lng'] = -3.7037901999999576;
            		$citys['address'] = "Sol, 1";
            		break;
            	case 'New York':
            		$citys['lat'] = 40.589018;
            		$citys['lng'] = -73.659735;
            		$citys['address'] = "135 E Park Ave";
            		break;		
            	
            	default:
            		# code...
            		break;
            }
            
            return view('layout.location', compact('citys'));
            

	}
}
