@include('provider.layouts.header')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__('managers')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
                <li class="breadcrumb-item active">{{__('managers')}}</li>
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
                            {{__('add new manager')}}
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('name')}}</th>
                                        <th>{{__('email')}}</th>
                                        <th>{{__('city')}}</th>
                                        <th>{{__('created_at')}}</th>
                                        <th class="action"> {{__('option')}} </th>                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($managers as $manager)
                                            <tr>
                                                <td>{{$manager->name}}</td>
                                                <td>{{$manager->email}}</td>
                                                <td>{{$manager['city_manager']->name}}</td>
                                                <td>{{$manager->created_at}}</td>
                                                <td class="action"> 
                                                <a  title="{{__('edit')}}" href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$manager->id}}">{{__('edit')}}</a>
                                                <a  title="{{__('delete')}}" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$manager->id}}">{{__('delete')}}</a>
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
            <h4 class="modal-title">{{__('add new manager')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">

            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/provider/addManager">
                @csrf
                <div class="col-md-12">
                    <label for="exampleInputNumber1" class="form-label">{{__('name')}}</label>
                    <input class="form-control mb-4 mb-md-0" name="name"  required/>
                </div>
                <div class="col-md-12">
                    <label for="exampleInputNumber1" class="form-label">{{__('email')}}</label>
                    <input class="form-control mb-4 mb-md-0" name="email"  required/>
                </div>
                <div class="col-md-12">
                    <label for="exampleInputNumber1" class="form-label">{{__('main address')}}</label>
                    <input class="form-control mb-4 mb-md-0" name="main_address"  required/>
                </div>
                <div class="col-md-12">
                    <label for="exampleInputNumber1" class="form-label">{{__('age')}}</label>
                    <input class="form-control mb-4 mb-md-0" type="number" name="age"  required/>
                </div>
                <div class="col-md-12">
                    <label for="exampleInputNumber1" class="form-label">{{__('mobile')}}</label>
                    <input class="form-control mb-4 mb-md-0" type="number" name="mobile"  required/>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label>{{__('gender')}}</label>
                        <select class="form-control select2 select2-danger" name="gender" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option value="1">{{__('male')}}</option>
                            <option value="2">{{__('female')}}</option>
                            <option value="3">{{__('other')}}</option>
                        </select>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-12">
                    <label for="exampleInputNumber1" class="form-label">{{__('password')}}</label>
                    <input class="form-control mb-4 mb-md-0" type="password" name="password"  required/>
                </div>
                <div class="col-md-12">
                    <label for="exampleInputNumber1" class="form-label">{{__('password_confirmation')}}</label>
                    <input class="form-control mb-4 mb-md-0" type="password" name="password_confirmation"  required/>
                </div>
                <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label>{{__('city manager')}}</label>
                        <select class="form-control select2 select2-danger" name="city_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                        <option selected="selected">{{__('select from city')}}</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <!-- /.form-group -->
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
    @foreach($managers as $manager)
        <div class="modal fade" id="modal-info-{{$manager->id}}">
            <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                <h4 class="modal-title">{{__('edit manager')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/provider/updateManager">
                    @csrf
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('name')}}</label>
                        <input class="form-control mb-4 mb-md-0" name="name" value="{{$manager->name}}"  required/>
                        <input  type="hidden" name="manager_id" value="{{$manager->id}}" />
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('email')}}</label>
                        <input class="form-control mb-4 mb-md-0" name="email" value="{{$manager->email}}" required/>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('address')}}</label>
                        <input class="form-control mb-4 mb-md-0" name="main_address" value="{{$manager->main_address}}" required/>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('age')}}</label>
                        <input class="form-control mb-4 mb-md-0" type="number" name="age" value="{{$manager->age}}" required/>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('mobile')}}</label>
                        <input class="form-control mb-4 mb-md-0" type="number" name="mobile" value="{{$manager->mobile}}" required/>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('gender')}}</label>
                            <select class="form-control select2 select2-danger" name="gender" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option value="1">{{__('male')}}</option>
                                <option value="2">{{__('female')}}</option>
                                <option value="3">{{__('other')}}</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('password')}}</label>
                        <input class="form-control mb-4 mb-md-0" type="password" name="password"  required/>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('password_confirmation')}}</label>
                        <input class="form-control mb-4 mb-md-0" type="password" name="password_confirmation"  required/>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('city manager')}}</label>
                            <select class="form-control select2 select2-danger" name="city_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected">{{__('select from city')}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
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
    @foreach($managers as $manager)
        <!-- /.modal -->
        <div class="modal fade" id="modal-danger-{{$manager->id}}">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('delete manager')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>are you sure to delete&hellip;</p>
                    <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/provider/deleteManager">
                    @csrf
                    <input class="form-control mb-4 mb-md-0" type="hidden" name="manager_id" value="{{$manager->id}}" />
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