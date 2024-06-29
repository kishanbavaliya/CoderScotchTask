

<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="" href="{{ route('dashbord')}}" aria-expanded="false">
                <i class="icon icon-single-04"></i><span class="nav-text">Dashbord</span></a>
            </li>
            @if(auth()->user()->role->name == 'company')
                <li><a class="has-arrow" href="{{ route('employee.index')}}" aria-expanded="false">
                    <i class="icon icon-single-04"></i><span class="nav-text">Employee</span></a>
                </li>
            @endif
            @if(auth()->user()->role->name == 'employee')
                <li><a class="has-arrow" href="{{ route('leave.index')}}" aria-expanded="false">
                    <i class="icon icon-single-04"></i><span class="nav-text">Leave</span></a>
                </li>
            @endif
            @if(auth()->user()->role->name == 'company')
                <li><a class="has-arrow" href="{{ route('employee-leave.index')}}" aria-expanded="false">
                    <i class="icon icon-single-04"></i><span class="nav-text">Employee Leave</span></a>
                </li>
            @endif
        </ul>
    </div>
</div>
