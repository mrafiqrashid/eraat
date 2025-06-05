@extends('crud::show')


@section('header')
    <div class="container-fluid d-flex justify-content-between my-3">
        <section class="header-operation animated fadeIn d-flex mb-2 align-items-baseline d-print-none"
            bp-section="page-header">
            <h1 class="text-capitalize mb-0" bp-section="page-heading">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</h1>
            <p class="ms-2 ml-2 mb-0" bp-section="page-subheading">{!! $crud->getSubheading() ?? mb_ucfirst(trans('backpack::crud.preview')) . ' ' . $crud->entity_name !!}</p>
            @if ($crud->hasAccess('list'))
                <p class="ms-2 ml-2 mb-0" bp-section="page-subheading-back-button">
                    <small><a href="{{ url($crud->route) }}" class="font-sm"><i class="la la-angle-double-left"></i>
                            {{ trans('backpack::crud.back_to_all') }}
                            <span>{{ $crud->entity_name_plural }}</span></a></small>
                </p>
            @endif
        </section>
        @include('crud::buttons.print')
    </div>
@endsection

@section('content')
    <div class="row col-md-12" bp-section="crud-operation-update">
        <div class="{{ $crud->getShowContentClass() }}">
            {{-- Default box --}}

            @include('crud::inc.grouped_errors')

            <form method="post" action="{{ url($crud->route . '/' . $entry->getKey()) }}"
                @if ($crud->hasUploadFields('update', $entry->getKey())) enctype="multipart/form-data" @endif>
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}

                @includeWhen($crud->model->translationEnabled(), 'crud::inc.edit_translation_notice')
                {{-- load the view from the application if it exists, otherwise load the one in the package --}}
                @if (view()->exists('vendor.backpack.crud.form_content'))
                    @include('vendor.backpack.crud.form_content', [
                        'fields' => $crud->fields(),
                        'action' => 'edit',
                    ])
                @else
                    @include('crud::form_content', ['fields' => $crud->fields(), 'action' => 'edit'])
                @endif
                {{-- This makes sure that all field assets are loaded. --}}
                <div class="d-none" id="parentLoadedAssets">{{ json_encode(Basset::loaded()) }}</div>
                {{-- <a href="{{ url($crud->route) }}" class="btn btn-success"><i class="la la-angle-double-left"></i>
                    {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a> --}}

            </form>
        </div>
    </div>
@endsection
