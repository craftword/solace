@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>
            @can('manage_patients')
            <li class="{{ $request->segment(1) == 'Patients' ? 'active' : '' }}">
                <a href="{{ route('admin.patients.index') }}">
                    <i class="fa fa-stethoscope"></i>
                    <span class="title">Patients</span>
                </a>
            </li>
            @endcan
            @can('manage_waiting_patient')
            <li class="{{ $request->segment(1) == 'Waiting Patients' ? 'active' : '' }}">
                <a href="{{ route('admin.patients.waiting_patients') }}">
                    <i class="fa fa-stethoscope"></i>
                    <span class="title">Waiting Patients</span>
                </a>
            </li>
<<<<<<< HEAD
            <li class="{{ $request->segment(1) == 'Medical Calculator' ? 'active' : '' }}">
                <a href="{{ url('admin/medicalcalculator') }}">
                    <i class="fa fa-calculator"></i>
                    <span class="title">Medical Calculator</span>
                </a>
            </li>
            @endcan
            @can('nurse_patients')
            <li class="{{ $request->segment(1) == 'Birth Records' ? 'active' : '' }}">
                <a href="{{ url('admin/birthrecords') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">Birth Records</span>
                </a>
            </li>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            @endcan
            @can('manage_hmo')
            <li class="{{ $request->segment(1) == 'Hmo' ? 'active' : '' }}">
                <a href="{{ route('admin.hmos.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">HMO</span>
                </a>
            </li>
<<<<<<< HEAD
            <li class="{{ $request->segment(1) == 'Hmo' ? 'active' : '' }}">
                <a href="{{  url('admin/authcode')  }}">
                    <i class="fa fa-code"></i>
                    <span class="title">Add Auth Code</span>
                </a>
            </li>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            @endcan
            @can('users_manage')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('global.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.permissions.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.permissions.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('global.roles.title')
                            </span>
                        </a>
                    </li>
                    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('global.users.title')
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('manage_procedure')
             <li class="{{ $request->segment(1) == 'procedure' ? 'active' : '' }}">
                <a href="{{ route('admin.procedure.index') }}">
                    <i class="fa fa-spinner"></i>
                    <span class="title">Procedure</span>
                </a>
            </li>
            @endcan
            @can('manage_billings')
            <li class="{{ $request->segment(1) == 'billings' ? 'active' : '' }}">
                <a href="{{ route('admin.billings.index') }}">
                    <i class="fa fa-money"></i>
                    <span class="title">Billings</span>
                </a>
            </li>
<<<<<<< HEAD
            <li class="{{ $request->segment(1) == 'billings' ? 'active' : '' }}">
                <a href="{{ url('admin/family') }}">
                    <i class="fa fa-money"></i>
                    <span class="title">Family Account </span>
                </a>
            </li>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            @endcan
            @can('manage_pharmacy')
            <li class="{{ $request->segment(1) == 'pharmacy' ? 'active' : '' }}">
                <a href="{{ route('admin.pharmacy.index') }}">
                    <i class="fa fa-medkit"></i>
                    <span class="title">Pharmacy</span>
                </a>
            </li>
<<<<<<< HEAD
            <li class="{{ $request->segment(1) == 'dispense' ? 'active' : '' }}">
                <a href="{{ url('admin/dispense') }}">
                    <i class="fa fa-upload"></i>
                    <span class="title">Dispensed Drugs</span>
                </a>
            </li>
            @endcan
            @can('manage_store')
            <li class="{{ $request->segment(1) == 'store' ? 'active' : '' }}">
                <a href="{{ route('admin.store.index') }}">
                    <i class="fa fa-building"></i>
                    <span class="title">Store</span>
                </a>
            </li>
             @endcan
            @can('manage_inventory')
            <li class="{{ $request->segment(1) == 'store' ? 'active' : '' }}">
                <a href="{{ url('admin/showMovement') }}">
                    <i class="fa fa-refresh"></i>
                    <span class="title">Inventory Movement</span>
                </a>
            </li>
            
            @endcan
            @can('manage_expenditure')
            <li class="{{ $request->segment(1) == 'expenditure' ? 'active' : '' }}">
                <a href="{{ route('admin.expenditure.index') }}">
                    <i class="fa fa-euro"></i>
                    <span class="title">Expenditures</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'Cashbook' ? 'active' : '' }}">
                <a href="{{ url('admin/cashbook') }}">
                    <i class="fa fa-book"></i>
                    <span class="title">Cash Book</span>
                </a>
            </li>
            @endcan
            @can('manage_accounts')
            <li class="{{ $request->segment(1) == 'income' ? 'active' : '' }}">
                <a href="{{ url('admin/allIncomes') }}">
                    <i class="fa fa-money"></i>
                    <span class="title">Incomes</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'accountpayable' ? 'active' : '' }}">
                <a href="{{ url('admin/accountPayable') }}">
                    <i class="fa fa-rub"></i>
                    <span class="title">Account Payable</span>
                </a>
            </li>
             <li class="{{ $request->segment(1) == 'accountreceiveable' ? 'active' : '' }}">
                <a href="{{ url('admin/accountReceiveable') }}">
                    <i class="fa fa-rupee"></i>
                    <span class="title">Account Receiveable</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'hmoReceiveable' ? 'active' : '' }}">
                <a href="{{ url('admin/hmoReceiveable') }}">
                    <i class="fa fa-rupee"></i>
                    <span class="title">HMO Receiveable</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'familyAccountDeposits' ? 'active' : '' }}">
                <a href="{{ url('admin/familyAccountDeposits') }}">
                    <i class="fa fa-download"></i>
                    <span class="title">Family Deposit</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'Payrolls' ? 'active' : '' }}">
                <a href="{{ url('admin/payrolls') }}">
                    <i class="fa fa-download"></i>
                    <span class="title">Payroll</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'Reconcillations' ? 'active' : '' }}">
                <a href="{{ url('admin/reconcillations') }}">
                    <i class="fa fa-history"></i>
                    <span class="title">Reconciliations</span>
                </a>
            </li>
            @endcan
             @can('manage_hr')
            <li class="{{ $request->segment(1) == 'humanresource' ? 'active' : '' }}">
                <a href="{{ route('admin.humanresource.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">Human Resources</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'talent' ? 'active' : '' }}">
                <a href="{{ route('admin.talent.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">Talent Management</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'talent' ? 'active' : '' }}">
                <a href="{{ route('admin.manpower.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">Reports</span>
                </a>
            </li>
=======
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            @endcan
             @can('manage_lab')
            <li class="{{ $request->segment(1) == 'laboratories' ? 'active' : '' }}">
                <a href="{{ route('admin.laboratories.index') }}">
                    <i class="fa fa-flask"></i>
                    <span class="title">Laboratory</span>
                </a>
            </li>
<<<<<<< HEAD
            @endcan            
            <li class="{{ $request->segment(1) == 'requisition' ? 'active' : '' }}">
                <a href="{{ route('admin.requisition.index') }}">
                    <i class="fa fa-wpforms"></i>
                    <span class="title">Requisition</span>
                </a>
            </li>            
            @can('manage_lab_documents')
            
            <li class="{{ $request->segment(1) == 'upload files' ? 'active' : '' }}">
                <a href="{{ url('admin/getfileUpload') }}">
                    <i class="fa fa-upload"></i>
                    <span class="title">Stored Documents</span>
                </a>
            </li>
            @endcan
=======
            @endcan
            <li class="{{ $request->segment(1) == 'notification' ? 'active' : '' }}">
                <a href="{{ route('admin.notifications.index') }}">
                    <i class="fa fa-bell"></i>
                    <span class="title">Notification</span>
                </a>
            </li>
>>>>>>> d0c062ee77795cea3a51e6e687cfe676bf7fee35
            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">Change password</span>
                </a>
            </li>
           
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('global.app_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('global.logout')</button>
{!! Form::close() !!}
