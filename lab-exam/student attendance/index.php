<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hello world</h1>
    <form action="login.php" method="post">
        <label for="fname">
            Enter your name:
        </label>
        <input type="text" id="fname" name="fname">
        <label for="id">
            Enter your id:
        </label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Submit">
    </form>

    <br>
    <h1>this is for teacher</h1>
    <form action="teacher.php" method="post">
        <label for="fname">
            Enter your name:
        </label>
        <input type="text" id="fname" name="fname">
        <label for="id">
            Enter your id:
        </label>
        <input type="text" id="id" name="id">
        <input type="submit" value="Submit">
    </form>
</body>
</html>