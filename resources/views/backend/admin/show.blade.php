@extends('layouts.backend.structure.main')
@section('content')
    <section class="content-header">
        <h1>
            Admin
            <small>Detail admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-user"></i> Admin</a></li>
            <li class="active">Detail admin</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Detail admin</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12 padding-bottom">
                                <a href="{{route('admin.edit', $entity->id)}}" class="btn btn-success margin-right"><i class="fa fa-pencil"></i> Edit admin</a>
                                <a href="{{route('admin.index')}}" class="btn btn-default"><i class="fa fa-reply"></i> Back</a>
                            </div>
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-dark table-bordered table-hover">
                                        <thead class="dark">
                                            <th width="150">Field</th>
                                            <th>Value</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $entity->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $entity->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Birth day</th>
                                                <td>{{ $entity->birth_day }}</td>
                                            </tr>
                                            <tr>
                                                <th>Role type</th>
                                                <td>{{ $entity->getRoleType() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Avatar</th>
                                                <td>{!! $entity->getAvatar() !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection