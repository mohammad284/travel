@include('provider.layouts.header')
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
              <li class="breadcrumb-item"><a href="/provider/index">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active">{{__('trips')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    @foreach($data_array as $data)
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{$data['date']}}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th >
                            {{__('from')}}
                        </th>
                        <th class="text-center">
                            {{__('to')}}
                        </th>
                        <th  class="text-center">
                            {{__('time')}}
                        </th>
                        <th  class="text-center">
                            {{__('price')}}
                        </th>
                        <th  class="text-center">
                            {{__('total_sit')}}
                        </th>
                        <th  class="text-center">
                            {{__('free_sit')}}
                        </th>
                        <th  class="text-center">
                            {{__('type_trip')}}
                        </th>
                        <th  class="text-center">
                            {{__('day')}}
                        </th>
                        <th  class="text-center">
                            {{__('option')}}
                        </th>
                    </tr>
                </thead>
                  @if( count($data['trips'])  != 0)
                  @foreach($data['trips'] as $trip)
                    <tbody>
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    {{$trip->from_city['name']}}
                                </td>
                                <td  class="text-center">
                                    {{$trip->to_city['name']}}
                                </td>
                                <td  class="text-center"> 
                                    {{$trip->time}}
                                </td>
                                <td  class="text-center">
                                    {{$trip->price}}
                                </td>
                                <td  class="text-center">
                                    {{$trip->total_sit}}
                                </td>
                                <td  class="text-center">
                                    {{$trip->free_sit}}
                                </td>
                                <td  class="text-center">
                                  @if($trip->vip == 1)
                                    {{__('vip')}}@else{{__('normal')}}@endif
                                </td>
                                <td  class="text-center">
                                @if($trip->day == 'Saturday'){{('Saturday')}}@elseif($trip->day == 'Sunday')
                                {{__('Sunday')}}@elseif($trip->day == 'Monday'){{__('Monday')}}@elseif($trip->day == 'Tuesday'){{__('Tuesday')}}
                                @elseif($trip->day == 'Wednesday'){{__('Wednesday')}}@elseif($trip->day == 'Thursday'){{__('Thursday')}}@endif
                                </td>
                                <td class="text-center">
                                <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/provider/tripDetails">
                                    @csrf
                                    <div class="col-md-12">
                                        <input  type="hidden" name="date" value="{{$data['date']}}"  />
                                        <input  type="hidden" name="trip_id" value="{{$trip->id}}"  />
                                    </div> 
                                    <button type="submit" class="btn btn-primary btn-sm" ><i class="fas fa-folder">
                                        </i>
                                        {{__('View')}}</button>
                                </form>
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                  @endif
            </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    @endforeach
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('provider.layouts.footer')