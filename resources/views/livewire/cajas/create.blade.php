<div class="container">
  <div class="row p-5">
    <div class="col-7 m-uto">
      <form styly='max-width:800px !imporatant;margin:auto !imporatant;padding:50px !imporatant;'>
        <h3>Create New</h3>
        @include('livewire.messages.messages')

        <div class="form-row p-0">
          <div class="form-group col-md-12">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control" wire:model.lazy='tipo'>
              <option value='eleger'>elger</option>
              <option value='gasto'>gasto</option>
              <option ption value='ingreso'>ingreso</option>
            </select>
          @error('tipo')
            <span class='text-small text-danger'>{{ $message }}</span>
          @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress2">Monto</label>
          <input type="number" class="form-control" id=""  placeholder="Monto" wire:model.lazy='monto'>
          @error('monto')
            <span class='text-small text-danger'>{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputAddress">Compacte</label>
          <input type="file" class="form-control" id="image" wire:model="compacte" wire:change="$emit(fileChoosen,this)"
           accept="image/x-png,image/gif,image/jpeg">
          @error('compacte')
            <span class='text-small text-danger'>{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputAddress2">Compct</label>
          <input type="text" class="form-control" id=""  placeholder="....." wire:model='compct'>
          @error('compct')
            <span class='text-small text-danger'>{{ $message }}</span>
          @enderror
        </div>
        <div class='col-12 mb-5'>
          <button type="button" class="btn btn-primary" wire:click='storeOrUpdate'>Save</button>
          <button type="button" class="btn btn-danger" wire:click="resetInput">Cancel</button>
        </div>
      </form>
      <br><br><br><br>
    </div>
  </div>
</div>
