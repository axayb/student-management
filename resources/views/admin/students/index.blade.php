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
            <li class="breadcrumb-item active">Students</li>
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
                  <h3 class="card-title">Students List</h3> <button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add Student</button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Reporting Teacher</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                          {{$item->age}}
                        </td>
                        <td>
                            {{$item->gender}}
                        </td>
                        <td>
                          {{$item->teacher->name}}
                        </td>
                        <td>
                            <a class="btn btn-sm" href="{{ route('admin.students.edit', $item->id) }}">
                                <i class="fas fa-edit"></i> Edit
                              </a>
                              <form action="{{ route('admin.students.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i>Delete </button>
                            </form>
                        </td>
                      </tr>
                      @empty
                            <tr>
                              <td colspan="6" class="text-center">No data Found !</td>
                            </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                @if($students)
                
                {{ $students->links()}}
              
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
          <h5 class="modal-title" id="exampleModalLabel">Create Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('admin.students.store')}}">
                @csrf
                <div class="row">
                  <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter name ..." required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" min="4" class="form-control" placeholder="Enter age ..." required>
                      </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- radio -->
                        <div class="form-group">
                            <label>Gender</label>
                          <div class="form-check col-md-6">
                            <input class="form-check-input" value="Male" type="radio" name="gender" required>
                            <label class="form-check-label">Male</label>
                          </div>
                          <div class="form-check col-md-6">
                            <input class="form-check-input" value="Female" type="radio" name="gender" required>
                            <label class="form-check-label">Female</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                          <label>Reporting Teacher</label>
                          <select class="form-control" name="teacher" required>
                            @forelse ($teachers as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @empty
                            <option value="">No teachers</option>
                            @endforelse
                           
                          </select>
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
  </div>      @endsection
