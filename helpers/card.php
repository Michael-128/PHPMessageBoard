<?php

function render_card($username, $body) {
    return "
        <div class='card my-4'>
            <div class='card-body text-left'>
                <p class='card-text'><strong>{$username}</strong> said...</p>
                <p class='card-text'>{$body}</p>
            </div>
        </div>
    ";
}