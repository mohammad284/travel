@include('provider.layouts.header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('trip_booking')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('trip_booking')}}</li>
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
                    {{__('trip_booking')}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{__('user_id')}}</th>
                        <th>{{__('total_name')}}</th>
                        <th>{{__('identification_number')}}</th>
                        <th>{{__('num_sit')}}</th>
                        <th>{{__('total_price')}}</th>
                        <th>{{__('trip_id')}}</th>
                        <th>{{__('date')}}</th>                
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($all_booking as $booking)
                        <tr>
                            <td>{{$booking['user']->name}}</td>
                            <td>{{$booking->total_name}}</td>
                            <td>{{$booking->identification_number}}</td>
                            <td>{{$booking->num_sit}}</td>
                            <td>{{$booking->total_price}}</td>
                            <td>{{$booking['trip']->from_city['name']}}</td>
                            <td>{{$booking->date}}</td>
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
@include('provider.layouts.footer')