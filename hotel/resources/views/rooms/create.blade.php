@extends('layouts.main')

@section('main')
<form method="POST" action={{ route('rooms.store') }}>
    @csrf
    <div class="m-3">
        <label for="type" class="form-label">Room type<span class="text-danger">*</span></label>
        <select class="form-select" name="type" id="type">
          <option value="economy">economy</option>
          <option value="luxury">luxury</option>
        </select>
    </div>
    @if($errors->has('type'))
      <div class="alert alert-danger">
        @foreach ($errors->get('type') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <div class="m-3">
        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
        <input type="text" name="price" class="less form-control" id="price" value={{ old('price') }}>
    </div>
    @if($errors->has('price'))
      <div class="alert alert-danger">
        @foreach ($errors->get('price') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <div class="m-3">
      <label for="personCapacity" class="form-label">personCapacity<span class="text-danger">*</span></label>
      <input type="number" min="1" max="9" name="personCapacity" class="form-control" id="personCapacity" value={{ old('personCapacity') }}>
    </div>
    @if($errors->has('personCapacity'))
      <div class="alert alert-danger">
        @foreach ($errors->get('personCapacity') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <div class="m-3">
      <label for="description" class="form-label">Description of room<span class="text-danger">*</span></label>
      <textarea rows="5" cols="33" name="description" class="form-control" id="description">
      {{ old('description') }}
      </textarea>
    </div>
    @if($errors->has('description'))
      <div class="alert alert-danger">
        @foreach ($errors->get('description') as $message) 
            <li>{{ $message }}</li>
        @endforeach
      </div>
    @endif
    <button type="submit" name="Create" class="m-3 btn btn-primary">Create</button>
  </form>
@endsection