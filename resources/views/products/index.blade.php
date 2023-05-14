<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,600&display=swap" rel="stylesheet">
  <style>
    .custom-thead {
      height:50px;
      /* Increase the height as per your preference */
      background-image: linear-gradient(112deg, #06B7DB -63.59%, #FF4ECD -20.3%, #0072F5 70.46%);
      justify-content: center;
      align-items: center;
    }

    .custom-thead th {
      font-family: 'Jost', sans-serif;
      font-style: normal;
      font-weight: 600;
      font-size: 18px;
      line-height: 24px;
      color: #FFFFFF;
    }

    #header{
      font-family: 'Jost', sans-serif;
      font-style: normal;
      font-weight: 400;
      font-size: 48px;
      line-height: 32px;
    }


    .h1{
      font-family: 'Dancing Script', cursive;
      font-style: normal;
      font-weight: 600;
      font-size: 32px;
    }

    .modal-header{
      background-image: linear-gradient(112deg, #06B7DB -63.59%, #FF4ECD -20.3%, #0072F5 70.46%);
    }

  </style>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  <!-- <div>
    <a href="{{route('products.create')}}">Create a Product</a>
  </div> -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <!-- <h4 class="d-inline-block"><a href ="index.php" style="color: #fff; text-decoration:none">Hong Kae Ren</a></h4> -->
        <a class="navbar-brand mx-4 my-2 h1">Hong Kae Ren</a>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      </div>
    </div>
  </nav>



  <div class="container mx-6 my-3">

    <h1 class="my-4" id="header">Inventory Management</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">
      Create +
    </button>
    <div>
      @if(session()->has('success'))
      <div>
        {{session('success')}}
      </div>
      @endif
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-white" id="createProductModalLabel">Create a new product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="createProductForm" method="post" action="{{route('products.store')}}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name" value="">
            </div>

            <div class="mb-3">
              <label for="Quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="">
            </div>

            <div class="mb-3">
              <label for="Price" class="form-label">Price</label>
              <input type="decimal" class="form-control" name="price" placeholder="Price" value="">
            </div>

            <div class="mb-3">
              <label class="form-label">Description</label>
              <input type="text" class="form-control" name="description" placeholder="Description">
            </div>

            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" id="saveButton" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <table class="table table-hover border shadow p-3 mb-5 bg-body-tertiary rounded ">
          <thead class="custom-thead">
            <tr>
              <th class="text-white" scope="col">ID</th>
              <th class="text-white" scope="col" class="col-2">Name</th>
              <th class="text-white" scope="col" class="col-1">Quantity</th>
              <th class="text-white" scope="col" class="col-1">Price</th>
              <th class="text-white" scope="col" class="col-3">Description</th>
              <th class="text-white" scope="col" colspan="2" class="col-4">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>{{$product->id}}</td>
              <td>{{$product->name}}</td>
              <td>{{$product->quantity}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->description}}</td>
              <td>
                <!-- Edit-->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal-{{$product->id}}">
                  Edit
                </button>

                <!-- Modal -->
                <div class="modal fade" id="editProductModal-{{$product->id}}" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-white" id="editProductModalLabel">Edit product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form method="post" action="{{route('products.update', ['product' => $product])}}">
                          @csrf
                          @method('PUT')
                          <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{$product->name}}">
                          </div>

                          <div class="mb-3">
                            <label for="Quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}">
                          </div>

                          <div class="mb-3">
                            <label for="Price" class="form-label">Price</label>
                            <input type="number" step="0.01" name="price" class="form-control" value="{{$product->price}}">
                          </div>

                          <div class="mb-3">
                            <label for="Description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" value="{{$product->description}}">
                          </div>

                          <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>

              <td>
                <form method="post" action="{{route('products.destroy', ['product' => $product])}}">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>




</body>

</html>