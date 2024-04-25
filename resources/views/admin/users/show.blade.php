@extends('layouts.dashboard')
@section('template_title')
    Show Users
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.user.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Roles
                            </th>
                            <td>
                                @foreach ($user->roles()->pluck('name') as $role)
                                    <span class="label label-info label-many">{{ $role }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Photo
                            </th>
                            <td>
                                @if ($user->photo == null)
                                    <img class="profile-user-img img-fluid"
                                        src="https://www.w3schools.com/howto/img_avatar.png" alt="User profile picture">                                    
                                @else
                                    <img class="profile-user-img img-fluid" src="/data_photo_profil/{{ $user->photo }}"
                                        alt="User profile picture">
                                @endif
                                @if ($user->nomor_induk != null)
                                   <form action="{{ route('admin.users.photo') }}" method="POST" id="myForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->nomor_induk }}">
                                        <div class="form-group">
                                            <input type="file" class="form-control-file" name="photo"
                                                onchange="submitForm()" required>
                                            <small class="form-text text-danger">*Format .jpg maksimal 500x500 &
                                                1MB</small>
                                        </div>
                                    </form> 
                                    @else
                                    <em class="text-danger">
                                        *Tidak bisa update foto profil untuk pengguna ini!
                                    </em>
                                @endif                                
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function submitForm() {
            document.getElementById('myForm').submit();
        }
    </script>
@endsection
