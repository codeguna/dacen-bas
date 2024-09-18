@extends('layouts.dashboard')
@section('template_title')
    Users
@endsection
@section('content')
    @can('users_manage')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="20">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            Departmen
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>
                                @if ($user->photo == null)
                                    <img class="profile-user-img img-fluid"
                                        src="https://www.w3schools.com/howto/img_avatar.png" alt="User profile picture" loading="lazy">
                                @else
                                    <img class="profile-user-img img-fluid"
                                        src="/data_photo_profil/{{ $user->photo }}" alt="User profile picture" loading="lazy">
                                @endif
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                @foreach ($user->roles()->pluck('name') as $role)
                                    <span class="badge badge-info">{{ $role }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->department->name??'Not set!' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a class="btn btn-xs btn-warning" href="{{ route('admin.users.edit', $user->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                    style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-xs btn-danger"><i
                                            class="fa fa-trash"></i></button>
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
