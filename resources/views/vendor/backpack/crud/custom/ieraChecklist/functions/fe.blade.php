    @include('crud::custom.ieraChecklist.functions.fe.gender')
    @include('crud::custom.ieraChecklist.functions.fe.applicableUpdate')
    <script>
        function feInitialize() {
            genderEventListeners();
            applicableUpdate();
            setTimeout(() => {
                genderUpdate();
                applicableUpdate();
            }, 100);
        }
    </script>
