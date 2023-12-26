@include('provider.layouts.header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('details')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('details')}}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                            {{__('filter reports')}}
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('date')}}</th>
                                        <th>{{__('user_id')}}</th>
                                        <th>{{__('total_name')}}</th>
                                        <th>{{__('identification_number')}}</th>
                                        <th>{{__('num_sit')}}</th>
                                        <th>{{__('total_price')}}</th>
                                        <th>{{__('created_at')}}</th>                 
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                            <tr>
                                                <td>{{$booking->date}}</td>
                                                <td>{{$booking['user']->name}}</td>
                                                <td>{{$booking->total_name}}</td>
                                                <td>{{$booking->identification_number}}</td>
                                                <td>{{$booking->num_sit}}</td>
                                                <td>{{$booking->total_price}}</td>
                                                <td>{{$booking->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.modal-content -->
    <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title">{{__('filter reports')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/provider/filterReport">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail">from date</label>
                                    <input type="date" name="from" id="inputEmail" class="form-control" />
                                    <input type="hidden" name="trip_id" value="{{$trip_id}}" id="inputEmail" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail">to date</label>
                                    <input type="date" name="to"  id="inputEmail" class="form-control" />
                                </div>
                            </div>
                        <!-- /.col -->
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-outline-light">{{__('Save changes')}}</button>
                    </div>
                </form>

            </div>

        </div>
        <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>

@include('provider.layouts.footer')