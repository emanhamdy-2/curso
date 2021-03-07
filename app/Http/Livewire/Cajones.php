<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tipo;
use App\Models\Cajon;
use Illuminate\Http\Request;

class Cajones extends Component
{
  public $tipo='eleger',$description, $status='disapled',$tipos;
  public $selected_id ,$search;
  public $action=1 ,$pagination=5;

  public function mount()
  {

  }

  public function render()
  {
    if(strlen($this->search)>0){

      $info=Cajon::leftJoin('tipos as t' ,'t.id' ,'cajones.tipo_id')
      ->select('cajones.*','t.id as tipo')
      ->where('cajones.description' ,'like' ,'%' . $this->search . '%')
      ->orWhere('cajones.status' ,'like' ,'%' . $this->search . '%')
      ->paginate($this->pagination);
      return view('livewire.cajones.cajones',[
        'info' => $info,
      ]);


    }else{

      $info=Cajon::leftJoin('tipos as t' ,'t.id' ,'cajones.tipo_id')
      ->select('cajones.*','t.description as tipo')
      ->orderBy('cajones.id','desc')
      ->paginate($this->pagination);
      return view('livewire.cajones.cajones',[
        'info' => $info,
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
    $this->tipo='eleger';
    $this->status='disapled';
    $this->selected_id=null;
    $this->action=1;
    $this->search='';
  }

  public function edit($id)
  {
    $record=Cajon::findOrFail($id);
    $this->$tipo=$record->tipo_id;
    $this->$status=$record->status;
    $this->$description=$record->dsecription;
    $this->$selected_id=$id;
    $this->$action=3;
  }

  public function storeOrUpdate(Request $request)
  {
    $this->validate([
      'tipo'=>'not_in:eleger'
      ]);
    $this->validate([
      'description'=>'required|min:4',
      'tipo'=>'required',
      'status'=>'required',
      ]);

    if($this->selected_id > 0){

      $exist=Cajon::where('description',$this->descreption)
      ->where('id','<>',$this->selected_id)
      ->select('description')->get();
      if($exist->count()>0){
        session()->flash('msg-error','The Cajon is exist before');
        $this->resetInput();
        return;
      }

    }else{

      $exist=Cajon::where('description',$this->descreption)
      ->select('description')->get();
      if($exist->count()>0){
        session()->flash('msg-error','The Cajon description is exist before');
        $this->resetInput();
        return;
      }

    }

    if($this->selected_d <=0 ){
      $record=Cajon::create([
        'tipo_id'=>$this->tipo,
        'status'=>$this->status,
        'description' => $this->description,
      ]);
      session()->flash('message','Tipo is Created suuccessfully');
    }else{
      $record=Cajon::findOrFail($this->selected);
      $record->update([
        'tipo_id'=>$this->tipo,
        'status'=>$this->status,
        'description' => $this->description,
        ]);
      session()->flash('message','Tipo is Updated suuccessfully');
    }

    $this->resetInput();
  }

  public function destroy($id){
    $record=Cajon::findOrFail($id);
    $record->delete();
    $this->resetInput();
  }

  protected $listeners=[
    'deleteRow' => 'destroy',
  ];
}
