<form action="{{Route('receive') }}" method="post" enctype="multipart/form-data">
@csrf    
<input type="file" name="image" id="image">
    <label for="image">ENTRER LE FICHIER</label>
    <button type="submit">Envoyer</button>
</form>