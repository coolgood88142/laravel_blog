<body>
    <div class="container">
        <div class="content">
            <div class="title">
                <?php
                foreach ($users as $user) {
                ?>
                    <h1><?php echo $user->us_name;?></h1>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>