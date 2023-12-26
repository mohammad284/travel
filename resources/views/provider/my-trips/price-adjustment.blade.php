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
                    <h1>{{__('price adjustment')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('price adjustment')}}</li>
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
                            {{__('price adjustment')}}
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('from')}}</th>
                                        <th>{{__('to')}}</th>
                                        <th>{{__('time')}}</th>
                                        <th>{{__('price')}}</th>  
                                        <th class="action"> {{__('option')}} </th>              
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trips as $trip)
                                        <tr>
                                            <td>{{$trip['from_city']->name}}</td>
                                            <td>{{$trip['to_city']->name}}</td>
                                            <td>{{$trip->time}}</td>
                                            <td><input class="form-control mb-4 mb-md-0" value="{{$trip->price}}" name="price"  required/></td> 
                                            <td class="action"> 
                                            <a  title="{{__('save')}}" href="#" class="btn btn-info">{{__('edit')}}</a>
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