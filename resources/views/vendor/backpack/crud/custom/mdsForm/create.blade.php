@extends($crud->getCurrentOperation() == 'create' ? 'vendor.backpack.crud.create' : 'vendor.backpack.crud.edit')
@section('after_scripts')
    @parent
    <script></script>
@endsection
