   @php
       $links = [
           [
               'icon' => 'fa-solid fa-newspaper',
               'name' => 'Dashboard',
               'route' => route('admin.dashboard'),
               'active' => request()->routeIs('admin.dashboard'),
           ],
           [
               'icon' => 'fa-regular fa-font-awesome',
               'name' => 'Familias',
               'route' => route('admin.families.index'),
               'active' => request()->routeIs('admin.families.*'),
           ],

           [
               'icon' => 'fa-brands fa-microsoft',
               'name' => 'Categorías',
               'route' => route('admin.categories.index'),
               'active' => request()->routeIs('admin.categories.*'),
           ],
       ];
   @endphp



   <aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-[100dvh] pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
       :class="{
           'translate-x-0 ease-out': sidebarOpen,
           '-translate-x-full ease-in': !sidebarOpen
       
       }"
       aria-label="Sidebar">
       <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
           <ul class="space-y-2 font-medium">
               @foreach ($links as $link)
                   <li>
                       <a href="{{ $link['route'] }}"
                           class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group  {{ $link['active'] ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                           <span class="inline-flex items-center justify-center w-6 h-6 ">
                               <i class="{{ $link['icon'] }} text-gray-500"></i>
                           </span>
                           <span class="ml-2">
                               {{ $link['name'] }}
                           </span>
                       </a>
                   </li>
               @endforeach
           </ul>
       </div>
   </aside>
