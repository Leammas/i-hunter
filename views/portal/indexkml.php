<?php
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $this yii\web\View */

echo '<?xml version="1.0" encoding="UTF-8"?><kml xmlns="http://earth.google.com/kml/2.1"><Folder>';

$models = $dataProvider->models;

foreach ($models as $portal) {
/* @var $portal \app\models\Portal */

echo "
<Placemark>
<name>{$portal->title} {$portal->curr_owner} ({$portal->timePassed})</name>
<description></description>
<LookAt id=\"{$portal->id}\">
<longitude>{$portal->lat}</longitude>
<latitude>{$portal->lng}</latitude>
<altitude>0</altitude>
<heading>0</heading>
<tilt>0</tilt>
<range>0</range>
</LookAt>
<Point id=\"{$portal->id}\">
<coordinates>{$portal->lng},{$portal->lat},0</coordinates>
</Point>
</Placemark>
";
}

echo '</Folder></kml>';

