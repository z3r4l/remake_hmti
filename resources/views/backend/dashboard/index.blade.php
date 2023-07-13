<x-app-layouts title="Dashboard" page="dashboard">  
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body widget-school-stat bg-1">
                    <div class="text">
                        <h2>{{ $dataPost }}</h2>
                        <p>Postingan</p>
                    </div>
                    <div class="icon">
                        <span><i class="fa fa-user"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body widget-school-stat bg-2">
                    <div class="text">
                        <h2>{{ $dataStruktur }}</h2>
                        <p>Anggota</p>
                    </div>
                    <div class="icon">
                        <span><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body widget-school-stat bg-3">
                    <div class="text">
                        <h2>{{ $dataCategory }}</h2>
                        <p>Category</p>
                    </div>
                    <div class="icon">
                        <span><i class="fa fa-tag"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body widget-school-stat bg-4">
                    <div class="text">
                        <h2>{{ $dataDivisi }}</h2>
                        <p>Divisi</p>
                    </div>
                    <div class="icon">
                        <span><i class="fa fa-graduation-cap"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-6 col-xxl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title mt-3">Views</h4>
                    <div class="table-action float-right">
                        {{-- <form action="#">
                            <div class="form-row">
                                <div class="form-group mb-0">
                                    <select class="selectpicker show-tick" data-width="auto">
                                        <option selected="selected">Last 30 Days</option>
                                        <option>Last 1 MOnth</option>
                                        <option>Last 6 MOnth</option>
                                        <option>Last Year</option>
                                    </select>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="project-bar1" width="500" height="100"></canvas>
                </div>
            </div>
        </div>
</x-app-layouts>