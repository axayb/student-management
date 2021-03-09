@extends('layouts.admin')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Students</h1>
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
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Students Mark</h3> <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add Student mark</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Maths</th>
                        <th>Science</th>
                        <th>History</th>
                        <th>Term</th>
                        <th>Total marks</th>
                        <th>Created on</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($studentMarks as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->student->name}}</td>
                        <td>
                          {{$item->maths_marks}}
                        </td>
                        <td>
                            {{$item->science_marks}}
                        </td>
                        <td>
                          {{$item->history_marks}}
                        </td>
                        <td>
                            {{$item->term}}
                        </td>
                        <td>
                            {{$item->total_marks}}
                        </td>
                        <td>
                            {{$item->created_at->format('F d, Y h:ia') }}
                        </td>
                        <td>
                            <a class="btn btn-sm" href="{{ route('admin.student-marks.edit', $item->id) }}">
                                <i class="fas fa-edit"></i> Edit
                              </a>
                              <form action="{{ route('admin.student-marks.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i>Delete </button>
                            </form>
                        </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="9" class="text-center">No data Found !</td>
                      </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                @if($studentMarks)
                
                {{ $studentMarks->links()}}
              
                @endif
              </div>
              <!-- /.card -->

              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
    </div>
    </section>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Student Mark</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('admin.student-marks.store')}}">
                @csrf
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
                            <option value="One">One</option>
                            <option value="Two">Two</option>
                          </select>
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Math marks</label>
                            <input type="number" name="maths_marks" min="4" class="form-control" placeholder="Enter Math Marks ..." required>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Science Marks</label>
                            <input type="number" name="science_marks" min="4" class="form-control" placeholder="Enter Science Marks ..." required>
                          </div>
                      </div>
                      <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>History Marks</label>
                            <input type="number" name="history_marks" min="4" class="form-control" placeholder="Enter history marks ..." required>
                          </div>
                      </div>
                      
                </div>
                <button id="studentFormBtn" type="submit" class="d-none"></button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="document.getElementById('studentFormBtn').click()">Save changes</button>
        </div>
      </div>
    </div>
  </div>      
  @endsection
