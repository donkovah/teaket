                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">
                
                    <div class="sidebar-header">
                        <div class="sidebar-title" style="text-indent: 15px;">
                            Menu
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                
                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                <ul class="nav nav-main">
                                    <li class="{{($navActive['parent'] == 'dashboard')  ? 'nav-active' : null}}">
                                        <a href="{{route('dashboard')}}">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="nav-parent 
                                    {{($navActive['parent'] == 'company')  ? 'nav-expanded nav-active' : null}}">
                                        <a>
                                            <i class="fa fa-building-o" aria-hidden="true"></i>
                                            <span>Company</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            @if(Auth::user()->isHR())
                                            <li class="{{($navActive['child'] == 'new_company')  ? 'nav-active' : null}}">
                                                <a href="{{route('organization.create')}}">
                                                     New Company
                                                </a>
                                            </li>
                                            @endif
                                            @if(Auth::user()->isHR() || Auth::user()->isCovantageMD() || Auth::user()->isAudit())
                                            <li class="{{($navActive['child'] == 'list_company')  ? 'nav-active' : null}}">
                                                <a href="{{route('organization.index')}}">
                                                     List Companies
                                                </a>
                                            </li>
                                            @endif
                                            @if(Auth::user()->isHR())
                                            <li class="{{($navActive['child'] == 'new_department')  ? 'nav-active' : null}}">
                                                <a href="{{route('department.create')}}">
                                                     New Department
                                                </a>
                                            </li>
                                            @endif
                                            @if(Auth::user()->isFinance())
                                                <li class="{{($navActive['child'] == 'list_department')  ? 'nav-active' : null}}">
                                                    <a href="{{route('department.index',['employee' => Auth::user()->slug])}}">
                                                            List Departments
                                                    </a>
                                                </li>
                                            @else
                                                <li class="{{($navActive['child'] == 'list_department')  ? 'nav-active' : null}}">
                                                    <a href="{{route('department.index')}}">
                                                        View Departments
                                                    </a>
                                                </li>
                                            @endif
                                            @if(Auth::user()->isHR())
                                            <li class="{{($navActive['child'] == 'new_employee')  ? 'nav-active' : null}}">
                                                <a href="{{route('employee.create')}}">
                                                     New Employee
                                                </a>
                                            </li>
                                            @endif
                                            <li class="{{($navActive['child'] == 'list_employee')  ? 'nav-active' : null}}">
                                                <a href="{{route('employee.index')}}">
                                                     View Employees
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-parent 
                                    {{($navActive['parent'] == 'leave')  ? 'nav-expanded nav-active' : null}}">                                        
                                        <a>
                                            <i class="fa fa-plane" aria-hidden="true"></i>
                                            <span>Leave Management</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="{{($navActive['child'] == 'new_leaveRequest')  ? 'nav-active' : null}}">
                                                <a href="{{route('leave.details.apply')}}">
                                                     Apply
                                                </a>
                                            </li>
                                            <li class="{{($navActive['child'] == 'list_leaveRequest')  ? 'nav-active' : null}}">
                                                <a href="{{route('leave.details.list')}}">
                                                     List
                                                </a>
                                            </li>
                                            <li class="{{($navActive['child'] == 'declined_leaveRequest')  ? 'nav-active' : null}}">
                                                <a href="{{route('leave.details.list', ['param' => 'declined'])}}">
                                                     Declined
                                                </a>
                                            </li>
                                            <li class="{{($navActive['child'] == 'completed_leaveRequest')  ? 'nav-active' : null}}">
                                                <a href="{{route('leave.details.list', ['param' => 'completed'])}}">
                                                     Accepted
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-parent 
                                        {{($navActive['parent'] == 'payroll')  ? 
                                        'nav-expanded nav-active' : null
                                        }}"> 
                                       <a>
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                            <span>Payroll Management</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="{{($navActive['child'] == 'new_payroll')  ? 'nav-active' : null}}">
                                                <a href="{{route('payroll.create')}}">
                                                     Generate
                                                </a>
                                            </li>
                                            <li class="{{($navActive['child'] == 'list_payroll')  ? 'nav-active' : null}}">
                                                <a href="{{route('payroll.index')}}">
                                                     List All
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-parent 
                                        {{($navActive['parent'] == 'payslip')  ? 'nav-expanded nav-active' : null}}">
                                        <a>
                                            <i class="fa fa-money" aria-hidden="true"></i>
                                            <span>Payslip</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            {{-- <li class="{{($navActive['child'] == 'new_payslip')  ? 'nav-active' : null}}">
                                                <a href="{{route('payslip.create')}}">
                                                     Import
                                                </a>
                                            </li> --}}
                                            <li class="{{($navActive['child'] == 'list_payslip')  ? 'nav-active' : null}}">
                                                <a href="{{route('payslip.index')}}">
                                                     List All
                                                </a>
                                            </li>
                                            <li class="{{($navActive['child'] == 'employee_payslip')  ? 'nav-active' : null}}">
                                                <a href="{{route('payslip.employee', ['employee' => Auth::user()->slug])}}">
                                                     My Payslips
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                
                            <hr class="separator" />
                
                            <div class="sidebar-widget widget-tasks">
                                <div class="widget-header">
                                    <h6>Settings</h6>
                                    <div class="widget-toggle">+</div>
                                </div>
                                <div class="widget-content">
                                    <ul class="list-unstyled m-none">
                                        <li
                                        class="{{($navActive['child'] == 'profile')  ? 'nav-active' : null}}">
                                            <a href="{{route('protocol.index')}}">
                                                    <i class="fa fa-book"></i> Policy
                                            </a>
                                        </li>
                                        <li
                                        class="{{($navActive['child'] == 'profile')  ? 'nav-active' : null}}">
                                            <a 
                                                href="{{config('sites.fait')}}" 
                                                target="_blank">
                                                    <i class="fa fa-link"></i> Fait
                                            </a>
                                        </li>
                                        {{-- <li
                                        class="{{($navActive['child'] == 'profile')  ? 'nav-active' : null}}">
                                            <a href="{{route('protocol.index')}}">
                                                    <i class="fa fa-link"></i> Appraisal
                                            </a>
                                        </li> --}}
                                        <li
                                        class="{{($navActive['child'] == 'profile')  ? 'nav-active' : null}}">
                                            <a href="{{route('employee.show', ['employee' => Auth::user()->slug])}}">
                                                    <i class="fa fa-user"></i> Profile
                                            </a>
                                        </li>
                                        <li
                                            class="{{($navActive['child'] == 'change_password')  ? 'nav-active' : null}}">
                                            <a href="{{route('change_password')}}">
                                                <i class="fa fa-lock"></i> Change Password
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                            href="#"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i> {{ __('Logout') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>                
                        </div>
                
                    </div>
                
                </aside>


                <!-- end: sidebar -->
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>{{$navActive['title']}}</h2>
					</header>
					<!-- end: page -->
				</section>