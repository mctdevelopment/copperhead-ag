<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  border: 1px solid black;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
h3 {
    text-align: center;
    color: darkred;
}
.row{
  display: flex;
  gap:12px;
  width
}select#shipperext  {
    height: 40px !important;
   margin-left: 9px;
    margin-top: 13px;
    /* padding: 23px 10px 11px 12px; */
}select{
  height: 40px !important;
}input {
    margin: 10px !important; }
    .bold{
       margin: 11px 0 0 0;
    }
     .phnumber {
    width: 75.1%;
}
</style>
<body>

<form id="regForm" method="post" action="getshipping.php">
  <h1>Create a Shipment:</h1>
  <!-- One "tab" for each step in the form: -->



  <div class="tab"><h3>Shipment Detail</h3>

  <div class="row">
  <input type="text" id="shipmentdescription" name="shipmentdescription" placeholder="Description" ></div>
  <div class="row">
  <input type="text" id="shipperName" name="shipperName" placeholder="Name"> 

  <input type="text" id="shipperAttentionName" name="shipperAttentionName" placeholder="Attention Name"> </div>
  <div class="row">
  <input type="number" id="TaxIdentificationNumber" name="TaxIdentificationNumber" placeholder="Tax Identification Number"> 
  <!-- <p class="bold"> Extension:</p> -->
  <select id="shipperext" name="shipperext">
    <option value="1">USA (+1)</option>
    <option value="44">UK (+44)</option>
    <option value="91">India (+91)</option>
    <option value="61">Australia (+61)</option>
    <option value="86">China (+86)</option>
    <option value="81">Japan (+81)</option>
    <option value="49">Germany (+49)</option>
    <option value="33">France (+33)</option>
    </select> 
  <input type="number"  class="phnumber" id="shipperphone" name="shipperphone"   placeholder="Phone Number" > </div>
  <div class="row">
  <input type="text" id="shipperAccNum" name="shipperAccNum"  placeholder="Shipper Account Number" >
  <input type="number" id="Shiperfax" name="Shiiperfax" placeholder="Fax Number"  > </div>
  <div class="row">
  <input type="text" id="shipperAddress" name="shipperAddress"  placeholder="Address Line" > 
  <input type="text" id="shipperCity" name="shipperCity" placeholder="City"  > </div>
  <div class="row">
  <input type="text" id="shipperProvinceCode" name="shipperProvinceCode" placeholder="State Province Code"> 
  <input type="number" id="shipperPostalCode" name="shipperPostalCode" placeholder="Postal Code"  > 
  <input type="text" id="shippercountryCode" name="shippercountryCode"  placeholder="Country Code" >  </div>
  </div>


  <div class="tab"><h3>Where is your shipment going..?</h3>
   <div class="row">
   <input type="text" id="shippToName" name="shippToName"  placeholder="Name" > 
   <input type="text" id="shippToAttnName" name="shippToAttnName" placeholder="Attention Name"  > </div>
   <div class="row">
    <select id="shipperext" name="shipperext" >
    <option value="1">USA (+1)</option>
    <option value="44">UK (+44)</option>
    <option value="91">India (+91)</option>
    <option value="61">Australia (+61)</option>
    <option value="86">China (+86)</option>
    <option value="81">Japan (+81)</option>
    <option value="49">Germany (+49)</option>
    <option value="33">France (+33)</option>
    </select> 
    </select> 
   <input type="number" id="shipTophone" class="phnumber" name="shipTophone" placeholder="Phone Number"  > 
   <input type="text" id="shippToAddress" name="shippToAddress" placeholder="Address"  > </div>
   <div class="row">
   <input type="text" id="shippToCity" name="shippToCity"  placeholder="City" > 
   <input type="text" id="shippToStateCode" name="shippToStateCode" placeholder="State Province Code"  > </div>
   <div class="row">
   <input type="number" id="shippToCode" name="shippToCode"  placeholder="Postal Code" > 
   <input type="texy" id="shippToCountryCode" name="shippToCountryCode" placeholder="Country Code"  > 
   <input type="text" id="shippToResidentialCode" name="shippToResidentialCode"  placeholder="Residential Code" > 
  </div>
</div>



  <div class="tab"><h3>Where are you Shiping From..?</h3>
    <div class="row">
 <input type="text" id="shippfromName" name="shippfromName" placeholder="Name"  > 
 <input type="text" id="shippFromAttnName" name="shippFromAttnName" placeholder="Attention Name"  > </div>
  <div class="row">
 <input type="number" id="shipFromphone" name="shipFromphone" placeholder="Phone Number"  > 
 <input type="text" id="shipFromAddress" name="shipFromAddress" placeholder="Address"  > </div>
 <div class="row">
 <input type="text" id="shipFromCity" name="shipFromCity"  placeholder="City" > 
  <input type="number" id="shipFromFax" name="shipFromFax" placeholder="Fax Number"  > </div>
  <div class="row">
 <input type="text" id="shipFromStateCode" name="shipFromStateCode" placeholder="State Province Code"  > 
 <input type="number" id="shipFromCode" name="shipFromCode" placeholder="Postal Code"  > 
 <input type="texy" id="shipFromCountryCode" name="shipFromCountryCode" placeholder="Country Code"  > 

 <input type="date" id="shipdate" name="shipdate" placeholder="shipdate"  >
 <input type="time" id="shiptime" name="shiptime" placeholder="shiptime"  >
 
</div>
  </div>



  <div class="tab"><h3>Payment Information</h3>
    <div class="row"> <input type="number" id="servicecode" name="servicecode" placeholder="Service Code"  > 
 <input type="text" id="accNum" name="accNum" placeholder="Account Number"  > </div>
 <div class="row">
  <input type="text" id="serviceDesc" name="serviceDesc" placeholder="Service Description"  >   
  
  Billtype:<select id="billtype" name="billtype" id="billtype">
   <option value="02">Document</option>
   <option value="03">Non Document</option>
   <option value="04">WWEF (Pallet)</option>
    </select> 
   Number of Packages: <select id="numOfPackage" name="numOfPackage" id="numOfPackage">
   <option value="1">01</option>
   <option value="2">02</option>
   <option value="3">03</option>
    <option value="4">04</option>
   <option value="5">05</option>
   <option value="6">06</option>
    </select>
</div>
<h3>Package Dimensions</h3>
<div class="row">
 <input type="text" id="PackageDesciption" name="PackageDesciption" placeholder="Package Description"  > </div>
 <div class="row">
 <input type="number" id="Packagelength" name="Packagelength" placeholder="Length (Inches)"   > 
  <input type="number" id="PackageWidth" name="PackageWidth"  placeholder="Width (Inches)" > 
 <input type="number" id="PackageHeight" name="PackageHeight" placeholder="Height (Inches)"  > 
  <input type="number" id="PackageWeight" name="PackageWeight"  placeholder="Weight (In LBS)" > </div>
</div>

  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>




  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<script>
   $("#regForm").validate({
    rules:{
    shipperName:{
      required: true,
    },shipperAttentionName:{
      required: true,
    },TaxIdentificationNumber:{
    required: true,
  },shipperext:{
    required: true,
  },shipperphone:{
    required: true,
  },shipperAccNum:{
    required: true,
  },
    Shiiperfax:{
      required: true,
    },shipperAddress:{
      required: true,
    },shipperCity:{
    required: true,
  },shipperProvinceCode:{
    required: true,
    minlength:2,
      maxlength:2,
  },shipperPostalCode:{
    required: true,
    minlength:5,
    // numbers:true,
  },shippercountryCode:{
    required: true,
     minlength:2,
      maxlength:2,
    // numbers:true,
  },shippToName:{
    required: true,
  },shippToAttnName:{
    required: true,
  },shipTophone:{
    required: true,
  },shippToAddress:{
    required: true,
  },shippToCity:{
    required: true,
  },shippToStateCode:{
    required: true,
    minlength:2,
      maxlength:2,
  },shippToStateCode:{
    minlength:2,
      maxlength:2,
    required: true,
  },shippToCode:{
    minlength:5,
    required: true,
  },shippToCountryCode:{
    minlength:2,
      maxlength:2,
    required: true,
  },shippfromName:{
      required: true,
    },shippFromAttnName:{
      required: true,
    },shipFromphone:{
    required: true,
  },shipFromAddress:{
    required: true,
  },shipFromCity:{
    required: true,
  },shipFromStateCode:{
    minlength:2,
      maxlength:2,
    required: true,
    // numbers:true,
  },shipFromCode:{
    required: true,
    minlength:5,
  },shipFromCountryCode:{
    minlength:2,
      maxlength:2,
    required: true,
  },shipFromFax:{
    required: true,
  },servicecode:{
    required: true,
     minlength:2,
  },accNum:{
    required: true,
  },serviceDesc:{
    required: true,
  },PackageDesciption:{
    required: true,
  },Packagelength:{
    required: true,
  },PackageWidth:{
    required: true,
  },PackageHeight:{
    required: true,
  },PackageWeight:{
    required: true,
  },shipdate:{
    required: true,
  },
  
    },
   
   });
  
  
  </script>

</body>
</html>
