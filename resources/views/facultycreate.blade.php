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
    <form method="post" action="{{url('faculties')}}">
      @csrf
      <p>
        <label for="name">Faculty Name:</label>
        <input type="text" name="name">  
      </p>
      <p>
        <label for="code">Faculty Code:</label>
        <input type="text" name="abbreviation">
      </p>
      <p>
        <label for="code">Faculty Description:</label>
        <input type="text" name="description">
      </p>
      <p>
        <label for="code">Faculty Cost:</label>
        <input type="text" name="costPerCreditHour">
      </p>
      <p>
        <button type="submit">Submit</button>
      </p>
    </form>
  </body>
</html>
