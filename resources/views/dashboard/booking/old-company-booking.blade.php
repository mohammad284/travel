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
                <li class="breadcrumb-item active">{{__('companies')}}</li>
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
                    {{__('All companies')}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{__('company name')}}</th>
                        <th>{{__('email')}}</th>
                        <th>{{__('trips_count')}}</th>
                        <th>{{__('created_at')}}</th>
                        <th class="action"> {{__('option')}} </th>                  
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->trips_count}}</td>
                            <td>{{$company->created_at}}</td>
                            <td class="action"> 
                            <a  title="{{__('more details')}}" href="/admin/oldCompanyBookingDetails/{{$company->id}}" class="btn btn-info" >{{__('more details')}}</a>
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