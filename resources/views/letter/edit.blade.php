@extends('layouts.dashboard')

@section('template_title')
    Update Surat @if ($letter->letter_type == 1)
        Masuk
    @elseif($letter->letter_type == 0)
        Keluar
    @endif
    {{ $letter->title }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                         <i class="fas fa-pencil-alt text-warning"></i> Update Surat @if ($letter->letter_type == 1)
                                Masuk
                            @elseif($letter->letter_type == 0)
                                Keluar
                            @endif
                            {{ $letter->title }}
                        </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.letters.update', $letter->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('letter.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
