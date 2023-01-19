<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class kycAPIController extends Controller
{
    //
    function countries($id=null){
        //$data = DB::table("country")->get();
        //$data = ["id"=>1,"name"=>"shahadat"];
        /*
        $data = DB::table('countries')
        ->join('devices','members.id','=','devices.member_id')
        ->select('countries.*','devices.*')
        ->get();
        */
        //$data = Country::all();
        $data = $id?Country::find($id):Country::all();
        return $data;
    }

    function roles($id=null){
        if($id==null){
            $data = DB::table('role')
            ->select('role.*')
            ->get();
        }else{
            $data = DB::table('role') 
            ->where('roleId', $id)
            ->select('role.*')
            ->get();
        }  
        return $data;
    }

    function kyc_user($id=null){
        if($id == null){
            $data = DB::table('user')
            ->select('user.*','userrole.*','role.*')
            ->join('userrole','userrole.userID','=','user.userID')
            ->join('role','role.roleID','=','userrole.roleID')
            ->get();
        }else{
            $data = DB::table('user') 
            ->where('userID', $id)
            ->select('user.*','userrole.*','role.*')
            ->join('userrole','userrole.userID','=','user.userID')
            ->join('role','role.roleID','=','userrole.roleID')
            ->get();
        }  
        return $data;
    }

    function contact_type($id=null){
        if($id == null){
            $data = DB::table('contacttype')
            ->select('contacttype.*')
            ->get();
        }else{
            $data = DB::table('contacttype') 
            ->where('contactTypeID ', $id)
            ->select('contacttype.*')
            ->get();
        }  
        return $data;
    }

    function useraddress($id=null){
        if($id == null){
            $data = DB::table('useraddress')
            /*->select('useraddress.userAddressID, useraddress.userID, useraddress.userAddressStreet, useraddress.userAddressPostalCode, useraddress.userAddressCity, useraddress.userAddressHouseNumber, useraddress.userAddressCountryID, useraddress.userAddressAdditionalAddressLines, useraddress.modifiedDateTime, useraddress.modifiedBy,user.userName, user.userCompanyName, user.userFirstName, user.userLastName, user.userDeletedFlag')*/
            ->select('useraddress.*','user.*')
            ->join('user','user.userID','=','useraddress.userID')
            ->get();
        }else{
            $data = DB::table('useraddress') 
            ->where('useraddress.userID', $id)
           /* ->select('useraddress.userAddressID, useraddress.userID, useraddress.userAddressStreet, useraddress.userAddressPostalCode, useraddress.userAddressCity, useraddress.userAddressHouseNumber, useraddress.userAddressCountryID, useraddress.userAddressAdditionalAddressLines, useraddress.modifiedDateTime, useraddress.modifiedBy,user.userName, user.userCompanyName, user.userFirstName, user.userLastName, user.userDeletedFlag')*/
           ->select('useraddress.*','user.*')
            ->join('user','user.userID','=','useraddress.userID')
            ->get();
        }  
        return $data;
    }

    function organisation($id=null){
        if($id == null){
            $data = DB::table('organisation')
            ->select('organisation.*')
            ->get();
        }else{
            $data = DB::table('organisation') 
            ->where('OrganisationID', $id)
            ->select('organisation.*')
            ->get();
        }  
        return $data;
    }

    function organisationcontact($id=null){
        if($id == null){
            $data = DB::table('organisationcontact')
            ->select('organisationcontact.*','organisation.*')
            ->join('organisation','organisation.OrganisationID','=','organisationcontact.OrganisationID')
            ->get();
        }else{
            $data = DB::table('organisationcontact') 
            ->where('organisationcontact.OrganisationContactID', $id)
           ->select('organisationcontact.*','organisation.*')
            ->join('organisation','organisation.OrganisationID','=','organisationcontact.OrganisationID')
            ->get();
        }  
        return $data;
    }

    function addresstype($id=null){
        if($id == null){
            $data = DB::table('addresstype')
            ->select('addresstype.*')
            ->get();
        }else{
            $data = DB::table('addresstype') 
            ->where('addressTypeID', $id)
            ->select('addresstype.*')
            ->get();
        }  
        return $data;
    }

    function add_addresstype(Request $req){
        $data                           = ["status"=>"0", "message"=>""];
    
        $addressTypeDescription         = $req->addressTypeDescription;
        $modifiedBy                     = $req->modifiedBy;
        $modifiedDateTime               = date("Y-m-d H:i:s");

        $check_exist                    = DB::table('addresstype') 
        ->where('addressTypeDescription', $addressTypeDescription)
        ->select('addresstype.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $data["message"]            = "Address Type already exist!";
        }else{
            $insertdata                 = array('addressTypeDescription'=>$addressTypeDescription,'modifiedDateTime'=>$modifiedDateTime,'modifiedBy'=>$modifiedBy);
            $insert_sql                 = DB::table('addresstype')->insert($insertdata);
            $lastInsertId               = DB::getPdo()->lastInsertId();
            if($insert_sql){
                $data["status"]         = 1;
                $data["message"]        = "Data has been saved!";
                $data["lastInsertId"]   = $lastInsertId;
            }else{
                $data["message"]        = "Failed to save!";
            }
        }
        return $data;
    }

    function delete_addresstype(Request $req, $id=null){
        $data               = ["status"=>"0", "message"=>""];
        $addressTypeID      = $req->addressTypeID;
        $check_exist        = DB::table('addresstype') 
        ->where('addressTypeID', $addressTypeID)
        ->select('addresstype.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $deleted_rows               = DB::table('addresstype')->where('addressTypeID', $addressTypeID)->delete();
            if($deleted_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been deleted!";
                $data["deleted_rows"]   = $deleted_rows;
            }else{
                $data["message"]        = "Failed to delete!";
            }
        }else{
            $data["message"]            = "Address Type not exist!";
        }
        return $data;
    }

    function update_addresstype(Request $req){
        $data                       = ["status"=>"0", "message"=>""];
        $addressTypeID              = $req->addressTypeID;
        $addressTypeDescription     = $req->addressTypeDescription;
        $modifiedBy                 = $req->modifiedBy;
        $modifiedDateTime           = date("Y-m-d H:i:s");

        $check_exist                = DB::table('addresstype') 
        ->where('addressTypeID', $addressTypeID)
        ->select('addresstype.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            
            $updatedata                 = array('addressTypeDescription'=>$addressTypeDescription,'modifiedBy'=>$modifiedBy,'modifiedDateTime'=>$modifiedDateTime);
            $updated_rows               = DB::table('addresstype')->where('addressTypeID', $addressTypeID)->update($updatedata);
            if($updated_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been updated!";
                $data["updated_rows"]   = $updated_rows;
            }else{
                $data["message"]        = "Failed to update!";
            }
        }else{
            $data["message"]            = "Address Type not exist!";
        }
        return $data;
    }


    function organisationaddress($id=null){
        if($id == null){
            $data = DB::table('organisationaddress')
            ->select('organisationaddress.*','organisation.*','addresstype.*')
            ->join('organisation','organisation.OrganisationID','=','organisationaddress.OrganisationID')
            ->join('addresstype','addresstype.addressTypeID','=','organisationaddress.addressTypeID')
            ->get();
        }else{
            $data = DB::table('organisationaddress') 
            ->where('organisationaddress.OrganisationAddressID', $id)
           ->select('organisationaddress.*','organisation.*','addresstype.*')
            ->join('organisation','organisation.OrganisationID','=','organisationaddress.OrganisationID')
            ->join('addresstype','addresstype.addressTypeID','=','organisationaddress.addressTypeID')
            ->get();
        }  
        return $data;
    }


    function add_user(Request $req){
        $data                   = ["status"=>"0", "message"=>""];
    
        $userFirstName      = $req->userFirstName;
        $userLastName       = $req->userLastName;
        $roleID             = $req->roleID;
        $email              = $req->email;
        $phoneNumber        = $req->phoneNumber;
        $mobileNumber       = $req->mobileNumber;

        $userName           = $req->userName;
        $userPassword       = $req->userPassword;
        $OrganisationID     = $req->OrganisationID;
        $modifiedBy         = $req->modifiedBy;
        $modifiedDateTime   = date("Y-m-d H:i:s");

        $check_exist                    = DB::table('user') 
        ->where('userName', $userName)
        ->select('user.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $data["message"]            = "Username already exist!";
        }else{

            $insertdata                 = array("userFirstName"=>$userFirstName,"userLastName"=>$userLastName,"email"=>$email,"phoneNumber"=>$phoneNumber,"mobileNumber"=>$mobileNumber,"userName"=>$userName,"userPassword"=>$userPassword,"OrganisationID"=>$OrganisationID,"modifiedDateTime"=>$modifiedDateTime,"modifiedBy"=>$modifiedBy);
            $insert_sql                 = DB::table('user')->insert($insertdata);
            $lastInsertId               = DB::getPdo()->lastInsertId();
            if($insert_sql){

                $insertdata2           = array("userID"=>$lastInsertId,"roleID"=>$roleID,"modifiedDateTime"=>$modifiedDateTime,"modifiedBy"=>$modifiedBy);
                $insert_sql2           = DB::table('userrole')->insert($insertdata2);

                $data["status"]         = 1;
                $data["message"]        = "Data has been saved!";
                $data["lastInsertId"]   = $lastInsertId;
            }else{
                $data["message"]        = "Failed to save!";
            }
        }
        return $data;
    }

    function update_user(Request $req){
        $data               = ["status"=>"0", "message"=>""];
    
        $userID             = $req->userID;
        $userFirstName      = $req->userFirstName;
        $userLastName       = $req->userLastName;
        $roleID             = $req->roleID;
        $email              = $req->email;
        $phoneNumber        = $req->phoneNumber;
        $mobileNumber       = $req->mobileNumber;
        $OrganisationID     = $req->OrganisationID;
        $modifiedBy         = $req->modifiedBy;
        $modifiedDateTime   = date("Y-m-d H:i:s");

        $check_exist                    = DB::table('user') 
        ->where('userID', $userID)
        ->select('user.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            
            $updatedata                 = array("userFirstName"=>$userFirstName,"userLastName"=>$userLastName,"email"=>$email,"phoneNumber"=>$phoneNumber,"mobileNumber"=>$mobileNumber,"OrganisationID"=>$OrganisationID,"modifiedDateTime"=>$modifiedDateTime,"modifiedBy"=>$modifiedBy);
            $updated_rows               = DB::table('user')->where('userID', $userID)->update($updatedata);
            if($updated_rows > 0){

                $updatedata2            = array("roleID"=>$roleID,"modifiedDateTime"=>$modifiedDateTime,"modifiedBy"=>$modifiedBy);
                $updated_rows2          = DB::table('userrole')->where('userID', $userID)->update($updatedata2);

                $data["status"]         = 1;
                $data["message"]        = "Data has been updated!";
                $data["updated_rows"]   = $updated_rows;
            }else{
                $data["message"]        = "Failed to update!";
            }
        }else{
            $data["message"]            = "User not exist!";
        }
        return $data;
    }
    
    function delete_user(Request $req, $id=null){
        $data               = ["status"=>"0", "message"=>""];
        $userID             = $req->userID;
        $check_exist        = DB::table('user') 
        ->where('userID', $userID)
        ->select('user.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $deleted_rows               = DB::table('user')->where('userID', $userID)->delete();
            if($deleted_rows > 0){
                $deleted_rows2          = DB::table('userrole')->where('userID', $userID)->delete();
                $data["status"]         = 1;
                $data["message"]        = "Data has been deleted!";
                $data["deleted_rows"]   = $deleted_rows;
            }else{
                $data["message"]        = "Failed to delete!";
            }
        }else{
            $data["message"]            = "User not exist!";
        }
        return $data;
    }


    function add_organisation(Request $req){
        $data                   = ["status"=>"0", "message"=>""];
    
        $OrganisationName                       = $req->OrganisationName;
        $OrganisationCompanyRegistrationNumber  = $req->OrganisationCompanyRegistrationNumber;
        $OrganisationVATRegistrationNumber      = $req->OrganisationVATRegistrationNumber;
        $modifiedBy                             = $req->modifiedBy;
        $modifiedDateTime                       = date("Y-m-d H:i:s");

        $check_exist                    = DB::table('organisation') 
        ->where('OrganisationName', $OrganisationName)
        ->select('organisation.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $data["message"]            = "Organisation Name already exist!";
        }else{

            $insertdata                 = array('OrganisationName'=>$OrganisationName,"OrganisationCompanyRegistrationNumber"=>$OrganisationCompanyRegistrationNumber,"OrganisationVATRegistrationNumber"=>$OrganisationVATRegistrationNumber, "modifiedDateTime"=>$modifiedDateTime,"modifiedBy"=>$modifiedBy);
            $insert_sql                 = DB::table('organisation')->insert($insertdata);
            $lastInsertId               = DB::getPdo()->lastInsertId();
            if($insert_sql){
                $data["status"]         = 1;
                $data["message"]        = "Data has been saved!";
                $data["lastInsertId"]   = $lastInsertId;
            }else{
                $data["message"]        = "Failed to save!";
            }
        }
        return $data;
    }

    function update_organisation(Request $req){
        $data               = ["status"=>"0", "message"=>""];
    
        $OrganisationID                         = $req->OrganisationID;
        $OrganisationName                       = $req->OrganisationName;
        $OrganisationCompanyRegistrationNumber  = $req->OrganisationCompanyRegistrationNumber;
        $OrganisationVATRegistrationNumber      = $req->OrganisationVATRegistrationNumber;
        $modifiedBy                             = $req->modifiedBy;
        $modifiedDateTime                       = date("Y-m-d H:i:s");

        $check_exist                    = DB::table('organisation') 
        ->where('OrganisationID', $OrganisationID)
        ->select('organisation.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            
            $updatedata                 = array('OrganisationName'=>$OrganisationName,"OrganisationCompanyRegistrationNumber"=>$OrganisationCompanyRegistrationNumber,"OrganisationVATRegistrationNumber"=>$OrganisationVATRegistrationNumber,"modifiedDateTime"=>$modifiedDateTime,"modifiedBy"=>$modifiedBy);
            $updated_rows               = DB::table('organisation')->where('OrganisationID', $OrganisationID)->update($updatedata);
            if($updated_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been updated!";
                $data["updated_rows"]   = $updated_rows;
            }else{
                $data["message"]        = "Failed to update!";
            }
        }else{
            $data["message"]            = "Organisation not exist!";
        }
        return $data;
    }

    function delete_organisation(Request $req, $id=null){
        $data               = ["status"=>"0", "message"=>""];
        $OrganisationID     = $req->OrganisationID;
        $check_exist        = DB::table('organisation') 
        ->where('OrganisationID', $OrganisationID)
        ->select('organisation.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $deleted_rows               = DB::table('organisation')->where('OrganisationID', $OrganisationID)->delete();
            if($deleted_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been deleted!";
                $data["deleted_rows"]   = $deleted_rows;
            }else{
                $data["message"]        = "Failed to delete!";
            }
        }else{
            $data["message"]            = "Organisation not exist!";
        }
        return $data;
    }


    function actortype($id=null){
        if($id == null){
            $data = DB::table('actortype')
            ->select('actortype.*')
            ->get();
        }else{
            $data = DB::table('actortype') 
            ->where('actortype.actorTypeID', $id)
            ->select('actortype.*')
            ->get();
        }  
        return $data;
    }

    function add_actortype(Request $req){
        $data                           = ["status"=>"0", "message"=>""];
    
        $actorTypeDescription           = $req->actorTypeDescription;
        $actorCreationDateTime          = date("Y-m-d H:i:s");
        $actorDateTimeLastUpdated       = date("Y-m-d H:i:s");

        $check_exist                    = DB::table('actortype') 
        ->where('actorTypeDescription', $actorTypeDescription)
        ->select('actortype.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $data["message"]            = "Actor Type already exist!";
        }else{
            $insertdata                 = array('actorTypeDescription'=>$actorTypeDescription);
            $insert_sql                 = DB::table('actortype')->insert($insertdata);
            $lastInsertId               = DB::getPdo()->lastInsertId();
            if($insert_sql){
                $data["status"]         = 1;
                $data["message"]        = "Data has been saved!";
                $data["lastInsertId"]   = $lastInsertId;
            }else{
                $data["message"]        = "Failed to save!";
            }
        }
        return $data;
    }

    function delete_actortype(Request $req, $id=null){
        $data               = ["status"=>"0", "message"=>""];
        $actorTypeID        = $req->actorTypeID;
        $check_exist        = DB::table('actortype') 
        ->where('actorTypeID', $actorTypeID)
        ->select('actortype.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $deleted_rows               = DB::table('actortype')->where('actorTypeID', $actorTypeID)->delete();
            if($deleted_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been deleted!";
                $data["deleted_rows"]   = $deleted_rows;
            }else{
                $data["message"]        = "Failed to delete!";
            }
        }else{
            $data["message"]            = "Actor Type not exist!";
        }
        return $data;
    }

    function update_actortype(Request $req){
        $data                       = ["status"=>"0", "message"=>""];
        $actorTypeID                = $req->actorTypeID;
        $actorTypeDescription       = $req->actorTypeDescription;
        $actorCreationDateTime      = date("Y-m-d H:i:s");
        $actorDateTimeLastUpdated   = date("Y-m-d H:i:s");

        $check_exist                = DB::table('actortype') 
        ->where('actorTypeID', $actorTypeID)
        ->select('actortype.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            
            $updatedata                 = array('actorTypeDescription'=>$actorTypeDescription);
            $updated_rows               = DB::table('actortype')->where('actorTypeID', $actorTypeID)->update($updatedata);
            if($updated_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been updated!";
                $data["updated_rows"]   = $updated_rows;
            }else{
                $data["message"]        = "Failed to update!";
            }
        }else{
            $data["message"]            = "Actor Type not exist!";
        }
        return $data;
    }


    function actor($id=null){
        if($id == null){
            $data = DB::table('actor')
            ->select('actor.*','actortype.actorTypeDescription','actorstatus.actorStatusDescription','organisation.*')
            ->join('actortype','actortype.actorTypeID','=','actor.actorTypeID')
            ->join('actorstatus','actorstatus.actorStatusID','=','actor.actorStatusID')
            ->join('organisation','organisation.OrganisationID','=','actor.OrganisationID')
            ->get();
        }else{
            $data = DB::table('actor') 
            ->where('actor.actorID', $id)
           ->select('actor.*','actortype.actorTypeDescription','actorstatus.actorStatusDescription','organisation.*')
            ->join('actortype','actortype.actorTypeID','=','actor.actorTypeID')
            ->join('actorstatus','actorstatus.actorStatusID','=','actor.actorStatusID')
            ->join('organisation','organisation.OrganisationID','=','actor.OrganisationID')
            ->get();
        }  
        return $data;
    }

    function actor_findByStatus($status=null){
        if($status == null){
            $data = DB::table('actor')
            ->select('actor.*','actortype.actorTypeDescription','actorstatus.actorStatusDescription','organisation.*')
            ->join('actortype','actortype.actorTypeID','=','actor.actorTypeID')
            ->join('actorstatus','actorstatus.actorStatusID','=','actor.actorStatusID')
            ->join('organisation','organisation.OrganisationID','=','actor.OrganisationID')
            ->get();
        }else{
            $data = DB::table('actor') 
            ->where('actor.actorStatusID', $status)
           ->select('actor.*','actortype.actorTypeDescription','actorstatus.actorStatusDescription','organisation.*')
            ->join('actortype','actortype.actorTypeID','=','actor.actorTypeID')
            ->join('actorstatus','actorstatus.actorStatusID','=','actor.actorStatusID')
            ->join('organisation','organisation.OrganisationID','=','actor.OrganisationID')
            ->get();
        }  
        return $data;
    }

    function add_actor(Request $req){
        $data                   = ["status"=>"0", "message"=>""];
    
        $actorName                       = $req->actorName;
        $actorCompanyRegistrationNumber  = $req->actorCompanyRegistrationNumber;
        $actorVATRegistrationNumber      = $req->actorVATRegistrationNumber;
        $actorTypeID                     = $req->actorTypeID;
        $actorStatusID                   = $req->actorStatusID;
        $OrganisationID                  = $req->OrganisationID;
        
        $actorCreationDateTime                  = date("Y-m-d H:i:s");
        $actorDateTimeLastUpdated               = date("Y-m-d H:i:s");

        $check_exist                    = DB::table('actor') 
        ->where('actorName', $actorName)
        ->select('actor.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $data["message"]            = "Actor Name already exist!";
        }else{

            $insertdata                 = array('actorName'=>$actorName,"actorCompanyRegistrationNumber"=>$actorCompanyRegistrationNumber,"actorVATRegistrationNumber"=>$actorVATRegistrationNumber,"actorTypeID"=>$actorTypeID,"actorStatusID"=>$actorStatusID,"OrganisationID"=>$OrganisationID, "actorCreationDateTime"=>$actorCreationDateTime,"actorDateTimeLastUpdated"=>$actorDateTimeLastUpdated);
            $insert_sql                 = DB::table('actor')->insert($insertdata);
            $lastInsertId               = DB::getPdo()->lastInsertId();
            if($insert_sql){
                $data["status"]         = 1;
                $data["message"]        = "Data has been saved!";
                $data["lastInsertId"]   = $lastInsertId;
            }else{
                $data["message"]        = "Failed to save!";
            }
        }
        return $data;
    }

    function update_actor(Request $req){
        $data = ["status"=>"0", "message"=>""];
    
        $actorID                         = $req->actorID;
        $actorName                       = $req->actorName;
        $actorCompanyRegistrationNumber  = $req->actorCompanyRegistrationNumber;
        $actorVATRegistrationNumber      = $req->actorVATRegistrationNumber;
        $actorTypeID                     = $req->actorTypeID;
        $actorStatusID                   = $req->actorStatusID;
        $OrganisationID                  = $req->OrganisationID;
        
        $actorCreationDateTime           = date("Y-m-d H:i:s");
        $actorDateTimeLastUpdated        = date("Y-m-d H:i:s");

        $check_exist                    = DB::table('actor') 
        ->where('actorID', $actorID)
        ->select('actor.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            
            $updatedata                 = array('actorName'=>$actorName,"actorCompanyRegistrationNumber"=>$actorCompanyRegistrationNumber,"actorVATRegistrationNumber"=>$actorVATRegistrationNumber,"actorTypeID"=>$actorTypeID,"actorStatusID"=>$actorStatusID,"OrganisationID"=>$OrganisationID,"actorDateTimeLastUpdated"=>$actorDateTimeLastUpdated);
            $updated_rows               = DB::table('actor')->where('actorID', $actorID)->update($updatedata);
            if($updated_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been updated!";
                $data["updated_rows"]   = $updated_rows;
            }else{
                $data["message"]        = "Failed to update!";
            }
        }else{
            $data["message"]            = "Actor not exist!";
        }
        return $data;
    }

    function delete_actor(Request $req, $id=null){
        $data               = ["status"=>"0", "message"=>""];
        $actorID     = $req->actorID;
        $check_exist        = DB::table('actor') 
        ->where('actorID', $actorID)
        ->select('actor.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $deleted_rows               = DB::table('actor')->where('actorID', $actorID)->delete();
            if($deleted_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been deleted!";
                $data["deleted_rows"]   = $deleted_rows;
            }else{
                $data["message"]        = "Failed to delete!";
            }
        }else{
            $data["message"]            = "Actor not exist!";
        }
        return $data;
    }

   
    
    function actorcontact($id=null){
        if($id == null){
            $data = DB::table('actorcontact')
            ->select('actorcontact.*','actor.actorName','contacttype.contactTypeDescription')
            ->join('actor','actor.actorID','=','actorcontact.actorID')
            ->join('contacttype','contacttype.contactTypeID','=','actorcontact.contactTypeID')
            ->get();
        }else{
            $data = DB::table('actorcontact') 
            ->where('actorcontact.actorContactID', $id)
            ->select('actorcontact.*','actor.actorName','contacttype.contactTypeDescription')
            ->join('actor','actor.actorID','=','actorcontact.actorID')
            ->join('contacttype','contacttype.contactTypeID','=','actorcontact.contactTypeID')
            ->get();
        }  
        return $data;
    }

    function actorcontact_search($searchtext=null){
        if($searchtext == null){
            $data = DB::table('actor')
            ->select('actorcontact.*','actor.actorName','contacttype.contactTypeDescription')
            ->join('actor','actor.actorID','=','actorcontact.actorID')
            ->join('contacttype','contacttype.contactTypeID','=','actorcontact.contactTypeID')
            ->get();
        }else{
            $data = DB::table('actorcontact') 
            ->where('actorcontact.actorContactFirstName', 'LIKE', '%'.$searchtext.'%')
            ->orWhere('actorcontact.actorContactLastName', 'LIKE', '%'.$searchtext.'%')
            ->orWhere('actorcontact.actorContactEmail', 'LIKE', '%'.$searchtext.'%')
            ->orWhere('actorcontact.actorContactPhone', 'LIKE', '%'.$searchtext.'%')
            ->orWhere('actorcontact.actorContactMobile', 'LIKE', '%'.$searchtext.'%')
            ->select('actorcontact.*','actor.actorName','contacttype.contactTypeDescription')
            ->join('actor','actor.actorID','=','actorcontact.actorID')
            ->join('contacttype','contacttype.contactTypeID','=','actorcontact.contactTypeID')
            ->get();
        }  
        return $data;
    }

    function add_actorcontact(Request $req){
        $data                   = ["status"=>"0", "message"=>""];

        $actorID                    = $req->actorID;
        $contactTypeID              = $req->contactTypeID;
        $actorContactFirstName      = $req->actorContactFirstName;
        $actorContactLastName       = $req->actorContactLastName;
        $actorContactEmail          = $req->actorContactEmail;
        $actorContactPhone          = $req->actorContactPhone;
        $actorContactMobile         = $req->actorContactMobile;
        $actorContactURL            = $req->actorContactURL;
        
        $ModifiedBy                 = $req->ModifiedBy;
        $modifiedDateTime           = date("Y-m-d H:i:s");

        $insertdata                 = array('actorID'=>$actorID,"contactTypeID"=>$contactTypeID,"actorContactFirstName"=>$actorContactFirstName,"actorContactLastName"=>$actorContactLastName,"actorContactEmail"=>$actorContactEmail,"actorContactPhone"=>$actorContactPhone, "actorContactMobile"=>$actorContactMobile,"actorContactURL"=>$actorContactURL,"modifiedDateTime"=>$modifiedDateTime,"ModifiedBy"=>$ModifiedBy);
        $insert_sql                 = DB::table('actorcontact')->insert($insertdata);
        $lastInsertId               = DB::getPdo()->lastInsertId();
        if($insert_sql){
            $data["status"]         = 1;
            $data["message"]        = "Data has been saved!";
            $data["lastInsertId"]   = $lastInsertId;
        }else{
            $data["message"]        = "Failed to save!";
        }
    
        return $data;
    }


    function update_actorcontact(Request $req){
        $data = ["status"=>"0", "message"=>""];

        $actorContactID             = $req->actorContactID;
        $actorID                    = $req->actorID;
        $contactTypeID              = $req->contactTypeID;
        $actorContactFirstName      = $req->actorContactFirstName;
        $actorContactLastName       = $req->actorContactLastName;
        $actorContactEmail          = $req->actorContactEmail;
        $actorContactPhone          = $req->actorContactPhone;
        $actorContactMobile         = $req->actorContactMobile;
        $actorContactURL            = $req->actorContactURL;
        
        $ModifiedBy                 = $req->ModifiedBy;
        $modifiedDateTime           = date("Y-m-d H:i:s");

        $check_exist                = DB::table('actorcontact') 
        ->where('actorContactID', $actorContactID)
        ->select('actorcontact.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            
            $updatedata                 = array('actorID'=>$actorID,"contactTypeID"=>$contactTypeID,"actorContactFirstName"=>$actorContactFirstName,"actorContactLastName"=>$actorContactLastName,"actorContactEmail"=>$actorContactEmail,"actorContactPhone"=>$actorContactPhone, "actorContactMobile"=>$actorContactMobile,"actorContactURL"=>$actorContactURL,"modifiedDateTime"=>$modifiedDateTime,"ModifiedBy"=>$ModifiedBy);
            $updated_rows               = DB::table('actorcontact')->where('actorContactID', $actorContactID)->update($updatedata);
            if($updated_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been updated!";
                $data["updated_rows"]   = $updated_rows;
            }else{
                $data["message"]        = "Failed to update!";
            }
        }else{
            $data["message"]            = "Actor Contact not exist!";
        }
        return $data;
    }

    function delete_actorcontact(Request $req, $id=null){
        $data               = ["status"=>"0", "message"=>""];
        $actorContactID     = $req->actorContactID;
        $check_exist        = DB::table('actorcontact') 
        ->where('actorContactID', $actorContactID)
        ->select('actorcontact.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $deleted_rows               = DB::table('actorcontact')->where('actorContactID', $actorContactID)->delete();
            if($deleted_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been deleted!";
                $data["deleted_rows"]   = $deleted_rows;
            }else{
                $data["message"]        = "Failed to delete!";
            }
        }else{
            $data["message"]            = "Actor not exist!";
        }
        return $data;
    }

//actoraddress
    function actoraddress($id=null){
        if($id == null){
            $data = DB::table('actoraddress')
            ->select('actoraddress.*','actor.actorName','addresstype.addressTypeDescription','countries.countryName','countries.countryISO2Code')
            ->join('actor','actor.actorID','=','actoraddress.actorID')
            ->join('addresstype','addresstype.addressTypeID','=','actoraddress.addressTypeID')
            ->join('countries','countries.countryID','=','actoraddress.countryID')
            ->get();
        }else{
            $data = DB::table('actoraddress') 
            ->where('actoraddress.actorAddressID', $id)
            ->select('actoraddress.*','actor.actorName','addresstype.addressTypeDescription','countries.countryName','countries.countryISO2Code')
            ->join('actor','actor.actorID','=','actoraddress.actorID')
            ->join('addresstype','addresstype.addressTypeID','=','actoraddress.addressTypeID')
            ->join('countries','countries.countryID','=','actoraddress.countryID')
            ->get();
        }  
        return $data;
    }

    function actoraddress_search($searchtext=null){
        if($searchtext == null){
            $data = DB::table('actor')
            ->select('actoraddress.*','actor.actorName','addresstype.addressTypeDescription','countries.countryName','countries.countryISO2Code')
            ->join('actor','actor.actorID','=','actoraddress.actorID')
            ->join('addresstype','addresstype.addressTypeID','=','actoraddress.addressTypeID')
            ->join('countries','countries.countryID','=','actoraddress.countryID')
            ->get();
        }else{
            $data = DB::table('actoraddress') 
            ->where('actoraddress.actorAddressStreet', 'LIKE', '%'.$searchtext.'%')
            ->orWhere('actoraddress.actorAddressStreetNumber', 'LIKE', '%'.$searchtext.'%')
            ->orWhere('actoraddress.actorAddressPostalCode', 'LIKE', '%'.$searchtext.'%')
            ->orWhere('actoraddress.actorAddressCity', 'LIKE', '%'.$searchtext.'%')
            ->orWhere('actoraddress.userAddressAdditionalAddressLines', 'LIKE', '%'.$searchtext.'%')
            ->select('actoraddress.*','actor.actorName','addresstype.addressTypeDescription','countries.countryName','countries.countryISO2Code')
            ->join('actor','actor.actorID','=','actoraddress.actorID')
            ->join('addresstype','addresstype.addressTypeID','=','actoraddress.addressTypeID')
            ->join('countries','countries.countryID','=','actoraddress.countryID')
            ->get();
        }  
        return $data;
    }

    //`actorAddressID`, `actorID`, `addressTypeID`, `actorAddressStreet`, `actorAddressStreetNumber`, `actorAddressPostalCode`, `actorAddressCity`, `countryID`, `userAddressAdditionalAddressLines`, `ModifiedDateTime`, `ModifiedBy` FROM `actoraddress`
    function add_actoraddress(Request $req){
        $data                   = ["status"=>"0", "message"=>""];

        $actorID                            = $req->actorID;
        $addressTypeID                      = $req->addressTypeID;
        $actorAddressStreet                 = $req->actorAddressStreet;
        $actorAddressStreetNumber           = $req->actorAddressStreetNumber;
        $actorAddressPostalCode             = $req->actorAddressPostalCode;
        $actorAddressCity                   = $req->actorAddressCity;
        $countryID                          = $req->countryID;
        $userAddressAdditionalAddressLines  = $req->userAddressAdditionalAddressLines;
        
        $ModifiedBy                 = $req->ModifiedBy;
        $modifiedDateTime           = date("Y-m-d H:i:s");

        $insertdata                 = array('actorID'=>$actorID,"addressTypeID"=>$addressTypeID,"actorAddressStreet"=>$actorAddressStreet,"actorAddressStreetNumber"=>$actorAddressStreetNumber,"actorAddressPostalCode"=>$actorAddressPostalCode,"actorAddressCity"=>$actorAddressCity, "countryID"=>$countryID,"userAddressAdditionalAddressLines"=>$userAddressAdditionalAddressLines,"modifiedDateTime"=>$modifiedDateTime,"ModifiedBy"=>$ModifiedBy);
        $insert_sql                 = DB::table('actoraddress')->insert($insertdata);
        $lastInsertId               = DB::getPdo()->lastInsertId();
        if($insert_sql){
            $data["status"]         = 1;
            $data["message"]        = "Data has been saved!";
            $data["lastInsertId"]   = $lastInsertId;
        }else{
            $data["message"]        = "Failed to save!";
        }

        return $data;
    }


    function update_actoraddress(Request $req){
        $data = ["status"=>"0", "message"=>""];

        $actorAddressID                     = $req->actorAddressID;
        $actorID                            = $req->actorID;
        $addressTypeID                      = $req->addressTypeID;
        $actorAddressStreet                 = $req->actorAddressStreet;
        $actorAddressStreetNumber           = $req->actorAddressStreetNumber;
        $actorAddressPostalCode             = $req->actorAddressPostalCode;
        $actorAddressCity                   = $req->actorAddressCity;
        $countryID                          = $req->countryID;
        $userAddressAdditionalAddressLines  = $req->userAddressAdditionalAddressLines;
        
        $ModifiedBy                 = $req->ModifiedBy;
        $modifiedDateTime           = date("Y-m-d H:i:s");

        $check_exist                = DB::table('actoraddress') 
        ->where('actorAddressID', $actorAddressID)
        ->select('actoraddress.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            
            $updatedata                 = array('actorID'=>$actorID,"addressTypeID"=>$addressTypeID,"actorAddressStreet"=>$actorAddressStreet,"actorAddressStreetNumber"=>$actorAddressStreetNumber,"actorAddressPostalCode"=>$actorAddressPostalCode,"actorAddressCity"=>$actorAddressCity, "countryID"=>$countryID,"userAddressAdditionalAddressLines"=>$userAddressAdditionalAddressLines,"modifiedDateTime"=>$modifiedDateTime,"ModifiedBy"=>$ModifiedBy);
            $updated_rows               = DB::table('actoraddress')->where('actorAddressID', $actorAddressID)->update($updatedata);
            if($updated_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been updated!";
                $data["updated_rows"]   = $updated_rows;
            }else{
                $data["message"]        = "Failed to update!";
            }
        }else{
            $data["message"]            = "Actor Address not exist!";
        }
        return $data;
    }

    function delete_actoraddress(Request $req, $id=null){
        $data               = ["status"=>"0", "message"=>""];
        $actorAddressID     = $req->actorAddressID;
        $check_exist        = DB::table('actoraddress') 
        ->where('actorAddressID', $actorAddressID)
        ->select('actoraddress.*')
        ->get();
        $countOfRow                     = $check_exist->count();
        if( $countOfRow > 0 ){
            $deleted_rows               = DB::table('actoraddress')->where('actorAddressID', $actorAddressID)->delete();
            if($deleted_rows > 0){
                $data["status"]         = 1;
                $data["message"]        = "Data has been deleted!";
                $data["deleted_rows"]   = $deleted_rows;
            }else{
                $data["message"]        = "Failed to delete!";
            }
        }else{
            $data["message"]            = "Actor Address not exist!";
        }
        return $data;
    }



}//controller class end
