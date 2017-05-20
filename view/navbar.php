<nav>
    <ul class="nav navbar-nav">
        <a class="navbar-brand brand" href="#">FoodFinder_Publisher</a>
        <li><a href="/FFPublisher/view/allergies/index.php">Allergies</a></li>
        <li><a href="/FFPublisher/view/ingredients/index.php">Ingredients</a></li>
        <li><a href="/FFPublisher/view/mealtypes/index.php">Meal Types</a></li>
        <li><a href="/FFPublisher/view/recipetypes/index.php">Recipe Types</a></li>
        <li><a href="/FFPublisher/view/recipes/index.php">Recipes</a></li>
        <li><a href="">Menus</a></li>
    </ul>



    <ul class="nav navbar-nav navbar-right">
        <li><div class="navigationUser">Hi <?php echo ucfirst($_SESSION['publisherName'])?></div></li>
        <li><a href="../../signout.php">Sign out</a></li>
    </ul>
</nav>