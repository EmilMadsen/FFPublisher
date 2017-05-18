<nav>
    <ul class="nav navbar-nav">
        <a class="navbar-brand brand" href="#">FoodFinder_Publisher</a>
        <li><a href="/FFPublisher/view/allergies/index">Allergies</a></li>
        <li><a href="/FFPublisher/view/ingredients/index">Ingredients</a></li>
        <li><a href="/FFPublisher/view/mealtypes/index">Meal Types</a></li>
        <li><a href="/FFPublisher/view/recipetypes/index">Recipe Types</a></li>
        <li><a href="/FFPublisher/view/recipes/index">Recipes</a></li>
        <li><a href="">Menus</a></li>
    </ul>



    <ul class="nav navbar-nav navbar-right">
        <li><div class="navigationUser">Hi <?php echo ucfirst($_SESSION['publisherName'])?></div></li>
        <li><a href="../../signout.php">Sign out</a></li>
    </ul>
</nav>