<div class="col-md-4">
        <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-secondary">
                            <i class="fa fa-usd"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Organizations</h4>
                            <div class="info">
                                <strong class="amount">{{$organizations->count()}}</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase">(view)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4">
        <section class="panel panel-featured-left panel-featured-quartenary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-quartenary">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Payroll Disbursed</h4>
                            <div class="info">
                                <strong class="amount">{{$payrolls->count()}}</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase">(view)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4">
        <section class="panel panel-featured-left panel-featured-secondary">
            <div class="panel-body">
                <div class="widget-summary">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-secondary">
                            <i class="fa fa-usd"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">Leave Approved</h4>
                            <div class="info">
                                <strong class="amount">{{$leaveTaken->count()}}</strong>
                            </div>
                        </div>
                        <div class="summary-footer">
                            <a class="text-muted text-uppercase">(view)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>