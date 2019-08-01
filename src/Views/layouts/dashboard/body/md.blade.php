<div class="col-xl-12 col-lg-12">
    <section class="panel">
        <header class="panel-heading panel-heading-transparent">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            </div>
            <h2 class="panel-title">{{\Carbon\Carbon::now()->subMonth()->format('F'). ' Summary'}}</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none"  id="datatable-tabletools">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="40%">Company</th>
                            <th width="20%">Employee</th>
                            <th width="15%">Payroll</th>
                            <th width="15%">On Leave</th>
                            <th width="10%">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organizations as $company)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('organization.show', ['organization' => $company->slug])}}">
                                    {{$company->name}}</a>
                                </td>
                                <td><span class="label label-info">
                                    {{$company->users->count() . ($company->users->count() > 1 ? ' Employees' : ' Employee')}}</a>
                                    </span>
                                </td>    
                                <td>
                                    &#8358;{{number_format($company->payroll, 2)
                                        }}
                                </td>
                                <td><span class="label label-success">{{$company->onLeave}} {{($company->onLeave > 1) ? ' Emloyees' : 'Employee'}}</span></td>
                                <td><span class="label label-primary">{{\Carbon\Carbon::now()->subMonth()->Format('M-Y')}} </span></td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="col-xl-3 col-lg-6">
    <section class="panel panel">
        <header class="panel-heading">
            <h2 class="panel-title">Details</h2>
        </header>
        <div class="panel-body">
            <section class="panel panel-group">
                <header class="panel-heading bg-primary">

                    <div class="widget-profile-info">
                        <div class="profile-picture">
                            <img src="{{(Auth::user()->organization->hr->profile_picture) ?  
                                asset('storage/'.Auth::user()->organization->hr->profile_picture) : 
                                asset('assets/images/!logged-user.jpg')}}">
                        </div>
                        <div class="profile-info" style="vertical-align:middle">
                            <h4 class="name text-weight-semibold">{{Auth::user()->organization->hr->fullName() ?? 'Admin'}}</h4>
                            <h5 class="role">HR Manager | {{Auth::user()->organization->name ?? 'John'}}</h5>
                            <div class="profile-footer">
                            </div>
                        </div>
                    </div>

                </header>
                <div id="accordion">
                    <div class="panel panel-accordion panel-accordion-first"
                    style="border: 0px">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">
                                    <i class="fa fa-check"></i> Activities
                                </a>
                            </h4>
                        </div>
                        <div id="collapse1One" class="accordion-body collapse in">
                            <div class="panel-body">
                                <ul class="widget-todo-list">
                                    @foreach ($loggas as $log)
                                        <li>
                                            <div class="checkbox-custom checkbox-default">
                                                <span>{{$log->data}}</span>
                                            </div>
                                            <div class="todo-actions">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>
</div>
<div class="col-xl-3 col-lg-6">
    <section class="panel">
        <header class="panel-heading panel-heading-transparent">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            </div>
            <h2 class="panel-title">{{date('M - Y')}} Special Days</h2>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped mb-none"  id="datatable-default">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th width="35%">Company</th>
                            <th width="25%">Employee</th>
                            <th width="25%">Type</th>
                            <th width="15%">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($specialDates as $date)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><a href="{{route('employee.show', ['employee' => $date->user->slug])}}">
                                    {{$date->user->fullName()}}</a>
                                </td>
                                <td><a href="{{route('organization.show', ['organization' => $date->user->organization->slug])}}">
                                    {{$date->user->organization->name}}</a>
                                </td>
    
                                <td>
                                    <a class="label label-success">{{$date->name}}</a>
                                </td>
                                <td><span class="label label-warning">{{$date->date}}</span></td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>   