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
        <div class="form-group">
            <label for="category">Categorie:</label>
            <select name="category" id="category" class="form-control">
                <option value="">All</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <select id="stock" name="stock" class="form-control">
                 @for ($i = 0; $i <= 10000; $i += 10)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
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
                @if ($category->product && $category->product->count())     
                @foreach ($category->product as $products )
                <li class="list-group-item d-flex justify-content-between align-items-center" data-status="pending">
                    <span>
                        <p>Nom</p>
                        <strong>{{ $products->name }}</strong>
                    </span>
                    <span class="badge badge-secondary">{{ $products->stock }}</span>
                </li> 
                @endforeach 
                @else
                    <li>Aucun produit disponible</li>
                @endif
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