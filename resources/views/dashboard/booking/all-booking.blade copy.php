@include('dashboard.layout.header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('booking')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin/home">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('booking')}}</li>
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
                    {{__('All Booking')}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{__('company name')}}</th>
                        <th>{{__('user name')}}</th>
                        <th>{{__('total name')}}</th>
                        <th>{{__('identification number')}}</th>
                        <th>{{__('sit number')}}</th>
                        <th>{{__('total price')}}</th>
                        <th>{{__('trip')}}</th>
                        <th>{{__('created_at')}}</th>
                        <th class="action"> {{__('option')}} </th>                  
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{$booking['company']->name}}</td>
                            <td>{{$booking['user']->name}}</td>
                            <td>{{$booking->total_name}}</td>
                            <td>{{$booking->identification_number}}</td>
                            <td>{{$booking->num_sit}}</td>
                            <td>{{$booking->total_price}}</td>
                            <td>{{$booking['trip']->trip_id}}</td>
                            <td>{{$booking->created_at}}</td>
                            <td class="action"> 
                            <a  title="{{__('edit')}}" href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$booking->id}}">edit</a>
                            <a  title="{{__('delete')}}" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">{{__('delete')}}</a>
                            </td>
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
@include('dashboard.layout.footer')