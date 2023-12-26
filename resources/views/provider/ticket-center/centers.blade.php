@include('provider.layouts.header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('ticket center')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('ticket center')}}</li>
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
                            {{__('add new ticket center')}}
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('city')}}</th>
                                        <th>{{__('address')}}</th>
                                        <th>{{__('created_at')}}</th>
                                        <th class="action"> {{__('option')}} </th>                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($centers as $center)
                                            <tr>
                                                <td>{{$center['city']->name}}</td>
                                                <td>{{$center->address}}</td>
                                                <td>{{$center->created_at}}</td>
                                                <td class="action"> 
                                                <a  title="{{__('edit')}}" href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$center->id}}">{{__('edit')}}</a>
                                                <a  title="{{__('delete')}}" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$center->id}}">{{__('delete')}}</a>
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


    <!-- /.modal-content -->
    <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
            <h4 class="modal-title">{{__('add new ticket center')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/provider/addCenter">
                    @csrf
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>from</label>
                            <select class="form-control select2 select2-danger" name="city_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected">{{__('select city')}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('address')}}</label>
                        <input class="form-control mb-4 mb-md-0" name="address"  required/>
                    </div>
                    <div class="col-md-12">
                        <br>
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
    @foreach($centers as $center)
        <div class="modal fade" id="modal-info-{{$center->id}}">
            <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                <h4 class="modal-title">{{__('edit center')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/provider/updateCenter">
                    @csrf
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>from</label>
                            <select class="form-control select2 select2-danger" name="city_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected">{{__('select city')}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>  
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('address')}}</label>
                        <input class="form-control mb-4 mb-md-0" name="address" value="{{$center->address}}"  required/>
                        <input class="form-control mb-4 mb-md-0" type="hidden" name="center_id" value="{{$center->id}}" />
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
    @endforeach
    @foreach($centers as $center)
        <!-- /.modal -->
        <div class="modal fade" id="modal-danger-{{$center->id}}">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('delete ticket center')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>are you sure to delete&hellip;</p>
                    <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/provider/deleteCenter">
                    @csrf
                    <input class="form-control mb-4 mb-md-0" type="hidden" name="center_id" value="{{$center->id}}" />
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{__('no')}}</button>
                    <button type="submit" class="btn btn-outline-light">{{__('yes')}}</button>
                    </div>
                </form>
                </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
        <!-- /.modal -->
    @endforeach
@include('provider.layouts.footer')