<% with $Monster %>
    <% if $ID %>
        <h1 class="title">Editing $Name</h1>
        <p><a href="$Top.Link("view")$ID" class="button is-text">Back</a></p>
    <% else %>
        <h1 class="title">New Monster</h1>
        <p><a href="$Top.Link" class="button is-text">Back</a></p>
    <% end_if %>
<% end_with %>
$Form
