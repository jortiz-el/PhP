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
            $ip_Array = ["206.200.251.19", "81.36.180.7", "186.67.91.98", "88.190.229.170", "131.228.17.26", "192.133.108.138", "62.43.192.232", "77.185.255.255"];
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
            		$citys['address'] = "San Ignacio 1215-1233, Santiago-Chile";
            		$citys['city'] = "santiago";
                    break;
            	case 'Madrid':
            		$citys['lat'] = 40.4167754;
            		$citys['lng'] = -3.7037901999999576;
            		$citys['address'] = "Sol, 1, Madrid-España";
            		$citys['city'] = "madrid";
                    break;
            	case 'New York':
            		$citys['lat'] = 40.589018;
            		$citys['lng'] = -73.659735;
            		$citys['address'] = "135 E Park Ave, NY-USA";
            		$citys['city'] = "newyork";
                    break;
                case 'London, City of':
                    $citys['lat'] = 51.539360;
                    $citys['lng'] = -0.142594;
                    $citys['address'] = "176 Camden High St, London-UK";
                    $citys['city'] = "london";
                    break;  
                case 'Porto':
                    $citys['lat'] = 41.140680;
                    $citys['lng'] = -8.611759;
                    $citys['address'] = "Travessa dos Canastreiros 1, Porto-Portugal";
                    $citys['city'] = "porto";
                    break;  
                case 'Comunidad Valenciana':
                    $citys['lat'] = 39.577870;
                    $citys['lng'] = 2.650880;
                    $citys['address'] = "plaça dels Patins, Palma de mayorca-Islas baleares";
                    $citys['city'] = "mayorca";
                    break;  
                case 'Berlin':
                    $citys['lat'] = 52.513108;
                    $citys['lng'] = 13.391376;
                    $citys['address'] = "Taubenstrabe, 10117 , Berlin-Alemania";
                    $citys['city'] = "berlin";
                    break;                        		
            	
            	default:
            		$citys['lat'] = 48.865747;
                    $citys['lng'] = 2.344784;
                    $citys['address'] = "II Distrito de París, París-France";
                    $citys['city'] = "paris";
                    break;
            		
            }

            
            return view('layout.location', compact('citys'));
            

	}
}
