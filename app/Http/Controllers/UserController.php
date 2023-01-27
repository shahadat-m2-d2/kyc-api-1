<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        
        $roles 	= DB::table('role')->select('role.roleID', 'role.roleDescription')->get();

        $data 	= DB::table('user')
                ->select('user.*','userrole.*','role.*')
                ->where('userDeletedFlag', '=', 0)
                ->join('userrole','userrole.userID','=','user.userID')
                ->join('role','role.roleID','=','userrole.roleID')
                ->orderBy('userFirstName', 'asc')
                ->orderBy('userLastName', 'asc')
                ->get();
        //dd($data);
        return view('users', [ 'users' => $data, 'roles' => $roles ]);
    }//end of function


    public function customers()
    {
        
        $countries 	    = DB::table('countries')->select('countries.countryID', 'countries.countryName', 'countries.countryISO2Code')->get();
        $addresstypes 	= DB::table('addresstype')->select('addresstype.addressTypeID', 'addresstype.addressTypeDescription')->get();
        $contacttypes 	= DB::table('contacttype')->select('contacttype.contactTypeID', 'contacttype.contactTypeDescription')->get();

        $actorPageTitleSingle   = "Klant";
        $actorPageTitleMulti    = "Klanten";    
        $actorTypeID    = 1;//Customers(1), Suppliers(2)
        $data 	= DB::table('actor')
                ->select('actor.*','actortype.actorTypeDescription','actorstatus.actorStatusDescription','actorcontact.*','actoraddress.*')
                ->where('actor.actorDeletedFlag', "0")
                ->where('actor.actorTypeID', '=', $actorTypeID)
                ->join('actortype','actortype.actorTypeID','=','actor.actorTypeID')
                ->join('actorstatus','actorstatus.actorStatusID','=','actor.actorStatusID')
                ->join('actorcontact','actorcontact.actorID','=','actor.actorID')
                ->join('actoraddress','actoraddress.actorID','=','actor.actorID')
                ->orderBy('actorName', 'asc')
                ->get();
        //dd($data);
        return view('customers', [ 'clients' => $data, 'actorTypeID' => $actorTypeID, 'countries' => $countries, 'addresstypes' => $addresstypes, 'contacttypes' => $contacttypes, 'actorPageTitleSingle' => $actorPageTitleSingle, 'actorPageTitleMulti' => $actorPageTitleMulti ]);
    }//end of function

    public function suppliers()
    {
        
        $countries 	    = DB::table('countries')->select('countries.countryID', 'countries.countryName', 'countries.countryISO2Code')->get();
        $addresstypes 	= DB::table('addresstype')->select('addresstype.addressTypeID', 'addresstype.addressTypeDescription')->get();
        $contacttypes 	= DB::table('contacttype')->select('contacttype.contactTypeID', 'contacttype.contactTypeDescription')->get();

        $actorPageTitleSingle   = "Leverancier";
        $actorPageTitleMulti    = "Leveranciers"; 
        $actorTypeID    = 2;//Customers(1), Suppliers(2)
        $data 	= DB::table('actor')
                ->select('actor.*','actortype.actorTypeDescription','actorstatus.actorStatusDescription','actorcontact.*','actoraddress.*')
                ->where('actor.actorDeletedFlag', "0")
                ->where('actor.actorTypeID', '=', $actorTypeID)
                ->join('actortype','actortype.actorTypeID','=','actor.actorTypeID')
                ->join('actorstatus','actorstatus.actorStatusID','=','actor.actorStatusID')
                ->join('actorcontact','actorcontact.actorID','=','actor.actorID')
                ->join('actoraddress','actoraddress.actorID','=','actor.actorID')
                ->orderBy('actorName', 'asc')
                ->get();
        //dd($data);
        return view('customers', [ 'clients' => $data, 'actorTypeID' => $actorTypeID, 'countries' => $countries, 'addresstypes' => $addresstypes, 'contacttypes' => $contacttypes, 'actorPageTitleSingle' => $actorPageTitleSingle, 'actorPageTitleMulti' => $actorPageTitleMulti  ]);
    }//end of function

     
    

        
    public function moxoget_shopifypages(Request $req){ //start function
        
        $moxoab_Selected_Pages              = $req->moxoab_Selected_Pages; 
        $moxoab_Selected_Pages              = $req->moxoab_Selected_Pages; 
        $shop                               = Auth::user(); //dd($shop);
        $user_id                            = $shop->id;  

        $moxodatalistarr                    = array();

        $moxodatalist                       = "";
        if( $moxoab_Selected_Pages != 1 && $moxoab_Selected_Pages != 2 ){

            if($moxoab_Selected_Pages == 1){ //All(1)

                $moxodatalistarr[0]             = array('id' => 1, 'title' => 'All', 'handle' => 'all');  
                $moxodatalist                   = $moxodatalistarr;

            }else if($moxoab_Selected_Pages == 2){ //Home(2)

                $moxodatalistarr[0]             = array('id' => 1, 'title' => 'All', 'handle' => 'all');  
                $moxodatalist                   = $moxodatalistarr;

            }else if($moxoab_Selected_Pages == 3){ //pages(3)

                $shopify_pages                  = $shop->api()->rest('GET', '/admin/pages.json');  //dd($shopify_pages);
                $moxo_pageresponses             = $shopify_pages['body']; //json_encode($shopify_pages['body'], JSON_PRETTY_PRINT); 
                $moxo_shopify_pages_arr         = $moxo_pageresponses['pages'];
                /* for( $moxoi = 0; $moxoi < count($moxo_shopify_pages_arr); $moxoi++ ) {
                    $moxo_shopify_pagetitle     = $moxo_shopify_pages_arr[$moxoi]['title']; 
                } */  
                $moxodatalist                   = $moxo_shopify_pages_arr;

            }else if($moxoab_Selected_Pages == 4){ //collections(4)

                $shopify_collects               = $shop->api()->rest('GET', '/admin/custom_collections.json');  //dd($shopify_collects);
                $moxo_pageresponses             = $shopify_collects['body']; //json_encode($shopify_collects['body'], JSON_PRETTY_PRINT); 
                $moxo_shopify_collects_arr      = $moxo_pageresponses['custom_collections'];

                $moxodatalist                   = $moxo_shopify_collects_arr;

            }else if($moxoab_Selected_Pages == 5){ //products(5)

                $shopify_products               = $shop->api()->rest('GET', '/admin/products.json');  //dd($shopify_products);
                $moxo_pageresponses             = $shopify_products['body']; //json_encode($shopify_products['body'], JSON_PRETTY_PRINT); 
                $moxo_shopify_products_arr      = $moxo_pageresponses['products'];
                $moxodatalist                   = $moxo_shopify_products_arr;
        
            }

        }
        
        return response()->json([ 'status'=>1, 'moxodatalist'=>$moxodatalist ]);  

    }//end of function 




    function show($name=null){
        //return "Hello ".$name." from User Controller";
        return DB::select("SELECT * FROM country");
    }

    function country_list(){
        $data = DB::table("country")->get();
        return $data;
    }
}
