@extends('layouts.admin')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
       
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Student Marks</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
     @include('components.alert')
        <div class="row">
            <div class="col-md-12">

                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Edit Student Marks</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route("admin.student-marks.update", [$studentMarks->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                              <!-- text input -->
                              <div class="form-group">
                                <label>Student</label>
                                <select class="form-control" name="student" required>
                                    @forelse ($students as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @empty
                                        <option value="">No Student Found!</option>
                                    @endforelse
                                 
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label>Term</label>
                                  <select class="form-control" name="term" required>
                                      <option value="One"{{$studentMarks->term=='One'?'selected':''}}>One</option>
                                      <option value="Two"{{$studentMarks->term=='Two'?'selected':''}}>Two</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>Math marks</label>
                                      <input type="number" value="{{$studentMarks->maths_marks}}" name="maths_marks" min="4" class="form-control" placeholder="Enter Math Marks ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                  <!-- select -->
                                  <div class="form-group">
                                      <label>Science Marks</label>
                                      <input type="number" name="science_marks"  value="{{$studentMarks->science_marks}}" min="4" class="form-control" placeholder="Enter Science Marks ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                  <!-- select -->
                                  <div class="form-group">
                                      <label>History Marks</label>
                                      <input type="number" name="history_marks" value="{{$studentMarks->history_marks}}" min="4" class="form-control" placeholder="Enter history marks ..." required>
                                    </div>
                                </div>
                                
                          </div>
                          <button id="studentFormBtn" type="submit" class="d-none"></button>
                                </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                        <a type="button" href="{{route('admin.student-marks.index')}}" class="btn btn-default float-right">Back</a>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
            </div>
            <!-- /.col -->
          </div>
    </div>
    </section>
  
  @endsection
