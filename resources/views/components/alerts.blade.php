<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="alerts-container">


<!-- Session Success Messages -->
@if(session('success'))
<div class="alert alert-success">
<p class="alert-message">{{ session('success') }}</p>
</div>
@endif

<!-- Session Status Messages -->
@if(session('status'))
<div class="alert alert-info">
<p class="alert-message">{{ session('status') }}</p>
</div>
@endif

<!-- Session Error Messages -->
@if(session('error'))
<div class="alert alert-danger">
<p class="alert-message">{{ session('error') }}</p>
</div>
@endif

<!-- Session Info Messages -->
@if(session('info'))
<div class="alert alert-info">
<p class="alert-message">{{ session('info') }}</p>
</div>
@endif

<!-- Validation Error Messages (First Error Only) -->
@if ($errors->any())
<div class="alert alert-danger">
<p class="alert-message">{{ $errors->first() }}</p>
</div>
@endif

</div>
