<div class="page-header-inner" >
    <div class="page-header-inner" >
        <div class="navbar-header">
            <a href="{{ url('/') }}"
               class="navbar-brand">
                Time Sheet System
            </a>
        </div>
        <a href="javascript:;"
           class="menu-toggler responsive-toggler"
           data-toggle="collapse"
           data-target=".navbar-collapse">
        </a>

         <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="#" target="_blank">{{ Auth::user()->name }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
