<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
@if(!empty($successMessage))
    <div class="alert alert-success" role="alert">
        {{ $successMessage }}
    </div>
@endif
@if(!empty($errorMessage))
    <div class="alert alert-danger" role="alert">
        {{ $successMessage }}
    </div>
@endif
<div class="card m-5">
    <div class="card-header">Send email</div>
    <div class="card-body">
        <form method="post" action="{{ route('mail.send') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Name</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="mb-3">
                <label for="contents" class="form-label">Contents</label>
                <textarea class="form-control" id="contents" name="contents" style="min-height:15em"></textarea>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

