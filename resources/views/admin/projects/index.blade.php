@extends('layouts.admin')
@section('title', 'projectss')

@section('content')
<section>
    @if(session()->has('message'))
    <div class="alert alert-success">{{session()->get('message')}}</div>
    @endif
    <div class="d-flex justify-content-between align-items-center py-4">
        <h1>projects</h1>
        <a href="{{route('admin.projects.create')}}" class="btn btn-primary">
        Crea nuovo projects
    </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Title</th>
              <th scope="col">Slug</th>
              <th scope="col">Created At</th>
              <th scope="col">Update At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->created_at}}</td>
                <td>{{$project->updated_at}}</td>
                <td>
                    <a href="{{route('admin.projects.show', $project->slug)}}"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.projects.edit', $project->slug)}}"><i class="fa-solid fa-pen"></i></a>
                    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit">
                        <i class="fa-solid fa-trash"></i>
                      </button>

                    </form>


                </td>
              </tr>
            @endforeach


          </tbody>
      </table>
</section>
@endsection