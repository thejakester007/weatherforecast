<html>
<head>
<title>Weather App Forecast</title>
<meta name="description" content= "weather application test" />
<meta name="robots" content= "noindex, nofollow">
<meta name='author' content="Jake Veneracion">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
      crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/app.css') }}">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Get your Weather Forecast</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" novalidate method="POST" action="/">
                            @csrf

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Full Name" required autocomplete="off">
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" required autocomplete="off">
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <select class="form-select mt-3" name="country" required>
                                @foreach ($countries as $country)
                                    <option value="{{ $country }}">{{ $country }}</option>
                                @endforeach
                               </select>
                                <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div>
                           </div>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="location" placeholder="Location" required>
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>
                  
                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Get Weather Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>