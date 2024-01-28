<button type="button" data-modal-target="deleteTableModal-{{ $table->id }}" data-modal-toggle="deleteTableModal-{{ $table->id }}" class="font-medium text-red-600 dark:text-red-500 hover:underline">
    {{ __('table/table.delete') }}
</button>

@include('table.parts._warnPopupBox',['alertMessage'=>__('table/table.delete_table').':'.' '.$table->id,
                        'formID'=>'deleteTable'.'-'.$table->id, 'modalName'=>'deleteTableModal'.'-'.$table->id])

{{-- Form for Delete Table  --}}
<div>
    <form id="deleteTable-{{ $table->id }}" action="{{ route('table.destroy', $table->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</div>
