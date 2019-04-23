<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
        var clientID= "";
        $(document).ready(function(){
            $( "#ApiToken" ).click(function() {
              const data = {
                name: 'New Client Name',
                redirect: 'http://contoh.com/callback'
              };

              axios.post('http://contoh.com/oauth/clients', data)
                  .then(response => {
                    console.log(response.data);
                    //$("#clientNameValue").text(response.name);
                    //$("#clientSecretValue").text(response.name);
              }).catch (function (error) {
                    console.log(error);
              });
            });

            $( "#getClient" ).click(function() {
                axios.get('http://contoh.com/oauth/clients').then(response => {
                console.log(response.data);
              });
            });

            $( "#deleteClient" ).click(function() {
              axios.delete('http://contoh.com/oauth/clients/'+ clientID)
                  .then(response => {
                    console.log("Client telah dihapus");
              });
            });
        });
        </script>
    </head>
    <body>
      <div class="container-fluid">
          <div class="row">
              <a href="#" role="button" class="btn btn-default" id=getClient>Get Client</a>
              <a href="#" role="button" class="btn btn-default" id=ApiToken>Make Client</a>
              <a href="#" role="button" class="btn btn-default" id=deleteClient>Delete Client</a>
              <a href="#" role="button" class="btn btn-default" id=editClient>Edit Client</a>
          </div>
          <div class="row">
            <p id=#clientName>Name : </p><p id=#clientNameValue></p>
            <p id=#clientSecret>Secret : </p><p id=#clientSecretValue></p>
          </div>
      </div>


    </body>
</html>
