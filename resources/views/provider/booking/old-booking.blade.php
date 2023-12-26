@include('provider.layouts.header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('old_bookings')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('old_bookings')}}</li>
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
                    {{__('old_booking')}}
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
                        <th>{{__('day')}}</th>
                        <th>{{__('total_price')}}</th>
                        <th>{{__('vip')}}</th>
                        <th>{{__('from')}}</th>
                        <th>{{__('to')}}</th>
                        <th>{{__('date')}}</th>                
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <td>{{$booking['user']->name}}</td>
                            <td>{{$booking->total_name}}</td>
                            <td>{{$booking->identification_number}}</td>
                            <td>{{$booking->num_sit}}</td>
                            <td> @if($booking['trip']->day == 'Saturday'){{__('Saturday')}}@elseif($booking['trip']->day == 'Sunday')
                                {{__('Sunday')}}@elseif($booking['trip']->day== 'Monday'){{__('Monday')}}@elseif($booking['trip']->day == 'Tuesday'){{__('Tuesday')}}
                                @elseif($booking['trip']->day == 'Wednesday'){{__('Wednesday')}}@elseif($booking['trip']->day == 'Thursday'){{__('Thursday')}}@endif </td>
                            <td>{{$booking->total_price}}</td>
                            <td>@if($booking['trip']->vip == '0'){{('not vip')}}@else{{('vip')}}@endif</td>
                            <td>{{$booking['trip']->from_city['name']}}</td>
                            <td>{{$booking['trip']->to_city['name']}}</td>
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