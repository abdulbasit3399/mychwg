<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ShopBrand;
use App\Models\ShopCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use App\Models\HomeopathCategory;
use App\Models\HomeopathLibrary;
use App\Models\ShopProduct;
use App\Models\ServiceBooking;
use App\Models\UserSocialGroup;
use App\Models\SocialPostTag;
use App\Models\Following;
use Carbon\Carbon;

use App\Models\{ User, FAQ, SocialPost };

class FrontEndController extends Controller
{

    public function index()
    {
        // $data = array(
        //    'given_name' => 'Abdul Basit',
        //    'email_address' => 'mebasit11@gmail.com'
        // );
        // $url = "https://connect.squareupsandbox.com/v2/customers";
        // $client = new \GuzzleHttp\Client();
        // $response = $client->post($url, [
        //     'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json','Authorization' => 'Bearer EAAAEPfenQplY1xn661-ItVVmROljsJ-SXBS1uayStUdQex_mBskq39PaGZOl0AS'],
        //     'body'    => json_encode($data)
        // ]); 
        
        
        // $customer_result = json_decode($response->getBody(), true);
        // $customer_id = $customer_result['customer']['id'];

        //get all plans
        // $url = "https://connect.squareupsandbox.com/v2/catalog/list";
        // $client = new \GuzzleHttp\Client();
        // $response = $client->get($url, [
        //     'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json','Authorization' => 'Bearer EAAAEPfenQplY1xn661-ItVVmROljsJ-SXBS1uayStUdQex_mBskq39PaGZOl0AS']
        // ]); 
        // $result = json_decode($response->getBody(), true);
        // dd($result);

        // $data = array(
        //    'customer_id' => 'DYPFAB1HAQP5NCX62EHPC5MP6W',
        //    'plan_id' => 'QBKRUD5GAGKMDO3FBVOKW2A4',
        //    'location_id' => 'LXQDEDK736C77'
        // );
        // $url = "https://connect.squareupsandbox.com/v2/subscriptions";
        // $client = new \GuzzleHttp\Client();
        // $response = $client->post($url, [
        //     'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json','Authorization' => 'Bearer EAAAEPfenQplY1xn661-ItVVmROljsJ-SXBS1uayStUdQex_mBskq39PaGZOl0AS'],
        //     'body'    => json_encode($data)
        // ]); 
        
        
        // dd(json_decode($response->getBody(), true));



        // $url = "https://connect.squareupsandbox.com/v2/customers/DYPFAB1HAQP5NCX62EHPC5MP6W";
        // $client = new \GuzzleHttp\Client();
        // $response = $client->get($url, [
        //     'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json','Authorization' => 'Bearer EAAAEPfenQplY1xn661-ItVVmROljsJ-SXBS1uayStUdQex_mBskq39PaGZOl0AS']
        // ]); 
        
        
        // dd(json_decode($response->getBody(), true));

        // $client = new \GuzzleHttp\Client();
        
        // $headers = array(
        //     'Authorization' => 'Bearer EAAAFKlrZrYu-RU06slUuagCP13gHKUB-Lmj16VBuNJkl1K-i1Iins_mPjS7lFRy',
        //     'Content-Type' => 'application/json'
        // );
        // $body = '{
        //   "given_name": "abdul basit",
        //   "email_address": "basit@gmail.com"
        // }';
        // $body = json_decode($body);
        // $request = new Request('POST', 'https://connect.squareup.com/v2/customers', $headers, $body);
        // $res = $client->sendAsync($request)->wait();
        // dd($res->getBody());

        // $body = [
        //   'given_name' => 'Abdul Basit',
        //   'email_address' => 'abdul@gmail.com'
        // ];
        // $response = $client->request('POST', 'https://connect.squareup.com/v2/customers', [
        // 'form_params' => $body,
        // 'headers' => [
        //     'Accept' => 'application/json',
        //     'Authorization' => 'Bearer EAAAFKlrZrYu-RU06slUuagCP13gHKUB-Lmj16VBuNJkl1K-i1Iins_mPjS7lFRy',
        //     'Content-Type' => 'application/json',
        // ],
        // ]);
        // dd($response->getBody());
        // $monthly_plan_response = simplexml_load_string($response->getBody());

        // $body = new Models\CreateCustomerRequest();
        // $body->setGivenName('Amelia');
        // $body->setFamilyName('Earhart');
        // $body->setEmailAddress('Amelia.Earhart@example.com');
        // $body->setAddress(new Models\Address());
        // $body->getAddress()->setAddressLine1('500 Electric Ave');
        // $body->getAddress()->setAddressLine2('Suite 600');
        // $body->getAddress()->setLocality('New York');
        // $body->getAddress()->setAdministrativeDistrictLevel1('NY');
        // $body->getAddress()->setPostalCode('10003');
        // $body->getAddress()->setCountry(Models\Country::US);
        // $body->setPhoneNumber('+1-212-555-4240');
        // $body->setReferenceId('YOUR_REFERENCE_ID');
        // $body->setNote('a customer');

        // $apiResponse = $customersApi->createCustomer($body);
        // dd($apiResponse->isSuccess());
        return view('front.index', get_defined_vars());
    }

    public function aboutUs()
    {
        return view('front.about_us', get_defined_vars());
    }

    public function faqs()
    {
        $faqs = FAQ::latest()->get();
        return view('front.faqs', get_defined_vars());
    }


    public function ourMission()
    {
        return view('front.our_mission', get_defined_vars());
    }

    public function exploreHomeopathy()
    {
        $homeopath_categories = HomeopathCategory::with('homeopathLibraries')->get();
        return view('front.explore_homeopathy', get_defined_vars());
    }

    public function homeopathyPractitioners()
    {
        return view('front.homeopathy_practitioners', get_defined_vars());
    }


    public function exploreHomeopathyDetail(Request $req)
    {
        $library = HomeopathLibrary::findOrFail($req->id);

        return view('front.explore_homeopathy_detail', get_defined_vars());
    }


    public function findHomeopath()
    {
        return view('front.find_homeopath', get_defined_vars());
    }


    public function store()
    {
        return view('front.store', get_defined_vars());
    }


    public function privacyPolicy()
    {
        return view('front.privacy_policy', get_defined_vars());
    }


    public function terms()
    {
        return view('front.terms', get_defined_vars());
    }

    public function contactUs()
    {
        return view('front.contact_us', get_defined_vars());
    }

    public function advocates()
    {
        return view('front.advocates', get_defined_vars());
    }

    public function consultant()
    {
        return view('front.consultant', get_defined_vars());
    }


    public function bookAppointment()
    {
        return view('front.book_appointment', get_defined_vars());
    }

    public function prescription($id)
    {

        $prescription = ServiceBooking::with('HomeopathService', 'prescription')->whereUuid($id)->orderBy('id', 'DESC')->first();
        if(!$prescription)
        {
            abort(404);
        }

        return view('front.prescription', get_defined_vars());
    }









}
