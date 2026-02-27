<h1>login</h1>

<form class="loginForm" action="<?= URLROOT?>/login" method="POST">
    <label for="username">Username:</label>
    <input id="username" type="text" name="username">

    <label for="password">Password:</label>
    <input id="password" type="password" name="password">

    <div class="loginButtons">
        <button type="submit">Login</button>
        <button type="submit">Enter as guest</button>
    </div>
</form>
