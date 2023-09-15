

<?php if (logged_in()) : ?>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
    </li>
<?php else : ?>
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/login">Login</a>
    </li>
<?php endif; ?>