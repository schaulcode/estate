<h3>PROPERTY SEARCH</h3>
<form class="" action="search.php" method="post">

  <label class="col-md-12" for="price-from">Prcie (Price per month)</label>
  <div class="form-inline col-md-12">
    <input class="form-control " type="number" name="price-min" id="price-from" step="10" >
    <label for="price-to">to</label>
    <input class="form-control" type="number" name="price-max" id="price-to" step="10" >
  </div>

  <div class="form-group col-md-12">
    <label for="location">Location</label>
    <input class="form-control" type="text" name="location" id="location">
  </div>

  <div class="form-group col-md-6 ">
    <label for="bedrooms">Min bedrooms</label>
    <select class="form-control" name="bedrooms" id="bedrooms">
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
    <select class="form-control" name="type" id="type">
      <option value="buy" selected>To Buy</option>
      <option value="rent">To Rent</option>
    </select>
  </div>

  <div class="form-group col-md-6 ">
    <label for="floor">Max. Floor</label>
    <select class="form-control" name="floor" id="floor">
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

  <div class="form-group col-md-6">
    <label for="sqm">Min. Sqm</label>
    <input class="form-control" type="number" name="sqm" value="10" step="10">
  </div>

  <div class="col-md-12">
    <button class="btn btn-block " type="submit" name="button">Search</button>
    <p><a href="javascript: toggleAdvanced();">Advanced search</a></p>
  </div>

  <div class="advanced">
    <div class="form-group col-md-12">
      <label for="bathrooms">Bathrooms</label>
      <select class="form-control" name="bathrooms">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
    </div>
    <div class="form-group col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="balcony" value="1">Balcony
        </label>
        </div>
    </div>
    <div class="form-group col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="elevator" value="1">Elevator
        </label>
        </div>
    </div>
    <div class="form-group col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="garage" value="1">Garage space
        </label>
        </div>
    </div>
    <div class="form-group col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="garden" value="1">Garden
        </label>
        </div>
    </div>
    <div class="form-group col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="renovated" value="1">Renovated
        </label>
        </div>
    </div>
    <div class="form-group col-md-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="furnished" value="1">Furnished (Rent only)
        </label>
        </div>
    </div>

  </div>
</form>

<script type="text/javascript">
function toggleAdvanced() {
  $(".advanced").slideToggle();

  }
</script>
