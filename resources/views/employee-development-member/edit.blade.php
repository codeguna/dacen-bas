@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Employee Development Member
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Employee Development Member</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employee-development-members.update', $employeeDevelopmentMember->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('employee-development-member.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
