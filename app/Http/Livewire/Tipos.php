<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tipo;

class Tipos extends Component
{
  // TiposController
  use WithPagination;

  public $description;
  public $selected_id ,$search;
  public $action=1 ,$pagination=5;

  public $searcheMode=1;
  public $updateMode ,$createMode ,$deleteModal=0;

  public function mount()
  {
    # code...
  }

  public function render()
  {
    if (strLen($this->search) > 0) {

      $info=Tipo::where('description','like','%' . $this->search .'%')
      ->pagination($this->pagination);
      return view('livewire.tipos.tipos',[
        'info' => $info
      ]);

    }else{

      $info=Tipo::paginate($this->pagination);
      return view('livewire.tipos.tipos',[
        'info' => $info
      ]);

    }
  }
  function updatingSearch(): void
  {
    $this->gotoPage(1);
  }

  public function doAction($action)
  {
    $this->action=$action;
  }

  public function resetInput()
  {
    $this->description='';
    $this->selected_id=null;
    $this->action=1;
    $this->search='';
  }

  public function edit($id)
  {
    $record=Tipo::findOrFail($id);
    $this->$description=$record->dsecription;
    $this->$selected_id=$id;
    $this->$action=3;
  }

  public function storeOrUpdate()
  {
    $this->validate(['description'=>'required|min:4']);

    if($this->selected_id > 0){

      $exist=Tipo::where('description',$this->descreption)
      ->where('id','<>',$this->selected_id)
      ->select('description')->get();
      if($exist->count()>0){
        session()->flash('msg-error','The tipo is exist before');
        $this->resetInput();
        return;
      }

    }else{

      $exist=Tipo::where('description',$this->descreption)
      ->select('description')->get();
      if($exist->count()>0){
        session()->flash('msg-error','The tipo description is exist before');
        $this->resetInput();
        return;
      }

    }

    if($this->selected_d <=0 ){
      $record=Tipo::create([
        'description' => $this->description,
      ]);
      session()->flash('message','Tipo is Created suuccessfully');
    }else{
      $record=Tipo::findOrFail($this->selected);
      $record->update([
        'description' => $this->description,
        ]);
      session()->flash('message','Tipo is Updated suuccessfully');
    }

    $this->resetInput();
  }

  public function destroy($id){
    $record=Tipo::findOrFail($id);
    $record->delete();
    $this->resetInput();
    session()->flash('message','The tipo was deleted successfully .');
  }

  protected $listeners=[
    'deleteRow' => 'destroy',
  ];

}
