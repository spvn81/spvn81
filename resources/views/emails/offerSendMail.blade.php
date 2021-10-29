

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
        table, th, td {
          border: 1px solid white;
          border-collapse: collapse;
        }
        th, td {
          background-color: #96D4D4;
          text-transform: uppercase;
        }
        </style>


  </head>
  <body>

    <table>


    <tbody>

        @if (!empty($name))
           <tr>
          <th scope="row">Name</th>
        <td>{{ $name }}</td>
            </tr>
           @endif


           @if (!empty($School))
           <tr>
          <th scope="row">School</th>
        <td>{{ $School }}</td>
            </tr>
           @endif

           
           @if (!empty($type))
           <tr>
          <th scope="row">Type</th>
        <td>{{ $type }}</td>
            </tr>
           @endif


           @if (!empty($email))
           <tr>
          <th scope="row">Email</th>
        <td>{{ $email }}</td>
            </tr>
           @endif


           @if (!empty($country))
           <tr>
          <th scope="row">Country</th>
        <td>{{ $country }}</td>
            </tr>
           @endif


           @if (!empty($state))
           <tr>
          <th scope="row">State</th>
        <td>{{ $state }}</td>
            </tr>
           @endif



           
           @if (!empty($city))
           <tr>
          <th scope="row">City</th>
        <td>{{ $city }}</td>
            </tr>
           @endif



          
           @if (!empty($mobile))
           <tr>
          <th scope="row">Mobile</th>
        <td>{{ $mobile }}</td>
            </tr>
           @endif




           @if (!empty($best_time_from_call) && !empty($best_time_to_call))
           <tr>
          <th scope="row">Best time to Call</th>
        <td>
           From :{{ $best_time_from_call }} to : {{ $best_time_to_call }}
        </td>
            </tr>
           @endif



           @if (!empty($messages))
           <tr>
          <th scope="row">message</th>
        <td>{{ $messages }}</td>
            </tr>
           @endif


 
    </tbody>
  </table>

  





 




 
  </body>
</html>






