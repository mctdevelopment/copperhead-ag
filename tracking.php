<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Tracking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .tracking-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .tracking-input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .tracking-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .tracking-button:hover {
            background-color: #45a049;
        }label#trackingNumber-error {
    color: red;
    float:right;
}
.error{
    color: red;
    }
    </style>


</head>
<body>
    <h1>Track Your Package</h1>
    <form method="post" id="myform" action="get_tracking.php">
    <div class="tracking-form">
    	<label id="trackingNumber" class="error"for="trackingNumber"></label><br><br>
        <input type="text" class="tracking-input" placeholder="Enter tracking number" name="trackingNumber" id="trackingNumber">
        </label>
        <button class="tracking-button" >Track</button>
    </div>
</form>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
	$("#myform").validate({
  rules:{
  trackingNumber:{
    required: true,
    minlength:18
  },
 
 },
 });


</script>
</body>
</html>