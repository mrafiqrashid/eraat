{{-- This file is used for menu items by any Backpack v6 theme --}}
{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li> --}}

<x-backpack::menu-item title="Projects" icon="la la-home nav-icon" :link="backpack_url('project')" />
<x-backpack::menu-dropdown title=" Settings" icon="las la-clinic-medical" :withColumns="true">
    <x-theme-tabler::menu-dropdown-column>
        <x-backpack::menu-dropdown-item title=" Races" icon="las la-calendar-check" :link="backpack_url('race')" />
        <x-backpack::menu-dropdown-item title=" Education levels" icon="las la-file-medical" :link="backpack_url('education-level')" />
        <x-backpack::menu-dropdown-item title=" Maritial statuses" icon="las la-prescription" :link="backpack_url('maritial-status')" />
    </x-theme-tabler::menu-dropdown-column>
</x-backpack::menu-dropdown>
<x-backpack::menu-item title="Employees" icon="la la-question" :link="backpack_url('employee')" />
<x-backpack::menu-item title="CMD questionnaires" icon="la la-question" :link="backpack_url('cmdQuestionnaire')" />
<x-backpack::menu-item title="IERA checklists" icon="la la-question" :link="backpack_url('ieraChecklist')" />
