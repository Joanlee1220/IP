<!DOCTYPE html>
<html>
<script>
function toggleField(hideObj,showObj){
  hideObj.disabled=true;        
  hideObj.style.display='none';
  showObj.disabled=false;   
  showObj.style.display='inline';
  showObj.focus();
}
</script>
<body>
<form method="GET" action="{{ route('ride_shares.index') }}">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="pickup_location">Pickup Location</label>
            <select class="form-control" id="pickup_location" name="pickup_location"
                    onchange="if(this.options[this.selectedIndex].value=='customOption'){
                        toggleField(this,this.nextSibling);
                        this.selectedIndex='0';
                    }">
                <option></option>
                <option value="customOption">[type a custom Location]</option>
                <option>TAR UMT</option>
                <option>PV 13</option>
                <option>PV 15</option>
                <option>PV 18</option>
                <option>PV 9</option>
            </select>
            <input name="pickup_location" style="display:none;" disabled="disabled"
                   onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
        </div>

        <div class="col-md-4 mb-3">
            <label for="dropoff_location">Dropoff Location</label>
            <select class="form-control" id="dropoff_location" name="dropoff_location"
                    onchange="if(this.options[this.selectedIndex].value=='customOption'){
                        toggleField(this,this.nextSibling);
                        this.selectedIndex='0';
                    }">
                <option></option>
                <option value="customOption">[type a custom Location]</option>
                <option>TAR UMT</option>
                <option>PV 13</option>
                <option>PV 15</option>
                <option>PV 18</option>
                <option>PV 9</option>
            </select>
            <input name="dropoff_location" style="display:none;" disabled="disabled"
                   onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
        </div>

        <div class="col-md-4 mb-3">
            <label for="ride_date">Ride Date</label>
            <input type="date" class="form-control" id="ride_date" name="ride_date" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>


</body>
</html>