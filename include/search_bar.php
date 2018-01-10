<h3>PROPERTY SEARCH</h3>
<form class="" action="index.php" method="post">

  <label class="col-md-12" for="price-from">Price per month</label>
  <div class="form-inline col-md-12">
    <input class="form-control " type="number" id="price-from" step="10" >
    <label for="price-to">to</label>
    <input class="form-control" type="number" id="price-to" step="10" >
  </div>

  <div class="form-group col-md-12">
    <label for="location">Location</label>
    <input class="form-control" type="text" id="location">
  </div>

  <div class="form-group col-md-6 ">
    <label for="bedrooms">Min bedrooms</label>
    <select class="form-control" id="bedrooms">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
    </select>
  </div>

  <div class="form-group col-md-6 ">
    <label for="type">Property type</label>
    <select class="form-control" id="type">
      <option value="app">Appartment</option>
      <option value="house" selected>House</option>
      <option value="lodge">Lodge</option>
    </select>
  </div>

  <div class="form-group col-md-6">
    <label for="availbility"> Avaibility</label>
    <select class="form-control" id="avaibility">
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <div class="form-group col-md-6">
    <label for="furnished">Furnished</label>
    <select class="form-control" id="furnished">
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <div class="col-md-12">
    <button class="btn btn-block " type="button" name="button">Search</button>
    <p><a href="#">Advanced search</a></p>
  </div>

</form>
