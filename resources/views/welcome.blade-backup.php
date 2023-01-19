<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Gebruikers</title>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="{{ URL::asset('styles/global.css') }}">
  <script src="{{ asset('scripts/script.js') }}"></script>
</head>

<body>
<div class="sidebar">
    <a id="sidebarBtn" class="btn-collapse"><i class="fa fa-caret-right"></i></a>

    <div class="logo">
        <img src="{{ asset('img/logo-placeholder.png') }}"/>
    </div>

    <div class="menu-area">
        <ul class="menu main-menu">
            <li class="menu-item">
                <a href="dashboard.html"><i class="fa fa-dashboard"></i>Dashboard</a>
            </li>
            <li class="menu-item">
                <a href="klanten.html"><i class="fa fa-user-tie"></i>Klanten</a>
            </li>
            <li class="menu-item">
                <a href="leveranciers.html"><i class="fa-solid fa-truck"></i>Leveranciers</a>
            </li>
            <li class="menu-item">
                <a href="userprofile.html"><i class="fa fa-address-card"></i>Profiel</a>
            </li>
        </ul>
        <div class="menu-divider"></div>
        <ul class="menu admin-menu">
            <li class="menu-item">
                <a href="gebruikers.html" class="active"><i class="fa fa-users"></i>Gebruikers</a>
            </li>
            <li class="menu-item">
                <a href="rollen.html"><i class="fa fa-suitcase"></i>Rollen</a>
            </li>
            <li class="menu-item">
                <a href="organisatie.html"><i class="fa fa-building"></i>Organisatie</a>
            </li>
        </ul>
    </div>

    <div class="sponsor">
        <span>Sponsored by:</span>
        <img src="img/logo-white.png"/>
    </div>
</div>
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
        
            <table class="table table-default">
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
                    <!--  Row with Working Links -->
                    <tr>
                        <td class="modal-button" href="#modalUserView">Ad Mini</td>
                        <td>Administrator</td>
                        <td>admini@kyc.nl</td>
                        <td class="status status-success"><i class="fa fa-circle" title="Actief"></i></td>
                        <td class="action">
                            <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                            <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    <!--  END Row with Working Links -->
                    <tr>
                        <td>G.E Bruiker</td>
                        <td>Administrator</td>
                        <td>gebruiker@kyc.nl</td>
                        <td class="status status-success"><i class="fa fa-circle" title="Actief"></i></td>
                        <td class="action">
                            <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                            <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Con Troleur</td>
                        <td>Management</td>
                        <td>controleur@kyc.nl</td>
                        <td class="status status-success"><i class="fa fa-circle" title="Actief"></i></td>
                        <td class="action">
                            <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                            <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>P. Raatjes</td>
                        <td>Sales</td>
                        <td>praatjes@kyc.nl</td>
                        <td class="status status-success"><i class="fa fa-circle" title="Actief"></i></td>
                        <td class="action">
                            <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                            <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>Mo Money</td>
                        <td>Sales</td>
                        <td>momoney@kyc.nl</td>
                        <td class="status status-progress"><i class="fa fa-circle" title="In Afwachting"></i></td>
                        <td class="action">
                            <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                            <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    <tr>
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
                        <td>V. Room</td>
                        <td>Logistiek</td>
                        <td>vroom@kyc.nl</td>
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
                    </tr>
                    <tr>
                        <td>Co Nomie</td>
                        <td>Finance</td>
                        <td>conomie@kyc.nl</td>
                        <td class="status status-error"><i class="fa fa-circle" title="Inactief"></i></td>
                        <td class="action">
                            <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                            <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>C. Heck</td>
                        <td>Audit</td>
                        <td>check@kyc.nl</td>
                        <td class="status status-error"><i class="fa fa-circle" title="Inactief"></i></td>
                        <td class="action">
                            <a href="#modalUserEdit" class="modal-button"><i class="fa fa-pencil"></i></a>
                            <a href="#modalUserDelete" class="modal-button"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        
            <div class="table-pagination">
                <div class="pagination-total">
                    Showing <span>1</span> to <span>10</span> of <span>14</span> entries
                </div>
                <ul class="pagination">
                <li class="pagination-btn">Previous</li> 
                <li class="pagination-btn active">1</li> 
                <li class="pagination-btn">2</li>  
                <li class="pagination-btn">Next</li> 
                </ul>
            </div>
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
                    <span class="form-section--title">Gebruikersgegevens</span>
                    <div class="form-field">
                        <label>Voornaam</label>
                        <input type="text" required/>
                    </div>
                    <div class="form-field">
                        <label>Achternaam</label>
                        <input type="text" required/>
                    </div>
                    <div class="form-field">
                        <label>Rol</label>
                        <select required>
                            <option>Management</option>
                            <option>Sales</option>
                            <option>Inkoop</option>
                            <option>Logistiek</option>
                            <option>Finance</option>
                            <option>Audit</option>
                            <option>Administrator</option>
                        </select>
                    </div>
                    
                    <span class="form-section--title">Contactgegevens</span>

                    <div class="form-field">
                        <label>Email</label>
                        <input type="text" required/>
                    </div>
                    <div class="form-field">
                        <label>Telefoonnummer</label>
                        <input type="text" />
                    </div>
                    <div class="form-field">
                        <label>Mobielnummer</label>
                        <input type="text" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary">Opslaan</a>
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
                    <span class="form-section--title">Gebruikersgegevens</span>
                    <div class="form-field">
                        <label>Voornaam</label>
                        <input type="text" placeholder="Ad"/>
                    </div>
                    <div class="form-field">
                        <label>Achternaam</label>
                        <input type="text" placeholder="Mini"/>
                    </div>
                    <div class="form-field">
                        <label>Rol</label>
                        <select>
                            <option>Management</option>
                            <option>Sales</option>
                            <option>Inkoop</option>
                            <option>Logistiek</option>
                            <option>Finance</option>
                            <option>Audit</option>
                            <option>Administrator</option>
                        </select>
                    </div>

                    <span class="form-section--title">Contactgegevens</span>

                    <div class="form-field">
                        <label>Email</label>
                        <input type="text" placeholder="admini@kyc.nl"/>
                    </div>
                    <div class="form-field">
                        <label>Telefoonnummer</label>
                        <input type="text" placeholder="06123456789" />
                    </div>
                    <div class="form-field">
                        <label>Mobielnummer</label>
                        <input type="text" placeholder="06123456789"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-outline btn-close">Annuleren</a>
                <a class="btn btn-primary">Opslaan</a>
            </div>
        </div>
    </div>

    <div id="modalUserDelete" class="modal">
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
                <a class="btn btn-primary">Ja</a>
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
                    <span class="form-section--title">Gebruikersgegevens</span>

                    <div class="form-field">
                        <label>Voornaam</label>
                        <span>Ad</span>
                    </div>
                    <div class="form-field">
                        <label>Achternaam</label>
                        <span>Mini</span>
                    </div>
                    <div class="form-field">
                        <label>Laatst ingelogd</label>
                        <span>22-12-2022 13:48</span>
                    </div>

                    <span class="form-section--title">Contactgegevens</span>

                    <div class="form-field">
                        <label>Email</label>
                        <span>admini@kyc.nl</span>
                    </div>
                    <div class="form-field">
                        <label>Telefoonnummer</label>
                        <span>0101234567</span>
                    </div>
                    <div class="form-field">
                        <label>Mobielnummer</label>
                        <span>0612345678</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</body>
</html>

