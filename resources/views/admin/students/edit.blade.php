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

                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Edit Student</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{{ route("admin.students.update", [$students->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="card-body">
                        <div class="form-group row">
                          <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Name" required value="{{$students->name}}">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPassword3" class="col-sm-2 col-form-label">Age</label>
                          <div class="col-sm-10">
                            <input type="number" min="4" name="age" value="{{$students->age}}" class="form-control" id="inputPassword3" placeholder="Age">
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="gender" required>
                                    <option value="Male" {{$students->gender=='Male' ? 'selected' :''}}>Male</option>
                                    <option value="Female"  {{$students->gender=='Female' ? 'selected' :''}}>Female</option>
                                  </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Teacher</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="teacher" required>
                                    @forelse ($teachers as $item)
                                    <option value="{{$item->id}}" {{$students->teacher_id==$item->id ? 'selected':''}}>{{$item->name}}</option>
                                    @empty
                                    <option value="">No Teachers Found</option>
                                    @endforelse
                                  </select>
                            </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info">Save</button>
                        <a type="button" href="{{route('admin.students.index')}}" class="btn btn-default float-right">Back</a>
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
