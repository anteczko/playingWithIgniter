<form action="/olx/adverts/search" method="post">
    sortuj oferty według nazwy:
    <input type="text" name="title" class="form-control">
    sortuj oferty według ceny:
    <input type="number" name="price" step="0.01" min="0.01">
    sortuj rosnąco
    <input type="radio" name="sorting">
    <input type="submit" class="btn btn-primary" value="Search">
</form>