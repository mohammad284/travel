@include('dashboard.layout.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('cities')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
              <li class="breadcrumb-item active">cities</li>
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
              {{__('add new city')}}
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable-crud" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{__('id')}}</th>
                    <th>{{__('Name')}}</th>
                    <th>{{__('created_at')}}</th>
                    <th class="action"> {{__('option')}} </th>                  
                  </tr>
                  </thead>
                  <tbody>

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

        <form>
            @csrf
            <div class="col-md-12">
                <label for="exampleInputNumber1" class="form-label">{{__('name')}}</label>
                <input class="form-control mb-4 mb-md-0" name="name"  required/>
            </div>
        
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" id="submit" class="btn btn-outline-light">Save changes</button>
            </div>
        </form>

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/admin/allCity",
            columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'created_at', name: 'created_at' },
            {data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });

    });
    $(document).ready(function() {
        $("#submit").click(function(e){
          // alert('hi');
              e.preventDefault();
              $("#submit").attr('disabled',true);
              $('#modal-primary').modal('hide');
            var name = $("input[name='name']").val();   
            console.log(name);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: "/admin/storeCity",
                type:'POST',
                
                data: {name:name},
                success: function(data) {
                  dataTable.draw()
                }
            });
       
        });  
    });
  </script>
@include('dashboard.layout.footer')
