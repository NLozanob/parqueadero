<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #45474B">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: white"><i class="fa fa-list" ></i></a>
         </li>
     </ul>
     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Navbar Search -->
         <div class="user-panel d-flex">
             <div class="image">
                 <a href="#" class="text-decoration-none text-light"> {{ Auth::user()->name }}
                     <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        style="padding-left:4px"
                        color="#ffffff"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        >
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </a>
             </div>
                <div class="info"></div>
         </div>
     </ul>
 </nav>
 <!-- /.navbar -->