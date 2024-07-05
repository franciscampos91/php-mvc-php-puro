<title><?php echo $title; ?></title>

<ul>
    <?php foreach ($user as $item) { ?>
        <li><?php echo $item['nome'] ?> - <?php echo $item['email'] ?></li>
    <?php } ?>
</ul>