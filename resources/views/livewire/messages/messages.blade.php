  @if (session()->has('message') )
  <br/>
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
  @endif

  @if (session()->has('msg-success') )
  <br/>
  <div class="alert alert-error">
    {{ session('msg-success') }}
  </div>
  @endif

  @if (session()->has('msg-error') )
  <br/>
  <div class="alert alert-error">
    {{ session('msg-error') }}
  </div>
  @endif
