@extends('admin.layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Static Navigation</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="product/create">Create Product</a></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                @if(Session::has('post_update'))
                <div class="alert alert-success"><em>{!! session('post_update') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
                </div>
                @endif
                @if(Session::has('post_delete'))
                <div class="alert alert-success"><em>{!! session('post_delete') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times</span></button>
                </div>
                @endif
                @if (count($products) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                       All Product
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Price</th>    
                            </thead>
                            <tbody>
                                @foreach ($products as $post)
                                <tr>
                                    <td>
                                        <div>{!! $post->id !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $post->name !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $post->description !!}</div>
                                    </td>
                                    <td>
                                    <div>{!! Html::image("/img/".$post->image, $post->title, array('width'=>'60')) !!}</div>
                                    </td>
                                    <td>
                                        <div>{!! $post->price !!}</div>
                                    </td>

                                    <td><a class="btn btn-primary" href="{!! url('product/' . $post->id . '/edit') !!}">Edit</a></td>

                                    <td>
                                        {!! Form::open(array('url'=>'product/'. $post->id, 'method'=>'DELETE')) !!}
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
	<script>
            $(".delete").click(function() {
                var form = $(this).closest('form');
                $('<div></div>').appendTo('body')
                    .html('<div><h6> Are you sure ?</h6></div>')
                    .dialog({
                        modal: true,
                        title: 'Delete message',
                        zIndex: 10000,
                        autoOpen: true,
                        width: 'auto',
                        resizable: false,
                        buttons: {
                            Yes: function() {
                                $(this).dialog('close');
                                form.submit();
                            },
                            No: function() {
                                $(this).dialog("close");
                                return false;
                            }
                        },
                        close: function(event, ui) {
                            $(this).remove();
                        }
                    });
                return false;
            });
        </script>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

