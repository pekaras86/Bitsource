@extends('layouts.master')
  
    @section('content')

    <div class="home-main-content">

    <form class="hp-form">
      <div class="input-group">
        <label class="control-label" for="focusedInput">Αναζήτηση με λέξεις κλειδιά</label>
        <input type="text" class="form-control" placeholder="π.χ Javascript" aria-label="...">
        <span class="input-group-addon styled-select">
          <select>
            <option>Κατηγορία</option>
            <option>Έργα</option>
            <option>Eπαγγελματίες</option>
            <option>Εργασία</option>
          </select>
        </span>
      </div><!-- /input-group --> 
    </form>

    </div>
    
    @endsection
