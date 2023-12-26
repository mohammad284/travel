@include('dashboard.layout.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advanced Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/updatePrivacy">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                    <label for="inputMessage">privacy/ar</label>
                    <textarea id="inputMessage" name="privacy_ar"   class="form-control" rows="4">{{$data->privacy_ar}}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputMessage">term/ar</label>
                    <textarea id="inputMessage" name="term_ar"   class="form-control" rows="4">{{$data->term_ar}}</textarea>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="inputMessage">privacy/en</label>
                    <textarea id="inputMessage" name="privacy_en"   class="form-control" rows="4">{{$data->privacy_en}}</textarea>
                </div>
                <div class="form-group">
                    <label for="inputMessage">term/en</label>
                    <textarea id="inputMessage" name="term_en"   class="form-control" rows="4">{{$data->term_en}}</textarea>
                </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{__('save change')}}</button>
                </div>
              <!-- /.col -->
            </div>
          </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('dashboard.layout.footer')