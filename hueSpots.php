<?php
include_once("php/hue.php");
function buildSpotIcon($id){
    $spot = getLightInfo($id);
    if ($spot['on']){
        $color = $spot['rgb'];
    } else {
        $color = "#000000";
    }
    $name = str_replace(' ', '', $spot['name']);
    $return = "<a href=\"index.php?page=detailHueSpot&id=".$id."\">";
    $return .= "<svg class=\"w-75\" style=\"transform: rotate(90deg) scaleX(-1);\">";
    $return .= buildSVG($color, $name);
    $return .= "<use xlink:href=\"#".$name."\" />";
    $return .= "</svg>";
    $return .= "<h5 style=\"color: ".$color."\">".$name."</h5>";
    $return .= "</a>";
    return $return;
}

function buildSVG($color, $name){
    return "<svg display=\"none\">
    <symbol viewBox=\"0 0 512 512\" id=\"".$name."\">
    <polygon id=\"lampColor\" style=\"fill:".$color."\"  points=\"66.326,136.419 248.977,357.946 399.741,285.251 317.412,0 \"/>
    <polygon style=\"fill:#363640;\" points=\"417.693,296.099 419.913,354.328 369.333,407.977 295.905,414.664 251.46,376.978
	326.792,320.539 \"/>
    <path style=\"fill:#464754;\" d=\"M295.905,414.664l22.554,46.354c7.671,15.767,26.672,22.33,42.441,14.659l66.909-32.554
	c15.767-7.671,22.33-26.672,14.659-42.441l-22.554-46.354L295.905,414.664z\"/>
    <path style=\"fill:#A9ACCC;\" d=\"M408.054,261.215l-178.093,86.651c-8.836,4.299-12.514,14.947-8.215,23.784l0,0
	c4.299,8.836,14.947,12.514,23.784,8.215l178.093-86.651c8.836-4.299,12.514-14.947,8.215-23.784l0,0
	C427.538,260.594,416.89,256.916,408.054,261.215z\"/>
    <path style=\"fill:#D3D7FF;\" d=\"M242.374,360.279l178.093-86.651c4.054-1.972,8.486-2.248,12.515-1.135
	c-0.287-1.036-0.658-2.063-1.145-3.065c-4.299-8.836-14.948-12.514-23.784-8.215l-178.093,86.651
	c-8.836,4.299-12.514,14.947-8.215,23.784l0,0c2.326,4.782,6.517,8.035,11.269,9.348
	C230.774,372.892,234.539,364.091,242.374,360.279z\"/>
    <path style=\"fill:#363640;\" d=\"M392.423,429.814L392.423,429.814c-19.579,0-35.452,15.873-35.452,35.452V512h70.906v-46.733
	C427.876,445.687,412.004,429.814,392.423,429.814z\"/>
    <circle style=\"fill:#A9ACCC;\" cx=\"392.42\" cy=\"464.566\" r=\"11.042\"/>
    </symbol>
</svg>";
}
?>
<div class="row" id="R2">
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C1">
        <?= buildSpotIcon(1); ?>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C2">
        <?= buildSpotIcon(2); ?>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C3">
        <?= buildSpotIcon(3); ?>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C4">
        <?= buildSpotIcon(4); ?>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C5">
        <?= buildSpotIcon(5); ?>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R2C6">
        <?= buildSpotIcon(6); ?>
    </div>
</div>
<div class="row" id="R3">
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C1">
        <a href="index.php?page=detailHueSpot&group=1">
            <img src="img/downStairs/spotlights.svg" alt="spotlights" class="w-75">
            <h5>Allemaal</h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C2">
        <a href="index.php?page=hueKnightRider">
            <img src="img/downStairs/spotlights.svg" alt="spotlights" class="w-75">
            <h5>Knight Rider</h5>
        </a>
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C3">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C4">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C5">
        &emsp;
    </div>
    <div class="col-sm-2 col-6 align-self-center text-center" id="R3C6">
        &emsp;
    </div>
</div>