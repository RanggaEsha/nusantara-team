<!DOCTYPE html>
<html>
<head>
    <style>
        body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 20px;
}

h2 {
  color: #333;
  margin-bottom: 20px;
}

form {
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 4px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

    </style>
    <title>Delete Card</title>
</head>
<body>
    <h2>Delete Card</h2>

    <form action="fiturdelet.php" method="POST">
        <label for="card_title">Card Title (h2):</label>
        <input type="text" id="card_title" name="card_title" required>
        <br>
        <input type="submit" value="Delete Card">
    </form>

</body>
</html>
