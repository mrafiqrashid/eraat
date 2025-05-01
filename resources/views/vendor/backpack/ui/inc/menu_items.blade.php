{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Projects" icon="la la-question" :link="backpack_url('project')" />
<x-backpack::menu-item title="Awkward postures" icon="la la-question" :link="backpack_url('awkward-posture')" />
<x-backpack::menu-item title="Static sustained work postures" icon="la la-question" :link="backpack_url('static-sustained-work-posture')" />
<x-backpack::menu-item title="Forceful exertions" icon="la la-question" :link="backpack_url('forceful-exertion')" />
<x-backpack::menu-item title="Repetitive motions" icon="la la-question" :link="backpack_url('repetitive-motion')" />
<x-backpack::menu-item title="Vibrations" icon="la la-question" :link="backpack_url('vibration')" />
<x-backpack::menu-item title="Lightings" icon="la la-question" :link="backpack_url('lighting')" />
<x-backpack::menu-item title="Temperatures" icon="la la-question" :link="backpack_url('temperature')" />
<x-backpack::menu-item title="Ventilations" icon="la la-question" :link="backpack_url('ventilation')" />
<x-backpack::menu-item title="Noises" icon="la la-question" :link="backpack_url('noise')" />
<x-backpack::menu-item title="Musculoskeletals" icon="la la-question" :link="backpack_url('musculoskeletal')" />

<x-backpack::menu-item title="Assessments" icon="la la-question" :link="backpack_url('assessment')" />