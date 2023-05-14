<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <h1>Edit product details</h1>
  <form method="post" action="{{route('products.update', ['product' => $product])}}">
    @csrf
    @method('PUT')
    <div>
      <label for="name">Name</label>
      <input type="text" name="name" placeholder="Name" value="{{$product->name}}">
    </div>

    <div>
      <label for="Quantity">Quantity</label>
      <input type="number" name="quantity" placeholder="Quantity" value="{{$product->quantity}}">
    </div>

    <div>
      <label for="Price">Price</label>
      <input type="decimal" name="price" placeholder="Price" value="{{$product->price}}">
    </div>

    <div>
      <label>Description</label>
      <input type="text" name="description" placeholder="Description" value="{{$product->description}}">
    </div>

    <div>
      <input type="submit" value="Update"/>
    </div>
  </form>

</body>

</html>