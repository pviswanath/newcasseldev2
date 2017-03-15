@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <form action="{{ url('/issuetype/create') }}" method="GET">{{ csrf_field() }}
                                <button type="submit" id="create-user" class="btn btn-primary"><i class="fa fa-btn fa-file-o"></i>Create Issue</button>
                            </form>
                        </div>
                        <div><h4>&nbsp &nbsp &nbsp &nbsp &nbsp New Cassel Issue Type Information</h4></div>
                    </div>
                    <div class="panel-body" style="width: 100%">
                        <div class="table-responsive">

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="bg-info">

            <th>Issue Type Name</th>
            <th>Issue Description</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        <script>
            function ConfirmDelete()
            {
                var x = confirm("Are you sure you want to delete? Click OK to continue");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
        @foreach ($createissue as $createissue)
            <tr>

                <td>{{ $createissue->issue_typename}}</td>
                <td>{{ $createissue->issue_description}}</td>
                <td><a href="{{url('issuetype',$createissue->id)}}" class="btn btn-primary">View</a></td>
                <td><a href="{{url('issuetype/update', $createissue->id)}}" class="btn btn-warning">Modify</a></td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['issuetype.destroy', $createissue->id],'onsubmit' => 'return ConfirmDelete()']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection