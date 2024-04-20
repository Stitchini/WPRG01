<html lang="en">

<body>
<div id="flex">
    <?php
    foreach (rng() as $rngnum){
        echo match ($rngnum) {
            1 => '<img src="https://pbs.twimg.com/media/GIK6amNbkAAPgcV?format=jpg&name=medium" alt="squezzed food"/>',
            2 => '<img src="https://pbs.twimg.com/media/FgQRnahX0AEdH8R?format=jpg&name=large" alt="squezzed food"/>',
            3 => '<img src="https://pbs.twimg.com/media/GBsd0oPaQAA26cU?format=jpg&name=large" alt="squezzed food"/>',
            4 => '<img src="https://pbs.twimg.com/media/E2MZAqMXoAAjhum?format=jpg&name=medium" alt="squezzed food"/>',
            5 => '<img src="https://pbs.twimg.com/media/GKL_foMbgAA17SU?format=jpg&name=large" alt="squezzed food"/>',
            6 => '<img src="https://pbs.twimg.com/media/GGRNz-ebkAAbZXK?format=jpg&name=medium" alt="squezzed food"/>',
            7 => '<img src="https://pbs.twimg.com/media/Fe40hEEXkAI1_Tu?format=jpg&name=medium" alt="squezzed food"/>',
            8 => '<img src="https://pbs.twimg.com/media/E1s78tYWYAMQXY5?format=jpg&name=medium" alt="squezzed food"/>',
            9 => '<img src="https://pbs.twimg.com/media/E4lkTmjXIAMqk6l?format=jpg&name=large" alt="squezzed food"/>',
            default => 'Error',
        };
    }
    ?>
</div>
</body>
</html>



<?php
function rng(): array{
    $values = [];
    while (count($values) < 3){
        $value = rand(1, 9);
        if (!in_array($value, $values)){
            $values[] = $value;
        }
    }
    return $values;
}

?>
