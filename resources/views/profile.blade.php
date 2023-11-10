<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.5/axios.min.js"
        integrity="sha512-nnNHpffPSgINrsR8ZAIgFUIMexORL5tPwsfktOTxVYSv+AUAILuFYWES8IHl+hhIhpFGlKvWFiz9ZEusrPcSBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <button type="button" class="btn btn-success mt-5" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Creat</button>

        <div class="modal" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <div class="modal-body">
                <p>Modal body text goes here.</p>
              </div> --}}
                    <form class="m-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" id="name" name="Name" class="form-control"
                                placeholder="Enter Name">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" id="mail" name="mail" class="form-control"
                                placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" id="pass" name="pass" class="form-control"
                                placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">รูป</label>
                            <input type="file" id="img" name="img" class="form-control"
                                placeholder="select image">
                            <img id="file-img" class="img-fluid rounded">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="upload()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            {{-- @dd($profile) --}}
            @foreach ($profile as $pf)
                {{-- <img src="{{$profile->img}}" alt=""> --}}
                {{-- @dd($pf) --}}
                <div class="col mt-5">
                    <div class="card " style="width: 18rem; height:100%; ">
                        <div style="object-fit:cover;">
                            <img src="{{ $pf->img }}" class="card-img-top" alt="">
                        </div>

                        <div class="card-body">
                            <h1>{{ $pf->name }}</h1>
                            <p>{{ $pf->email }}</p>
                            <button class="btn btn-info" onclick="getPf({{ $pf->id }})" data-bs-toggle="modal"
                                data-bs-target="#getEdit">edit</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="modal" id="getEdit" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div> --}}
                    <form class="m-3">
                        <div class="mb-3">
                            <input type="hidden" id="get-id" name="Name" value="">
                            <label for="" class="form-label">Name</label>
                            <input type="text" id="get-name" name="Name" class="form-control"
                                placeholder="Enter Name" value="">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" id="get-mail" name="mail" class="form-control"
                                placeholder="Enter Email" value="">
                        </div>
                        {{-- <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" id="get-pass" name="pass" class="form-control" placeholder="Enter password">
                      </div> --}}
                        <div class="mb-3">
                            <label for="" class="form-label">รูป</label>
                            <input type="file" id="get-img" name="img" class="form-control"
                                placeholder="select image" value="images/2023/04/1680928947.png">
                            <img id="af-img" class="img-fluid rounded">
                        </div>
                        <input type="text" id="img-alt" value="">


                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="update()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="/js/index.js"></script>
</body>

</html>
