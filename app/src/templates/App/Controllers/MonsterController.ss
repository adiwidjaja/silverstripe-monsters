<h1>$Title</h1>
<% if $Monsters %>
<table class="table">
    <% loop $Monsters %>
    <tr>
        <td>
            $Name
        </td>
        <td>
            $Color
        </td>
    </tr>
    <% end_loop %>
</table>
<% end_if %>