
<div>
  @if($action==3)
    @include('livewire.tipo.update')
  @endif

  @if($action==2)
    @include('livewire.tipo.create')
  @endif

  @if (session()->has('message') || session()->has('msg-error') )
    <br/>
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  <!-- search area start -->
  <div class="container">
    <div class="row">
      <div class="col-12 form-controller">
        <button class='btn btn-light'
          style='float:right;margin:16px;'>
          New
        </button>
      </div>
      <br>
    @if($action==1)
      <div class="col-6 col-sm-12">
        <div class="client-address-form">
        <form action="#">
          <input type='hidden' name='selected_id'>
          <input type="text" name='search' placeholder="Search">
        </form>
        </div>
      </div>
    @endif
    </div>
  </div>
  <!-- search area end -->

  {{-- tipos table --}}
    <div class='container'>
      <div class='row'>
        @isset($info)
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">description</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            @if(count($info) > 0)
              @foreach($info as $tipo)
              <tr>
                <th scope="row">{{ $tipo->id }}</th>
                <td>{{ \Str::limit($tipo->description,50) }}</td>
                <td>{{ $tipo->created_at->diffForHumans() }}</td>
                <td>
                  <a class='btn btn-primary'>Edit</a>
                  <a class='btn btn-danger'>Delete</a>
                </td>
              </tr>
              @endforeach
            @endif
          </tbody>
        </table>
        {{ $info->links() }}
        @endisset
      </div>
    </div>

  {{-- tipos table --}}
</div>
