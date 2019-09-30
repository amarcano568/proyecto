<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <meta property="og:image" content="" />
    <meta property="og:image:secure_url" content="" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="600" />

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard." />
    <meta name="author" content="ThemePixels" />

    <title>.:: MediSoft versión Odontologica ::.</title>

    <link rel="shortcut icon" type="image/x-icon" href="img/diente.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="{{ asset('lib/Ionicons/css/ionicons.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/jquery-switchbutton/jquery.switchButton.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/component-chosen.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/estilos1.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/ion.rangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet" />
    <link href="{{ asset('lib/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/bracket.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tellis-sticky-note.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/baguetteBox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('lib/dropzone/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/cards-gallery.css') }}" />
    
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    
  <body style="overflow-x: hidden;">

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href="./index.html"><span>[</span>Medisoft <img src="{{ asset('img/diente.png')}}" width="20" height="20">v1.0</i><span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Menú Principal</label>
      <div class="br-sideleft-menu">
        <a href="/inicio" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Inicio</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a id="10000" href="{{URL::to('consulta-medica')}}" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon tx-18 fas fa-tooth"></i>
            <span class="menu-item-label">Consulta Médica</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a id="20000" href="{{URL::to('pacientes')}}" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon tx-18 far fa-user"></i>
            <span class="menu-item-label">Pacientes</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a id="60000" href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon tx-18 fas fa-book"></i>
            <span class="menu-item-label">Agenda de citas</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <a id="30000" href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon tx-18 fas fa-print"></i>
            <span class="menu-item-label">Reportes</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="#" class="nav-link">Administrativos</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Pacientes</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Laboratorio</a></li>
        </ul>
        <a id="40000" href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon tx-18 fas fa-user-cog"></i>           
            <span class="menu-item-label">Administrador</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a id="40001"  href="{{URL::to('administrador-usuarios')}}" class="nav-link">Usuarios</a></li>
          <li class="nav-item"><a id="40002" href="{{URL::to('motivos-consultas')}}" class="nav-link">Motivos</a></li>
          <li class="nav-item"><a id="40003" href="{{URL::to('estados_citas')}}" class="nav-link">Estados</a></li>
          <li class="nav-item"><a id="40004" href="{{URL::to('convenios')}}" class="nav-link">Convenios</a></li>
        </ul>
        <a id="50000" href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon tx-18 fas fa-tools"></i>            
            <span class="menu-item-label">Configuración</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a id="50001" href="{{URL::to('config-empresa')}}" class="nav-link">Empresa</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Agenda</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Correos</a></li>
        </ul>
      </div><!-- br-sideleft-menu -->

      <label class="sidebar-label pd-x-15 mg-t-25 mg-b-20 tx-info op-9">RESUMEN DE INFORMACIÓN</label>

      <br />
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="./index.html"><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="./index.html"><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
          <input style="margin-top: 1em;" id="searchbox" type="text" class="form-control" placeholder="Buscar" />
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- input-group -->
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="./index.html" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-email-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
              <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Messages</label>
                <a href="./index.html" class="tx-11">+ Add New Message</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                <a href="./index.html" class="media-list-link">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="" class="wd-40 rounded-circle" alt="" />
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Donna Seay</p>
                        <span class="tx-11 tx-gray-500">2 minutes ago</span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                    </div>
                  </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="./index.html" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="" class="wd-40 rounded-circle" alt="" />
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Samantha Francis</p>
                        <span class="tx-11 tx-gray-500">3 hours ago</span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="./index.html" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="" class="wd-40 rounded-circle" alt="" />
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Robert Walker</p>
                        <span class="tx-11 tx-gray-500">5 hours ago</span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="./index.html" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="" class="wd-40 rounded-circle" alt="" />
                    <div class="media-body">
                      <div class="d-flex align-items-center justify-content-between mg-b-5">
                        <p class="mg-b-0 tx-medium tx-gray-800 tx-14">Larry Smith</p>
                        <span class="tx-11 tx-gray-500">Yesterday</span>
                      </div><!-- d-flex -->
                      <p class="tx-12 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                    </div>
                  </div><!-- media -->
                </a>
                <div class="pd-y-10 tx-center bd-t">
                  <a href="./index.html" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Messages</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="./index.html" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
              <i class="icon ion-ios-bell-outline tx-24"></i>
              <!-- start: if statement -->
              <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
              <!-- end: if statement -->
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
              <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Notifications</label>
                <a href="./index.html" class="tx-11">Mark All as Read</a>
              </div><!-- d-flex -->

              <div class="media-list">
                <!-- loop starts here -->
                <a href="./index.html" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="" class="wd-40 rounded-circle" alt="" />
                    <div class="media-body">
                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                      <span class="tx-12">October 03, 2017 8:45am</span>
                    </div>
                  </div><!-- media -->
                </a>
                <!-- loop ends here -->
                <a href="./index.html" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="" class="wd-40 rounded-circle" alt="" />
                    <div class="media-body">
                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                      <span class="tx-12">October 02, 2017 12:44am</span>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="./index.html" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="" class="wd-40 rounded-circle" alt="" />
                    <div class="media-body">
                      <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                      <span class="tx-12">October 01, 2017 10:20pm</span>
                    </div>
                  </div><!-- media -->
                </a>
                <a href="./index.html" class="media-list-link read">
                  <div class="media pd-x-20 pd-y-15">
                    <img src="" class="wd-40 rounded-circle" alt="" />
                    <div class="media-body">
                      <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                      <span class="tx-12">October 01, 2017 6:08pm</span>
                    </div>
                  </div><!-- media -->
                </a>
                <div class="pd-y-10 tx-center bd-t">
                  <a href="./index.html" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                </div>
              </div><!-- media-list -->
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
          <div class="dropdown">
            <a href="./index.html" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">{{ Auth::user()->name }}</span>
              <i style="font-size: 18px;" class="far fa-user"></i>
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
              <div class="tx-center">
                <a href="./index.html"><i class="fa-3x far fa-user"></i></a>
                <h6 class="mg-t-15 mg-b-5 tx-gray-800">{{ Auth::user()->name.' '.Auth::user()->lastName }}</h6>
                <p class="tx-12 tx-gray-600">{{ Auth::user()->email}}</p>
              </div>
              <hr />
              <ul class="list-unstyled user-profile-nav">
                <li><a href="./index.html"><i class="icon ion-ios-person"></i> Editar Perfil</a></li>
                <li><a href="./index.html"><i class="icon ion-ios-gear"></i> Configuraciones</a></li>
                <li><a href="{{ route('logout') }}"><i class="icon ion-power"></i> Desconectar</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="./index.html" class="pos-relative">
            <i class="icon ion-ios-chatboxes-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger pos-absolute t-10 r--5 rounded-circle"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="br-sideright">
      <ul class="nav nav-tabs sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#contacts"><i class="icon ion-ios-contact-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#attachments"><i class="icon ion-ios-folder-outline tx-22"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#calendar"><i class="icon ion-ios-calendar-outline tx-24"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#settings"><i class="icon ion-ios-gear-outline tx-24"></i></a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto active" id="contacts" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Online Contacts</label>
          <div class="contact-list pd-x-10">
            <a href="./index.html" class="contact-list-link new">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-success"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Marilyn Tarter</p>
                  <span class="tx-12 op-5 d-inline-block">Clemson, CA</span>
                </div>
                <span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 1 new</span>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-success"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0 ">Belinda Connor</p>
                  <span class="tx-12 op-5 d-inline-block">Fort Kent, ME</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link new">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-success"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Britanny Cevallos</p>
                  <span class="tx-12 op-5 d-inline-block">Shiboygan Falls, WI</span>
                </div>
                <span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 3 new</span>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link new">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-success"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Brandon Lawrence</p>
                  <span class="tx-12 op-5 d-inline-block">Snohomish, WA</span>
                </div>
                <span class="tx-info tx-12"><span class="square-8 bg-info rounded-circle"></span> 1 new</span>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-success"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Andrew Wiggins</p>
                  <span class="tx-12 op-5 d-inline-block">Springfield, MA</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-success"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Theodore Gristen</p>
                  <span class="tx-12 op-5 d-inline-block">Nashville, TN</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-success"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Deborah Miner</p>
                  <span class="tx-12 op-5 d-inline-block">North Shore, CA</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
          </div><!-- contact-list -->


          <label class="sidebar-label pd-x-25 mg-t-25">Offline Contacts</label>
          <div class="contact-list pd-x-10">
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Marilyn Tarter</p>
                  <span class="tx-12 op-5 d-inline-block">Clemson, CA</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="mg-l-10">
                  <p class="mg-b-0">Belinda Connor</p>
                  <span class="tx-12 op-5 d-inline-block">Fort Kent, ME</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Britanny Cevallos</p>
                  <span class="tx-12 op-5 d-inline-block">Shiboygan Falls, WI</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Brandon Lawrence</p>
                  <span class="tx-12 op-5 d-inline-block">Snohomish, WA</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Andrew Wiggins</p>
                  <span class="tx-12 op-5 d-inline-block">Springfield, MA</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Theodore Gristen</p>
                  <span class="tx-12 op-5 d-inline-block">Nashville, TN</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
            <a href="./index.html" class="contact-list-link">
              <div class="d-flex">
                <div class="pos-relative">
                  <img src="" class="wd-40 rounded-circle" alt="" />
                  <div class="contact-status-indicator bg-gray-500"></div>
                </div>
                <div class="contact-person">
                  <p class="mg-b-0">Deborah Miner</p>
                  <span class="tx-12 op-5 d-inline-block">North Shore, CA</span>
                </div>
              </div><!-- d-flex -->
            </a><!-- contact-list-link -->
          </div><!-- contact-list -->

        </div><!-- #contacts -->


        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="attachments" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Recent Attachments</label>
          <div class="media-file-list">
            <div class="media">
              <div class="pd-10 bg-gray-500 bg-mojito wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-image-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">IMG_43445</p>
                <p class="mg-b-0 tx-12 op-5">JPG Image</p>
                <p class="mg-b-0 tx-12 op-5">1.2mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
            <div class="media mg-t-20">
              <div class="pd-10 bg-gray-500 bg-purple wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-video-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">VID_6543</p>
                <p class="mg-b-0 tx-12 op-5">MP4 Video</p>
                <p class="mg-b-0 tx-12 op-5">24.8mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
            <div class="media mg-t-20">
              <div class="pd-10 bg-gray-500 bg-reef wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-word-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">Tax_Form</p>
                <p class="mg-b-0 tx-12 op-5">Word Document</p>
                <p class="mg-b-0 tx-12 op-5">5.5mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
            <div class="media mg-t-20">
              <div class="pd-10 bg-gray-500 bg-firewatch wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-pdf-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">Getting_Started</p>
                <p class="mg-b-0 tx-12 op-5">PDF Document</p>
                <p class="mg-b-0 tx-12 op-5">12.7mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
            <div class="media mg-t-20">
              <div class="pd-10 bg-gray-500 bg-firewatch wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-pdf-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">Introduction</p>
                <p class="mg-b-0 tx-12 op-5">PDF Document</p>
                <p class="mg-b-0 tx-12 op-5">7.7mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
            <div class="media mg-t-20">
              <div class="pd-10 bg-gray-500 bg-mojito wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-image-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">IMG_43420</p>
                <p class="mg-b-0 tx-12 op-5">JPG Image</p>
                <p class="mg-b-0 tx-12 op-5">2.2mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
            <div class="media mg-t-20">
              <div class="pd-10 bg-gray-500 bg-mojito wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-image-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">IMG_43447</p>
                <p class="mg-b-0 tx-12 op-5">JPG Image</p>
                <p class="mg-b-0 tx-12 op-5">3.2mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
            <div class="media mg-t-20">
              <div class="pd-10 bg-gray-500 bg-purple wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-video-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">VID_6545</p>
                <p class="mg-b-0 tx-12 op-5">AVI Video</p>
                <p class="mg-b-0 tx-12 op-5">14.8mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
            <div class="media mg-t-20">
              <div class="pd-10 bg-gray-500 bg-reef wd-50 ht-60 tx-center d-flex align-items-center justify-content-center">
                <i class="fa fa-file-word-o tx-28 tx-white"></i>
              </div>
              <div class="media-body">
                <p class="mg-b-0 tx-13">Secret_Document</p>
                <p class="mg-b-0 tx-12 op-5">Word Document</p>
                <p class="mg-b-0 tx-12 op-5">4.5mb</p>
              </div><!-- media-body -->
              <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
            </div><!-- media -->
          </div><!-- media-list -->
        </div><!-- #history -->
        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="calendar" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Time &amp; Date</label>
          <div class="pd-x-25">
            <h2 id="brTime" class="br-time"></h2>
            <h6 id="brDate" class="br-date"></h6>
          </div>

          <label class="sidebar-label pd-x-25 mg-t-25">Events Calendar</label>
          <div class="datepicker sidebar-datepicker"></div>


          <label class="sidebar-label pd-x-25 mg-t-25">Event Today</label>
          <div class="pd-x-25">
            <div class="list-group sidebar-event-list mg-b-20">
              <div class="list-group-item">
                <div>
                  <h6>Roven's 32th Birthday</h6>
                  <p>2:30PM</p>
                </div>
                <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
              </div><!-- list-group-item -->
              <div class="list-group-item">
                <div>
                  <h6>Regular Workout Schedule</h6>
                  <p>7:30PM</p>
                </div>
                <a href="./index.html" class="more"><i class="icon ion-android-more-vertical tx-18"></i></a>
              </div><!-- list-group-item -->
            </div><!-- list-group -->

            <a href="./index.html" class="btn btn-block btn-outline-secondary tx-uppercase tx-12 tx-spacing-2">+ Add Event</a>
            <br />
          </div>

        </div>
        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="settings" role="tabpanel">
          <label class="sidebar-label pd-x-25 mg-t-25">Quick Settings</label>

          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Sound Notification</h6>
            <p class="op-5 tx-13">Play an alert sound everytime there is a new notification.</p>
            <div class="pos-relative">
              <input type="checkbox" name="checkbox" class="switch-button" checked="" />
            </div>
          </div>

          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">2 Steps Verification</h6>
            <p class="op-5 tx-13">Sign in using a two step verification by sending a verification code to your phone.</p>
            <div class="pos-relative">
              <input type="checkbox" name="checkbox2" class="switch-button" />
            </div>
          </div>

          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Location Services</h6>
            <p class="op-5 tx-13">Allowing us to access your location</p>
            <div class="pos-relative">
              <input type="checkbox" name="checkbox3" class="switch-button" />
            </div>
          </div>

          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Newsletter Subscription</h6>
            <p class="op-5 tx-13">Enables you to send us news and updates send straight to your email.</p>
            <div class="pos-relative">
              <input type="checkbox" name="checkbox4" class="switch-button" checked="" />
            </div>
          </div>

          <div class="sidebar-settings-item">
            <h6 class="tx-13 tx-normal">Your email</h6>
            <div class="pos-relative">
              <input type="email" name="email" class="form-control" value="janedoe@domain.com" />
            </div>
          </div>

          <div class="pd-y-20 pd-x-25">
            <h6 class="tx-13 tx-normal tx-white mg-b-20">More Settings</h6>
            <a href="./index.html" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Account Settings</a>
            <a href="./index.html" class="btn btn-block btn-outline-secondary tx-uppercase tx-11 tx-spacing-2">Privacy Settings</a>
          </div>

        </div>
      </div><!-- tab-content -->
    </div><!-- br-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      @yield('contenido')      

     <footer class="footer-bottom">
      <hr>
        <div class="row">
          <div class="col-lg-12" style="">
            <span style="width: 100%;margin-left: 1em;">Copyright &copy; 2019. MediSoft. All Rights Reserved. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Desarrollado por Ing. Alexander Marcano A.<span class="tx-uppercase mg-r-10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Compartir:</span>
            <a target="_blank" class="pd-x-5" href="#"><i class="fab fa-facebook-f"></i></a>
            <a target="_blank" class="pd-x-5" href="#"><i class="fab fa-twitter"></i></a></span>
          </div>
        </div>
      </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    
    <script src="{{ asset('lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('jsApp/funcGral.js') }}"></script>
    <!-- Bracket CSS -->
    <script src="{{ asset('lib/jquery.validate/jquery.validate.js') }}"></script>
    <script src="{{ asset('lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('lib/moment/moment.js') }}"></script>
    <script src="{{ asset('lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
    <script src="{{ asset('lib/peity/jquery.peity.js') }}"></script>
    <script src="{{ asset('lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('lib/flot-spline/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('lib/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/bracket.js') }}"></script>
    <script src="{{ asset('js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('lib/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/ion.rangeSlider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/buttons.bootstrap.min.js') }}"></script> 
    <script src="{{ asset('lib/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('lib/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('lib/datatables/buttons.html5.min.js') }}"></script>

    <script src="{{ asset('lib/chosen/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('js/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('js/bootstrap-slider.js') }}"></script>
    <script src="{{ asset('js/tellis-sticky-note.js') }}"></script>
    <script src="{{ asset('js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('lib/dropzone/dropzone.js') }}"></script>

    <script src="{{ asset('lib/alertifyjs/alertify.min.js') }}"></script>
      <!-- CSS -->
      <link rel="stylesheet" href="{{ asset('lib/alertifyjs/css/alertify.min.css') }}"/>
      <!-- Default theme -->
      <link rel="stylesheet" href="{{ asset('lib/alertifyjs/css/themes/default.min.css') }}"/>
      <!-- Semantic UI theme -->
      <link rel="stylesheet" href="{{ asset('lib/alertifyjs/css/themes/semantic.min.css') }}"/>
      <!-- Bootstrap theme -->
      <link rel="stylesheet" href="{{ asset('lib/alertifyjs/css/themes/bootstrap.min.css') }}"/>

    @yield('javascript')   
    
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
  </body>
</html>
