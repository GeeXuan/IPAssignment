<!-- create.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add New Faculty</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <h2>Add New Faculty</h2><br/>
    <form method="post" action="{{url('campuses')}}">
      @csrf
      <p>
        <label for="name">Campus Name:</label>
        <input type="text" name="name">  
      </p>
      <p>
        <label for="code">Campus Abbreviation:</label>
        <input type="text" name="abbreviation">
      </p>
      <p>
        <label for="code">Campus Address:</label>
        <input type="text" name="description">
      </p>
      <p>
        <button type="submit">Submit</button>
      </p>
    </form>
  </body>
</html>
