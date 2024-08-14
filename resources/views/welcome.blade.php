<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h1>Tableau de bord</h1>
	    <nav class="menu">
            <h3>
                <ul>
                    <li><a href="categories/">Categories</a></li>
                    <li><a href="products/">Produits</a></li>
                </ul>
            </h3>
        </nav>

    <form method="GET" action="{{ url('/') }}">
        <div class="mb-3">
            <label for="categories_id" class="form-label">Categorie</label>
            <select class="form-control" id="categories_id" name="categories_id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                 @endforeach
            </select>
            @if($errors->has('categories_id'))
                <div class="error-message">{{ $errors }}</div>
             @endif            
        </div>
        

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ request('stock') }}" min="0">
        @if($errors->has('stock'))
            <div class="error-message">{{ $errors }}</div>
        @endif 
        </div>
        
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
    </form>
   

    <!-- Liste des projets et des tâches -->
    @foreach ($categories as $category)
        <div class="card mb-4" data-category-id="1">
            <div class="card-header">
                <h4>Categories:{{ $category->name }}</h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    
                    @foreach ($category->products as $product  )
                    <li class="list-group-item d-flex justify-content-between align-items-center" data-status="pending">
                        <span>
                            <strong>{{ $product->id}}</strong>
                            <h5>Nom:</h5><strong>{{ $product->name }}</strong>
                            <h5>Stock:</h5><strong>{{ $product->stock }}</strong>
                        </span>
                    </li> 
                    @endforeach 
                
                </ul>
            </div>
        </div>
    @endforeach


</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>