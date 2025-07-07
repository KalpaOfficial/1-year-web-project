

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="#">
  <title>Exam Information Center - Signup</title>
  <style>
              body {
            margin: 0;
            padding: 0;
          }
          
          .container {
            display: flex;
            align-items: center;
            justify-content: center;
          }
          
          .photo {
            position: absolute;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 100%;
            height: 1400px;
            background-color: #666666;
            z-index: -1;
            filter: blur(5px);
            background: rgba(0, 0, 0, 0.7);
            background-blend-mode: darken;
          }
          
          .signup {
            /* Use same styles as .login */
          }
          
          .logo {
            font-family:"Kanit", sans-serif;
            font-size: 25px;
            color:#303c44;
            text-transform: uppercase;
            -webkit-text-stroke: 0.2px white;
            text-align:center;
            font-weight: 40px;
            text-shadow: 12px ;
          }
          
          .logo h2 {
            /* Use same styles as .logo h2 in login */
          }
          
          .logo p {
            font-family:'Courier New', Courier, monospace;
            -webkit-text-stroke: 0.2px white;
            text-align:center;
            font-weight: 40px;
          }
          
          .inputform {
            /* Use same styles as .inputform in login */
          }
          
          .inputform h2 {
            /* Use same styles as .inputform h2 in login */
          }
          
          .container form {
            padding: 0 40px;
            box-sizing: border-box;
          }
          
          form .input-group {
          }




        .inputform {
          background-color: #ffffff;
          padding: 30px;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
          width: 350px;
        }

        .inputform h2 {
          text-align: center;
          margin-bottom: 40px;
          font-size: 24px;
          color: #333;
        }

        .input-group {
          position: relative;
          margin-bottom: 30px;
        }

        .input-group input {
          width: 100%;
          padding: 10px;
          border: 2px solid #ccc;
          border-radius: 5px;
          font-size: 16px;
          background: none;
          color: #333;
        }

        .input-group label {
          position: absolute;
          top: 12px;
          left: 10px;
          color: #999;
          transition: 0.3s;
          font-size: 14px;
          pointer-events: none;
        }

        /* Styling the label */
        label {
            font-size: 16px;
            margin-bottom: 8px;
            color: #2691d9;
            display: block;
        }

        /* Styling the select dropdown */
        select {
            width: 100%;
            padding: 10px 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #333;
            margin-top: 8px;
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .input-group input:focus {
          border-color: #04AA6D;
          outline: none;
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
          top: -20px;
          left: 10px;
          font-size: 12px;
          color: #2691d9;
        }



        button[type="submit"] {
            width:100%;
            height: 50px;
            border: 1px solid;
            background:#2691d9;
            border-radius: 25px;
            font-size:18px;
            color:#e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline:none;
        }

        button[type="submit"]:hover {
          background-color: #038D5A;
        }

    </style>
</head>

<body>
  <div class="container">
    <img src="./photo/typefiteamwithkids.jpg" class="photo">
    <div class="signup">
      <div class="logo">
        <h2>Welcome to EDU Online<br>Examination platform</h2>
        <p>Please Sign Up for a New Account</p>
      </div>
      <div class="inputform">
        <h2>Signup</h2>
        <form action="connect.php" method="post">
          <div class="input-group">
            <input type="text" id="name" name="name" required>
            <label for="name">Name</label>
          </div>
          <div class="input-group">
            <input type="email" id="email" name="email" required>
            <label for="email">Email</label>
          </div>
          <div class="input-group">
            <input type="birthday" id="dob" name="dob" required>
            <label for="Dob">Date Of Birthday</label>
          </div>

          <div class="input-group">
            <input type="address" id="address" name="address" required>
            <label for="address">Address</label>
          </div>

          <div class="input-group">
            <input type="tel" id="contact" name="contact" required>
            <label for="contact">Contact No</label>
          </div>

          <div class="input-group">
            <input type="text" id="username" name="username" required>
            <label for="username">Username</label>
          </div>
          <div class="input-group">
            <input type="password" id="password" name="password" required>
            <label for="password">Password</label>
          </div>

        <label for="userType">Select User Type:</label>
        <select id="userType" name="userType" required>
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>

          <button type="submit">Sign Up</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>