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
                            from
                        </th>
                        <th class="text-center">
                            to
                        </th>
                        <th  class="text-center">
                            time
                        </th>
                        <th  class="text-center">
                            price
                        </th>
                        <th  class="text-center">
                            total_sit
                        </th>
                        <th  class="text-center">
                            free_sit
                        </th>
                        <th  class="text-center">
                            vip
                        </th>
                        <th  class="text-center">
                            day
                        </th>
                        <th  class="text-center">
                            option
                        </th>
                    </tr>
                </thead>
                  @if($data['trips'] != null)
                    <tbody>
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    {{$data['trips']->from_city['name']}}
                                </td>
                                <td  class="text-center">
                                    {{$data['trips']->to_city['name']}}
                                </td>
                                <td  class="text-center"> 
                                    {{$data['trips']->time}}
                                </td>
                                <td  class="text-center">
                                    {{$data['trips']->price}}
                                </td>
                                <td  class="text-center">
                                    {{$data['trips']->total_sit}}
                                </td>
                                <td  class="text-center">
                                    {{$data['trips']->free_sit}}
                                </td>
                                <td  class="text-center">
                                  @if($data['trips']->vip == 1)
                                    {{__('vip')}}@else{{('normal')}}@endif
                                </td>
                                <td  class="text-center">
                                @if($data['trips']->day == '0'){{('Saturday')}}@elseif($data['trips']->day == '1')
                                {{('Sunday')}}@elseif($data['trips']->day == '2'){{('Monday')}}@elseif($data['trips']->day == '3'){{('Tuesday')}}
                                @elseif($data['trips']->day == '4'){{('Wednesday')}}@elseif($data['trips']->day == '5'){{('Thursday')}}@endif
                                </td>
                                <td class="text-center">
                                <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/tripDetails">
                                    @csrf
                                    <div class="col-md-12">
                                        <input  type="hidden" name="date" value="{{$data['date']}}"  />
                                        <input  type="hidden" name="trip_id" value="{{$data['trips']->id}}"  />
                                    </div> 
                                    <button type="submit" class="btn btn-primary btn-sm" ><i class="fas fa-folder">
                                        </i>
                                        View</button>
                                </form>
                                </td>
                            </tr>
                    </tbody>
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
@include('dashboard.layout.footer')