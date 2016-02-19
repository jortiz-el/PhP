<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;
use Symfony\Component\HttpFoundation\Response;

class SoapLocation extends Controller {

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
            $ip_Array = ["2.139.164.235"];
            $IP = $ip_Array[array_rand($ip_Array)];
            $data = ['sIPAddress' => $IP];
            $dataLocation = null;
            
            SoapWrapper::service('geolocation', function($service) use ($data, &$dataLocation) {
                $dataLocation = $service->call('GetLocationRawOutput', [$data])->GetLocationRawOutputResult;
            });
            $region = $dataLocation->geolocation_data->region_name;
            //dd($region);
            return \View::make("location");
            
            }

}
