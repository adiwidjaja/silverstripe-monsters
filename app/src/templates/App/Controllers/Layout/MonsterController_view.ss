<% with $Monster %>
    <h1 class="title">$Title</h1>
    <p><a href="$Top.Link" class="button is-text">Back</a> <a href="$Top.Link/edit/$ID" class="button">Edit</a></p>
    $Image.Fill(500,500)
    <p>Color: $Color</p>
    <p>Eyes: $Eyes</p>
<% end_with %>
