<div id="$HolderID" class="field">
    <% if $Title %><label class="label" for="$ID">$Title</label><% end_if %>
    <div class="control">
        $Field
    </div>
    <% if $RightTitle %><label class="right" for="$ID">$RightTitle</label><% end_if %>
    <% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
    <% if $Description %><span class="description">$Description</span><% end_if %>
</div>
