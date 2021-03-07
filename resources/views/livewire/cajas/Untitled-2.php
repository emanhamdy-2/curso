<?php

namespace App\Http\Livewire;
use Illuminate\Support\Auth;
use Livewire\Component;
use App\Models\Tipo;
use App\Models\Cajon;
use App\Models\Cajas as Caj;
use Illuminate\Http\Request;

class Cajas extends Component
{
  public $tipo='eleger',$compc, $compacte ,$montp;
  public $selected_id ,$search;
  public $action=1 ,$pagination=5;

  // public function mount($action)
  // {
  //   $this ->action=$action;
  // }

  public function render()
  {

    if(strlen($this->search)>0){

      $info=Caj::where('tipo' ,'like' ,'%' . $this->search . '%')
      ->orWhere('compct' ,'like' ,'%' . $this->search . '%')
      ->paginate($this->pagination);
      return view('livewire.cajas.cajas',[
        'info' => $info,
      ]);


    }else{

      $info=Caj::leftJoin('users as u' ,'u.id' ,'cajas.user_id')
      ->select('cajas.*','u.name')
      ->orderBy('id','desc')
      ->paginate($this->pagination);
      return view('livewire.cajas.cajas',[
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

  public function create()
  {
    $this->action=2;
    dump($this->action);

  }

  public function resetInput()
  {
    $this->tipo='eleger';
    $this->compacte='';
    $this->compct='';
    $this->monto='';
    $this->selected_id=null;
    $this->action=1;
    $this->search='';
  }

  public function edit($id)
  {
    $record=Caj::findOrFail($id);
    $this->$tipo=$record->tipo_id;
    $this->$compacte=$record->compacte;
    $this->$compct=$record->compct;
    $this->$monto=$record->monto;
    $this->$selected_id=$id;
    $this->$action=3;
  }

  public function storeOrUpdate()
  {

    $this->validate([
      'tipo'=>'not_in:eleger'
      ]);
    $this->validate([
      'tipo'=>'required',
      'compct'=>'required',
      'monto'=>'required',
      'compacte'=>'required',
      ]);
    if($this->selected_id <= 0){

      $caja=Caj::create([
        'tipo'=> $this->tipo,
        'user_id'=> Auth::user()->id,
        'monto'=>  $this->monto,
        'compct'=>  $this->compct,
      ]);
      if($this->compacte){
        $image=$this->compacte;
        $filenm= time() . '.' . explode('/',explode(':',substr($image,0,strpos($image,';')))[1])[1];
        $moved=\Image::make($image)->save('images'.$filenm);
        if($moved){
          $caja->compact=$filenm;
          $caja->save();
        }
      }

    }else{

      $caja=Caj::findOrFail($this->selected_id);
      $caja=Caj::update([
        'tipo'=> $this->tipo,
        'user_id'=> Auth::user()->id,
        'monto'=>  $this->monto,
        'compct'=>  $this->compct,
      ]);
      if($this->compacte){
        $image=$this->compacte;
        $filenm= time() . '.' . explode('/',explode(':',substr($image,0,strpos($image,';')))[1])[1];
        $moved=\Image::make($image)->save('images'.$filenm);
        if($moved){
          $caja->compact=$filenm;
          $caja->save();
        }
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

  protected $listeners=[
    'deleteRow' => 'destroy',
    'fileUpload' => 'handleFileUpload',
  ];

  public function handleFileUpload()
  {
    $this->compacte=$imageData;
  }

  public function destroy($id){
    $record=Caj::findOrFail($id);
    $record->delete();
    $this->resetInput();
  }

}
