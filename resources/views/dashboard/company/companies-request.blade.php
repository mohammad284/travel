@include('dashboard.layout.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('users')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active">{{__('users')}}</li>
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
                <h3 class="card-title">{{__('users')}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('email')}}</th>
                    <th>{{__('mobile')}}</th>
                    <th>{{__('main_address')}}</th>
                    <th>{{__('gender')}}</th>
                    <th>{{__('age')}}</th>
                    <th>{{__('bio')}}</th>
                    <th class="action"> {{__('option')}} </th>                  
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($companies as $company)
                      <tr>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>{{$company->mobile}}</td>
                        <td>{{$company->main_address}}</td>
                        <td>{{$company->gender}}</td>
                        <td>{{$company->age}}</td>
                        <td>{{$company->bio}}</td>
                        <td class="action"> 
                          <a  title="{{__('accept')}}" href="/admin/acceptProvider/{{$company->id}}" class="btn btn-info" >{{__('accept')}}</a>
                          <a  title="{{__('block')}}" class="btn btn-danger" href="/admin/blockProvider/{{$company->id}}">{{__('block')}}</a>
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