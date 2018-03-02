@extends('main')

@section('form')
<form action="" method="">
    <div class="field">
        <label>Name *</label>
        <input type="text" value="" palceholder="" class="vl_empty" />
    </div>
    <div class="field">
        <label>Your city *</label>
        <select class="vl_empty">
            <option class="plh"></option>
            <option value="1">City 1</option>
            <option value="2">City 2</option>
        </select>
    </div>
    <div class="field">
        <label>Your area *</label>
        <select>
            <option class="plh"></option>
            <option>Area 1</option>
            <option>Area 2</option>
        </select>
    </div>
    
    <div class="field">
        <label>Street</label>
        <input type="text" value="" palceholder="" class="vl_empty" />
    </div>
    <div class="field">
        <label>House # </label>
        <input type="text" value="" palceholder="House Name / Number" />
    </div>
    
    <div class="field">
        <label class="pos_top">Additional information</label>
        <textarea></textarea>
    </div>
    
    <div class="field">
        <input type="submit" value="add address" class="green_btn" />
    </div>
</form>
@endsection