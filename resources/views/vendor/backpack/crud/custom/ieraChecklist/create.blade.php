@extends($crud->getCurrentOperation() == 'create' ? 'vendor.backpack.crud.create' : 'vendor.backpack.crud.edit')
@section('after_scripts')
    @parent
    @include('crud::custom.ieraChecklist.functions.ap')
    @include('crud::custom.ieraChecklist.functions.snswp')
    @include('crud::custom.ieraChecklist.functions.fe')
    @include('crud::custom.ieraChecklist.functions.rm')
    @include('crud::custom.ieraChecklist.functions.vibration')
    @include('crud::custom.ieraChecklist.functions.lighting')
    @include('crud::custom.ieraChecklist.functions.temperature')
    @include('crud::custom.ieraChecklist.functions.ventilation')
    @include('crud::custom.ieraChecklist.functions.noise')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize event listeners
            apInitialize();
            snswpInitialize();
            feInitialize();
            rmInitialize();
            vibrationInitialize();
            lightingInitialize();
            temperatureInitialize();
            ventilationInitialize();
            noiseInitialize();
        });
    </script>
@endsection
