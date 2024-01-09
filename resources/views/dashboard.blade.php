<!doctyp
use Illuminate\Support\Facades\Session;e html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="row">

    <div class="col-sm-6">
        <form method="POST" action="{{ route('save') }}"  class="form-horizontal">
            @csrf
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Please paste your Linkedin profile url's</h1>
                    <p class="lead">Empty inputs will be ignored.</p>

            <div class="form-group">
                <input name="id" type="hidden" value="{{ $id }}">
                <label for="exampleInputEmail1">Linkedin address</label>
                <input name="links[]" class="form-control"   placeholder="Enter Linkedin address">
                <label for="exampleInputEmail1">Linkedin address</label>
                <input name="links[]" class="form-control"   placeholder="Enter Linkedin address">
                <label for="exampleInputEmail1">Linkedin address</label>
                <input name="links[]" class="form-control"   placeholder="Enter Linkedin address">
                <label for="exampleInputEmail1">Linkedin address</label>
                <input name="links[]" class="form-control"   placeholder="Enter Linkedin address">
                <label for="exampleInputEmail1">Linkedin address</label>
                <input name="links[]" class="form-control"   placeholder="Enter Linkedin address">
                <label for="exampleInputEmail1">Linkedin address</label>
                <input name="links[]" class="form-control"   placeholder="Enter Linkedin address">
                <label for="exampleInputEmail1">Linkedin address</label>
                <input name="links[]" class="form-control"   placeholder="Enter Linkedin address">
            </div>
            <button type="submit" class="btn btn-primary">Create Report</button>
                </div>
            </div>
        </form>
    </div>
    @if(isset($saved))
        <div class="col-sm-6">
            <div class="jumbotron">
                <h1 class="display-4">Hello!</h1>
                <p class="lead">Your request has been accepted. Please check back for results in a few minutes by pressing Export.</p>
                <hr class="my-4">
                <form method="POST" action="{{ route('export') }}"  class="form-horizontal">
                    @csrf
                    <p class="lead">
                        <input name="id" type="hidden" value="{{ $id }}">
                    </p>
                    <!-- Merijn -->
                    <!-- Button with an id -->
                    <button type="submit" class="btn btn-primary btn-lg" id="exportButton">Export</button>
                </form>
                <form method="POST" action="{{ route('personalityScore') }}" class="form-horizontal">
                    @csrf
                    <p class="lead">
                        <input name="id" type="hidden" value="{{ $id }}">
                    </p>
                    <button type="submit" class="btn btn-primary btn-lg" id="exportScore">Score</button>
                </form>
            </div>
        </div>
    @endif
</div>
</body>

<!-- Optional JavaScript -->

<!-- Check if exportbutton has been loaded. If loaded, wait x amount of seconds to show button.--> 
<script>
      window.onload = function() {
        // Disable the button when the page loads
        document.getElementById('exportButton').disabled = true;
        document.getElementById('exportScore').disabled = true;
        // Enable the button after 15 seconds
        setTimeout(function() {
            document.getElementById('exportButton').disabled && document.getElementById('exportScore').disabled  = false;
        }, 15000);
        
};
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

