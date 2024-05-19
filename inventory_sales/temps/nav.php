<link rel="stylesheet" href="styles/style.css">

<div class="wrapper" style="z-index: 99;">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <center>
                <img src="img/icons/user.png" alt="user" style="height: 60px; margin-top: 24px;">
                <h1 style="font-size: 14px; margin-top: 7px; color: #222;"><?php echo $_SESSION['name']; ?></h1>
            </center>
        </div> 
        <ul class="list-unstyled components">
            <li>
                <img src="img/icons/home.png" style="height: 30px; position: absolute; left: 20px;margin-top: 15px;" alt="Products">
                <a href="?pages=" class="nav-link" style="font-size: 20px;">Homepage</a>
            </li>
            <li>
                <img src="img/icons/products.png" style="height: 30px; position: absolute; left: 20px;margin-top: 15px;" alt="Products">
                <a href="" class="nav-link" style="font-size: 20px;">Products</a>
            </li>
            <li>
                <img src="img/icons/sales.png" style="height: 30px; position: absolute; left: 20px;margin-top: 15px;" alt="">
                <a href="?page=sales" class="nav-link" style="font-size: 20px;">Sales</a>
            </li>
            <li>
                <img id="usric" src="img/icons/user.png" style="height: 30px; position: absolute; left: 20px;margin-top: 15px;" alt="">
                <a href="?page=users" class="nav-link" style="font-size: 20px;">Users</a>
            </li>
        </ul>
    </nav>

    <nav class="navbar">
        <div class="container-fluid">
            <span id="sidebarCollapse">
                <img style="height: 60px; position: relative; right: -6px; bottom: -3px;" src="img/icons/menu-hamb.png" alt="">
            </span>
            <a href="includes/logout.php" class="logout-link">Logout</a>     
        </div>
    </nav>

    <style>
        /* Hover effect for nav links */
        .nav-link:hover {
            color: red;
            text-decoration: underline;
        }

    </style>
</div>

<div class="overlay"></div>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
