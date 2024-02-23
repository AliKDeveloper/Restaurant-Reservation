<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::sortable()->get();
        return view('table.index')->with('tables',$tables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validateWithBag('tableAddition',
            ['id' => 'required|unique:tables'],
            ['id.required' => 'The table number field is required',
            'id.unique' => 'The table number has already been taken'
            ]);

        Table::create([
           'id' => $request->id,
            'client' => null,
            'reserved_by' => null,
            'arrival_time' => null,
            'phone' => null,
            'is_reserved' => false,
            'note' => null,
        ]);

        return redirect()->route('table.index')->with('added', 'The Table Has Been Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Table::findOrFail($id);
        return view('table.show')->with('table', $table);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('table.edit')->with('table',Table::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validateWithBag('tableUpdating',[
            'client' => 'required',
            'phone' => 'required',
        ]);

        if (Table::findOrFail($id)->is_reserved)
            $message = "The Reservation of Table: {$id} Has Been Updated Successfully";
        else
            $message = "The Table: {$id} has Been Reserved";

        Table::where('id',$id)->update([
            'client' => $request->client,
            'reserved_by' => Auth::user()->name,
            'arrival_time' => $request->arrival_time,
            'phone' => (string)$request->phone,
            'is_reserved' => $request->client != null,
            'note' => $request->note,
        ]);

        return redirect()->route('table.index')->with('updated',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();

        return redirect()->route('table.index')->with('deleted', "The Table: {$id} has been Deleted");
    }
    public function cancel($id)
    {
        Table::where('id',$id)->update([
            'client' => null,
            'reserved_by' => null,
            'arrival_time' => null,
            'phone' => null,
            'note' => null,
            'is_reserved' => false,
        ]);

        return redirect()->route('table.index')->with('cancelReservation', "The Reservation of Table: {$id} has been canceled");
    }
    public function cancelAll($message)
    {
        Table::where('is_reserved', true)->update([
            'client' => null,
            'reserved_by' => null,
            'arrival_time' => null,
            'phone' => null,
            'note' => null,
            'is_reserved' => false,
        ]);

        return redirect()->route('table.index')->with('cancelAllReservations', $message);
    }

    public function addTables(Request $request)
    {
        for($a=1; $a <= $request->number; $a++)
        {
            Table::create([
                'id' => $a,
                'client' => null,
                'reserved_by' => null,
                'arrival_time' => null,
                'phone' => null,
                'is_reserved' => false,
                'note' => null,
            ]);
        }

        if(isset($request->secrete_key))
        {
            $path = base_path('config/secretekey.php');
            $file = file_get_contents($path);
            $oldSecreteKey = config('secretekey.secrete_key');
            $newSecreteKey = Hash::make($request->secrete_key);

            if (file_exists($path))
            {
                file_put_contents($path, str_replace($oldSecreteKey, $newSecreteKey, $file));
            }
        }

        return redirect()->route('table.index');
    }

    public function changeSecreteKey(Request $request)
    {
        if(!Hash::check($request->current_secrete_key, config('secretekey.secrete_key')))
        {
            return back()->with('current_secrete_key_incorrect', 'The current secrete key is incorrect');
        }

        $request->validateWithBag('updateSecreteKey',[
            'new_secrete_key'=>'required|confirmed',
        ]);

        $path = base_path('config/secretekey.php');
        $file = file_get_contents($path);
        $oldSecreteKey = config('secretekey.secrete_key');
        $newSecreteKey = Hash::make($request->new_secrete_key);
        if (file_exists($path))
        {
            file_put_contents($path, str_replace($oldSecreteKey, $newSecreteKey, $file));
        }
        return back()->with('status', 'secrete-key-updated');
    }

}
