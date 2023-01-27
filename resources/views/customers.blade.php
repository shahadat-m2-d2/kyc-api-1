<x-header componentTitle="Hello Page" />

<!-- page-content start -->
<div class="page-content">
    <div class="widget-row">
        <div class="page-intro">
            <span class="page-title">{{$actorPageTitleMulti}}</span>
            <span class="page-desc">Hier zie je een overzicht van alle {{$actorPageTitleMulti}} @php //echo json_encode($clients);@endphp</span>
        </div>
    </div>

    <div class="widget-row">
        <div class="widget-area">
            <div class="table-actions">
                <div class="table-title">
                    {{$actorPageTitleMulti}} overzicht
                </div>

                <a class="table-add modal-button" href="#modalClientAdd">Nieuwe {{$actorPageTitleSingle}} toevoegen</a>
            </div>

            <table class="table table-default" id="datatable">
                <thead>
                    <tr>
                        <th class="th-sort">{{$actorPageTitleSingle}} naam</th>
                        <th class="th-sort">Registratiedatum</th>
                        <th class="th-sort">Laatste wijziging</th>
                        <th class="th-sort th-center">Bewerken</th>
                        <th class="th-sort th-center">Controles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $clients as $clients_key => $clients_value )
                    <!--  Row with Working Links -->
                    <tr>
                        <td href="#modalClientView" class="modal-button client-view-button" data-actorid="{{ $clients_value->actorID }}" data-actorname="{{ $clients_value->actorName }}" data-actorcreationdatetime="{{ $clients_value->actorCreationDateTime }}" data-actordatetimelastupdated="{{ $clients_value->actorDateTimeLastUpdated }}" data-actorcompanyregistrationnumber="{{ $clients_value->actorCompanyRegistrationNumber }}" data-actorvatregistrationnumber="{{ $clients_value->actorVATRegistrationNumber }}" data-actortypeid="{{ $clients_value->actorTypeID }}" data-actorstatusid="{{ $clients_value->actorStatusID }}" data-organisationid="{{ $clients_value->OrganisationID }}" data-actoryypedescription="{{ $clients_value->actorTypeDescription }}" data-actorstatusdescription="{{ $clients_value->actorStatusDescription }}" data-actorcontactid="{{ $clients_value->actorContactID }}" data-contacttypeid="{{ $clients_value->contactTypeID }}" data-actorcontactfirstname="{{ $clients_value->actorContactFirstName }}" data-actorcontactlastname="{{ $clients_value->actorContactLastName }}" data-actorcontactemail="{{ $clients_value->actorContactEmail }}" data-actorcontactphone="{{ $clients_value->actorContactPhone }}" data-actorcontactmobile="{{ $clients_value->actorContactMobile }}" data-actorcontacturl="{{ $clients_value->actorContactURL }}" data-modifieddatetime="{{ $clients_value->modifiedDateTime }}" data-modifiedby="{{ $clients_value->ModifiedBy }}" data-actoraddressid="{{ $clients_value->actorAddressID }}" data-addresstypeid="{{ $clients_value->addressTypeID }}" data-actoraddressstreet="{{ $clients_value->actorAddressStreet }}" data-actoraddressstreetnumber="{{ $clients_value->actorAddressStreetNumber }}" data-actoraddresspostalcode="{{ $clients_value->actorAddressPostalCode }}" data-actoraddresscity="{{ $clients_value->actorAddressCity }}" data-countryid="{{ $clients_value->countryID }}" data-useraddressadditionaladdresslines="{{ $clients_value->userAddressAdditionalAddressLines }}">{{ $clients_value->actorName }}</td>
                        <td>{{ $clients_value->actorCreationDateTime }}</td>
                        <td>{{ $clients_value->actorDateTimeLastUpdated }}</td>
                        <td class="action">
                            <a href="#modalClientEdit" class="modal-button client-edit-button" data-actorid="{{ $clients_value->actorID }}" data-actorname="{{ $clients_value->actorName }}" data-actorcreationdatetime="{{ $clients_value->actorCreationDateTime }}" data-actordatetimelastupdated="{{ $clients_value->actorDateTimeLastUpdated }}" data-actorcompanyregistrationnumber="{{ $clients_value->actorCompanyRegistrationNumber }}" data-actorvatregistrationnumber="{{ $clients_value->actorVATRegistrationNumber }}" data-actortypeid="{{ $clients_value->actorTypeID }}" data-actorstatusid="{{ $clients_value->actorStatusID }}" data-organisationid="{{ $clients_value->OrganisationID }}" data-actoryypedescription="{{ $clients_value->actorTypeDescription }}" data-actorstatusdescription="{{ $clients_value->actorStatusDescription }}" data-actorcontactid="{{ $clients_value->actorContactID }}" data-contacttypeid="{{ $clients_value->contactTypeID }}" data-actorcontactfirstname="{{ $clients_value->actorContactFirstName }}" data-actorcontactlastname="{{ $clients_value->actorContactLastName }}" data-actorcontactemail="{{ $clients_value->actorContactEmail }}" data-actorcontactphone="{{ $clients_value->actorContactPhone }}" data-actorcontactmobile="{{ $clients_value->actorContactMobile }}" data-actorcontacturl="{{ $clients_value->actorContactURL }}" data-modifieddatetime="{{ $clients_value->modifiedDateTime }}" data-modifiedby="{{ $clients_value->ModifiedBy }}" data-actoraddressid="{{ $clients_value->actorAddressID }}" data-addresstypeid="{{ $clients_value->addressTypeID }}" data-actoraddressstreet="{{ $clients_value->actorAddressStreet }}" data-actoraddressstreetnumber="{{ $clients_value->actorAddressStreetNumber }}" data-actoraddresspostalcode="{{ $clients_value->actorAddressPostalCode }}" data-actoraddresscity="{{ $clients_value->actorAddressCity }}" data-countryid="{{ $clients_value->countryID }}" data-useraddressadditionaladdresslines="{{ $clients_value->userAddressAdditionalAddressLines }}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#modalActorDelete" class="modal-button client-delete-button" data-actorid="{{ $clients_value->actorID }}" data-actorname="{{ $clients_value->actorName }}">
                                <i class="fa fa-ban"></i>
                            </a>
                        </td>
                        <td class="controls">
                            <img title="Initiële Controle" src="icons/IC-icon--filled.svg" class="control control-success modal-button" href="#modalICSuccess" width="30" height="30">
                            <img title="Doorlopende Controle" src="icons/DC-icon--filled.svg" class="control control-success modal-button" href="#modalDCSuccess" width="30" height="30">
                        </td>
                    </tr>
                    <!--  END Row with Working Links -->
                    @endforeach
                    <!-- 
                    <tr>
                        <td class="modal-button" href="#modalClientView">Skipdemakelaar</td>
                        <td>21-05-2022</td>
                        <td>07-12-2022</td>
                        <td class="action"><a class="modal-button" href="#modalClientEdit"><i class="fa fa-pencil"></i></a></td>
                        <td class="controls">
                            <img title="Initiële Controle" src="icons/IC-icon--filled.svg" class="control control-success modal-button" href="#modalICSuccess" width="30" height="30">
                            <img title="Doorlopende Controle" src="icons/DC-icon--filled.svg" class="control control-success modal-button" href="#modalDCSuccess" width="30" height="30">
                        </td>
                    </tr>
                    <tr>
                        <td class="modal-button" href="#modalClientView">Skipdemakelaar</td>
                        <td>21-05-2022</td>
                        <td>07-12-2022</td>
                        <td class="action"><a class="modal-button" href="#modalClientEdit"><i class="fa fa-pencil"></i></a></td>
                        <td class="controls">
                            <img title="Initiële Controle" src="icons/addC-icon--filled.svg" class="control control-add modal-button" href="#modalICNew" width="30" height="30">
                            <img title="Doorlopende Controle" src="icons/addC-icon--filled.svg" class="control control-add modal-button" href="#modalDCNew" width="30" height="30">
                        </td>
                    </tr>
                    <tr>
                        <td class="modal-button" href="#modalClientView">Skipdemakelaar</td>
                        <td>21-05-2022</td>
                        <td>07-12-2022</td>
                        <td class="action"><a class="modal-button" href="#modalClientEdit"><i class="fa fa-pencil"></i></a></td>
                        <td class="controls">
                            <img title="Initiële Controle" src="icons/IC-icon--filled.svg" class="control control-progress modal-button" href="#modalICProgress" width="30" height="30">
                            <img title="Doorlopende Controle" src="icons/DC-icon--filled.svg" class="control control-progress modal-button" href="#modalDCProgress" width="30" height="30">
                        </td>
                    </tr>
                    <tr>
                        <td class="modal-button" href="#modalClientView">Skipdemakelaar</td>
                        <td>21-05-2022</td>
                        <td>07-12-2022</td>
                        <td class="action"><a class="modal-button" href="#modalClientEdit"><i class="fa fa-pencil"></i></a></td>
                        <td class="controls">
                            <img title="Initiële Controle" src="icons/IC-icon--filled.svg" class="control control-error modal-button" href="#modalICError" width="30" height="30">
                            <img title="Doorlopende Controle" src="icons/DC-icon--filled.svg" class="control control-error modal-button" href="#modalDCError" width="30" height="30">
                        </td>
                    </tr> 
                -->
                </tbody>
            </table>

            <!-- <div class="table-pagination">
                <div class="pagination-total">
                    Showing <span>1</span> to <span>5</span> of <span>23</span> entries
                </div>
                <ul class="pagination">
                    <li class="pagination-btn">Previous</li>
                    <li class="pagination-btn active">1</li>
                    <li class="pagination-btn">2</li>
                    <li class="pagination-btn">3</li>
                    <li class="pagination-btn">Next</li>
                </ul>
            </div> -->
        </div>
    </div>

    <div id="modalClientAdd" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Nieuwe {{$actorPageTitleSingle}} toevoegen</span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <input type="hidden" id="OrganisationID" name="OrganisationID" value="1">
                    <input type="hidden" id="modifiedBy" name="modifiedBy" value="1">
                    <input type="hidden" id="actorTypeID" name="actorTypeID" value="{{ $actorTypeID }}"><!-- Customers(1), Suppliers(2)-->
                    <input type="hidden" id="actorStatusID" name="actorStatusID" value="1"><!-- in process(1), Available(2)-->
                    
                    <span class="form-section--title">Company details</span>

                    <div class="form-field">
                        <label>Company</label>
                        <input type="text" id="actorName" name="actorName" required="" >
                    </div>
                    <div class="form-field">
                        <label>VAT number</label>
                        <input type="text" id="actorVATRegistrationNumber" name="actorVATRegistrationNumber" required="" >
                    </div>
                    <div class="form-field">
                        <label>Chamber of Commerce number</label>
                        <input type="text" id="actorCompanyRegistrationNumber" name="actorCompanyRegistrationNumber" required="" >
                    </div>
                    
                    <span class="form-section--title">Address</span>

                    <div class="form-field">
                        <label>Address Type</label>
                        <select required id="addressTypeID" name="addressTypeID">
                            @foreach( $addresstypes as $addresstype_key => $addresstype_value )
                                <option value="{{ $addresstype_value->addressTypeID }}">{{ $addresstype_value->addressTypeDescription }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-field">
                        <label>Street</label>
                        <input type="text" id="actorAddressStreet" name="actorAddressStreet" required="" >
                    </div>
                    <div class="form-field">
                        <label>House number</label>
                        <input type="number" id="actorAddressStreetNumber" name="actorAddressStreetNumber" required="" >
                    </div>
                    <div class="form-field">
                        <label>Add on</label>
                        <input type="text" id="userAddressAdditionalAddressLines" name="userAddressAdditionalAddressLines">
                    </div>
                    <div class="form-field">
                        <label>Postcode</label>
                        <input type="text" id="actorAddressPostalCode" name="actorAddressPostalCode" required="" >
                    </div>
                    <div class="form-field">
                        <label>Place</label>
                        <input type="text" id="actorAddressCity" name="actorAddressCity" required="" >
                    </div>
                    <div class="form-field">
                        <label>Land</label>
                        <select id="countryID" name="countryID" required>
                            @foreach( $countries as $country_key => $country_value )
                                <option value="{{ $country_value->countryID }}">{{ $country_value->countryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <span class="form-section--title">Contact details</span>
                    <div class="form-field">
                        <label>Contact Type</label>
                        <select required id="contactTypeID" name="contactTypeID">
                            @foreach( $contacttypes as $contacttype_key => $contacttype_value )
                                <option value="{{ $contacttype_value->contactTypeID }}">{{ $contacttype_value->contactTypeDescription }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-field">
                        <label>First Name</label>
                        <input type="text" id="actorContactFirstName" name="actorContactFirstName" required="" >
                    </div>
                    <div class="form-field">
                        <label>Last name</label>
                        <input type="text" id="actorContactLastName" name="actorContactLastName" required="">
                    </div>
                    <div class="form-field">
                        <label>Email</label>
                        <input type="email" id="actorContactEmail" name="actorContactEmail" required="">
                    </div>
                    <div class="form-field">
                        <label>phone number</label>
                        <input type="tel" id="actorContactPhone" name="actorContactPhone">
                    </div>
                    <div class="form-field">
                        <label>Mobile number</label>
                        <input type="tel" id="actorContactMobile" name="actorContactMobile">
                    </div>

                    <span class="form-section--title">Extra</span>

                    <div class="form-field">
                        <label>Note</label>
                        <textarea id="actorContactURL" name="actorContactURL"></textarea>
                    </div>
                </form>


            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary" href="javascript:void();" onclick="add_actor();">Opslaan</a>
            </div>
        </div>
    </div>



    <div id="modalClientEdit" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">{{$actorPageTitleSingle}} bewerken</span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
            <form method="POST" enctype="multipart/form-data"> 
                    @csrf
                    <input type="hidden" id="actorID_to_edit" name="actorID_to_edit" value="0">
                    <input type="hidden" id="edit_OrganisationID" name="OrganisationID" value="1">
                    <input type="hidden" id="edit_modifiedBy" name="modifiedBy" value="1">
                    <input type="hidden" id="edit_actorTypeID" name="actorTypeID" value="{{ $actorTypeID }}"><!-- Customers(1), Suppliers(2)-->
                    <input type="hidden" id="edit_actorStatusID" name="actorStatusID" value="1"><!-- in process(1), Available(2)-->
                    <input type="hidden" id="edit_actorContactID" name="edit_actorContactID" value="0">
                    <input type="hidden" id="edit_actorAddressID" name="edit_actorAddressID" value="0">

                    <span class="form-section--title">Company details</span>

                    <div class="form-field">
                        <label>Company</label>
                        <input type="text" id="edit_actorName" name="edit_actorName" required="" >
                    </div>
                    <div class="form-field">
                        <label>VAT number</label>
                        <input type="text" id="edit_actorVATRegistrationNumber" name="edit_actorVATRegistrationNumber" required="" >
                    </div>
                    <div class="form-field">
                        <label>Chamber of Commerce number</label>
                        <input type="text" id="edit_actorCompanyRegistrationNumber" name="edit_actorCompanyRegistrationNumber" required="" >
                    </div>
                    
                    <span class="form-section--title">Address</span>

                    <div class="form-field">
                        <label>Address Type</label>
                        <select required id="edit_addressTypeID" name="edit_addressTypeID">
                            @foreach( $addresstypes as $addresstype_key => $addresstype_value )
                                <option value="{{ $addresstype_value->addressTypeID }}">{{ $addresstype_value->addressTypeDescription }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-field">
                        <label>Street</label>
                        <input type="text" id="edit_actorAddressStreet" name="edit_actorAddressStreet" required="" >
                    </div>
                    <div class="form-field">
                        <label>House number</label>
                        <input type="number" id="edit_actorAddressStreetNumber" name="edit_actorAddressStreetNumber" required="" >
                    </div>
                    <div class="form-field">
                        <label>Add on</label>
                        <input type="text" id="edit_userAddressAdditionalAddressLines" name="edit_userAddressAdditionalAddressLines">
                    </div>
                    <div class="form-field">
                        <label>Postcode</label>
                        <input type="text" id="edit_actorAddressPostalCode" name="edit_actorAddressPostalCode" required="" >
                    </div>
                    <div class="form-field">
                        <label>Place</label>
                        <input type="text" id="edit_actorAddressCity" name="edit_actorAddressCity" required="" >
                    </div>
                    <div class="form-field">
                        <label>Land</label>
                        <select id="edit_countryID" name="edit_countryID" required>
                            @foreach( $countries as $country_key => $country_value )
                                <option value="{{ $country_value->countryID }}">{{ $country_value->countryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <span class="form-section--title">Contact details</span>
                    <div class="form-field">
                        <label>Contact Type</label>
                        <select required id="edit_contactTypeID" name="edit_contactTypeID">
                            @foreach( $contacttypes as $contacttype_key => $contacttype_value )
                                <option value="{{ $contacttype_value->contactTypeID }}">{{ $contacttype_value->contactTypeDescription }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-field">
                        <label>First Name</label>
                        <input type="text" id="edit_actorContactFirstName" name="edit_actorContactFirstName" required="" >
                    </div>
                    <div class="form-field">
                        <label>Last name</label>
                        <input type="text" id="edit_actorContactLastName" name="edit_actorContactLastName" required="">
                    </div>
                    <div class="form-field">
                        <label>Email</label>
                        <input type="email" id="edit_actorContactEmail" name="edit_actorContactEmail" required="">
                    </div>
                    <div class="form-field">
                        <label>phone number</label>
                        <input type="tel" id="edit_actorContactPhone" name="edit_actorContactPhone">
                    </div>
                    <div class="form-field">
                        <label>Mobile number</label>
                        <input type="tel" id="edit_actorContactMobile" name="edit_actorContactMobile">
                    </div>

                    <span class="form-section--title">Extra</span>

                    <div class="form-field">
                        <label>Note</label>
                        <textarea id="edit_actorContactURL" name="edit_actorContactURL"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary" onclick="update_actor();">Opslaan</a>
            </div>
        </div>
    </div>


    <div id="modalClientView" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">{{$actorPageTitleSingle}}
                    <img src="icons/IC-icon--filled.svg" class="control control-success modal-button" href="#modalIC" width="40" height="40">
                    <img src="icons/addC-icon--filled.svg" class="control control-add modal-button" href="#modalDCNew" width="40" height="40">
                </span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="actorID_to_view" value="0">
                    <span class="form-section--title">Company details</span>

                    <div class="form-field">
                        <label>Company</label>
                        <span id="view_actorName">---</span>
                    </div>
                    <div class="form-field">
                        <label>VAT number</label>
                        <span id="view_actorVATRegistrationNumber">---</span>
                    </div>
                    <div class="form-field">
                        <label>Chamber of Commerce number</label>
                        <span id="view_actorCompanyRegistrationNumber">---</span>
                    </div>

                    <span class="form-section--title">Address</span>

                    <div class="form-field">
                        <label>Street</label>
                        <span id="view_actorAddressStreet">---</span>
                    </div>
                    <div class="form-field">
                        <label>House number</label>
                        <span id="view_actorAddressStreetNumber">---</span>
                    </div>
                    <div class="form-field">
                        <label>Postcode</label>
                        <span id="view_actorAddressPostalCode">---</span>
                    </div>
                    <div class="form-field">
                        <label>Place</label>
                        <span id="view_actorAddressCity">---</span>
                    </div>
                    <div class="form-field">
                        <label>Land</label>
                        <span>The Netherlands</span>
                    </div>

                    <span class="form-section--title">Contact details</span>

                    <div class="form-field">
                        <label>First Name</label>
                        <span id="view_actorContactFirstName">---</span>
                    </div>
                    <div class="form-field">
                        <label>Last name</label>
                        <span id="view_actorContactLastName">---</span>
                    </div>

                    <div class="form-field">
                        <label>Email</label>
                        <span id="view_actorContactEmail">---</span>
                    </div>
                    <div class="form-field">
                        <label>phone number</label>
                        <span id="view_actorContactPhone">---</span>
                    </div>
                    <div class="form-field">
                        <label>Mobile number</label>
                        <span id="view_actorContactMobile">---</span>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div id="modalICNew" class="modal modal-steps">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Nieuwe Initiele controle
                </span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <div class="steps-container">
                    <div class="steps">
                        <div class="step active">1</div>
                        <div class="step">2</div>
                        <div class="step">3</div>
                        <div class="step">4</div>
                        <div class="step">5</div>
                        <div class="step">6</div>
                        <div class="step">7</div>
                        <div class="step">8</div>
                        <div class="step">9</div>
                        <div class="step">10</div>
                        <div class="step">11</div>
                    </div>
                </div>

                <!-- Step 1 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>De PNK wil slechts van één of twee verschillende producten afnemen</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label>De waarde van de eerste transactie is meer dan € 50.000,-</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label>De verwachte totale waarde van de transacties in een periode van twaalf maanden is meer dan € 100.000,-</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-error">
                                <div class="alert-icon"><i class="fa fa-times"></i></div>
                                <span>Zodra er 3x "nee" word gekozen zal deze melding verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 2 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Een relatief groot bedrijf met een omzet van minimaal € 100M dat aan consumenten een relatief breed pakket aan producten verkoopt? </label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label></label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-error">
                                <div class="alert-icon"><i class="fa fa-times"></i></div>
                                <span>Zodra er 1x "ja" word gekozen zal deze melding verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 3 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Een organisatie wiens hoofdkantoor in het buitenland gevestigd is en/of wiens zakelijke activiteiten zich hoofdzakelijk in het buitenland afspelen?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-warning">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <span>Zodra er "ja" word gekozen zal deze waarschuwing verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 4 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Bezoekverslag</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier het bezoekverslag
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>
                        <div class="form-field">
                            <label>Voldoet de PNK aan de eisen van het bezoekverslag</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <div class="alert alert-warning">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze waarschuwing verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 5 skip if step 4 is success -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Door PNK opgegeven adres</label>
                            <span>Pannekoekstraat 34</span>
                        </div>
                        <div class="form-field">
                            <label>Is er een bedrijfspand aanwezig op het door de PNK opgegeven adres?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <div class="alert alert-warning">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze waarschuwing verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 6 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Nieuwe relatie</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier het formulier
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>
                        <div class="form-field">
                            <label>Voldoet de PNK aan de eisen van het Nieuwe relatie formulier?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <div class="alert alert-warning">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze waarschuwing verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 7 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Controleer middels de SBI-code of de activteiten van de PNK branche-gerelateerd zijn</label>
                            <textarea required></textarea>
                        </div>
                        <div class="form-field">
                            <label>SBI-code</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier de SBI-code
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>
                        <div class="form-field">
                            <label>Is de PNK minimaal 6 maanden actief in de huidige branche?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-warning">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze waarschuwing verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 8 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Door de PNK opgegeven BTW nummer</label>
                            <span>123456789</span>
                        </div>
                        <div class="form-field">
                            <label>Is het BTW nummer van de PNK geldig?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label>VIES-check</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier een schriftelijk verslag
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>
                        <div class="form-field">
                            <div class="alert alert-warning">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze waarschuwing verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 9 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Dun & Bradstreet check</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier een schriftelijk verslag
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>
                        <div class="form-field">
                            <label>Is de check bij Dun & Bradstreet succesvol verlopen?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-warning">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze waarschuwing verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 10 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Euler Hermans check</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier een schriftelijk verslag
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>
                        <div class="form-field">
                            <label>Is de check bij Euler Hermans succesvol verlopen?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-warning">
                                <div class="alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze waarschuwing verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 11 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Door de PNK opgegeven referenties</label>
                            <span>Leverancier 1</span>
                            <span>Leverancier 2</span>
                            <span>Leverancier 3</span>
                        </div>

                        <div class="form-field">
                            <label>Zijn de referenties betrouwbaar?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-error">
                                <div class="alert-icon"><i class="fa fa-times"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze melding verschijnen</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary">Opslaan</a>
            </div>
        </div>
    </div>

    <div id="modalDCNew" class="modal modal-steps">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Nieuwe Doorlopende Controle
                </span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <div class="steps-container">
                    <div class="steps">
                        <div class="step active">1</div>
                        <div class="step">2</div>
                        <div class="step">3</div>
                        <div class="step">4</div>
                    </div>
                </div>

                <!-- Step 1 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Aan welke partij(en) gaat de {{$actorPageTitleSingle}} de producten leveren?</label>
                            <input type="text" class="multi-input" required /><i class="fa fa-plus multi-input--icon"></i>





                        </div>
                        <div class="form-field">
                            <label>Hoe ziet het KYC proces van de {{$actorPageTitleSingle}} eruit?</label>
                            <textarea required></textarea>
                        </div>
                        <div class="form-field">
                            <label>Word de {{$actorPageTitleSingle}} als betrouwbaar gezien na de controle?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <!--     
                        <div class="form-field">
                            <div class="alert alert-error">
                                <div class="alert-icon"><i class="fa fa-times"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze melding verschijnen</span>
                            </div>
                        </div> -->
                    </form>
                </div>

                <!-- Step 2 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Is de door de {{$actorPageTitleSingle}} gevraagde afname van producten reëel op basis van de marktpositie</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>

                        <!-- <div class="form-field">
                            <div class="alert alert-error">
                                <div class="alert-icon"><i class="fa fa-times"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze melding verschijnen</span>
                            </div>
                        </div> -->
                    </form>
                </div>

                <!-- Step 3 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Is het BTW nummer van de {{$actorPageTitleSingle}} correct?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <label>Door {{$actorPageTitleSingle}} opgegeven BTW nummer</label>
                            <span>123456789</span>
                        </div>

                        <!-- <div class="form-field">
                            <div class="alert alert-error">
                                <div class="alert-icon"><i class="fa fa-times"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze melding verschijnen</span>
                            </div>
                        </div> -->
                    </form>
                </div>

                <!-- Step 4 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Vind de levering plaats buiten Nederland?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field"></div>
                        <div class="form-field">
                            <label>Vrachtbrief (als vorig antwoord Ja is)</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier de vrachtbrief
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>

                        <div class="form-field">
                            <label>Is de vrachtbrief goedgekeurd?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <!-- <div class="form-field">
                                    <div class="alert alert-error">
                                        <div class="alert-icon"><i class="fa fa-times"></i></div>
                                        <span>Zodra er "nee" word gekozen zal deze melding verschijnen</span>
                                    </div>
                                </div> -->
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary">Opslaan</a>
            </div>
        </div>
    </div>

    <div id="modalDCSuccess" class="modal modal-steps">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Afgeronde Doorlopende Controle
                    <a class="link-primary modal-button" href="#modalDCoverview">Bekijk controle overzicht</a>
                </span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">

                <!-- Step 1 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Aan welke partij(en) gaat de {{$actorPageTitleSingle}} de producten leveren?</label>
                            <span>Partij A</span>
                            <span>Partij B</span>
                            <span>Partij C</span>
                        </div>
                        <div class="form-field">
                            <label>Hoe ziet het KYC proces van de {{$actorPageTitleSingle}} eruit?</label>
                            <span>Hier kan een kleine uitleg komen over hoe het proces eruit ziet van de {{$actorPageTitleSingle}}</span>
                        </div>
                        <div class="form-field">
                            <label>Word de {{$actorPageTitleSingle}} als betrouwbaar gezien na de controle?</label>
                            <span>Ja</span>
                        </div>
                    </form>
                </div>

                <!-- Step 2 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Is de door de {{$actorPageTitleSingle}} gevraagde afname van producten reëel op basis van de marktpositie</label>
                            <span>ja</span>
                        </div>
                    </form>
                </div>

                <!-- Step 3 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Is het BTW nummer van de {{$actorPageTitleSingle}} correct?</label>
                            <span>Ja</span>
                        </div>

                        <div class="form-field">
                            <label>Door {{$actorPageTitleSingle}} opgegeven BTW nummer</label>
                            <span>123456789</span>
                        </div>
                    </form>
                </div>

                <!-- Step 4 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Vrachtbrief</label>
                            <span>Vrachtbrief-klantA.pdf</span>
                        </div>

                        <div class="form-field">
                            <label>Is de vrachtbrief goedgekeurd?</label>
                            <span>Ja</span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div id="modalDCError" class="modal modal-steps">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Afgekeurde Doorlopende Controle
                    <a class="link-primary modal-button" href="#modalDCoverview">Bekijk controle overzicht</a>
                </span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">

                <!-- Step 1 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Aan welke partij(en) gaat de {{$actorPageTitleSingle}} de producten leveren?</label>
                            <input type="text" placeholder="Partij A" />
                        </div>
                        <div class="form-field">
                            <label>Hoe ziet het KYC proces van de {{$actorPageTitleSingle}} eruit?</label>
                            <textarea placeholder="Hier kan een kleine uitleg komen over hoe het proces eruit ziet van de {{$actorPageTitleSingle}}"></textarea>
                        </div>
                        <div class="form-field">
                            <label>Word de {{$actorPageTitleSingle}} als betrouwbaar gezien na de controle?</label>
                            <select>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-success">
                                <div class="alert-icon"><i class="fa fa-check"></i></div>
                                <span>Deze stap is succesvol afgerond</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 2 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Is de door de {{$actorPageTitleSingle}} gevraagde afname van producten reëel op basis van de marktpositie</label>
                            <select>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <div class="alert alert-success">
                                <div class="alert-icon"><i class="fa fa-check"></i></div>
                                <span>Deze stap is succesvol afgerond</span>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Step 3 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Door {{$actorPageTitleSingle}} opgegeven BTW nummer</label>
                            <span>123456789</span>
                        </div>

                        <div class="form-field">
                            <label>Is het BTW nummer van de {{$actorPageTitleSingle}} correct?</label>
                            <select required>
                                <option>Nee</option>
                                <option>Ja</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <div class="alert alert-error">
                                <div class="alert-icon"><i class="fa fa-times"></i></div>
                                <span>Aangezien er "nee" het opgegeven antwoord is, is de controle afgekeurd</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 4 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Vind de levering plaats buiten Nederland?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label>Vrachtbrief (als vorig antwoord Ja is)</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier de vrachtbrief
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>

                        <div class="form-field">
                            <label>Is de vrachtbrief goedgekeurd?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <!-- <div class="form-field">
                                    <div class="alert alert-error">
                                        <div class="alert-icon"><i class="fa fa-times"></i></div>
                                        <span>Zodra er "nee" word gekozen zal deze melding verschijnen</span>
                                    </div>
                                </div> -->
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary">Opslaan</a>
            </div>
        </div>
    </div>

    <div id="modalDCProgress" class="modal modal-steps">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Progress Doorlopende Controle
                    <a class="link-primary modal-button" href="#modalDCoverview">Bekijk controle overzicht</a>
                </span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">

                <!-- Step 1 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Aan welke partij(en) gaat de {{$actorPageTitleSingle}} de producten leveren?</label>
                            <input type="text" placeholder="Partij A" />
                        </div>
                        <div class="form-field">
                            <label>Hoe ziet het KYC proces van de {{$actorPageTitleSingle}} eruit?</label>
                            <textarea placeholder="Hier kan een kleine uitleg komen over hoe het proces eruit ziet van de {{$actorPageTitleSingle}}"></textarea>
                        </div>
                        <div class="form-field">
                            <label>Word de {{$actorPageTitleSingle}} als betrouwbaar gezien na de controle?</label>
                            <select>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <div class="alert alert-success">
                                <div class="alert-icon"><i class="fa fa-check"></i></div>
                                <span>Deze stap is succesvol afgerond</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Step 2 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Is de door de {{$actorPageTitleSingle}} gevraagde afname van producten reëel op basis van de marktpositie</label>
                            <select>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <div class="alert alert-success">
                                <div class="alert-icon"><i class="fa fa-check"></i></div>
                                <span>Deze stap is succesvol afgerond</span>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Step 3 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Door {{$actorPageTitleSingle}} opgegeven BTW nummer</label>
                            <span>123456789</span>
                        </div>

                        <div class="form-field">
                            <label>Is het BTW nummer van de {{$actorPageTitleSingle}} correct?</label>
                            <select required>
                                <option>Nee</option>
                                <option>Ja</option>
                            </select>
                        </div>

                        <!-- <div class="form-field">
                            <div class="alert alert-error">
                                <div class="alert-icon"><i class="fa fa-times"></i></div>
                                <span>Zodra er "nee" word gekozen zal deze melding verschijnen</span>
                            </div>
                        </div> -->
                    </form>
                </div>

                <!-- Step 4 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Vind de levering plaats buiten Nederland?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label>Vrachtbrief (als vorig antwoord Ja is)</label>
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> Upload hier de vrachtbrief
                            </label>
                            <input type="file" id="file-upload" name="filename">
                        </div>

                        <div class="form-field">
                            <label>Is de vrachtbrief goedgekeurd?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>
                        <!-- <div class="form-field">
                                    <div class="alert alert-error">
                                        <div class="alert-icon"><i class="fa fa-times"></i></div>
                                        <span>Zodra er "nee" word gekozen zal deze melding verschijnen</span>
                                    </div>
                                </div> -->
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary">Opslaan</a>
            </div>
        </div>
    </div>

    <div id="modalDCoverview" class="modal modal-steps">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Overzicht Doorlopende controles

                </span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <table class="table table-default">
                    <thead>
                        <tr>
                            <th class="th-sort">Datum</th>
                            <th class="th-sort">Reden</th>
                            <th class="th-sort th-center">Status</th>
                            <th class="th-center">Actie</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>02-10-2022</td>
                            <td>Order</td>
                            <td class="status status-success"><i class="fa fa-circle"></i></td>
                            <td class="action"><a class="modal-button" href="#modalDCSuccess"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>18-09-2022</td>
                            <td>Maandelijks</td>
                            <td class="status status-success"><i class="fa fa-circle"></i></td>
                            <td class="action"><a class="modal-button" href="#modalDCSuccess"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>21-08-2022</td>
                            <td>Maandelijks</td>
                            <td class="status status-success"><i class="fa fa-circle"></i></td>
                            <td class="action"><a class="modal-button" href="#modalDCSuccess"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>09-03-2022</td>
                            <td>Jaarlijks</td>
                            <td class="status status-error"><i class="fa fa-circle"></i></td>
                            <td class="action"><a class="modal-button" href="#modalDCError"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div id="modalICoverview" class="modal modal-steps">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Overzicht Initiële controles

                </span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <table class="table table-default">
                    <thead>
                        <tr>
                            <th class="th-sort">Stap</th>
                            <th class="th-sort th-center">Status</th>
                            <th class="th-center">Actie</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1. Producten & Waarde</td>
                            <td class="status status-success"><i class="fa fa-circle"></i></td>
                            <td class="action"><a class="modal-button" href="#modalICSuccess"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>2. Omzet</td>
                            <td class="status status-success"><i class="fa fa-circle"></i></td>
                            <td class="action"><a class="modal-button" href="#modalICSuccess"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        <tr>
                            <td>3. Locatie hoofdkantoor</td>
                            <td class="status status-error"><i class="fa fa-circle"></i></td>
                            <td class="action"><a class="modal-button" href="#modalICError"><i class="fa fa-eye"></i></a></td>
                        </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div id="modalActorDelete" class="modal">
        <input type="hidden" id="actorID_to_delete" value="0">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">{{$actorPageTitleSingle}} verwijderen</span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <p>Weet u zeker dat u Ad Mini wilt verwijderen?</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Nee</a>
                <a class="btn btn-primary" onclick="delete_actor();">Ja</a>
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
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script type="text/javascript">
    $(document).on('click', '.client-view-button', function(e) {

        let actorID                             = $(this).data('actorid');
        let actorName                           = $(this).data('actorname');
        let actorCreationDateTime               = $(this).data('actorcreationdatetime');
        let actorDateTimeLastUpdated            = $(this).data('actordatetimelastupdated');
        let actorCompanyRegistrationNumber      = $(this).data('actorcompanyregistrationnumber');
        let actorVATRegistrationNumber          = $(this).data('actorvatregistrationnumber');

        let actorTypeID                         = $(this).data('actortypeid');
        let actorStatusID                       = $(this).data('actorstatusid');
        let OrganisationID                      = $(this).data('organisationid');
        let actorTypeDescription                = $(this).data('actortypedescription');
        let actorStatusDescription              = $(this).data('actorstatusdescription');
        let actorContactID                      = $(this).data('actorcontactid');
        let contactTypeID                       = $(this).data('contacttypeid');

        let actorContactFirstName               = $(this).data('actorcontactfirstname');
        let actorContactLastName                = $(this).data('actorcontactlastname');
        let actorContactEmail                   = $(this).data('actorcontactemail');
        let actorContactPhone                   = $(this).data('actorcontactphone');
        let actorContactMobile                  = $(this).data('actorcontactmobile');
        let actorContactURL                     = $(this).data('actorcontacturl');
        let modifiedDateTime                    = $(this).data('modifieddatetime');
        let ModifiedBy                          = $(this).data('modifiedby');

        let actorAddressID                      = $(this).data('actoraddressid');
        let addressTypeID                       = $(this).data('addresstypeid');
        let actorAddressStreet                  = $(this).data('actoraddressstreet');
        let actorAddressStreetNumber            = $(this).data('actoraddressstreetnumber');
        let actorAddressPostalCode              = $(this).data('actoraddresspostalcode');

        let actorAddressCity                    = $(this).data('actoraddresscity');
        let countryID                           = $(this).data('countryid');
        let userAddressAdditionalAddressLines   = $(this).data('useraddressadditionaladdresslines');

        e.preventDefault();
        btn = this;

        $('#actorID_to_view').val(actorID);
        $('#view_actorName').html(actorName);
        $('#view_actorCompanyRegistrationNumber').html(actorCompanyRegistrationNumber);
        $('#view_actorVATRegistrationNumber').html(actorVATRegistrationNumber);
        $('#view_actorContactFirstName').html(actorContactFirstName);
        $('#view_actorContactLastName').html(actorContactLastName);
        $('#view_actorContactEmail').html(actorContactEmail);
        $('#view_actorContactPhone').html(actorContactPhone);
        $('#view_actorContactMobile').html(actorContactMobile);
        $('#view_actorAddressStreet').html(actorAddressStreet);
        $('#view_actorAddressStreetNumber').html(actorAddressStreetNumber);
        $('#view_actorAddressPostalCode').html(actorAddressPostalCode);
        $('#view_actorAddressCity').html(actorAddressCity);

        //$('#view_actorCreationDateTime').html(actorCreationDateTime);
        //$('#view_actorDateTimeLastUpdated').html(actorDateTimeLastUpdated);
        //$('#view_actorTypeDescription').html(actorTypeDescription);
        //$('#view_actorStatusDescription').html(actorStatusDescription);
        //$('#view_actorContactURL').html(actorContactURL);
        //$('#view_userAddressAdditionalAddressLines').html(userAddressAdditionalAddressLines);    

    });

    function add_actor() { //function start

        //return false;
        var _token                                  = document.getElementsByName('_token')[0].value; //for laravel authentication 
        var OrganisationID                          = $("#OrganisationID").val();
        var actorTypeID                             = $("#actorTypeID").val();
        var actorName                               = $("#actorName").val();
        var actorVATRegistrationNumber              = $("#actorVATRegistrationNumber").val();
        var actorCompanyRegistrationNumber          = $("#actorCompanyRegistrationNumber").val();
        var addressTypeID                           = $("#addressTypeID").val();
        var actorAddressStreet                      = $("#actorAddressStreet").val();
        var actorAddressStreetNumber                = $("#actorAddressStreetNumber").val();

        var userAddressAdditionalAddressLines       = $("#userAddressAdditionalAddressLines").val();
        var actorAddressPostalCode                  = $("#actorAddressPostalCode").val();
        var actorAddressCity                        = $("#actorAddressCity").val();
        var countryID                               = $("#countryID").val();
        var contactTypeID                           = $("#contactTypeID").val();
        var actorContactFirstName                   = $("#actorContactFirstName").val();
        var actorContactLastName                    = $("#actorContactLastName").val();
        var actorContactEmail                       = $("#actorContactEmail").val();

        var actorContactPhone                       = $("#actorContactPhone").val();
        var actorContactMobile                      = $("#actorContactMobile").val();
        var actorContactURL                         = $("#actorContactURL").val();
        var modifiedBy                              = $("#modifiedBy").val();
        var actorStatusID                           = $("#actorStatusID").val();
        var ModifiedBy                              = modifiedBy;
        
        //Post to the server to handle the changes     
        //ajax code start
        $.ajax({
            url: "/api/actor",
            type: "POST",
            data: {
                _token: _token,
                actorName: actorName,
                actorVATRegistrationNumber: actorVATRegistrationNumber,
                actorCompanyRegistrationNumber: actorCompanyRegistrationNumber,
                actorTypeID:actorTypeID,
                actorStatusID:actorStatusID,
                OrganisationID: OrganisationID
            },
            success: function(kyc_response) {
                //console.log(kyc_response);
                if (kyc_response.status == 1) {
                    var actorID = kyc_response.lastInsertId;

                    $.ajax({
                        url: "/api/actorcontact",
                        type: "POST",
                        data: {
                            _token: _token,
                            actorID: actorID,
                            contactTypeID: contactTypeID,
                            actorContactFirstName: actorContactFirstName,
                            actorContactLastName: actorContactLastName,
                            actorContactEmail:actorContactEmail,
                            actorContactPhone:actorContactPhone,
                            actorContactMobile: actorContactMobile,
                            actorContactURL: actorContactURL,
                            ModifiedBy: ModifiedBy
                        },
                        success: function(actorcontact_response) {
                            //console.log(actorcontact_response);
                            if (actorcontact_response.status == 1) {
                                var actorContactID  = actorcontact_response.lastInsertId;   
                            } else {
                                //alert(actorcontact_response.message);
                                Swal.fire({
                                    position: 'center', //top-end
                                    icon: 'error',
                                    title: actorcontact_response.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        },
                        error: function(actorcontact_response) {
                            //$('#subscriberName-error').text(actorcontact_response.responseJSON.errors.subscriberName);  
                        }
                    });     

                    $.ajax({
                        url: "/api/actoraddress",
                        type: "POST",
                        data: {
                            _token: _token,
                            actorID: actorID,
                            addressTypeID: addressTypeID,
                            actorAddressStreet: actorAddressStreet,
                            actorAddressStreetNumber: actorAddressStreetNumber,
                            actorAddressPostalCode:actorAddressPostalCode,
                            actorAddressCity:actorAddressCity,
                            countryID: countryID,
                            userAddressAdditionalAddressLines: userAddressAdditionalAddressLines,
                            ModifiedBy: ModifiedBy
                        },
                        success: function(actoraddress_response) {
                            //console.log(actoraddress_response);
                            if (actoraddress_response.status == 1) {
                                var actorContactID  = actoraddress_response.lastInsertId;   
                            } else {
                                //alert(actoraddress_response.message);
                                Swal.fire({
                                    position: 'center', //top-end
                                    icon: 'error',
                                    title: actoraddress_response.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        },
                        error: function(actoraddress_response) {
                            //$('#subscriberName-error').text(actoraddress_response.responseJSON.errors.subscriberName);  
                        }
                    }); 

                    Swal.fire({
                        position: 'center', //top-end
                        icon: 'success',
                        title: kyc_response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    location.reload();


                } else {
                    //alert(kyc_response.message);
                    Swal.fire({
                        position: 'center', //top-end
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


    $(document).on('click', '.client-edit-button', function(e) {

        let actorID                             = $(this).data('actorid');
        let actorName                           = $(this).data('actorname');
        let actorCreationDateTime               = $(this).data('actorcreationdatetime');
        let actorDateTimeLastUpdated            = $(this).data('actordatetimelastupdated');
        let actorCompanyRegistrationNumber      = $(this).data('actorcompanyregistrationnumber');
        let actorVATRegistrationNumber          = $(this).data('actorvatregistrationnumber');

        let actorTypeID                         = $(this).data('actortypeid');
        let actorStatusID                       = $(this).data('actorstatusid');
        let OrganisationID                      = $(this).data('organisationid');
        let actorTypeDescription                = $(this).data('actortypedescription');
        let actorStatusDescription              = $(this).data('actorstatusdescription');
        let actorContactID                      = $(this).data('actorcontactid');
        let contactTypeID                       = $(this).data('contacttypeid');

        let actorContactFirstName               = $(this).data('actorcontactfirstname');
        let actorContactLastName                = $(this).data('actorcontactlastname');
        let actorContactEmail                   = $(this).data('actorcontactemail');
        let actorContactPhone                   = $(this).data('actorcontactphone');
        let actorContactMobile                  = $(this).data('actorcontactmobile');
        let actorContactURL                     = $(this).data('actorcontacturl');
        let modifiedDateTime                    = $(this).data('modifieddatetime');
        let ModifiedBy                          = $(this).data('modifiedby');

        let actorAddressID                      = $(this).data('actoraddressid');
        let addressTypeID                       = $(this).data('addresstypeid');
        let actorAddressStreet                  = $(this).data('actoraddressstreet');
        let actorAddressStreetNumber            = $(this).data('actoraddressstreetnumber');
        let actorAddressPostalCode              = $(this).data('actoraddresspostalcode');

        let actorAddressCity                    = $(this).data('actoraddresscity');
        let countryID                           = $(this).data('countryid');
        let userAddressAdditionalAddressLines   = $(this).data('useraddressadditionaladdresslines');

        e.preventDefault();
        btn = this;

        $('#actorID_to_edit').val(actorID);

        $("#edit_OrganisationID").val(OrganisationID);
        $("#edit_actorTypeID").val(actorTypeID);
        $("#edit_actorName").val(actorName);
        $("#edit_actorVATRegistrationNumber").val(actorVATRegistrationNumber);
        $("#edit_actorCompanyRegistrationNumber").val(actorCompanyRegistrationNumber);
        $("#edit_addressTypeID").val(addressTypeID).change();
        $("#edit_actorAddressStreet").val(actorAddressStreet);
        $("#edit_actorAddressStreetNumber").val(actorAddressStreetNumber);

        $("#edit_userAddressAdditionalAddressLines").val(userAddressAdditionalAddressLines);
        $("#edit_actorAddressPostalCode").val(actorAddressPostalCode);
        $("#edit_actorAddressCity").val(actorAddressCity);
        $("#edit_countryID").val(countryID).change();;
        $("#edit_contactTypeID").val(contactTypeID).change();;
        $("#edit_actorContactFirstName").val(actorContactFirstName);
        $("#edit_actorContactLastName").val(actorContactLastName);
        $("#edit_actorContactEmail").val(actorContactEmail);

        $("#edit_actorContactPhone").val(actorContactPhone);
        $("#edit_actorContactMobile").val(actorContactMobile);
        $("#edit_actorContactURL").val(actorContactURL);
        $("#edit_modifiedBy").val(modifiedBy);
        $("#edit_actorStatusID").val(actorStatusID);

        $("#edit_actorContactID").val(actorContactID);
        $("#edit_actorAddressID").val(actorAddressID);


    });

    function update_actor() { //function start

        //return false;
        var _token = document.getElementsByName('_token')[0].value; //for laravel authentication 
        var actorID                                 = $("#actorID_to_edit").val();
        var OrganisationID                          = $("#edit_OrganisationID").val();
        var actorTypeID                             = $("#edit_actorTypeID").val();
        var actorName                               = $("#edit_actorName").val();
        var actorVATRegistrationNumber              = $("#edit_actorVATRegistrationNumber").val();
        var actorCompanyRegistrationNumber          = $("#edit_actorCompanyRegistrationNumber").val();
        var addressTypeID                           = $("#edit_addressTypeID").val();
        var actorAddressStreet                      = $("#edit_actorAddressStreet").val();
        var actorAddressStreetNumber                = $("#edit_actorAddressStreetNumber").val();

        var userAddressAdditionalAddressLines       = $("#edit_userAddressAdditionalAddressLines").val();
        var actorAddressPostalCode                  = $("#edit_actorAddressPostalCode").val();
        var actorAddressCity                        = $("#edit_actorAddressCity").val();
        var countryID                               = $("#edit_countryID").val();
        var contactTypeID                           = $("#edit_contactTypeID").val();
        var actorContactFirstName                   = $("#edit_actorContactFirstName").val();
        var actorContactLastName                    = $("#edit_actorContactLastName").val();
        var actorContactEmail                       = $("#edit_actorContactEmail").val();

        var actorContactPhone                       = $("#edit_actorContactPhone").val();
        var actorContactMobile                      = $("#edit_actorContactMobile").val();
        var actorContactURL                         = $("#edit_actorContactURL").val();
        var modifiedBy                              = $("#edit_modifiedBy").val();
        var actorStatusID                           = $("#edit_actorStatusID").val();
        var ModifiedBy                              = modifiedBy;

        var actorContactID                          = $("#edit_actorContactID").val();
        var actorAddressID                          = $("#edit_actorAddressID").val();

        
        //Post to the server to handle the changes     
        //ajax code start
        $.ajax({
            url: "/api/actor",
            type: "PUT",
            data: {
                _token: _token,
                actorID: actorID,
                actorName: actorName,
                actorVATRegistrationNumber: actorVATRegistrationNumber,
                actorCompanyRegistrationNumber: actorCompanyRegistrationNumber,
                actorTypeID:actorTypeID,
                actorStatusID:actorStatusID,
                OrganisationID: OrganisationID
            },
            success: function(kyc_response) {
                //console.log(kyc_response);
                if (kyc_response.status == 1) {
                    //alert(kyc_response.message);

                    $.ajax({
                        url: "/api/actorcontact",
                        type: "PUT",
                        data: {
                            _token: _token,
                            actorContactID:actorContactID,
                            actorID: actorID,
                            contactTypeID: contactTypeID,
                            actorContactFirstName: actorContactFirstName,
                            actorContactLastName: actorContactLastName,
                            actorContactEmail:actorContactEmail,
                            actorContactPhone:actorContactPhone,
                            actorContactMobile: actorContactMobile,
                            actorContactURL: actorContactURL,
                            ModifiedBy: ModifiedBy
                        },
                        success: function(actorcontact_response) {
                            //console.log(actorcontact_response);
                            if (actorcontact_response.status == 1) {
                                   
                            } else {
                                //alert(actorcontact_response.message);
                                Swal.fire({
                                    position: 'center', //top-end
                                    icon: 'error',
                                    title: actorcontact_response.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        },
                        error: function(actorcontact_response) {
                            //$('#subscriberName-error').text(actorcontact_response.responseJSON.errors.subscriberName);  
                        }
                    });     

                    $.ajax({
                        url: "/api/actoraddress",
                        type: "PUT",
                        data: {
                            _token: _token,
                            actorAddressID:actorAddressID,
                            actorID: actorID,
                            addressTypeID: addressTypeID,
                            actorAddressStreet: actorAddressStreet,
                            actorAddressStreetNumber: actorAddressStreetNumber,
                            actorAddressPostalCode:actorAddressPostalCode,
                            actorAddressCity:actorAddressCity,
                            countryID: countryID,
                            userAddressAdditionalAddressLines: userAddressAdditionalAddressLines,
                            ModifiedBy: ModifiedBy
                        },
                        success: function(actoraddress_response) {
                            //console.log(actoraddress_response);
                            if (actoraddress_response.status == 1) {
                                  
                            } else {
                                //alert(actoraddress_response.message);
                                Swal.fire({
                                    position: 'center', //top-end
                                    icon: 'error',
                                    title: actoraddress_response.message,
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        },
                        error: function(actoraddress_response) {
                            //$('#subscriberName-error').text(actoraddress_response.responseJSON.errors.subscriberName);  
                        }
                    }); 

                    Swal.fire({
                        position: 'center', //top-end
                        icon: 'success',
                        title: kyc_response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    location.reload();
                } else {
                    //alert(kyc_response.message);
                    Swal.fire({
                        position: 'center', //top-end
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


    $(document).on('click', '.client-delete-button', function(e) {

        let actorID     = $(this).data('actorid');
        let actorName   = $(this).data('actorname');
        e.preventDefault();
        btn = this;
        $('#actorID_to_delete').val(actorID);
        $('#modalActorDelete').find('.modal-body p').text('Weet u zeker dat u ' + actorName + ' wilt verwijderen?');

    });

    function delete_actor() { //function start

        var _token  = document.getElementsByName('_token')[0].value; //for laravel authentication 
        var actorID = $('#actorID_to_delete').val();
        //console.log("_token=>"+_token+"&userID=>"+userID);
        //Post to the server to handle the changes     
        //ajax code start
        $.ajax({
            url: "/api/actor",
            type: "DELETE",
            data: {
                _token: _token,
                actorID: actorID
            },
            success: function(kyc_response) {
                //console.log(kyc_response);
                if (kyc_response.status == 1) {
                    //alert(kyc_response.message);
                    Swal.fire({
                        position: 'center', //top-end
                        icon: 'success',
                        title: kyc_response.message,
                        showConfirmButton: false,
                        timer: 3000
                    });
                    location.reload();
                } else {
                    //alert(kyc_response.message);
                    Swal.fire({
                        position: 'center', //top-end
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

    



    
</script>
<!-- shahadat code end -->
</body>

</html>