@inject('request', 'Illuminate\Http\Request')

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Home</span>
                </a>
            </li>
            @if ($role == "Admin")
                <li class="{{ $request->segment(1) == 'time_entries' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fa fa-clock-o"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
            @elseif ($role == "User")
                <li class="{{ $request->segment(1) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('time_entries.index') }}">
                        <i class="fa fa-clock-o"></i>
                        <span class="title">Time entries</span>
                    </a>
                </li>
            @else
            @endif

            

            <li>
                <a href="logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

{!! Form::open(['route' => 'logout', 'method' => 'get', 'style' => 'display:none;', 'id' => 'logout']) !!}
    <button type="submit">Logout</button>
{!! Form::close() !!}