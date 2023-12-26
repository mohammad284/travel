@include('provider.layouts.header')
    <?php
        use App\Models\User;
        $manager = Auth::user();
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Notifications')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Notifications')}}</li>
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
                                {{__('Notifications')}}
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>{{__('user name')}}</th>
                                        <th>{{__('notification')}}</th>
                                        <th class="action"> {{__('option')}} </th>            
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($notifications as $notification)
                                        <tr>
                                            <td>{{$notification['user']->name}}</td>
                                            <td>{{$notification->notification}}</td>
                                            <td class="action"> 
                                                <a  title="{{__('delete')}}" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$notification->id}}">{{__('delete')}}</a>
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