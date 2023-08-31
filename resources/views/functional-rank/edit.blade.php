@extends('layouts.dashboard')

@section('template_title')
    {{ __('Update') }} Golongan/Pangkat
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Golongan/Pangkat</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.functional-ranks.update', $functionalRank->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('functional-rank.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
