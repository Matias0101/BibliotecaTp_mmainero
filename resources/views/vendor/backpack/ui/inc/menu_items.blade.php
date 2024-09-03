{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@includeWhen(class_exists(\Backpack\DevTools\DevToolsServiceProvider::class), 'backpack.devtools::buttons.sidebar_item')


<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Countries" icon="la la-question" :link="backpack_url('country')" />
<x-backpack::menu-item title="Funtions" icon="la la-question" :link="backpack_url('funtion')" />
<x-backpack::menu-item title="Themes" icon="la la-question" :link="backpack_url('theme')" />
<x-backpack::menu-item title="Series" icon="la la-question" :link="backpack_url('serie')" />