<!-- source https://gist.github.com/dsursulino/369a0998c0fc8c25e19962bce729674f -->
@vite('resources/css/app.css')
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />

<x-header/>
  
  <div class="flex flex-row pt-24 px-10 pb-4">
    <div class="w-2/12 mr-6">
      <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
        <div  class="inline-block text-gray-600 hover:text-black my-4 w-full">
          <span class="material-icons-outlined float-left pr-2">dashboard</span>
          Edit/Delete
        </div>
        <a href="/admin-all-users-show" class="inline-block text-gray-600 hover:text-black my-4 w-full">
          <span class="material-icons-outlined float-left pr-2">tune</span>
          User details
          <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
        </a>
        <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
          <span class="material-icons-outlined float-left pr-2">file_copy</span>
          Delete Tickets
          <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
        </a>
        <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
            <span class="material-icons-outlined float-left pr-2">file_copy</span>
            Buse Details 
            <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
          </a>
      </div>

      <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
        <a href="" class="inline-block text-gray-600 hover:text-black my-4 w-full">
          <span class="material-icons-outlined float-left pr-2">face</span>
          Profile
          <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
        </a>
        
        <a href="/logout" class="inline-block text-gray-600 hover:text-black my-4 w-full">
          <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
          Log out
          <span class="material-icons-outlined float-right">keyboard_arrow_right</span>
        </a>
      </div>
    </div>
    
    <div class="w-10/12">
      <div class="flex flex-row">
        <div class="bg-no-repeat bg-red-200 border border-red-300 rounded-xl w-7/12 mr-2 p-6" style="background-image: url(https://previews.dropbox.com/p/thumb/AAvyFru8elv-S19NMGkQcztLLpDd6Y6VVVMqKhwISfNEpqV59iR5sJaPD4VTrz8ExV7WU9ryYPIUW8Gk2JmEm03OLBE2zAeQ3i7sjFx80O-7skVlsmlm0qRT0n7z9t07jU_E9KafA9l4rz68MsaZPazbDKBdcvEEEQPPc3TmZDsIhes1U-Z0YsH0uc2RSqEb0b83A1GNRo86e-8TbEoNqyX0gxBG-14Tawn0sZWLo5Iv96X-x10kVauME-Mc9HGS5G4h_26P2oHhiZ3SEgj6jW0KlEnsh2H_yTego0grbhdcN1Yjd_rLpyHUt5XhXHJwoqyJ_ylwvZD9-dRLgi_fM_7j/p.png?fv_content=true&size_mode=5); background-position: 90% center;">
          <p class="text-5xl text-indigo-900">Welcome <br><strong>{{session('name')}}</strong></p>
          <a href="/add_buses"
          class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 cursor-pointer focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1 rounded-xl">
          <i class="fas fa-plus-circle mr-2"></i> Add Buses
      </a>
      <a href="/register"
          class="flex items-center justify-center w-full px-4 py-4 text-xl font-bold capitalize duration-100 transform border-2 cursor-pointer focus:ring-4 focus:ring-gray-400 focus:ring-opacity-50 focus:outline-none sm:w-auto sm:px-6 border-text hover:shadow-lg hover:-translate-y-1 rounded-xl">
          <i class="fas fa-plus-circle mr-2"></i> Add Users
      </a>

        </div>

        <div class="bg-no-repeat bg-orange-200 border border-orange-300 rounded-xl w-5/12 ml-2 p-6" style="background-image: url(https://previews.dropbox.com/p/thumb/AAuwpqWfUgs9aC5lRoM_f-yi7OPV4txbpW1makBEj5l21sDbEGYsrC9sb6bwUFXTSsekeka5xb7_IHCdyM4p9XCUaoUjpaTSlKK99S_k4L5PIspjqKkiWoaUYiAeQIdnaUvZJlgAGVUEJoy-1PA9i6Jj0GHQTrF_h9MVEnCyPQ-kg4_p7kZ8Yk0TMTL7XDx4jGJFkz75geOdOklKT3GqY9U9JtxxvRRyo1Un8hOObbWQBS1eYE-MowAI5rNqHCE_e-44yXKY6AKJocLPXz_U4xp87K4mVGehFKC6dgk_i5Ur7gspuD7gRBDvd0sanJ9Ybr_6s2hZhrpad-2WFwWqSNkh/p.png?fv_content=true&size_mode=5); background-position: 100% 40%;">
          <p class="text-5xl text-indigo-900">All Users<br><strong>List</strong></p>
          <a href="/admin-all-users-show" class="bg-orange-300 text-xl text-white underline hover:no-underline inline-block rounded-full mt-12 px-8 py-2"><strong>See</strong></a>
        </div>
      </div>
      <div class="flex flex-row h-64 mt-6 space-x-6">
        <!-- First Card: User Count and 5 Users -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl px-6 py-6 w-4/12">
            <h2 class="text-xl font-bold mb-4">Total Users Registered: {{$users->count()}}</h2>
            <ul class="space-y-1">
                @foreach ($users->take(5) as $user)
                    <li class="text-base font-medium">{{strtoupper( $user->name) }}</li>
                @endforeach
            </ul>
        </div>
    
        <!-- Second Card: Total Buses, All Sources, All Destinations -->
        <div class="bg-gray-400 text-white rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl px-6 py-6 w-4/12">
            <h2 class="text-xl font-bold mb-4">Total Buses Available: {{$bus->count()}}</h2>
            <p><strong>Sources:</strong> {{strtoupper( $bus->pluck('source')->unique()->implode(', ') )}}</p>
            <p><strong>Destinations:</strong> {{ strtoupper($bus->pluck('destination')->unique()->implode(', ')) }}</p>
        </div>
    
        <!-- Third Card: Total Tickets Sold and Amount Earned -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-700 text-white rounded-xl shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl px-6 py-6 w-4/12">
            <h2 class="text-xl font-bold mb-4">Total Tickets Sold</h2>
            <p class="text-3xl font-semibold mb-4">{{ $tickets->count() }}</p>
    
            <h2 class="text-xl font-bold mb-2">Total Ticket Amount Earned</h2>
            <p class="text-3xl font-semibold">Rs{{ $cart->sum('price') }}</p>
        </div>
    </div>
    
    
    </div>
  </div>
</div>
{{-- <x-footer/> --}}