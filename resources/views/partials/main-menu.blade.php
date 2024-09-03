<ul class="main-menu">

    <li class=" has-sub-menu"><a href="#">
        <div class="icon-w">
            <div class="os-icon os-icon-plus-circle"></div>
        </div>
        <span>New</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li><a href="{{ route('members.create') }}">Add New Member</a></li>
                    <li><a href="{{ route('savings.create') }}">New DPS Account</a></li>
                    <li><a href="{{ route('fixed-deposit.create') }}">New Fixed Deposit Ac</a></li>
                    <li><a href="{{route('loan.search')}}">New Loan</a></li>
                </ul>
            </div>
        </div>
    </li>

    <li class=" has-sub-menu"><a href="#">
        <div class="icon-w">
            <div class="os-icon os-icon-layers"></div>
        </div>
        <span>Primary</span>
    </a>
    <div class="sub-menu-w">
        <div class="sub-menu-i">
            <ul class="sub-menu">
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>

                @role('admin|manager')
                    <li><a href="{{route('staff.index')}}">Staff List</a></li>

                    <li><a href="{{route('branch-list.index')}}">Branch List</a></li>

                    <li><a href="{{route('area-list.index')}}">Area List</a></li>

                    {{-- <li><a href="{{route('outloan.index')}}">Out Loan</a></li> --}}

                    @role('admin|manager|accountant')
                        <li><a href="{{route('voucher.category.index')}}">Voucher Category</a></li>
                    @endrole

                    <li><a href="{{route('loancategory.index')}}">Loan category</a></li>

                    <li><a href="{{route('savings.scheme.index')}}">DPS Scheme</a></li>

                    <li><a href="{{route('fixed-diposit-scheme.index')}}">Fixed Deposit Scheme</a></li>

                    <li><a href="{{route('asset.index')}}">Asset</a></li>
                @endrole

                </ul>
            </div>
        </div>
    </li>

    <li class=" has-sub-menu"><a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-package"></div>
            </div>
            <span>Accounts</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">

                    <li><a href="{{route('members.index')}}">Members</a></li>

                    <li><a href="{{route('general-ac.index')}}">All General A/c</a></li>

                    <li><a href="{{route('savings.index')}}">All DPS A/c</a></li>

                    <li><a href="{{route('fixed-deposit.index')}}">All Fixed Deposit A/c</a></li>

                    <li><a href="{{route('loan.index')}}">All Loan A/c</a></li>

                    <li><a href="{{ route('current-account.index') }}">All Current A/c</a></li>

                    <li><a href="{{route('closing.index')}}">DPS/FDR/Loan Closing</a></li>

                    <li><a href="{{route('loan-application.index')}}">Loan Application list</a></li>
                </ul>
            </div>
        </div>
    </li>

    <li class=" has-sub-menu"><a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-file-text"></div>
            </div>
            <span>Credits</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li><a href="{{route('credits.common.search')}}">Common Collection</a></li>
                    <li><a href="{{route('general-ac.search-deposit')}}">Deposit to General AC</a></li>
                    <li><a href="{{route('loan.collect.index')}}">Installment Collection</a></li>
                    <li><a href="{{route('savings.deposit.search')}}">Deposit to DPS</a></li>
                    <li><a href="{{route('current-account.create')}}">Deposit to Current Account</a></li>
                </ul>
            </div>
        </div>
    </li>

    <li class=" has-sub-menu"><a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-life-buoy"></div>
            </div>
            <span>Debits</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li><a href="{{route('general-ac.search-withdraw')}}">General Savings Withdraw</a></li>
                    <li><a href="{{route('savings.withdraw.search')}}">DPS Withdraw</a></li>
                    <li><a href="{{route('fdr-withdraw.create')}}">Fixed Deposit Profit Withdraw</a></li>
                </ul>
            </div>
        </div>
    </li>

    @role('admin|manager|accountant')
    <li class="has-sub-menu">
        <a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-minus-square"></div>
            </div>
            <span>Voucher</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i">
                <ul class="sub-menu">
                    <li><a href="{{route('voucher.expense.index')}}">General Expenditure</a></li>
                    <li><a href="{{route('voucher.income.index')}}">General Income</a></li>
                </ul>
            </div>
        </div>
    </li>
    @endrole

        <li class="has-sub-menu">
            <a href="#">
                <div class="icon-w">
                    <div class="os-icon os-icon-documents-03"></div>
                </div>
                <span>Reports</span>
            </a>
            <div class="sub-menu-w">
                <div class="sub-menu-i">
                    <ul class="sub-menu">
                        <li><a target="_blank" href="{{route('report.index')}}">Daily Collection Report</a></li>
                        <li><a href="{{route('report.general.search')}}">General AC Report</a></li>
                        <li><a href="{{route('report.dps.search')}}">DPS Report</a></li>
                        <li><a href="{{route('report.loan.search')}}">Loan Report</a></li>
                        <li><a href="{{route('report.fdr.search')}}">FDR Report</a></li>
                        <li><a href="{{route('report.caccount.search')}}">Current Account Report</a></li>
                    </ul>
                </div>
            </div>
        </li>


    <li class="has-sub-menu">
        <a href="#">
            <div class="icon-w">
                <div class="os-icon os-icon-users"></div>
            </div>
            <span>Profile</span>
        </a>
        <div class="sub-menu-w">
            <div class="sub-menu-i d-flex">
                <ul class="sub-menu">
                    <li><a href="{{ route('user.change-password') }}">Change Password</a></li>
                    @role('admin')
                    <li><a href="{{ route('user.index') }}">All User Account</a></li>
                    @endrole
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout <span class="os-icon os-icon-log-out d-inline align-middle"></span>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </li>


</ul>
