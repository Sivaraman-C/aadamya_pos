<!-- <!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container mt-4">
    	<form method="POST" action="<?php echo base_url('saveMyData'); ?>">
		  <div class="mb-3">
		    <label class="form-label">Name:</label>
		    <input type="text" class="form-control" name="nameuser">
		  </div>

		 <div class="mb-3">
		    <label class="form-label">Address:</label>
		    <input type="text" class="form-control" name="address">
		  </div>

		  <a href="<?php echo base_url(); ?>">Back to Home</a>

		 
		  
		  <button type="submit" name="submitData" class="btn btn-primary">Submit</button>
		</form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

   
  </body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Login with CodeIgniter</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            color: #333;
            text-align: center;
            margin: 50px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            max-width: 400px;
            margin: auto;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }
        h1 {
            margin-bottom: 20px;
            color: #4285f4;
        }
        a.button {
            display: inline-block;
            text-decoration: none;
            background: #4285f4;
            color: white;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(66, 133, 244, 0.5);
            transition: background-color 0.3s ease;
        }
        a.button:hover {
            background: #3367d6;
        }
        .user-info {
            margin-top: 20px;
        }
        .user-info img {
            border-radius: 50%;
            margin-bottom: 10px;
            width: 80px;
            height: 80px;
            border: 3px solid #4285f4;
        }
    </style>
</head>
<body>
    <div class="container">

    <?php if (isset($loginButton)): ?>
    <?php else: ?>
        <p>Please login with your Google account:</p>
        <p><a class="button" href="<?= $loginButton ?>">Login with Google</a></p>
    <?php endif; ?>
    </div>
</body>
</html>