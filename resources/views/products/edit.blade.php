<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le produict</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <form action="{{ route('update.products', $products->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" value="{{$products->name}}"  id="name" name="name" >
                @if($errors->has('name'))
                    <div class="error-message">{{ $errors }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control"  id="description"value="{{$products->description}}" name="description">{{ old('description', $products->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="error-message">{{ $errors }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="text" class="form-control" value="{{$products->price}}" id="price" name="price" >
                @if($errors->has('price'))
                    <div class="error-message">{{ $errors }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="integer" class="form-control" value="{{$products->stock}}" id="stock" name="stock" > 
                @if($errors->has('stock'))
                    <div class="error-message">{{ $errors }}</div>
                @endif  
            </div>        
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
            <div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
