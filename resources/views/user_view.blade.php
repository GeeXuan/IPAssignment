<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table border ="1">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Password</td>
            </tr>
            @foreach ($user as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
