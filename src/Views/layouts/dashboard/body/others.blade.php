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
            <header class="panel-heading">
                <h2 class="panel-title">
                    <span class="label label-primary label-sm text-weight-normal va-middle mr-sm">{{$colleagues->count()}}</span>
                    <span class="va-middle">Colleagues</span>
                </h2>
            </header>
            <div class="panel-body">
                <div class="content">
                    <ul class="simple-user-list">
                        @foreach ($colleagues as $colleague)
                        <li>
                                <figure class="image rounded">
                                    <img 
                                        src="{{($colleague->profile_picture) ?  
                                        asset('storage/'.$colleague->profile_picture) : 
                                        asset('assets/images/!sample-user.jpg')}}" 
                                        alt="Joseph Doe Junior"
                                            class="img-circle img img-responsive"
                                            style="max-width:35px;">
                                </figure>
                                <span class="title">{{$colleague->fullName()}}</span>
                                <span class="message truncate">{{$colleague->department->name}}</span>
                            </li>                            
                        @endforeach
                    </ul>
                    <hr class="dotted short">
                    <div class="text-right">
                        <a 
                        class="text-uppercase text-muted" 
                        href="{{route('employee.colleagues', ['colleagues' => Auth::user()->slug])}}">(View All)</a>
                    </div>
                </div>
            </div>
        </section>
    </div> 
    <div class="col-xl-12 col-lg-12">
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