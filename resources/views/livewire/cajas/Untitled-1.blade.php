



  <div>

    @if($action==3)
    @include('livewire.cajas.update')
    @endif

    @if($action==2)
      @include('livewire.cajas.create')
    @endif

    @include('livewire.messages.messages')

    <!-- search area start -->
    <div class="container">
      @if($action==1)
        <button class='btn btn-light'
          style='float:right;margin:16px;' wire:click="create">
          New
        </button>
        {{ $action }}
        <div class="row">
          <div class="col-12 form-controller">


            {{-- doAction(2) --}}
            {{-- $set('action', '2') --}}
          </div>
          <br>
          <div class="col-6 col-sm-12">
            <div class="client-address-form">
              <form >
                <input type='hidden' name='selected_id'>
                <input type="text" name='search' placeholder="Search">
              </form>
            </div>
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
              <th scope="col">compct</th>
              <th scope="col">compacte</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            @if(count($info) > 0)
              @foreach($info as $caj)
              <tr>
              <th scope="row">{{ $caj->id }}</th>
              <td>{{ \Str::limit($caj->compct,50) }}</td>
              <td>
                <img src='{{$caj->compacte}}'>
              <td>
              <td>{{ $caj->created_at->diffForHumans() }}</td>
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
      @endif
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded',function(){
      window.livewire.on('fileChoosen',()=>{
        let InputField=document.getElmentById('image');
        let file = InputField.files[0];
        let reader =new FileReader();
        reader.onloadend=()=>{
          window.livewire.emit('fileuPloaded',reader.result);
        }
        reader.readtAsDataUrl(file);
      })
    });
  </script>
