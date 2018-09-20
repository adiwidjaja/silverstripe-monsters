<h1 class="title">$Title</h1>
<p><a href="$Top.Link/edit" class="button">New</a></p>
<% if $Monsters %>
<div class="columns is-multiline">
    <% loop $Monsters %>
        <div class="column is-one-third">
            <a href="$Up.Link()view/$ID" class="box">
                $Image.Fill(300, 200)
                <p>$Name</p>
            </a>
        </div>
    <% end_loop %>
</div>
<% end_if %>