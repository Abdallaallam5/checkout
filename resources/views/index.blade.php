<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Buy Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.checkout')}}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <h3 for="name" class="form-label" style="color: #007185">Product Name:</h3>
                                <h6>Andora Mens Oxford Candy Stripes Pattern Western</h6>
                            </div>
                            <div class="mb-3">
                                <h3 for="description" class="form-label" style="color: #007185">Product Description:</h3>
                            <h6>Andora fashion store for men and women offer a wide range of clothing, They may have various categories such as tops, bottoms, dresses, suits, and more.</h6>    
                            </div>
                            <div class="mb-3">
                                <h3 for="price" class="form-label" style="color: #007185">Product Price :</h3>
                                <h6>$499.00</h6>
                            </div>
                            <div class="mb-3">
                                
                                <img src="https://m.media-amazon.com/images/I/61O5U9RQIZL._AC_SX679_.jpg" alt="" style="height: 200px">
                            </div>
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('product.checkout') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="1">
                                    <button type="submit">Buy Now</button>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
