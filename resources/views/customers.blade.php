<x-header componentTitle="Hello Page" />

<!-- page-content start -->
<div class="page-content">
    <div class="widget-row">
        <div class="page-intro">
            <span class="page-title">Klanten</span>
            <span class="page-desc">Hier zie je een overzicht van alle klanten @php echo json_encode($clients);@endphp</span>
        </div>
    </div>

    <div class="widget-row">
        <div class="widget-area">
            <div class="table-actions">
                <div class="table-title">
                    Klanten overzicht
                </div>

                <a class="table-add modal-button" href="#modalClientAdd">Nieuwe klant toevoegen</a>
            </div>

            <table class="table table-default" id="datatable">
                <thead>
                    <tr>
                        <th class="th-sort">Klantnaam</th>
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
                        <td href="#modalClientView" class="modal-button client-view-button" data-actorid="{{ $clients_value->actorID }}" data-actorname="{{ $clients_value->actorName }}" data-actorcreationdatetime="{{ $clients_value->actorCreationDateTime }}" data-actordatetimelastupdated="{{ $clients_value->actorDateTimeLastUpdated }}" data-actorcompanyregistrationnumber="{{ $clients_value->actorCompanyRegistrationNumber }}" data-actorvatregistrationnumber="{{ $clients_value->actorVATRegistrationNumber }}" data-actortypeid="{{ $clients_value->actorTypeID }}" data-actorstatusid="{{ $clients_value->actorStatusID }}" data-organisationid="{{ $clients_value->OrganisationID }}" data-actoryypedescription="{{ $clients_value->actorTypeDescription }}" data-actorstatusdescription="{{ $clients_value->actorStatusDescription }}" >{{ $clients_value->actorName }}</td>
                        <td>{{ $clients_value->actorCreationDateTime }}</td>
                        <td>{{ $clients_value->actorDateTimeLastUpdated }}</td>
                        <td class="action">
                            <a href="#modalClientEdit" class="modal-button client-edit-button" data-actorid="{{ $clients_value->actorID }}" data-actorname="{{ $clients_value->actorName }}" data-actorcreationdatetime="{{ $clients_value->actorCreationDateTime }}" data-actordatetimelastupdated="{{ $clients_value->actorDateTimeLastUpdated }}" data-actorcompanyregistrationnumber="{{ $clients_value->actorCompanyRegistrationNumber }}" data-actorvatregistrationnumber="{{ $clients_value->actorVATRegistrationNumber }}" data-actortypeid="{{ $clients_value->actorTypeID }}" data-actorstatusid="{{ $clients_value->actorStatusID }}" data-organisationid="{{ $clients_value->OrganisationID }}" data-actoryypedescription="{{ $clients_value->actorTypeDescription }}" data-actorstatusdescription="{{ $clients_value->actorStatusDescription }}" >
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="#modalUserDelete" class="modal-button client-delete-button" data-actorid="{{ $clients_value->actorID }}" data-actorname="{{ $clients_value->actorName }}">
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
                <span class="modal-title">Nieuwe klant toevoegen</span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <form>

                    <span class="form-section--title">Bedrijfsgegevens</span>


                    <div class="form-field">
                        <label>Bedrijf</label>
                        <input type="text" required />
                    </div>
                    <div class="form-field">
                        <label>BTW nummer</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>KVK nummer</label>
                        <input type="text" />
                    </div>

                    <span class="form-section--title">Adres</span>

                    <div class="form-field">
                        <label>Straat</label>
                        <input type="text" required />
                    </div>
                    <div class="form-field">
                        <label>Huisnummer</label>
                        <input type="number" required />
                    </div>
                    <div class="form-field">
                        <label>Toevoeging</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Postcode</label>
                        <input type="text" required />
                    </div>
                    <div class="form-field">
                        <label>Plaats</label>
                        <input type="text" required />
                    </div>
                    <div class="form-field">
                        <label>Land</label>
                        <input type="text" required />
                    </div>

                    <span class="form-section--title">Adres 2</span>

                    <div class="form-field">
                        <label>Straat</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Huisnummer</label>
                        <input type="number" />
                    </div>
                    <div class="form-field">
                        <label>Toevoeging</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Postcode</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Plaats</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Land</label>
                        <input type="text" />
                    </div>

                    <span class="form-section--title">Contactgegevens</span>
                    <div class="form-field">
                        <label>Voornaam</label>
                        <input type="text" required />
                    </div>
                    <div class="form-field">
                        <label>Achternaam</label>
                        <input type="text" required />
                    </div>
                    <div class="form-field">
                        <label>Email</label>
                        <input type="email" required />
                    </div>
                    <div class="form-field">
                        <label>Telefoonnummer</label>
                        <input type="tel" />
                    </div>
                    <div class="form-field">
                        <label>Mobielnummer</label>
                        <input type="tel" />
                    </div>

                    <span class="form-section--title">Extra</span>

                    <div class="form-field">
                        <label>Notitie</label>
                        <textarea></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary">Opslaan</a>
            </div>
        </div>
    </div>

    <div id="modalClientEdit" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Klant bewerken</span>
                <span class="close"><i class="fa fa-close"></i></span>
            </div>
            <div class="modal-body">
                <form>

                    <span class="form-section--title">Bedrijfsgegevens</span>

                    <div class="form-field">
                        <label>Bedrijf</label>
                        <input type="text" placeholder="Skipdemakelaar" />
                    </div>
                    <div class="form-field">
                        <label>BTW nummer</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>KVK nummer</label>
                        <input type="text" />
                    </div>

                    <span class="form-section--title">Adres</span>

                    <div class="form-field">
                        <label>Straat</label>
                        <input type="text" placeholder="Escudostraat" />
                    </div>
                    <div class="form-field">
                        <label>Huisnummer</label>
                        <input type="number" placeholder="2" />
                    </div>
                    <div class="form-field">
                        <label>Toevoeging</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Postcode</label>
                        <input type="text" placeholder="2991XV" />
                    </div>
                    <div class="form-field">
                        <label>Plaats</label>
                        <input type="text" placeholder="Barendrecht" />
                    </div>
                    <div class="form-field">
                        <label>Land</label>
                        <input type="text" placeholder="Nederland" />
                    </div>

                    <span class="form-section--title">Adres 2</span>

                    <div class="form-field">
                        <label>Straat</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Huisnummer</label>
                        <input type="number" />
                    </div>
                    <div class="form-field">
                        <label>Toevoeging</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Postcode</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Plaats</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Land</label>
                        <input type="text" />
                    </div>

                    <span class="form-section--title">Contactgegevens</span>
                    <div class="form-field">
                        <label>Voornaam</label>
                        <input type="text" placeholder="Stanley" />
                    </div>
                    <div class="form-field">
                        <label>Achternaam</label>
                        <input type="text" placeholder="Messi" />
                    </div>
                    <div class="form-field">
                        <label>Email</label>
                        <input type="email" placeholder="stanley.messi@skip.com" />
                    </div>
                    <div class="form-field">
                        <label>Telefoonnummer</label>
                        <input type="tel" placeholder="0101234567" />
                    </div>
                    <div class="form-field">
                        <label>Mobielnummer</label>
                        <input type="tel" placeholder="0612345678" />
                    </div>

                    <span class="form-section--title">Extra</span>

                    <div class="form-field">
                        <label>Notitie</label>
                        <textarea></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary">Opslaan</a>
            </div>
        </div>
    </div>


    <div id="modalClientView" class="modal">
        $('#actorID_to_view').val(actorID);
        $('#view_actorName').html(actorName);
        $('#view_actorCreationDateTime').html(actorCreationDateTime);
        $('#view_actorDateTimeLastUpdated').html(actorDateTimeLastUpdated);
        $('#view_actorCompanyRegistrationNumber').html(actorCompanyRegistrationNumber);
        $('#view_actorVATRegistrationNumber').html(actorVATRegistrationNumber);
        $('#view_actorTypeDescription').html(actorTypeDescription);
        $('#view_actorStatusDescription').html(actorStatusDescription); 


        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">Klant
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
                        <span id="view_actorStatusDescription">Shipbroker</span>
                    </div>
                    <div class="form-field">
                        <label>VAT number</label>
                        <span id="view_actorVATRegistrationNumber">---</span>
                    </div>
                    <div class="form-field">
                        <label>Chamber of Commerce number</label>
                        <span>1234567890B01</span>
                    </div>

                    <span class="form-section--title">Address</span>

                    <div class="form-field">
                        <label>Street</label>
                        <span>Escudostraat</span>
                    </div>
                    <div class="form-field">
                        <label>House number</label>
                        <span>2</span>
                    </div>
                    <div class="form-field">
                        <label>Postcode</label>
                        <span>2991XV</span>
                    </div>
                    <div class="form-field">
                        <label>Place</label>
                        <span>Barendrecht</span>
                    </div>
                    <div class="form-field">
                        <label>Land</label>
                        <span>The Netherlands</span>
                    </div>

                    <span class="form-section--title">Contact details</span>

                    <div class="form-field">
                        <label>First Name</label>
                        <span>Stanley</span>
                    </div>
                    <div class="form-field">
                        <label>Last name</label>
                        <span>Messi</span>
                    </div>

                    <div class="form-field">
                        <label>Email</label>
                        <span>stanley.messi@skip.com</span>
                    </div>
                    <div class="form-field">
                        <label>phone number</label>
                        <span>0101234567</span>
                    </div>
                    <div class="form-field">
                        <label>Mobile number</label>
                        <span>0612345678</span>
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
                            <label>Aan welke partij(en) gaat de klant de producten leveren?</label>
                            <input type="text" class="multi-input" required /><i class="fa fa-plus multi-input--icon"></i>





                        </div>
                        <div class="form-field">
                            <label>Hoe ziet het KYC proces van de klant eruit?</label>
                            <textarea required></textarea>
                        </div>
                        <div class="form-field">
                            <label>Word de klant als betrouwbaar gezien na de controle?</label>
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
                            <label>Is de door de klant gevraagde afname van producten reëel op basis van de marktpositie</label>
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
                            <label>Is het BTW nummer van de klant correct?</label>
                            <select required>
                                <option>Ja</option>
                                <option>Nee</option>
                            </select>
                        </div>

                        <div class="form-field">
                            <label>Door klant opgegeven BTW nummer</label>
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
                            <label>Aan welke partij(en) gaat de klant de producten leveren?</label>
                            <span>Partij A</span>
                            <span>Partij B</span>
                            <span>Partij C</span>
                        </div>
                        <div class="form-field">
                            <label>Hoe ziet het KYC proces van de klant eruit?</label>
                            <span>Hier kan een kleine uitleg komen over hoe het proces eruit ziet van de klant</span>
                        </div>
                        <div class="form-field">
                            <label>Word de klant als betrouwbaar gezien na de controle?</label>
                            <span>Ja</span>
                        </div>
                    </form>
                </div>

                <!-- Step 2 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Is de door de klant gevraagde afname van producten reëel op basis van de marktpositie</label>
                            <span>ja</span>
                        </div>
                    </form>
                </div>

                <!-- Step 3 -->
                <div class="form-tab">
                    <form>
                        <div class="form-field">
                            <label>Is het BTW nummer van de klant correct?</label>
                            <span>Ja</span>
                        </div>

                        <div class="form-field">
                            <label>Door klant opgegeven BTW nummer</label>
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
                            <label>Aan welke partij(en) gaat de klant de producten leveren?</label>
                            <input type="text" placeholder="Partij A" />
                        </div>
                        <div class="form-field">
                            <label>Hoe ziet het KYC proces van de klant eruit?</label>
                            <textarea placeholder="Hier kan een kleine uitleg komen over hoe het proces eruit ziet van de klant"></textarea>
                        </div>
                        <div class="form-field">
                            <label>Word de klant als betrouwbaar gezien na de controle?</label>
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
                            <label>Is de door de klant gevraagde afname van producten reëel op basis van de marktpositie</label>
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
                            <label>Door klant opgegeven BTW nummer</label>
                            <span>123456789</span>
                        </div>

                        <div class="form-field">
                            <label>Is het BTW nummer van de klant correct?</label>
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
                            <label>Aan welke partij(en) gaat de klant de producten leveren?</label>
                            <input type="text" placeholder="Partij A" />
                        </div>
                        <div class="form-field">
                            <label>Hoe ziet het KYC proces van de klant eruit?</label>
                            <textarea placeholder="Hier kan een kleine uitleg komen over hoe het proces eruit ziet van de klant"></textarea>
                        </div>
                        <div class="form-field">
                            <label>Word de klant als betrouwbaar gezien na de controle?</label>
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
                            <label>Is de door de klant gevraagde afname van producten reëel op basis van de marktpositie</label>
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
                            <label>Door klant opgegeven BTW nummer</label>
                            <span>123456789</span>
                        </div>

                        <div class="form-field">
                            <label>Is het BTW nummer van de klant correct?</label>
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

        let actorID                         = $(this).data('actorid');
        let actorName                       = $(this).data('actorname');
        let actorCreationDateTime           = $(this).data('actorcreationdatetime');
        let actorDateTimeLastUpdated        = $(this).data('actordatetimelastupdated');
        let actorCompanyRegistrationNumber  = $(this).data('actorcompanyregistrationnumber');
        let actorVATRegistrationNumber      = $(this).data('actorvatregistrationnumber');

        let actorTypeID                     = $(this).data('actortypeid');
        let actorStatusID                   = $(this).data('actorstatusid');
        let OrganisationID                  = $(this).data('organisationid');
        let actorTypeDescription            = $(this).data('actortypedescription');
        let actorStatusDescription          = $(this).data('actorstatusdescription');
 
        let actorContactID                  = $(this).data('actorContactID');
        let contactTypeID                   = $(this).data('contactTypeID');
        let actorContactFirstName           = $(this).data('actorContactFirstName');
        let actorContactLastName            = $(this).data('actorContactLastName');
        let actorContactEmail               = $(this).data('actorContactEmail');
  
        let actorContactPhone                  = $(this).data('actorContactPhone');
        let actorContactMobile                   = $(this).data('actorContactMobile');
        let actorContactURL           = $(this).data('actorContactURL');
        let modifiedDateTime            = $(this).data('modifiedDateTime');
        let ModifiedBy               = $(this).data('ModifiedBy');
   
        let actorAddressID                  = $(this).data('actorAddressID');
        let addressTypeID                   = $(this).data('addressTypeID');
        let actorAddressStreet           = $(this).data('actorAddressStreet');
        let actorAddressStreetNumber            = $(this).data('actorAddressStreetNumber');
        let actorAddressPostalCode               = $(this).data('actorAddressPostalCode');
    
        let actorAddressCity                  = $(this).data('actorAddressCity');
        let addressTypeID                   = $(this).data('addressTypeID');
        let actorAddressStreet           = $(this).data('actorAddressStreet');
        let actorAddressStreetNumber            = $(this).data('actorAddressStreetNumber');
        let actorAddressPostalCode               = $(this).data('actorAddressPostalCode');
 
       //{"actorID":1,"actorName":"Actor One","actorCreationDateTime":"2022-12-30 10:40:44","actorDateTimeLastUpdated":"2022-12-30 10:40:44","actorCompanyRegistrationNumber":"885522","actorVATRegistrationNumber":"969696","actorTypeID":1,"actorStatusID":1,"OrganisationID":1,"actorTypeDescription":"actor type 1","actorStatusDescription":"in process",
        
        //"actorContactID":1,"contactTypeID":1,"actorContactFirstName":"demo first name","actorContactLastName":"demo last name","actorContactEmail":"demo@gmail.com","actorContactPhone":"9874563210","actorContactMobile":"9639639630","actorContactURL":"demo url","modifiedDateTime":"2022-12-30 10:43:23","ModifiedBy":"1","actorAddressID":1,"addressTypeID":1,"actorAddressStreet":"street-1","actorAddressStreetNumber":"12","actorAddressPostalCode":"302017","actorAddressCity":"london","countryID":1,"userAddressAdditionalAddressLines":"addr-2","ModifiedDateTime":"2022-12-30 10:42:10"}

        e.preventDefault();
        btn = this;

        $('#actorID_to_view').val(actorID);
        $('#view_actorName').html(actorName);
        $('#view_actorCreationDateTime').html(actorCreationDateTime);
        $('#view_actorDateTimeLastUpdated').html(actorDateTimeLastUpdated);
        $('#view_actorCompanyRegistrationNumber').html(actorCompanyRegistrationNumber);
        $('#view_actorVATRegistrationNumber').html(actorVATRegistrationNumber);
        $('#view_actorTypeDescription').html(actorTypeDescription);
        $('#view_actorStatusDescription').html(actorStatusDescription);

    });

    $(document).on('click', '.user-edit-button', function(e) {

        let userID = $(this).data('userid');
        let userFirstName = $(this).data('userfirstname');
        let userLastName = $(this).data('userlastname');
        let roleID = $(this).data('roleid');
        let email = $(this).data('email');
        let phoneNumber = $(this).data('phonenumber');
        let mobileNumber = $(this).data('mobilenumber');
        let OrganisationID = $(this).data('organisationid');
        let modifiedBy = $(this).data('modifiedby');

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

    function update_user() { //function start

        //return false;
        var _token = document.getElementsByName('_token')[0].value; //for laravel authentication 
        var userID = $("#userID_to_edit").val();
        var userFirstName = $("#edit_userFirstName").val();
        var userLastName = $("#edit_userLastName").val();
        var roleID = $("#edit_roleID").val();
        var email = $("#edit_email").val();
        var phoneNumber = $("#edit_phoneNumber").val();
        var mobileNumber = $("#edit_mobileNumber").val();
        var OrganisationID = $("#edit_OrganisationID").val();
        var modifiedBy = $("#edit_modifiedBy").val();

        //console.log("_token=>"+_token+"&userFirstName=>"+userFirstName+"&userLastName=>"+userLastName+"&roleID=>"+roleID+"&email=>"+email+"&phoneNumber=>"+phoneNumber+"&mobileNumber=>"+mobileNumber+"&userName=>"+userName+"&userPassword=>"+userPassword+"&OrganisationID=>"+OrganisationID+"&modifiedBy=>"+modifiedBy);
        //Post to the server to handle the changes     
        //ajax code start
        $.ajax({
            url: "/api/user",
            type: "PUT",
            data: {
                _token: _token,
                userID: userID,
                userFirstName: userFirstName,
                userLastName: userLastName,
                roleID: roleID,
                email: email,
                phoneNumber: phoneNumber,
                mobileNumber: mobileNumber,
                OrganisationID: OrganisationID,
                modifiedBy: modifiedBy
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


    $(document).on('click', '.user-delete-button', function(e) {

        let userID = $(this).data('userid');
        let userFirstName = $(this).data('userfirstname');
        let userLastName = $(this).data('userlastname');
        e.preventDefault();
        btn = this;

        //alert("userFirstName="+userFirstName);
        $('#userID_to_delete').val(userID);
        $('#modalUserDelete').find('.modal-body p').text('Weet u zeker dat u ' + userFirstName + ' ' + userLastName + ' wilt verwijderen?');

    });

    function add_user() { //function start

        //return false;
        var _token = document.getElementsByName('_token')[0].value; //for laravel authentication 
        var userFirstName = $("#userFirstName").val();
        var userLastName = $("#userLastName").val();
        var roleID = $("#roleID").val();
        var email = $("#email").val();
        var phoneNumber = $("#phoneNumber").val();
        var mobileNumber = $("#mobileNumber").val();
        var userName = email; //$("#userName").val();
        var userPassword = '1234'; //$("#userPassword").val();
        var OrganisationID = 1; //$("#OrganisationID").val();
        var modifiedBy = 1; //$("#modifiedBy").val();

        //console.log("_token=>"+_token+"&userFirstName=>"+userFirstName+"&userLastName=>"+userLastName+"&roleID=>"+roleID+"&email=>"+email+"&phoneNumber=>"+phoneNumber+"&mobileNumber=>"+mobileNumber+"&userName=>"+userName+"&userPassword=>"+userPassword+"&OrganisationID=>"+OrganisationID+"&modifiedBy=>"+modifiedBy);
        //Post to the server to handle the changes     
        //ajax code start
        $.ajax({
            url: "/api/user",
            type: "POST",
            data: {
                _token: _token,
                userFirstName: userFirstName,
                userLastName: userLastName,
                roleID: roleID,
                email: email,
                phoneNumber: phoneNumber,
                mobileNumber: mobileNumber,
                userName: userName,
                userPassword: userPassword,
                OrganisationID: OrganisationID,
                modifiedBy: modifiedBy
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


    function delete_user() { //function start

        var _token = document.getElementsByName('_token')[0].value; //for laravel authentication 
        var userID = $('#userID_to_delete').val();
        //console.log("_token=>"+_token+"&userID=>"+userID);
        //Post to the server to handle the changes     
        //ajax code start
        $.ajax({
            url: "/api/user",
            type: "DELETE",
            data: {
                _token: _token,
                userID: userID
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

    function moxoget_shopifypages() { //function start
        //return false;
        var _token = document.getElementsByName('_token')[0].value; //for laravel authentication 
        var moxoab_Where_To_Display = $("#moxoab_Where_To_Display").val();
        var moxoab_Selected_Pages = $("#moxoab_Selected_Pages").val();
        //console.log("_token=>"+_token+"&moxoab_Where_To_Display=>"+moxoab_Where_To_Display+"&moxoab_Selected_Pages=>"+moxoab_Selected_Pages);
        //Post to the server to handle the changes     
        //ajax code start
        $.ajax({
            url: "/moxoget_shopifypages", ///abapp_live/saveNotificationFieldsOrder
            type: "POST",
            data: {
                _token: _token,
                moxoab_Where_To_Display: moxoab_Where_To_Display,
                moxoab_Selected_Pages: moxoab_Selected_Pages,
            },
            success: function(moxoresponse) { //console.log(moxoresponse);
                //console.log(moxoresponse.moxodatalist);
                if (moxoresponse.status == 1) {
                    var moxodatalist = moxoresponse.moxodatalist;
                    var moxoforlooplength = moxodatalist.length;
                    var moxosrno = 1;
                    var moxoListDiv = '<option value="all">All</option>';
                    for (var moxoindex1 = 0; moxoindex1 < moxoforlooplength; moxoindex1++) {

                        var moxo_shopifypageId = '';
                        var moxo_shopifypageTitle = '';
                        if (moxodatalist[moxoindex1]['title'] != null) {
                            moxo_shopifypageId = moxodatalist[moxoindex1]['id'];
                            moxo_shopifypageTitle = moxodatalist[moxoindex1]['title'];
                            moxo_shopifypagehandle = moxodatalist[moxoindex1]['handle'];
                        }
                        //console.log("moxo_shopifypageTitle="+moxo_shopifypageTitle);
                        moxoListDiv += '<option value="' + moxo_shopifypagehandle + '">' + moxo_shopifypageTitle + '</option>';

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




    $(document).on('click', '.delete-btn', function(e) {

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

    $(document).on('click', '.edit_btn', function(e) {

        let url = $(this).data('url');
        e.preventDefault();
        btn = this;
        //if(confirm("Are You Sure? You Want to Edit it!") == true){
        location.href = url;
        //}
    });


    $(document).on('change', '.moxoab_status_toggle', function(e) {
        //preloader
        $(".preloader").fadeIn("slow");
        var announcementbarid = $(this).data('announcementbarid');

        if ($(this).is(":checked")) {
            var moxoab_status = 1;
        } else {
            var moxoab_status = 0;
        }

        var _token = document.getElementsByName('_token')[0].value; //for laravel 

        //alert("announcementbarid="+announcementbarid+"&_token"+_token);
        if (announcementbarid > 0) {
            //Post to the server to handle the changes   
            //ajax code start
            $.ajax({
                url: "/moxopost_abstatus",
                type: "POST",
                data: {
                    _token: _token,
                    announcementbarid: announcementbarid,
                    moxoab_status: moxoab_status,
                },
                success: function(response) {
                    console.log(response);
                    if (response) {
                        //console.log(response.data);
                        //alert(response.message);

                        Swal.fire({
                            position: 'center', //top-end
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