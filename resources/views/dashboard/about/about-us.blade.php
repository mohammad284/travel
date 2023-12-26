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
          <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/updateAboutUs">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>email_support</label>
                  <input type="text" name="email_support" value="{{$about->email_support}}" id="inputName" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputEmail">phone</label>
                    <input  name="phone" value="{{$about->phone}}" id="inputEmail" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputSubject">whatsapp</label>
                    <input type="text" name="whatsapp" value="{{$about->whatsapp}}" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputSubject">Instagram</label>
                    <input type="text" name="Instagram" value="{{$about->Instagram}}" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage">bio/ar</label>
                    <textarea id="inputMessage" name="bio_ar"   class="form-control" rows="4">{{$about->translate('ar')->bio}}</textarea>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="inputEmail">mobile</label>
                    <input  name="mobile" value="{{$about->mobile}}" id="inputEmail" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputSubject">faceBook</label>
                    <input type="text" name="faceBook" value="{{$about->phone}}" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputSubject">twitter</label>
                    <input type="text" name="twitter" value="{{$about->twitter}}" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputSubject">telegram</label>
                    <input type="text" name="telegram" value="{{$about->telegram}}" id="inputSubject" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputMessage">bio/en</label>
                    <textarea id="inputMessage" name="bio_en"   class="form-control" rows="4">{{$about->translate('en')->bio}}</textarea>
                </div>
              </div>
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">save change</button>
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