@include('dashboard.layout.header')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('trips')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('trips')}}</li>
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
                            {{__('add new trip')}}
                                </button>
                        </div>
                        <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{__('provider_id')}}</th>
                                        <th>{{__('from')}}</th>
                                        <th>{{__('to')}}</th>
                                        <th>{{__('time')}}</th>
                                        <th>{{__('price')}}</th>
                                        <th>{{__('vip')}}</th>
                                        <th>{{__('total_sit')}}</th>
                                        <th>{{__('free_sit')}}</th>
                                        <th>{{__('day')}}</th>
                                        <th class="action"> {{__('option')}} </th>                  
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trips as $trip)
                                        <tr>
                                            <td>{{$trip['company']->name}}</td>
                                            <td>{{$trip['from_city']->name}}</td>
                                            <td>{{$trip['to_city']->name}}</td>
                                            <td>{{$trip->time}}</td>
                                            <td>{{$trip->price}}</td>
                                            <td>@if($trip->vip == '0'){{('not vip')}}@else{{('vip')}}@endif</td>
                                            <td>{{$trip->total_sit}}</td>
                                            <td>{{$trip->free_sit}}</td>
                                            <td>@if($trip->day == '0'){{('Saturday')}}@elseif($trip->day == '1')
                                                {{('Sunday')}}@elseif($trip->day == '2'){{('Monday')}}@elseif($trip->day == '3'){{('Tuesday')}}
                                                @elseif($trip->day == '4'){{('Wednesday')}}@elseif($trip->day == '5'){{('Thursday')}}@endif
                                            </td>
                                            <td class="action"> 
                                            <a  title="{{__('edit')}}" href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$trip->id}}">{{__('edit')}}</a>
                                            <a  title="{{__('delete')}}" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger-{{$trip->id}}">{{__('delete')}}</a>
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
                <h4 class="modal-title">{{__('add new trip')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">

                <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/storeTrip">
                    @csrf
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('company')}}</label>
                            <select class="form-control select2 select2-danger" name="provider_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected">{{__('select company')}}</option>
                            @foreach($providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>from</label>
                            <select class="form-control select2 select2-danger" name="from" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected">{{__('select from city')}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>to</label>
                            <select class="form-control select2 select2-danger" name="to" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected">{{__('select from city')}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('time')}}</label>
                        <input class="form-control mb-4 mb-md-0" type="time" name="time"  required/>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('price')}}</label>
                        <input class="form-control mb-4 mb-md-0" name="price"  required/>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('vip')}}</label>
                            <select class="form-control select2 select2-danger" name="vip" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="{{$trip->vip}}">@if($trip->vip == '0'){{('not vip')}}@else{{('vip')}}@endif</option>
                                <option value="1">{{__('vip')}}</option>
                                <option value="0">{{__('not vip')}}</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('day')}}</label>
                            <select class="form-control select2 select2-danger" name="day" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="{{$trip->day}}">@if($trip->day == '0'){{('Saturday')}}@elseif($trip->day == '1')
                                {{('Sunday')}}@elseif($trip->day == '2'){{('Monday')}}@elseif($trip->day == '3'){{('Tuesday')}}
                                @elseif($trip->day == '4'){{('Wednesday')}}@elseif($trip->day == '5'){{('Thursday')}}@endif</option>
                                <option value="0">{{__('Saturday')}}</option>
                                <option value="1">{{__('Sunday')}}</option>
                                <option value="2">{{__('Monday')}}</option>
                                <option value="3">{{__('Tuesday')}}</option>
                                <option value="4">{{__('Wednesday')}}</option>
                                <option value="5">{{__('Thursday')}}</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('total sit')}}</label>
                        <input class="form-control mb-4 mb-md-0" type="number" name="total_sit"  required/>
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </div>
                </form>

                </div>

            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    @foreach($trips as $trip)
        <div class="modal fade" id="modal-info-{{$trip->id}}">
            <div class="modal-dialog">
            <div class="modal-content bg-info">
                <div class="modal-header">
                <h4 class="modal-title">{{__('edit trip')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/updateTrip">
                    @csrf
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>from</label>
                            <select class="form-control select2 select2-danger" name="provider_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="{{$provider->id}}">{{$trip['company']->name}}</option>
                            @foreach($providers as $provider)
                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('from')}}</label>
                            <select class="form-control select2 select2-danger" name="from" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="{{$trip->from}}">{{$trip['from_city']->name}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('to')}}</label>
                            <select class="form-control select2 select2-danger" name="to" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="{{$trip->to}}">{{$trip['to_city']->name}}</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('time')}}</label>
                        <input class="form-control mb-4 mb-md-0" type="time" value="{{$trip->time}}" name="time"  required/>
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('price')}}</label>
                        <input class="form-control mb-4 mb-md-0" name="price" value="{{$trip->price}}"  required/>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('vip')}}</label>
                            <select class="form-control select2 select2-danger" name="vip" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="{{$trip->vip}}">@if($trip->vip == '0'){{('not vip')}}@else{{('vip')}}@endif</option>
                                <option value="1">{{__('vip')}}</option>
                                <option value="0">{{__('not vip')}}</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label>{{__('day')}}</label>
                            <select class="form-control select2 select2-danger" name="day" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected" value="{{$trip->day}}">@if($trip->day == '0'){{('Saturday')}}@elseif($trip->day == '1')
                                {{('Sunday')}}@elseif($trip->day == '2'){{('Monday')}}@elseif($trip->day == '3'){{('Tuesday')}}
                                @elseif($trip->day == '4'){{('Wednesday')}}@elseif($trip->day == '5'){{('Thursday')}}@endif</option>
                                <option value="0">{{__('Saturday')}}</option>
                                <option value="1">{{__('Sunday')}}</option>
                                <option value="2">{{__('Monday')}}</option>
                                <option value="3">{{__('Tuesday')}}</option>
                                <option value="4">{{__('Wednesday')}}</option>
                                <option value="5">{{__('Thursday')}}</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-12">
                        <label for="exampleInputNumber1" class="form-label">{{__('total sit')}}</label>
                        <input class="form-control mb-4 mb-md-0" type="number" value="{{$trip->total_sit}}" name="total_sit"  required/>
                        <input class="form-control mb-4 mb-md-0" type="hidden" value="{{$trip->id}}" name="trip_id"  />
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
    @foreach($trips as $trip)
        <!-- /.modal -->
        <div class="modal fade" id="modal-danger-{{$trip->id}}">
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
                    <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/deleteTrip">
                    @csrf
                    <input class="form-control mb-4 mb-md-0" type="hidden" name="trip_id" value="{{$trip->id}}" />
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
@include('dashboard.layout.footer')