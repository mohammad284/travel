@include('dashboard.layout.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('advertising')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active">{{__('advertising')}}</li>
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
              {{__('add new advertising')}}
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{__('company')}}</th>
                    <th>{{__('image')}}</th>
                    <th>{{__('created_at')}}</th>
                    <th class="action"> {{__('option')}} </th>                  
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($ads as $ad)
                      <tr>
                        <td>{{$ad->name}}</td>
                        <td><li class="list-inline-item">
                            <img alt="Avatar" class="table-avatar" src="{{asset($ad->image)}}"></li>
                        </td>
                        <td>{{$ad->created_at}}</td>
                        <td class="action"> 
                        <a  title="{{__('edit')}}" href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-info-{{$ad->id}}">edit</a>
                          <a  title="{{__('delete')}}" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">{{__('delete')}}</a>
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
          <h4 class="modal-title">{{__('add new city')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/storeAd">
            @csrf
            <div class="col-md-12">
                <label for="exampleInputNumber1" class="form-label">{{__('provider_id')}}</label>
                <input class="form-control mb-4 mb-md-0" name="provider_id"  required/>
            </div>
            <div class="col-md-12">
                <label for="exampleInputNumber1" class="form-label">{{__('image')}}</label>
                <input class="form-control mb-4 mb-md-0" type="file" name="image"  required/>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Save changes</button>
            </div>
        </form>

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @foreach($ads as $ad)
  <div class="modal fade" id="modal-info-{{$ad->id}}">
    <div class="modal-dialog">
      <div class="modal-content bg-info">
        <div class="modal-header">
          <h4 class="modal-title">edit city</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/updateCity/{{$ad->id}}">
            @csrf
            <div class="col-md-12">
                <label for="exampleInputNumber1" class="form-label">{{__('company')}}</label>
                <input class="form-control mb-4 mb-md-0" name="name" value="{{$ad->provider_id}}"  required/>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-light">Save changes</button>
            </div>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  @endforeach
  <!-- /.modal -->
    <div class="modal fade" id="modal-danger">
      <div class="modal-dialog">
        <div class="modal-content bg-danger">
          <div class="modal-header">
            <h4 class="modal-title">{{__('delete city')}}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>are you sure to delete&hellip;</p>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/deleteCity">
              @csrf

              <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">no</button>
              <button type="button" class="btn btn-outline-light">yes</button>
              </div>
          </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  <!-- /.modal -->
@include('dashboard.layout.footer')