<x-header componentTitle="Hello Page" />    

    <!-- page-content start -->
    <div class="page-content">
        <div class="widget-row">
            <div class="page-intro">
                <span class="page-title">Gebruikers</span>
                <span class="page-desc">Hier zie je een overzicht van alle gebruikers</span>
            </div>
        </div>

        <div class="widget-row">
            <div class="widget-area">
                <div class="table-actions">
                    <div class="table-title">
                        Gebruikers overzicht
                    </div>

                    <a class="table-add modal-button" href="#modalUserAdd">Nieuwe gebruiker toevoegen</a>
                </div>

                <table id="datatable" class="table table-default">
                    <thead>
                        <tr>
                            <th class="th-sort">Naam</th>
                            <th class="th-sort">Rol</th>
                            <th class="th">Email</th>
                            <th class="th-sort th-center">Status</th>
                            <th class="th th-center">Acties</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach( $users as $key => $users_value )
                        <!--  Row with Working Links -->
                        <tr>
                            <td href="#modalUserView" class="modal-button user-view-button" data-userid="{{ $users_value->userID }}" data-userfirstname="{{ $users_value->userFirstName }}" data-userlastname="{{ $users_value->userLastName }}" data-roleid="{{ $users_value->roleID }}" data-email="{{ $users_value->email }}" data-phonenumber="{{ $users_value->phoneNumber }}" data-mobilenumber="{{ $users_value->mobileNumber }}" data-organisationid="{{ $users_value->OrganisationID }}" data-modifiedby="{{ $users_value->modifiedBy }}">{{ $users_value->userFirstName }} {{ $users_value->userLastName }}</td>
                            <td>{{ $users_value->roleDescription }}</td>
                            <td>{{ $users_value->email }}</td> 
                            <td class="status status-success"><i class="fa fa-circle" title="Actief"></i></td>
                            <td class="action">
                                <a href="#modalUserEdit" class="modal-button user-edit-button" data-userid="{{ $users_value->userID }}" data-userfirstname="{{ $users_value->userFirstName }}" data-userlastname="{{ $users_value->userLastName }}" data-roleid="{{ $users_value->roleID }}" data-email="{{ $users_value->email }}" data-phonenumber="{{ $users_value->phoneNumber }}" data-mobilenumber="{{ $users_value->mobileNumber }}" data-organisationid="{{ $users_value->OrganisationID }}" data-modifiedby="{{ $users_value->modifiedBy }}">
                                    <i class="fa fa-pencil"></i>
                                </a>

                                <a href="#modalUserDelete" class="modal-button user-delete-button" data-userid="{{ $users_value->userID }}" data-userfirstname="{{ $users_value->userFirstName }}" data-userlastname="{{ $users_value->userLastName }}"><i class="fa fa-ban"></i></a>
                            </td>
                        </tr>
                        <!--  END Row with Working Links --> 
                        @endforeach
                        
                        
                        <!-- <tr>
                            <td>G. Ier</td>
                            <td>Inkoop</td>
                            <td>gier@kyc.nl</td>
                            <td class="status status-progress"><i class="fa fa-circle" title="In Afwachting"></i></td>
                            <td class="action">
                                <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                                <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                            </td>
                        </tr>                       
                        <tr>
                            <td>Ron Drijen</td>
                            <td>Logistiek</td>
                            <td>rondrijen@kyc.nl</td>
                            <td class="status status-error"><i class="fa fa-circle" title="Inactief"></i></td>
                            <td class="action">
                                <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                                <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                            </td>
                        </tr> -->
                        
                    </tbody>
                </table>

                <!-- <div class="table-pagination">
                    <div class="pagination-total">
                        Showing <span>1</span> to <span>10</span> of <span>@php echo count($users) @endphp</span> entries
                    </div>
                    <ul class="pagination">
                        <li class="pagination-btn">Previous</li>
                        <li class="pagination-btn active">1</li>
                        <li class="pagination-btn">2</li>
                        <li class="pagination-btn">Next</li>
                    </ul>
                </div> -->
            </div>
        </div>

        <div id="modalUserAdd" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">Gebruiker toevoegen</span>
                    <span class="close"><i class="fa fa-close"></i></span>
                </div>
                <div class="modal-body">
                    <form>
                    @csrf
                        <span class="form-section--title">Gebruikersgegevens</span>
                        <div class="form-field">
                            <label>Voornaam</label>
                            <input type="text" id="userFirstName" name="userFirstName" required />
                        </div>
                        <div class="form-field">
                            <label>Achternaam</label>
                            <input type="text" id="userLastName" name="userLastName" required />
                        </div>
                        <div class="form-field">
                            <label>Rol</label>
                            <select required id="roleID" name="roleID">
                                @foreach( $roles as $role_key => $role_value )
                                    <option value="{{ $role_value->roleID }}">{{ $role_value->roleDescription }}</option>
                                @endforeach
                                <!-- <option>Management</option>
                                <option>Sales</option>
                                <option>Inkoop</option>
                                <option>Logistiek</option>
                                <option>Finance</option>
                                <option>Audit</option>
                                <option>Administrator</option> -->
                            </select>
                        </div>

                        <span class="form-section--title">Contactgegevens</span>

                        <div class="form-field">
                            <label>Email</label>
                            <input type="text" id="email" name="email" required />
                        </div>
                        <div class="form-field">
                            <label>Telefoonnummer</label>
                            <input type="text" id="phoneNumber" name="phoneNumber" />
                        </div>
                        <div class="form-field">
                            <label>Mobielnummer</label>
                            <input type="text" id="mobileNumber" name="mobileNumber" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline btn-close">Annuleren</a>
                    <a href="javascript:void();" class="btn btn-primary" onclick="add_user();">Opslaan</a>
                </div>
            </div>
        </div>

        <div id="modalUserEdit" class="modal">             
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">Gebruiker bewerken</span>
                    <span class="close"><i class="fa fa-close"></i></span>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" id="userID_to_edit" name="userID_to_edit" value="0">
                        <input type="hidden" id="edit_OrganisationID" name="edit_OrganisationID" value="0">
                        <input type="hidden" id="edit_modifiedBy" name="edit_modifiedBy" value="0">
                        <span class="form-section--title">Gebruikersgegevens</span>
                        <div class="form-field">
                            <label>Voornaam</label>
                            <input type="text" placeholder="Ad" id="edit_userFirstName" name="edit_userFirstName" required />
                        </div>
                        <div class="form-field">
                            <label>Achternaam</label>
                            <input type="text" placeholder="Mini" id="edit_userLastName" name="edit_userLastName" required />
                        </div>
                        <div class="form-field">
                            <label>Rol</label>
                            <select required id="edit_roleID" name="edit_roleID">
                                @foreach( $roles as $role_key => $role_value )
                                    <option value="{{ $role_value->roleID }}">{{ $role_value->roleDescription }}</option>
                                @endforeach
                            </select>
                        </div>

                        <span class="form-section--title">Contactgegevens</span>

                        <div class="form-field">
                            <label>Email</label>
                            <input type="text" placeholder="admini@kyc.nl" id="edit_email" name="edit_email" required />
                        </div>
                        <div class="form-field">
                            <label>Telefoonnummer</label>
                            <input type="text" placeholder="06123456789" id="edit_phoneNumber" name="edit_phoneNumber" />
                        </div>
                        <div class="form-field">
                            <label>Mobielnummer</label>
                            <input type="text" placeholder="06123456789" id="edit_mobileNumber" name="edit_mobileNumber" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline btn-close">Annuleren</a>
                    <a class="btn btn-primary" onclick="update_user();">Opslaan</a>
                </div>
            </div>
        </div>

        <div id="modalUserDelete" class="modal">
            <input type="hidden" id="userID_to_delete" value="0">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">Gebruiker verwijderen</span>
                    <span class="close"><i class="fa fa-close"></i></span>
                </div>
                <div class="modal-body">
                    <p>Weet u zeker dat u Ad Mini wilt verwijderen?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline btn-close">Nee</a>
                    <a class="btn btn-primary" onclick="delete_user();">Ja</a>
                </div>
            </div>
        </div>
        

        <div id="modalUserView" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">Gebruiker</span>
                    <span class="close"><i class="fa fa-close"></i></span>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="userID_to_view" value="0">
                        <span class="form-section--title">Gebruikersgegevens</span>

                        <div class="form-field">
                            <label>Voornaam</label>
                            <span id="view_userFirstName">---</span>
                        </div>
                        <div class="form-field">
                            <label>Achternaam</label>
                            <span id="view_userLastName">---</span>
                        </div>
                        <div class="form-field">
                            <label>Laatst ingelogd</label>
                            <span id="view_lastLogin">---</span>
                        </div>

                        <span class="form-section--title">Contactgegevens</span>

                        <div class="form-field">
                            <label>Email</label>
                            <span id="view_email">---</span>
                        </div>
                        <div class="form-field">
                            <label>Telefoonnummer</label>
                            <span id="view_phoneNumber">---</span>
                        </div>
                        <div class="form-field">
                            <label>Mobielnummer</label>
                            <span id="view_mobileNumber">---</span>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- page-content end -->

    <!-- shahadat code start -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script><!-- AJAX LIBRERY -->    
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
<script type="text/javascript">
$(document).on('click', '.user-view-button', function( e ){

    let userID              = $(this).data('userid');
    let userFirstName       = $(this).data('userfirstname');
    let userLastName        = $(this).data('userlastname');
    let roleID              = $(this).data('roleid');
    let email               = $(this).data('email');
    let phoneNumber         = $(this).data('phonenumber');
    let mobileNumber        = $(this).data('mobilenumber');
    let OrganisationID      = $(this).data('organisationid');
    let modifiedBy          = $(this).data('modifiedby');

    e.preventDefault();
    btn = this;

    //alert("userFirstName="+userFirstName);
    $('#userID_to_view').val(userID);

    $('#view_userFirstName').html(userFirstName);
    $('#view_userLastName').html(userLastName);
    //$('#view_roleID').val(roleID).change();
    $('#view_email').html(email);
    $('#view_phoneNumber').html(phoneNumber);
    $('#view_mobileNumber').html(mobileNumber);
    //$('#view_OrganisationID').val(OrganisationID);
    //$('#view_modifiedBy').val(modifiedBy);

});

$(document).on('click', '.user-edit-button', function( e ){

    let userID              = $(this).data('userid');
    let userFirstName       = $(this).data('userfirstname');
    let userLastName        = $(this).data('userlastname');
    let roleID              = $(this).data('roleid');
    let email               = $(this).data('email');
    let phoneNumber         = $(this).data('phonenumber');
    let mobileNumber        = $(this).data('mobilenumber');
    let OrganisationID      = $(this).data('organisationid');
    let modifiedBy          = $(this).data('modifiedby');

    e.preventDefault();
    btn = this;

    //alert("userFirstName="+userFirstName);
    $('#userID_to_edit').val(userID);
    
    $('#edit_userFirstName').val(userFirstName);
    $('#edit_userLastName').val(userLastName);
    $('#edit_roleID').val(roleID).change();
    $('#edit_email').val(email);
    $('#edit_phoneNumber').val(phoneNumber);
    $('#edit_mobileNumber').val(mobileNumber);
    $('#edit_OrganisationID').val(OrganisationID);
    $('#edit_modifiedBy').val(modifiedBy);

});

function update_user(){ //function start

//return false;
var _token              = document.getElementsByName('_token')[0].value;//for laravel authentication 
var userID              = $("#userID_to_edit").val();
var userFirstName       = $("#edit_userFirstName").val();
var userLastName        = $("#edit_userLastName").val();
var roleID              = $("#edit_roleID").val();
var email               = $("#edit_email").val();
var phoneNumber         = $("#edit_phoneNumber").val();
var mobileNumber        = $("#edit_mobileNumber").val();
var OrganisationID      = $("#edit_OrganisationID").val();
var modifiedBy          = $("#edit_modifiedBy").val();

//console.log("_token=>"+_token+"&userFirstName=>"+userFirstName+"&userLastName=>"+userLastName+"&roleID=>"+roleID+"&email=>"+email+"&phoneNumber=>"+phoneNumber+"&mobileNumber=>"+mobileNumber+"&userName=>"+userName+"&userPassword=>"+userPassword+"&OrganisationID=>"+OrganisationID+"&modifiedBy=>"+modifiedBy);
//Post to the server to handle the changes     
//ajax code start
$.ajax({  
    url: "/api/user", 
    type: "PUT",
    data:{
        _token:_token,
        userID:userID, userFirstName:userFirstName, userLastName:userLastName, roleID:roleID, email:email, phoneNumber:phoneNumber, mobileNumber:mobileNumber, OrganisationID:OrganisationID, modifiedBy:modifiedBy
    },
    success:function(kyc_response){ 
        //console.log(kyc_response);
        if(kyc_response.status == 1){ 
            //alert(kyc_response.message);
            Swal.fire({
                position: 'center',//top-end
                icon: 'success',
                title: kyc_response.message,
                showConfirmButton: false,
                timer: 3000
            });
            location.reload();
        }else{
            //alert(kyc_response.message);
            Swal.fire({
                position: 'center',//top-end
                icon: 'error',
                title: kyc_response.message,
                showConfirmButton: false,
                timer: 3000
            });
        }
    },
    error: function(kyc_response) {
        //$('#subscriberName-error').text(kyc_response.responseJSON.errors.subscriberName);  
    }
}); 
//ajax code end
} //end of function 


$(document).on('click', '.user-delete-button', function( e ){

    let userID              = $(this).data('userid');
    let userFirstName       = $(this).data('userfirstname');
    let userLastName        = $(this).data('userlastname');
    e.preventDefault();
    btn = this;

    //alert("userFirstName="+userFirstName);
    $('#userID_to_delete').val(userID);
    $('#modalUserDelete').find('.modal-body p').text('Weet u zeker dat u '+userFirstName+' '+userLastName+' wilt verwijderen?');

});

function add_user(){ //function start

    //return false;
    var _token              = document.getElementsByName('_token')[0].value;//for laravel authentication 
    var userFirstName       = $("#userFirstName").val();
    var userLastName        = $("#userLastName").val();
    var roleID              = $("#roleID").val();
    var email               = $("#email").val();
    var phoneNumber         = $("#phoneNumber").val();
    var mobileNumber        = $("#mobileNumber").val();
    var userName            = email;//$("#userName").val();
    var userPassword        = '1234';//$("#userPassword").val();
    var OrganisationID      = 1;//$("#OrganisationID").val();
    var modifiedBy          = 1;//$("#modifiedBy").val();

    //console.log("_token=>"+_token+"&userFirstName=>"+userFirstName+"&userLastName=>"+userLastName+"&roleID=>"+roleID+"&email=>"+email+"&phoneNumber=>"+phoneNumber+"&mobileNumber=>"+mobileNumber+"&userName=>"+userName+"&userPassword=>"+userPassword+"&OrganisationID=>"+OrganisationID+"&modifiedBy=>"+modifiedBy);
    //Post to the server to handle the changes     
    //ajax code start
    $.ajax({  
        url: "/api/user", 
        type: "POST",
        data:{
            _token:_token,
            userFirstName:userFirstName, userLastName:userLastName, roleID:roleID, email:email, phoneNumber:phoneNumber, mobileNumber:mobileNumber, userName:userName, userPassword:userPassword, OrganisationID:OrganisationID, modifiedBy:modifiedBy
        },
        success:function(kyc_response){ 
            //console.log(kyc_response);
            if(kyc_response.status == 1){ 
                //alert(kyc_response.message);
                Swal.fire({
                    position: 'center',//top-end
                    icon: 'success',
                    title: kyc_response.message,
                    showConfirmButton: false,
                    timer: 3000
                });
                location.reload();
            }else{
                //alert(kyc_response.message);
                Swal.fire({
                    position: 'center',//top-end
                    icon: 'error',
                    title: kyc_response.message,
                    showConfirmButton: false,
                    timer: 3000
                });
            }
        },
        error: function(kyc_response) {
            //$('#subscriberName-error').text(kyc_response.responseJSON.errors.subscriberName);  
        }
    }); 
    //ajax code end
} //end of function 


function delete_user(){ //function start

var _token      = document.getElementsByName('_token')[0].value;//for laravel authentication 
var userID      = $('#userID_to_delete').val();
//console.log("_token=>"+_token+"&userID=>"+userID);
//Post to the server to handle the changes     
//ajax code start
$.ajax({  
    url: "/api/user", 
    type: "DELETE",
    data:{
        _token:_token,
        userID:userID
    },
    success:function(kyc_response){ 
        //console.log(kyc_response);
        if(kyc_response.status == 1){ 
            //alert(kyc_response.message);
            Swal.fire({
                position: 'center',//top-end
                icon: 'success',
                title: kyc_response.message,
                showConfirmButton: false,
                timer: 3000
            });
            location.reload();
        }else{
            //alert(kyc_response.message);
            Swal.fire({
                position: 'center',//top-end
                icon: 'error',
                title: kyc_response.message,
                showConfirmButton: false,
                timer: 3000
            });
        }
    },
    error: function(kyc_response) {
        //$('#subscriberName-error').text(kyc_response.responseJSON.errors.subscriberName);  
    }
}); 
//ajax code end
} //end of function 

function moxoget_shopifypages(){ //function start
    //return false;
    var _token                      = document.getElementsByName('_token')[0].value;//for laravel authentication 
    var moxoab_Where_To_Display     = $("#moxoab_Where_To_Display").val();
    var moxoab_Selected_Pages       = $("#moxoab_Selected_Pages").val();
    //console.log("_token=>"+_token+"&moxoab_Where_To_Display=>"+moxoab_Where_To_Display+"&moxoab_Selected_Pages=>"+moxoab_Selected_Pages);
    //Post to the server to handle the changes     
    //ajax code start
    $.ajax({  
        url: "/moxoget_shopifypages", ///abapp_live/saveNotificationFieldsOrder
        type: "POST",
        data:{
            _token:_token,
            moxoab_Where_To_Display:moxoab_Where_To_Display,
            moxoab_Selected_Pages:moxoab_Selected_Pages,
        },
        success:function(moxoresponse){ //console.log(moxoresponse);
            //console.log(moxoresponse.moxodatalist);
            if(moxoresponse.status == 1){ 
                var moxodatalist                        = moxoresponse.moxodatalist;
                var moxoforlooplength                   = moxodatalist.length;
                var moxosrno                            = 1;
                var moxoListDiv                         = '<option value="all">All</option>';
                for( var moxoindex1 = 0; moxoindex1 < moxoforlooplength; moxoindex1++ ){ 

                    var moxo_shopifypageId              = '';
                    var moxo_shopifypageTitle           = '';
                    if( moxodatalist[moxoindex1]['title'] != null ){    
                        moxo_shopifypageId              = moxodatalist[moxoindex1]['id'];   
                        moxo_shopifypageTitle           = moxodatalist[moxoindex1]['title']; 
                        moxo_shopifypagehandle          = moxodatalist[moxoindex1]['handle'];
                    }
                    //console.log("moxo_shopifypageTitle="+moxo_shopifypageTitle);
                    moxoListDiv +=  '<option value="'+moxo_shopifypagehandle+'">'+moxo_shopifypageTitle+'</option>';

                }
                $("#moxoab_Display_Page").html(moxoListDiv);
                
            }
        },
        error: function(moxoresponse) {
            //$('#subscriberName-error').text(moxoresponse.responseJSON.errors.subscriberName);  
        }
    }); 
    //ajax code end
} //end of function 




$(document).on('click', '.delete-btn', function( e ){

    let url = $(this).data('url');
    e.preventDefault();
    btn = this;
    //if(confirm("Are You Sure? You Want to delete it!") == true){
    //    location.href= url;
    //}

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your data has been deleted.',
            'success'
            );
            //location.href= url;
        }
    });

});    

$(document).on('click', '.edit_btn', function( e ){

    let url = $(this).data('url');
    e.preventDefault();
    btn = this;
    //if(confirm("Are You Sure? You Want to Edit it!") == true){
        location.href= url;
    //}
});  


$(document).on('change', '.moxoab_status_toggle', function( e ){
    //preloader
    $(".preloader").fadeIn("slow");
    var announcementbarid = $(this).data('announcementbarid');

    if($(this).is(":checked")){
        var moxoab_status = 1;
    }else{
        var moxoab_status = 0;
    }

    var _token            = document.getElementsByName('_token')[0].value;//for laravel 
    
    //alert("announcementbarid="+announcementbarid+"&_token"+_token);
    if(announcementbarid > 0){
        //Post to the server to handle the changes   
        //ajax code start
        $.ajax({  
            url: "/moxopost_abstatus", 
            type: "POST",
            data:{
                _token:_token,
                announcementbarid:announcementbarid,
                moxoab_status:moxoab_status,
            },
            success:function(response){ console.log(response);
                if (response) { 
                    //console.log(response.data);
                    //alert(response.message);

                    Swal.fire({
                        position: 'center',//top-end
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    
                    $(".preloader").fadeOut("slow"); //preloader end  
                }
            },
            error: function(response) {
                //$('#subscriberName-error').text(response.responseJSON.errors.subscriberName);  
            }
        }); 
        //ajax code end
    } //end of if 

});

/*
$(document).on('click', '.add_btn', function( e ){

    let url = $(this).data('url');
    e.preventDefault();
    btn = this;
    location.href= url; 

});  
*/  


</script>
<!-- shahadat code end -->
</body>

</html>