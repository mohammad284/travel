@include('provider.layouts.header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('reports')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('reports')}}</li>
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
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('from')}}</th>
                                        <th>{{__('to')}}</th>
                                        <th>{{__('count')}}</th>
                                        <th>{{__('sit price')}}</th>
                                        <th>{{__('total price')}}</th>
                                        <th class="action"> {{__('option')}} </th>                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($details as $trip)
                                            <tr>
                                                <td>{{$trip['trip_details']->from_city['name']}}</td>
                                                <td>{{$trip['trip_details']->to_city['name']}}</td>
                                                <td>{{$trip['sits']}}</td>
                                                <td>{{$trip['trip_details']->price}}</td>
                                                <td>{{$trip['total']}}</td>
                                                <td class="action"> 
                                                <form method="POST" enctype="multipart/form-data" action="/provider/detailsReport">
                                                    @csrf
                                                    <input type="hidden" name="trip_id" value="{{$trip['trip_details']->id}}">
                                                    <button title="{{__('details')}}" type="submit" class="btn btn-info">{{__('details')}}</button>
                                                </form>
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


@include('provider.layouts.footer')