<!-- Article  -->
@if (session('flash_message'))
  <div class="flash_message h4 text-white text-center bg-success animated fadeOutDown slower delay-1s">
      {{ session('flash_message') }}
  </div>
@endif

@if (session('edit_success'))
  <div class="flash_message h4 text-white text-center bg-success animated fadeOutDown slower delay-1s">
      {{ session('edit_success') }}
  </div>
@endif

<!-- User -->
@if (session('profile_success'))
  <div class="flash_message h4 text-white text-center bg-success animated fadeOutDown slower delay-1s">
      {{ session('profile_success') }}
  </div>
@endif

@if (session('image_success'))
  <div class="flash_message h4 text-white text-center bg-success animated fadeOutDown slower delay-1s">
      {{ session('image_success') }}
  </div>
@endif

@if (session('PR_success'))
  <div class="flash_message h4 text-white text-center bg-success animated fadeOutDown slower delay-1s">
      {{ session('PR_success') }}
  </div>
@endif

@if (session('abort'))
  <div class="flash_message h4 text-white text-center bg-danger animated fadeOutDown slower delay-1s">
      {{ session('abort') }}
  </div>
@endif