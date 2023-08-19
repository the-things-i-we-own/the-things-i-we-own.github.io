<?php
$csv1 = "csv/computer.csv";
$org1 = fopen($csv1, 'r');
flock($org1, LOCK_SH);
while ($row = fgetcsv($org1)) {
  $rows[] = $row;
}

$csv2 = "csv/furniture.csv";
$org2 = fopen($csv2, 'r');
flock($org2, LOCK_SH);
while ($row = fgetcsv($org2)) {
  $rows[] = $row;
}

$csv3 = "csv/goods.csv";
$org3 = fopen($csv3, 'r');
flock($org3, LOCK_SH);
while ($row = fgetcsv($org3)) {
  $rows[] = $row;
}

$csv4 = "csv/listening.csv";
$org4 = fopen($csv4, 'r');
flock($org4, LOCK_SH);
while ($row = fgetcsv($org4)) {
  $rows[] = $row;
}

$csv5 = "csv/printing.csv";
$org5 = fopen($csv5, 'r');
flock($org5, LOCK_SH);
while ($row = fgetcsv($org5)) {
  $rows[] = $row;
}

$csv6 = "csv/shopping.csv";
$org6 = fopen($csv6, 'r');
flock($org6, LOCK_SH);
while ($row = fgetcsv($org6)) {
  $rows[] = $row;
}

$csv7 = "csv/stationery.csv";
$org7 = fopen($csv7, 'r');
flock($org7, LOCK_SH);
while ($row = fgetcsv($org7)) {
  $rows[] = $row;
}

$csv8 = "csv/viewing.csv";
$org8 = fopen($csv8, 'r');
flock($org8, LOCK_SH);
while ($row = fgetcsv($org8)) {
  $rows[] = $row;
}

$csv9 = "csv/www.csv";
$org9 = fopen($csv9, 'r');
flock($org9, LOCK_SH);
while ($row = fgetcsv($org9)) {
  $rows[] = $row;
}

$csv10 = "csv/members.csv";
$org10 = fopen($csv10, 'r');
flock($org10, LOCK_SH);
while ($row = fgetcsv($org10)) {
  $rows[] = $row;
}
?>

<?php if (!empty($rows)) : ?>
  <?php foreach ($rows as $row):?>
    <li data-categories="<?= h($row[0]) ?>" data-status="<?= h($row[1]) ?>">
      <p>
        <u><?=h($row[3])?></u>
        <b><?=h($row[2])?></b>
      </p>
      <p><small><?=h($row[4])?></small></p>
    </li>
  <?php endforeach; ?>
<?php else : ?>
<?php endif; ?>
