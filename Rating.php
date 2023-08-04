<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Rating api | UPS</title>

<style>
   @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  padding: 10px;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
}
.container{
  max-width: 800px;
  background: #fff;
  width: 800px;
  padding: 25px 40px 10px 40px;
  box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}
.container .text{
  text-align: center;
  font-size: 41px;
  font-weight: 600;
  font-family: 'Poppins', sans-serif;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.container form{
  padding: 30px 0 0 0;
}
.container form .form-row{
  display: flex;
  margin: 32px 0;
}
form .form-row .input-data{
  width: 100%;
  height: 40px;
  margin: 0 20px;
  position: relative;
}
form .form-row .textarea{
  height: 70px;
}
.input-data input,
.textarea textarea{
  display: block;
  width: 100%;
  height: 100%;
  border: none;
  font-size: 17px;
  border-bottom: 2px solid rgba(0,0,0, 0.12);
}
.input-data input:focus ~ label, .textarea textarea:focus ~ label,
.input-data input:valid ~ label, .textarea textarea:valid ~ label{
  transform: translateY(-20px);
  font-size: 14px;
  color: #3498db;
}
.textarea textarea{
  resize: none;
  padding-top: 10px;
}
.input-data label{
  position: absolute;
  pointer-events: none;
  bottom: 10px;
  font-size: 16px;
  transition: all 0.3s ease;
}
.textarea label{
  width: 100%;
  bottom: 40px;
  background: #fff;
}
.input-data .underline{
  position: absolute;
  bottom: 0;
  height: 2px;
  width: 100%;
}
.input-data .underline:before{
  position: absolute;
  content: "";
  height: 2px;
  width: 100%;
  background: #3498db;
  transform: scaleX(0);
  transform-origin: center;
  transition: transform 0.3s ease;
}
.input-data input:focus ~ .underline:before,
.input-data input:valid ~ .underline:before,
.textarea textarea:focus ~ .underline:before,
.textarea textarea:valid ~ .underline:before{
  transform: scale(1);
}
.submit-btn .input-data{
  overflow: hidden;
  height: 45px!important;
  width: 25%!important;
}
.submit-btn .input-data .inner{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: -webkit-linear-gradient(right, #56d8e4, #9f01ea, #56d8e4, #9f01ea);
  transition: all 0.4s;
}
.submit-btn .input-data:hover .inner{
  left: 0;
}
.submit-btn .input-data input{
  background: none;
  border: none;
  color: #fff;
  font-size: 17px;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 1px;
  cursor: pointer;
  position: relative;
  z-index: 2;
}
@media (max-width: 700px) {
  .container .text{
    font-size: 30px;
  }
  .container form{
    padding: 10px 0 0 0;
  }
  .container form .form-row{
    display: block;
  }
  form .form-row .input-data{
    margin: 35px 0!important;
  }
  .submit-btn .input-data{
    width: 40%!important;
  }
}
.heading {
    text-align: center;
    margin: 12px !important;
    padding: 17px;
}
.error{
  color:red !important ;
}
input::placeholder {
  
  font-size: 16px !important; /* Change the color to your desired color */
}
/* Hide the default checkbox appearance */
input[type="checkbox"] {
  width: 23px;
  height: 27px;
  border-radius: 4px;
  outline: none;
  margin-left: 10px;
}

/* Style the checkbox when checked */


/* Style the label associated with the checkbox */
label {
  font-size: 14px;
  color: #000;
  margin-left: 5px;
}
select#serviceType {
    width: 224px;
    height: 54px;
}

</style>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
      <div class="text">
         Fill All Fields To Get Rates
      </div>
       <form action="getrating.php" method="post" id="myform">
        <div class="heading">  <h4>Shipper's Detail</h4>  </div>
         <div class="form-row">
            
            <div class="input-data">
              <input type="text" id="accessLicenseNumber" name="accessLicenseNumber" placeholder="Access License Number">
               <div class="underline"></div>
               <label for="accessLicenseNumber"></label>
            </div>
         </div>
            <div class="form-row">
            <div class="input-data">
               <input type="text" id="shipperName" name="shipperName"  placeholder="Name" >
               <div class="underline"></div>
              <label for="shipperName"> </label>
            </div>
         
         
            <div class="input-data">
                <input type="text" id="shipperNum" name="shipperNum" placeholder="Shipper Number">
               <div class="underline"></div>
              <label for="shipperNum"> </label>
            </div>
            <div class="input-data">
              <input type="text" id="consignee" name="consignee" placeholder=" Address Line" >
                <div class="underline"></div>
               <label for="consignee"></label>
            </div>
         </div>
         <div class="form-row">
         <div class="input-data">
           <input type="text" id="shipperCity" name="shipperCity" placeholder=" City" ><br>
         
            <div class="underline"></div>
             <label for="shipperCity"></label>
            </div>
         <div class="input-data">
           <input type="text" id="shipperProvinceCode" name="shipperProvinceCode" placeholder="Province Code" ><br>
         <div class="underline"></div>
            <label for="shipperProvinceCode"> </label>
         </div>
             <div class="input-data">
           <input type="number" id="shipperPostalCode" name="shipperPostalCode" placeholder="Postal Code" >
         <div class="underline"></div>
             <label for="shipperPostalCode"> </label>
            </div>

            </div>

         <div class="heading">    <h4>Ship To:</h4>  </div>
            <div class="form-row">
            <div class="input-data">
               <input type="text" id="shippToName" name="shippToName"  placeholder="Name"><br>
               <div class="underline"></div>
              <label for="shippToName"> </label>
            </div>
         
         
            <div class="input-data">
                <input type="text" id="shippToAddress" name="shippToAddress" placeholder=" Address" ><br>
               <div class="underline"></div>
               <label for="shippToAddress"></label>
            </div>
            <div class="input-data">
               <input type="text" id="shippToCity" name="shippToCity" placeholder=" City:" ><br>
                <div class="underline"></div>
               <label for="shippToCity"></label>
            </div>
         </div>
         <div class="form-row">
         <div class="input-data">
             <input type="text" id="shippToStateCode" name="shippToStateCode" placeholder="State Province Code:" ><br>
         
            <div class="underline"></div>
              <label for="shippToStateCode"></label>
            </div>
         <div class="input-data">
           <input type="number" id="shippToCode" name="shippToCode" placeholder="Postal Code:" ><br><br>
         <div class="underline"></div>
            <label for="shippToCode"></label>
         </div>
            
            
            </div>
           
          
         <div class="heading"> <h4>Ship From:</h4>  </div>
         <div class="form-row copy">
         <h4>If You are the shipper, Check here  :  </h4> <input type="checkbox" id="copyShipperDetails" name="copyShipperDetails">
          <label for="copyShipperDetails"></label>
        </div>
            <div class="form-row">
             
            <div class="input-data">
               <input type="text" id="shippFromName" name="shippFromName" placeholder=" Name" ><br>
               <div class="underline"></div>
              <label for="shippFromName"></label>
            </div>
         
         
            <div class="input-data">
                  <input type="text" id="shipFromAddress" name="shipFromAddress" placeholder="Ship From Address" ><br>
               <div class="underline"></div>
              <label for="shipFromAddress"></label>
            </div>
            <div class="input-data">
                <input type="text" id="shipFromcity" name="shipFromcity" placeholder="City" ><br>
                <div class="underline"></div>
               <label for="shipFromcity"></label>
            </div>
         </div>
         <div class="form-row">
         <div class="input-data">
             <input type="text" id="shipFromstate" name="shipFromstate" placeholder="State Province Code" ><br>
         
            <div class="underline"></div>
            <label for="shipFromstate"></label>
            </div>
         <div class="input-data">
          <input type="number" id="shipFromcode" name="shipFromcode" placeholder="Postal Code" ><br><br>
         <div class="underline"></div>
            <label for="shipFromcode"></label>
         </div>
            
            
            </div>
         
          <div class="heading"> <h4>Package</h4>  </div>
          <div class="form-row">
            <label for="serviceType">Service Type</label>
            <div class="input-data"> 

              <select name="serviceType" id="serviceType"  >
                <option></option>
                <option value="01">Next Day Air</option>
                <option value="02">2nd Day Air</option>
                <option value="03">Ground </option>
                <option value="07">Express </option>
                <option value="08">Expedited  </option>
                <option value="11">UPS Standard </option>
              </select>
             
            </div>
          </div>
          <div class="form-row">
             <div class="input-data">
               <input type="number" id="packagelength" name="packagelength" placeholder="Package Length(IN)" ><br>
               <div class="underline"></div>
              <label for="packagelength"></label>
            </div>
             <div class="input-data">
               <input type="number" id="packagewidth" name="packagewidth" placeholder="Package Width(IN)"><br>
               <div class="underline"></div>
              <label for="packagewidth"></label>
            </div>
             <div class="input-data">
               <input type="number" id="packageheight" name="packageheight" placeholder="Package Height(IN)" ><br>
               <div class="underline"></div>
              <label for="packageheight"></label>
            </div>

            </div>
            <div class="form-row">
            <div class="input-data">
               <input type="text" id="ratingdesciption" name="ratingdesciption" placeholder="Package Description" ><br>
               <div class="underline"></div>
              <label for="ratingdesciption"></label>
            </div>
         
         
            <div class="input-data">
                  <input type="number" id="packageweight" name="packageweight" placeholder="Package Weight in LBS" ><br>
               <div class="underline"></div>
              <label for="packageweight"></label>
            </div>
           
         </div>
         <div class="form-row">
             <div class="input-data">
                <input type="text" id="rating" name="rating" placeholder="Rating Information" ><br>
                <div class="underline"></div>
              <label for="rating"></label>
            </div>
         <div class="input-data">
              <input type="number" id="totalweight" name="totalweight" placeholder="Shipment Total Weight in LBS:" ><br><br>
         
            <div class="underline"></div>
             <label for="totalweight"></label>
            </div>
        
            
            
            </div>



            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit" value="Get Rates">
               </div>
            </div>
      </form>
      </div>
<!-- partial -->
  
</body>
</html>


<script>
// just for the demos, avoids form submit

 $("#myform").validate({
  rules:{
  shipperName:{
    required: true,
  },consignee:{
    required: true,
  },shipperCity:{
  required: true,
},shipperCity:{
  required: true,
},shipperProvinceCode:{
  required: true,
},shipperPostalCode:{
  required: true,
  minlength:5,
  // numbers:true,
},shippToName:{
  required: true,
},shippToAddress:{
  required: true,
},shippToCity:{
  required: true,
},shippToStateCode:{
  required: true,
},shippToStateCode:{
  required: true,
},shippToCode:{
  minlength:5,
  required: true,
},shippFromName:{
  required: true,
},shipFromAddress:{
  required: true,
},shipFromcity:{
  required: true,
},shipFromstate:{
  required: true,
},shipFromcode:{
  required: true,
  minlength:5,
},ratingdesciption:{
  required: true, 
},packageweight:{
  required: true, 
},rating:{
  required: true, 
},totalweight:{
  required: true,  
}, serviceType:{
    required: true,  
},packagelength:{
    required: true,  

},packagewidth:{
    required: true,  
  },packageheight:{
    required: true, 
  },

  },
 
 });


</script>
<script>
  $(document).ready(function() {
  $('#copyShipperDetails').change(function() {
    if ($(this).is(':checked')) {
      // Copy Shipper's Details to Ship From
      $('#shippFromName').val($('#shipperName').val());
      $('#shipFromAddress').val($('#consignee').val());
      $('#shipFromcity').val($('#shipperCity').val());
      $('#shipFromstate').val($('#shipperProvinceCode').val());
      $('#shipFromcode').val($('#shipperPostalCode').val());
    } else {
      // Clear Ship From Details
      $('#shippFromName').val('');
      $('#shipFromAddress').val('');
      $('#shipFromcity').val('');
      $('#shipFromstate').val('');
      $('#shipFromcode').val('');
    }
  });
});

</script>
